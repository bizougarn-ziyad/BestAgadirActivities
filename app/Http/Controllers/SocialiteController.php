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
                
                // Log the user in (whether they have a password or not)
                Auth::login($user);
                
                if (is_null($user->password)) {
                    Log::info('Google OAuth user logged in (no password set)', ['user_id' => $user->id]);
                    return redirect('/')->with('success', 'Successfully logged in! You can set up a password later for additional security.');
                } else {
                    Log::info('Google OAuth user logged in (password already set)', ['user_id' => $user->id]);
                    return redirect('/')->with('success', 'Successfully logged in! Welcome back.');
                }
            } else {
                Log::info('New Google OAuth user - storing data in session for password setup');
                
                // Store Google user data in session instead of creating user immediately
                session([
                    'pending_google_user' => [
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                    ]
                ]);
                
                // Redirect to password setup form
                return redirect()->route('login')
                    ->with('show_password_setup', true)
                    ->with('setup_email', $googleUser->email)
                    ->with('info', 'Welcome! Please set up a password for your account to complete the registration process.');
            }

        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error('Google OAuth Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/login')->with('error', 'Google login failed. Please try again. Error: ' . $e->getMessage());
        }
    }
}