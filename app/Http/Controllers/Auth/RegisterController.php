<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Manual validation to control redirect behavior
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:user_data',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->route('login')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('show_register', true);
            }

            $validated = $validator->validated();

            $user = UserData::create([
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            if (!$user) {
                Log::error('Failed to create user');
                return redirect()->route('login')->withErrors(['error' => 'Failed to create account'])->with('show_register', true);
            }

            Auth::login($user);

            return redirect()->route('login')->with('success', 'Account created successfully! You are now logged in.');

        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['error' => 'Failed to create account. Please try again.'])->with('show_register', true);
        }
    }
}