<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Ensure bootstrap cache directory exists before Laravel initialization
$bootstrapCacheDir = __DIR__.'/../bootstrap/cache';
if (!is_dir($bootstrapCacheDir)) {
    mkdir($bootstrapCacheDir, 0755, true);
}

// For serverless environments, ensure temp cache exists
if (isset($_ENV['VERCEL']) || !is_writable($bootstrapCacheDir)) {
    $tempBootstrapCache = '/tmp/bootstrap/cache';
    if (!is_dir($tempBootstrapCache)) {
        mkdir($tempBootstrapCache, 0755, true);
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
