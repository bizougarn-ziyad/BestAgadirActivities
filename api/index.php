<?php

// Initialize database for Vercel
$dbPath = __DIR__ . '/../database/database.sqlite';
$tmpDbPath = '/tmp/database.sqlite';

// Copy database to /tmp if it doesn't exist there
if (!file_exists($tmpDbPath) && file_exists($dbPath)) {
    copy($dbPath, $tmpDbPath);
    chmod($tmpDbPath, 0666);
}

// Set the correct paths for Vercel
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public/index.php';

// Set proper session configuration for serverless
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_samesite', 'Lax');

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';
