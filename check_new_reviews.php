<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Checking new activities review structure:\n";
echo "=========================================\n";

// Check activities with IDs 19-28 (the new ones)
$newActivities = Activity::whereIn('id', range(19, 28))->get();

foreach ($newActivities as $activity) {
    echo "Activity: {$activity->name} (ID: {$activity->id})\n";
    if ($activity->reviews && count($activity->reviews) > 0) {
        echo "Sample review:\n";
        print_r($activity->reviews[0]);
        echo "Has 'initial' field: " . (isset($activity->reviews[0]['initial']) ? 'Yes' : 'No') . "\n";
        echo "Has 'color' field: " . (isset($activity->reviews[0]['color']) ? 'Yes' : 'No') . "\n";
    } else {
        echo "No reviews found.\n";
    }
    echo "------------------------\n";
}
