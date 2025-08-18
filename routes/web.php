<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\UserData;
use App\Models\Activity;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\NewsletterController;

Route::get('/', function () {
    // Get specific activities for the slider
    $sliderActivityNames = [
        'Jet Ski Adventure',
        'Parasailing Over Agadir Bay', 
        'Horseback Beach Riding'
    ];
    
    $sliderActivities = Activity::where('is_active', true)
        ->whereIn('name', $sliderActivityNames)
        ->get()
        ->sortBy(function($activity) use ($sliderActivityNames) {
            return array_search($activity->name, $sliderActivityNames);
        })
        ->values();
    
    // Get additional activities for the bottom section (excluding slider activities)
    $sliderActivityIds = $sliderActivities->pluck('id')->toArray();
    $activities = Activity::where('is_active', true)
        ->whereNotIn('id', $sliderActivityIds)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();
    
    return view('home', compact('activities', 'sliderActivities'));
});

Route::get('/activities', function () {
    $activities = Activity::where('is_active', true)->orderBy('created_at', 'desc')->paginate(12);
    return view('activities', compact('activities'));
})->name('activities');

Route::get('/activity/{id}', function ($id) {
    $activity = Activity::where('is_active', true)->findOrFail($id);
    return view('activity-detail', compact('activity'));
})->name('activity.detail');

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

// Favorite Routes
Route::middleware('auth')->group(function () {
    Route::post('/favorites/toggle/{activityId}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

// Public favorite route to check favorite status
Route::get('/favorites/check/{activityId}', [FavoriteController::class, 'check'])->name('favorites.check');

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
    
    // Admin Management Routes
    Route::resource('admins', \App\Http\Controllers\AdminController::class);
});

Route::get('/addActivities', function () {
    return view('add-activities');
});

// Newsletter Routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');