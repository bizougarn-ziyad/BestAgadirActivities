<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong!');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            Log::info('Google OAuth Success', [
                'google_id' => $googleUser->id,
                'email' => $googleUser->email,
                'name' => $googleUser->name,
            ]);
            
            // Check if user exists by email first
            $user = UserData::where('email', $googleUser->email)->first();
            
            if ($user) {
                Log::info('Existing user found', ['user_id' => $user->id]);
                // User exists, update Google info if not already set
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar ?? $user->avatar,
                        'name' => $googleUser->name ?? $user->name,
                    ]);
                    Log::info('Updated existing user with Google data');
                }
            } else {
                Log::info('Creating new user from Google data');
                // Create new user with Google data
                $user = UserData::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => null,
                ]);
                Log::info('New user created', ['user_id' => $user->id]);
            }

            // Log the user in
            Auth::login($user);
            Log::info('User logged in successfully', [
                'user_id' => $user->id,
                'auth_check_after_login' => Auth::check(),
                'auth_user_after_login' => Auth::user() ? Auth::user()->id : null
            ]);

            // Force session regeneration
            request()->session()->regenerate();
            
            Log::info('Session regenerated', [
                'session_id' => session()->getId(),
                'auth_check_after_regenerate' => Auth::check()
            ]);

            return redirect('/')->with('success', 'Successfully logged in! Welcome back.');

        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error('Google OAuth Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/login')->with('error', 'Google login failed. Please try again. Error: ' . $e->getMessage());
        }
    }
}