<?php

require_once 'vendor/autoload.php';
use App\Models\UserData;

// Load Laravel environment
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Google OAuth Configuration Debug ===\n";
echo "GOOGLE_CLIENT_ID: " . (config('services.google.client_id') ? 'Set ✓' : 'Not Set ✗') . "\n";
echo "GOOGLE_CLIENT_SECRET: " . (config('services.google.client_secret') ? 'Set ✓' : 'Not Set ✗') . "\n";
echo "GOOGLE_REDIRECT_URI: " . (config('services.google.redirect') ?: 'Not Set ✗') . "\n";

echo "\n=== Database Connection ===\n";
try {
    $user_count = UserData::count();
    echo "UserData table accessible ✓ (Current count: $user_count)\n";
} catch (Exception $e) {
    echo "UserData table error ✗: " . $e->getMessage() . "\n";
}

echo "\n=== Auth Configuration ===\n";
echo "Auth Model: " . config('auth.providers.users.model') . "\n";
echo "Default Guard: " . config('auth.defaults.guard') . "\n";
