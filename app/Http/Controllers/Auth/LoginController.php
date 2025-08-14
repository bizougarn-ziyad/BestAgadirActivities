<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            // Debug logging - improved
            Log::info('Login method called', [
                'action' => $request->input('action'),
                'has_first_name' => $request->has('first_name'),
                'has_last_name' => $request->has('last_name'),
                'has_password_confirmation' => $request->has('password_confirmation'),
                'email' => $request->input('email'),
                'all_inputs' => $request->except(['password', 'password_confirmation', '_token'])
            ]);

            // Check if this is a registration request
            if ($request->input('action') === 'register' || 
                ($request->has('first_name') && $request->has('last_name') && $request->has('password_confirmation'))) {
                Log::info('Redirecting to registration method');
                return $this->register($request);
            }

            // Handle normal login - ensure we have the required fields for login
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Only check admin credentials if this is NOT a registration attempt
            // and if we have both email and password (indicating a login attempt)
            if (!$request->has('first_name') && !$request->has('last_name') && !$request->has('password_confirmation')) {
                Log::info('Checking admin credentials for login');
                
                // Try to authenticate as admin using the admin guard
                if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
                    Log::info('Admin login successful');
                    $request->session()->regenerate();
                    $request->session()->put('is_admin', true);
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
                }
            } else {
                Log::info('Skipping admin check - appears to be registration form submission');
            }

            // Normal user login - first check if user exists but has no password (Google OAuth user)
            $user = UserData::where('email', $credentials['email'])->first();
            
            if ($user && is_null($user->password)) {
                // User exists but has no password (Google OAuth user)
                Log::info('User exists but has no password', ['email' => $credentials['email']]);
                return redirect()->back()
                    ->withErrors(['password' => 'This account was created using Google sign-in and doesn\'t have a password. Please set a password below or continue with Google sign-in.'])
                    ->with('show_password_setup', true)
                    ->with('setup_email', $credentials['email'])
                    ->withInput(['email' => $credentials['email']]);
            }

            if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('/')->with('success', 'Successfully logged in! Welcome back!');
            }

            // If not admin or user, redirect to home
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.'])
                ->withInput(['email' => $credentials['email']]);

        } catch (\Illuminate\Session\TokenMismatchException $e) {
            return redirect()->route('login')
                ->withErrors(['error' => 'Your session has expired. Please try again.'])
                ->with('show_register', $request->input('action') === 'register');
        } catch (\Exception $e) {
            Log::error('Login/Registration error: ' . $e->getMessage());
            return redirect()->route('login')
                ->withErrors(['error' => 'An error occurred. Please try again.'])
                ->with('show_register', $request->input('action') === 'register');
        }
    }

    public function logout(Request $request)
    {
        // Logout from both guards
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        // Debug: Log the incoming request data (excluding sensitive info)
        Log::info('Registration attempt', [
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'has_password' => !empty($request->input('password')),
            'has_password_confirmation' => !empty($request->input('password_confirmation'))
        ]);

        // Check if email exists in admins table first
        $email = $request->input('email');
        $adminExists = \App\Models\Admin::where('email', $email)->exists();
        if ($adminExists) {
            Log::info('Registration attempt blocked - email exists in admins table', [
                'email' => $email
            ]);
            return redirect()->back()
                ->withErrors(['email' => 'This email address is already registered and cannot be used for new account creation.'])
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('show_register', true);
        }

        Log::info('Registration proceeding - email not found in admins table', [
            'email' => $email
        ]);

        // Manual validation with custom error messages
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/', 
            'email' => 'required|string|email|max:255|unique:user_data,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'first_name.required' => 'First name is required.',
            'first_name.regex' => 'First name may only contain letters.',
            'last_name.required' => 'Last name is required.',
            'last_name.regex' => 'Last name may only contain letters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            Log::info('Registration validation failed', ['errors' => $validator->errors()->toArray()]);
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('show_register', true);
        }

        try {
            $validated = $validator->validated();

            Log::info('Creating user with validated data', [
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email']
            ]);

            // Create user and verify it was created
            $user = UserData::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            if (!$user) {
                Log::error('UserData::create returned null');
                return redirect()->back()
                    ->withErrors(['general' => 'Failed to create account. Please try again.'])
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('show_register', true);
            }

            // Verify user was actually saved to database
            $savedUser = UserData::where('email', $validated['email'])->first();
            if (!$savedUser) {
                Log::error('User was not saved to database', ['email' => $validated['email']]);
                return redirect()->back()
                    ->withErrors(['general' => 'Failed to save account to database. Please try again.'])
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('show_register', true);
            }

            Log::info('User created and verified in database successfully', [
                'user_id' => $user->id, 
                'email' => $user->email,
                'saved_user_id' => $savedUser->id
            ]);

            // Don't log in the user automatically, just redirect to login with success message
            Log::info('Registration successful, redirecting to login page', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);
            
            return redirect()->route('login')
                ->with('success', 'Account created successfully! Please log in with your credentials.');

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error during registration', [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
            
            if (str_contains($e->getMessage(), 'Duplicate entry') || str_contains($e->getMessage(), 'UNIQUE constraint failed')) {
                return redirect()->back()
                    ->withErrors(['email' => 'This email address is already registered.'])
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('show_register', true);
            }
            
            return redirect()->back()
                ->withErrors(['general' => 'Database error occurred. Please try again.'])
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('show_register', true);

        } catch (\Exception $e) {
            Log::error('Unexpected registration error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->withErrors(['general' => 'An unexpected error occurred. Please try again. Error: ' . $e->getMessage()])
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('show_register', true);
        }
    }

    public function setupPassword(Request $request)
    {
        // Check if this is for a new Google OAuth user (data in session) or existing user
        $pendingGoogleUser = session('pending_google_user');
        $isNewGoogleUser = !is_null($pendingGoogleUser);
        
        // Different validation rules based on user type
        if ($isNewGoogleUser) {
            // For new Google OAuth users, don't check if email exists in database
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'email.required' => 'Email address is required.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
                'password.confirmed' => 'Password confirmation does not match.',
            ]);
            
            // Verify the email matches the one from Google OAuth
            if ($request->input('email') !== $pendingGoogleUser['email']) {
                return redirect()->back()
                    ->withErrors(['email' => 'Email mismatch. Please contact support.'])
                    ->with('show_password_setup', true)
                    ->with('setup_email', $request->input('email'));
            }
        } else {
            // For existing users without passwords
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:user_data,email',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'email.required' => 'Email address is required.',
                'email.exists' => 'This email address is not found in our records.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
                'password.confirmed' => 'Password confirmation does not match.',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->with('show_password_setup', true)
                ->with('setup_email', $request->input('email'))
                ->withInput(['email' => $request->input('email')]);
        }

        try {
            $validated = $validator->validated();
            
            if ($isNewGoogleUser) {
                // Create new user with Google data and password
                $user = UserData::create([
                    'name' => $pendingGoogleUser['name'],
                    'email' => $pendingGoogleUser['email'],
                    'google_id' => $pendingGoogleUser['google_id'],
                    'avatar' => $pendingGoogleUser['avatar'],
                    'password' => Hash::make($validated['password']),
                ]);
                
                // Clear the pending Google user data from session
                session()->forget('pending_google_user');
                
                Log::info('New Google OAuth user created with password', ['user_id' => $user->id, 'email' => $user->email]);
            } else {
                // Find existing user and set password
                $user = UserData::where('email', $validated['email'])->first();
                
                if (!$user) {
                    return redirect()->back()
                        ->withErrors(['email' => 'User not found.'])
                        ->with('show_password_setup', true)
                        ->with('setup_email', $request->input('email'));
                }

                if (!is_null($user->password)) {
                    return redirect()->back()
                        ->withErrors(['general' => 'This account already has a password. Please use the regular login form.'])
                        ->withInput(['email' => $validated['email']]);
                }

                // Set the password for the existing Google OAuth user
                $user->update([
                    'password' => Hash::make($validated['password']),
                ]);
                
                Log::info('Password set for existing Google OAuth user', ['user_id' => $user->id, 'email' => $user->email]);
            }

            // Log the user in automatically
            Auth::login($user);
            
            return redirect('/')->with('success', 'Password set successfully! You are now logged in.');

        } catch (\Exception $e) {
            Log::error('Password setup error: ' . $e->getMessage());
            return redirect()->back()
                ->withErrors(['general' => 'An error occurred while setting up your password. Please try again.'])
                ->with('show_password_setup', true)
                ->with('setup_email', $request->input('email'));
        }
    }
}