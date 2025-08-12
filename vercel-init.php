<?php
// Vercel initialization script - simplified for serverless environment

// Set up paths
$dbPath = __DIR__ . '/database/database.sqlite';
$tmpDbPath = '/tmp/database.sqlite';

// Copy database to /tmp if it doesn't exist there (for write access)
if (!file_exists($tmpDbPath) && file_exists($dbPath)) {
    copy($dbPath, $tmpDbPath);
    // Update environment to use /tmp database
    $_ENV['DB_DATABASE'] = $tmpDbPath;
    putenv("DB_DATABASE=$tmpDbPath");
}

// Ensure storage directories exist in /tmp
$storageDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs'
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Set proper permissions
foreach ($storageDirs as $dir) {
    if (is_dir($dir)) {
        chmod($dir, 0755);
    }
}

// Override storage paths for Vercel
$_ENV['LOG_CHANNEL'] = 'stderr';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['SESSION_DRIVER'] = 'cookie'; // Use cookies instead of file sessions
$_ENV['CACHE_STORE'] = 'array'; // Use array cache instead of file cache

// Set proper environment variables for Vercel
putenv('LOG_CHANNEL=stderr');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
