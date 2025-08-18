<?php
// Test script to check activities and prices
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Activity;

echo "First 3 activities from database:\n";

$activities = Activity::take(3)->get(['id', 'name', 'price']);

foreach ($activities as $activity) {
    echo "ID: {$activity->id} - Name: {$activity->name} - Price: {$activity->price}€\n";
}

echo "\nTotal activities: " . Activity::count() . "\n";
