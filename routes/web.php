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
    try {
        return view('home');
    } catch (\Exception $e) {
        // Log the error
        \Illuminate\Support\Facades\Log::error('Home view failed to load', [
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        
        // Return a simple HTML response as fallback
        return response('
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Agadir Activities</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #fffaf0; }
        .container { max-width: 800px; margin: 0 auto; text-align: center; }
        .logo { color: #f97316; font-size: 2em; font-weight: bold; margin-bottom: 20px; }
        .message { font-size: 1.2em; margin-bottom: 30px; }
        .button { background: #f97316; color: white; padding: 15px 30px; border: none; border-radius: 8px; font-size: 1em; cursor: pointer; text-decoration: none; display: inline-block; margin: 10px; }
        .button:hover { background: #ea580c; }
        .error { background: #fee2e2; color: #dc2626; padding: 15px; border-radius: 8px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🏖️ Best Agadir Activities</div>
        <div class="message">Experience the real Morocco, Right Here in Agadir!</div>
        <div class="error">
            <strong>Debug Mode:</strong> View loading failed<br>
            <small>Error: ' . htmlspecialchars($e->getMessage()) . '</small>
        </div>
        <a href="/login" class="button">Login</a>
        <a href="/test" class="button">Test API</a>
        <a href="/debug-auth" class="button">Debug</a>
    </div>
</body>
</html>', 200)->header('Content-Type', 'text/html');
    }
});

// Basic health check route
Route::get('/health', function () {
    return 'OK - Laravel is working';
});

// Bootstrap cache health check
Route::get('/health/bootstrap', function () {
    $bootstrapCache = app()->bootstrapPath('cache');
    $issues = [];
    
    // Check if bootstrap cache directory exists
    if (!is_dir($bootstrapCache)) {
        $issues[] = "Bootstrap cache directory does not exist: $bootstrapCache";
    } else {
        // Check if it's writable
        if (!is_writable($bootstrapCache)) {
            $issues[] = "Bootstrap cache directory is not writable: $bootstrapCache";
        }
    }
    
    // Check for required cache files
    $requiredFiles = ['services.php', 'packages.php'];
    foreach ($requiredFiles as $file) {
        $filePath = $bootstrapCache . DIRECTORY_SEPARATOR . $file;
        if (!file_exists($filePath)) {
            $issues[] = "Missing cache file: $filePath";
        }
    }
    
    return response()->json([
        'bootstrap_cache_path' => $bootstrapCache,
        'is_writable' => is_writable($bootstrapCache),
        'exists' => is_dir($bootstrapCache),
        'issues' => $issues,
        'status' => empty($issues) ? 'healthy' : 'issues_detected'
    ]);
});

// Simple test route
Route::get('/test', function () {
    return response()->json([
        'status' => 'working',
        'timestamp' => now(),
        'environment' => app()->environment(),
        'app_name' => config('app.name'),
        'app_url' => config('app.url'),
        'php_version' => PHP_VERSION,
        'laravel_version' => app()->version(),
    ]);
});

Route::get('/test-userdata', function () {
    try {
        $count = UserData::count();
        return "UserData test successful. Count: " . $count;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

// Debug route for authentication testing
Route::get('/debug-auth', function () {
    return [
        'auth_check' => Auth::check(),
        'auth_user' => Auth::user(),
        'session_id' => session()->getId(),
        'is_admin' => session('is_admin', false),
        'csrf_token' => csrf_token(),
        'user_count' => UserData::count(),
        'admin_count' => \App\Models\Admin::count(),
        'environment' => app()->environment(),
        'app_url' => config('app.url'),
        'session_driver' => config('session.driver'),
        'session_domain' => config('session.domain'),
        'session_secure' => config('session.secure'),
        'session_same_site' => config('session.same_site'),
        'session_http_only' => config('session.http_only'),
        'https_forced' => \Illuminate\Support\Facades\URL::isForced(),
        'request_secure' => request()->secure(),
        'headers' => [
            'host' => request()->header('host'),
            'user-agent' => request()->header('user-agent'),
            'x-forwarded-proto' => request()->header('x-forwarded-proto'),
        ]
    ];
});

Route::get('/debug-current-user', function () {
    if (!Auth::check()) {
        return response()->json(['logged_in' => false]);
    }
    $user = Auth::user();
    return [
        'logged_in' => true,
        'id' => $user->id,
        'email' => $user->email,
        'google_id' => $user->google_id,
        'has_avatar' => (bool)$user->avatar,
        'session_id' => session()->getId(),
    ];
});

// Test login route
Route::post('/test-login', function (Illuminate\Http\Request $request) {
    $email = $request->input('email', 'test@example.com');
    $password = $request->input('password', 'password');
    
    // Try to find user
    $user = UserData::where('email', $email)->first();
    
    if (!$user) {
        return response()->json([
            'error' => 'User not found',
            'email' => $email,
            'users_in_db' => UserData::all(['id', 'email', 'name'])
        ]);
    }
    
    // Try manual auth
    if (Hash::check($password, $user->password)) {
        Auth::login($user);
        request()->session()->regenerate();
        
        return response()->json([
            'success' => 'Manual login successful',
            'user_id' => $user->id,
            'auth_check' => Auth::check(),
            'session_id' => session()->getId(),
            'session_data' => session()->all()
        ]);
    }
    
    return response()->json([
        'error' => 'Password mismatch',
        'user_exists' => true,
        'hash_check' => 'failed'
    ]);
});

// Session test route
Route::get('/test-session', function () {
    $counter = session('test_counter', 0);
    session(['test_counter' => $counter + 1]);
    
    return response()->json([
        'session_id' => session()->getId(),
        'counter' => session('test_counter'),
        'session_data' => session()->all(),
        'session_config' => [
            'driver' => config('session.driver'),
            'domain' => config('session.domain'),
            'secure' => config('session.secure'),
            'same_site' => config('session.same_site'),
            'http_only' => config('session.http_only'),
        ]
    ]);
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
    Route::get('/auth/consume', 'consume')->name('auth.consume');
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