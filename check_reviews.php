<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Checking review structure:\n";
echo "==========================\n";

$activity = Activity::first();
if ($activity && $activity->reviews) {
    echo "Sample review structure:\n";
    print_r($activity->reviews[0]);
} else {
    echo "No reviews found.\n";
}
