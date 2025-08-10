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
            // Check if this is a registration request
            if ($request->input('action') === 'register') {
                return $this->register($request);
            }

            // Handle normal login
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Specify the guard to use UserData model
            if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                return redirect()->intended('/')->with('success', 'Successfully logged in! Welcome back!');
            }

            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],
            ]);

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
        Auth::guard('web')->logout();

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

        // Manual validation with custom error messages
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:user_data,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            Log::info('Registration validation failed', ['errors' => $validator->errors()->toArray()]);
            return redirect()->route('login')
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

            $user = UserData::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            if (!$user) {
                Log::error('UserData::create returned null');
                return redirect()->route('login')
                    ->withErrors(['general' => 'Failed to create account. Please try again.'])
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('show_register', true);
            }

            Log::info('User created successfully', ['user_id' => $user->id, 'email' => $user->email]);

            Auth::login($user);
            Log::info('User logged in after registration', ['user_id' => $user->id]);

            return redirect()->route('login')
                ->with('success', 'Account created successfully! You are now logged in.');

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error during registration', [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
            
            if (str_contains($e->getMessage(), 'Duplicate entry') || str_contains($e->getMessage(), 'UNIQUE constraint failed')) {
                return redirect()->route('login')
                    ->withErrors(['email' => 'This email address is already registered.'])
                    ->withInput($request->except('password', 'password_confirmation'))
                    ->with('show_register', true);
            }
            
            return redirect()->route('login')
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
            
            return redirect()->route('login')
                ->withErrors(['general' => 'An unexpected error occurred. Please try again. Error: ' . $e->getMessage()])
                ->withInput($request->except('password', 'password_confirmation'))
                ->with('show_register', true);
        }
    }
}