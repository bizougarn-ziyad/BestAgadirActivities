<?php

// Simple debug script for Vercel deployment
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== Vercel Debug Script ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Current Directory: " . __DIR__ . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";

// Check if critical files exist
$files_to_check = [
    '../vendor/autoload.php',
    '../bootstrap/app.php',
    '../database/database.sqlite',
    '../config/app.php',
    '../public/index.php'
];

echo "\n=== File Existence Check ===\n";
foreach ($files_to_check as $file) {
    $full_path = __DIR__ . '/' . $file;
    echo $file . ': ' . (file_exists($full_path) ? 'EXISTS' : 'MISSING') . "\n";
}

// Try to load Laravel
echo "\n=== Laravel Loading Test ===\n";
try {
    require_once __DIR__ . '/../vendor/autoload.php';
    echo "Autoload: SUCCESS\n";
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    echo "Bootstrap: SUCCESS\n";
    
    // Test database connection
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    
    echo "Database Connection: ";
    try {
        $pdo = DB::connection()->getPdo();
        echo "SUCCESS\n";
    } catch (Exception $e) {
        echo "FAILED - " . $e->getMessage() . "\n";
    }
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}

// Environment variables
echo "\n=== Environment Variables ===\n";
$important_vars = ['APP_ENV', 'APP_DEBUG', 'DB_CONNECTION', 'DB_DATABASE'];
foreach ($important_vars as $var) {
    echo $var . ': ' . (env($var) ?? 'NOT SET') . "\n";
}

?>
