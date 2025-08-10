<?php

use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
})->name('login');

Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/auth/google-callback', 'handleGoogleCallback')->name('auth.google-callback');
});


Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


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