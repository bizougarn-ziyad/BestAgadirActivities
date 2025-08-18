<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Current activities in the database:\n";
echo "====================================\n";

$activities = Activity::all();

if ($activities->count() > 0) {
    foreach ($activities as $activity) {
        echo "ID: {$activity->id}\n";
        echo "Name: {$activity->name}\n";
        echo "Price: \${$activity->price}\n";
        echo "Bio: " . substr($activity->bio, 0, 100) . "...\n";
        echo "Active: " . ($activity->is_active ? 'Yes' : 'No') . "\n";
        echo "------------------------\n";
    }
} else {
    echo "No activities found in the database.\n";
}

echo "\nTotal activities: " . $activities->count() . "\n";
