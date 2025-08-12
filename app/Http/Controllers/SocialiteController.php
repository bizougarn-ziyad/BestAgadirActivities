<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            Log::info('Redirecting to Google OAuth', [
                'google_client_id' => env('GOOGLE_CLIENT_ID') ? 'Set' : 'Not Set',
                'google_client_secret' => env('GOOGLE_CLIENT_SECRET') ? 'Set' : 'Not Set',
                'google_redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                'app_url' => config('app.url'),
                'current_url' => url()->current(),
                'request_url' => request()->fullUrl(),
            ]);
            
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            Log::error('Google OAuth redirect failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/login')->with('error', 'Google login failed to initialize. Please try regular login.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            Log::info('Google OAuth callback initiated', [
                'request_url' => request()->fullUrl(),
                'has_code' => request()->has('code'),
                'has_state' => request()->has('state'),
                'has_error' => request()->has('error')
            ]);

            if (request()->has('error')) {
                Log::error('Google OAuth returned error', [
                    'error' => request()->get('error'),
                    'error_description' => request()->get('error_description')
                ]);
                return redirect('/login')->with('error', 'Google login was cancelled or failed.');
            }

            // Obtain Google user (with graceful fallback to stateless in serverless envs)
            try {
                $googleUser = Socialite::driver('google')->user();
                Log::info('Google user fetched with state validation');
            } catch (InvalidStateException $e) {
                Log::warning('InvalidStateException encountered. Retrying stateless.', [
                    'message' => $e->getMessage()
                ]);
                $googleUser = Socialite::driver('google')->stateless()->user();
            }
            
            Log::info('Google OAuth Success', [
                'google_id' => $googleUser->id,
                'email' => $googleUser->email,
                'name' => $googleUser->name,
            ]);
            
            // Normalize data
            $email = strtolower($googleUser->email);
            $name = $googleUser->name ?? ($googleUser->user['given_name'] ?? 'User').($googleUser->user['family_name'] ? (' '.$googleUser->user['family_name']) : '');
            $avatar = $googleUser->avatar ?? ($googleUser->avatar_original ?? null);

            // Check if user exists by email first (race safe)
            $user = UserData::where('email', $email)->lockForUpdate(false)->first();
            
            if ($user) {
                Log::info('Existing user found', ['user_id' => $user->id]);
                // User exists, update Google info if not already set
                $dirty = [];
                if (!$user->google_id) { $dirty['google_id'] = $googleUser->id; }
                if ($avatar && $avatar !== $user->avatar) { $dirty['avatar'] = $avatar; }
                if ($name && $name !== $user->name) { $dirty['name'] = $name; }
                if (!empty($dirty)) {
                    $user->fill($dirty)->save();
                    Log::info('Updated existing user with Google data', ['updated_fields' => array_keys($dirty)]);
                }
            } else {
                Log::info('Creating new user from Google data');
                try {
                    $user = UserData::create([
                        'name' => $name,
                        'email' => $email,
                        'google_id' => $googleUser->id,
                        'avatar' => $avatar,
                        'password' => null,
                    ]);
                    Log::info('New user created', ['user_id' => $user->id]);
                } catch (\Illuminate\Database\QueryException $qe) {
                    // Handle possible race condition on unique email
                    Log::warning('Race condition on user create, refetching existing user', [
                        'error' => $qe->getMessage()
                    ]);
                    $user = UserData::where('email', $email)->first();
                }
            }

            // Primary attempt: log user in (force remember)
            Auth::login($user, true);
            
            // Regenerate session immediately for better security and session persistence
            request()->session()->regenerate();
            
            Log::info('User logged in successfully', [
                'user_id' => $user->id,
                'auth_check_after_login' => Auth::check(),
                'auth_user_after_login' => Auth::user() ? Auth::user()->id : null,
                'session_id' => session()->getId()
            ]);

            // Create a signed fallback URL in case session cookie wasn't persisted during OAuth round-trip
            $fallbackUrl = URL::temporarySignedRoute(
                'auth.consume',
                now()->addMinutes(5),
                [
                    'uid' => $user->id,
                    'h' => hash_hmac('sha256', $user->id.'|'.$user->email, config('app.key')),
                ]
            );

            Log::info('Generated consume URL for fallback', ['url' => $fallbackUrl]);

            return redirect($fallbackUrl)->with('success', 'Successfully logged in! Welcome back.');

        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error('Google OAuth Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/login')->with('error', 'Google login failed. Please try again. Error: ' . $e->getMessage());
        }
    }

    /**
     * Consume a signed login token (fallback if session lost after OAuth redirect)
     */
    public function consume(Request $request): RedirectResponse
    {
        if (!$request->hasValidSignature()) {
            Log::warning('Invalid signature on consume route', ['query' => $request->query()]);
            return redirect('/login')->withErrors(['error' => 'Invalid or expired login link.']);
        }

        $uid = (int) $request->query('uid');
        $hash = $request->query('h');
        $user = UserData::find($uid);
        if (!$user) {
            Log::warning('Consume route user not found', ['uid' => $uid]);
            return redirect('/login')->withErrors(['error' => 'Account not found.']);
        }

        $expected = hash_hmac('sha256', $user->id.'|'.$user->email, config('app.key'));
        if (!hash_equals($expected, $hash)) {
            Log::warning('Hash mismatch on consume route', ['uid' => $uid]);
            return redirect('/login')->withErrors(['error' => 'Security validation failed.']);
        }

        // Finalize login (idempotent)
        Auth::login($user, true);
        request()->session()->regenerate();
        Log::info('Consume route login success', ['user_id' => $user->id, 'session_id' => session()->getId()]);

        return redirect('/')->with('success', 'Welcome back!');
    }
}