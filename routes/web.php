<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\UserData;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('home');
});

Route::get('/test-userdata', function () {
    try {
        $count = UserData::count();
        return "UserData test successful. Count: " . $count;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/login', function () {
    // Log current auth state
    Log::info('Login page accessed', [
        'auth_check' => Auth::check(),
        'auth_user' => Auth::user() ? Auth::user()->id : null,
        'session_id' => session()->getId(),
        'is_admin' => session('is_admin', false)
    ]);
    
    // Check if user is already authenticated
    if (Auth::check()) {
        Log::info('User is authenticated, redirecting to home');
        return redirect('/');
    }
    
    // Check if user is admin (has admin session)
    if (session('is_admin')) {
        Log::info('Admin session found, redirecting to dashboard');
        return redirect()->route('admin.dashboard');
    }
    
    Log::info('Showing login page');
    return view('auth.login');
})->name('login');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/auth/google-callback', 'handleGoogleCallback')->name('auth.google-callback');
});


Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    // Check if user is admin
    if (!session('is_admin')) {
        return redirect('/')->withErrors(['error' => 'Access denied.']);
    }
    return view('admin.dashboard');
})->name('admin.dashboard');

// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');