<?php
// Simple test script for authentication debugging
// Access at: /api/test-auth.php

require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Manual testing
echo "<h1>Authentication Debug</h1>";

try {
    // Test database connection
    $userCount = \App\Models\UserData::count();
    echo "<p>✅ Database working - User count: $userCount</p>";
    
    // Test user creation
    $testUser = \App\Models\UserData::where('email', 'test@example.com')->first();
    if (!$testUser) {
        $testUser = \App\Models\UserData::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
        echo "<p>✅ Test user created: {$testUser->email}</p>";
    } else {
        echo "<p>✅ Test user exists: {$testUser->email}</p>";
    }
    
    // Test authentication
    if (Auth::attempt(['email' => 'test@example.com', 'password' => 'password123'])) {
        echo "<p>✅ Authentication working - User logged in</p>";
        echo "<p>Current user: " . Auth::user()->name . "</p>";
        echo "<p>Session ID: " . session()->getId() . "</p>";
    } else {
        echo "<p>❌ Authentication failed</p>";
        
        // Test password hash
        if (Hash::check('password123', $testUser->password)) {
            echo "<p>✅ Password hash is correct</p>";
        } else {
            echo "<p>❌ Password hash failed</p>";
        }
    }
    
} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . " Line: " . $e->getLine() . "</p>";
}

echo "<h2>Environment Info</h2>";
echo "<p>PHP Version: " . PHP_VERSION . "</p>";
echo "<p>Laravel Version: " . app()->version() . "</p>";
echo "<p>Environment: " . app()->environment() . "</p>";
echo "<p>Session Driver: " . config('session.driver') . "</p>";
echo "<p>Session Domain: " . (config('session.domain') ?: 'null') . "</p>";

?>
