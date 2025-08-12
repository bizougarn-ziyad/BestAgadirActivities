<?php
// Vercel initialization script - create necessary directories and set environment

// Set up database paths
$dbPath = __DIR__ . '/database/database.sqlite';
$tmpDbPath = '/tmp/database.sqlite';

// Always copy database to /tmp for write access in Vercel
if (file_exists($dbPath)) {
    if (!file_exists($tmpDbPath) || filemtime($dbPath) > filemtime($tmpDbPath)) {
        copy($dbPath, $tmpDbPath);
        chmod($tmpDbPath, 0666); // Ensure it's writable
    }
} else {
    // Create empty database if source doesn't exist
    if (!file_exists($tmpDbPath)) {
        touch($tmpDbPath);
        chmod($tmpDbPath, 0666);
    }
}

// Force environment to use /tmp database
$_ENV['DB_DATABASE'] = $tmpDbPath;
putenv("DB_DATABASE=$tmpDbPath");

// Ensure all required directories exist in /tmp
$requiredDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap',
    '/tmp/bootstrap/cache'
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Set proper permissions
foreach ($requiredDirs as $dir) {
    if (is_dir($dir)) {
        chmod($dir, 0755);
    }
}

// Override Laravel paths for Vercel serverless environment
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['SESSION_DRIVER'] = 'cookie';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/bootstrap/cache/routes-v7.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/bootstrap/cache/events.php';

// Set environment variables
putenv('LOG_CHANNEL=stderr');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes-v7.php');
putenv('APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php');

// Create bootstrap cache files from existing ones if available
$cacheTemplates = [
    'services.php' => __DIR__ . '/bootstrap/cache/services.php',
    'packages.php' => __DIR__ . '/bootstrap/cache/packages.php'
];

foreach ($cacheTemplates as $filename => $sourcePath) {
    $targetPath = "/tmp/bootstrap/cache/$filename";
    
    if (!file_exists($targetPath)) {
        if (file_exists($sourcePath)) {
            // Copy existing cache file
            copy($sourcePath, $targetPath);
        } else {
            // Create empty cache file
            file_put_contents($targetPath, '<?php return [];');
        }
    }
}
