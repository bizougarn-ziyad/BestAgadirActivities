<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('home');
});

// API route to check authentication status
Route::get('/auth-status', function () {
    $isAuthenticated = Auth::check() || Auth::guard('admin')->check();
    $isAdmin = session('is_admin', false) || Auth::guard('admin')->check();
    
    return response()->json([
        'authenticated' => $isAuthenticated,
        'is_admin' => $isAdmin,
        'redirect_url' => $isAuthenticated ? ($isAdmin ? route('admin.dashboard') : '/') : null
    ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
      ->header('Pragma', 'no-cache')
      ->header('Expires', '0');
})->name('auth.status');

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
})->name('login')->middleware(['guest', 'no.cache']);

Route::controller(SocialiteController::class)->middleware(['guest', 'no.cache'])->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/auth/google-callback', 'handleGoogleCallback')->name('auth.google-callback');
});


Route::post('/login', [LoginController::class, 'login'])->name('login.post')->middleware(['guest', 'no.cache']);
Route::post('/setup-password', [LoginController::class, 'setupPassword'])->name('setup.password')->middleware(['guest', 'no.cache']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/admin/dashboard', function () {
    // Check if user is authenticated as admin
    if (!Auth::guard('admin')->check() && !session('is_admin')) {
        return redirect('/')->withErrors(['error' => 'Access denied.']);
    }
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->middleware(['guest', 'no.cache'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware(['guest', 'no.cache'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->middleware(['guest', 'no.cache'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->middleware(['guest', 'no.cache'])
    ->name('password.update');

// Admin Activities Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
});

Route::get('/addActivities', function () {
    return view('add-activities');
});