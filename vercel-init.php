<?php
// Vercel initialization script to ensure database and sessions work properly

// Set up the database path
$dbPath = __DIR__ . '/database/database.sqlite';
$tmpDbPath = '/tmp/database.sqlite';

// Copy database to /tmp if it doesn't exist there
if (!file_exists($tmpDbPath) && file_exists($dbPath)) {
    copy($dbPath, $tmpDbPath);
}

// Initialize Laravel
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

try {
    // Run migrations if needed
    $migrator = $app->make('migrator');
    $migrator->run([__DIR__ . '/database/migrations']);
    
    // Clear and warm up cache
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    
} catch (Exception $e) {
    // Log but don't fail - migrations might already be run
    error_log("Vercel init error: " . $e->getMessage());
}
