<?php

require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel application
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\UserData;
use App\Models\Activity;
use App\Models\Favorite;

echo "Testing favorite functionality...\n";

// Get first user and activity
$user = UserData::first();
$activity = Activity::first();

if ($user && $activity) {
    echo "User: {$user->name} (ID: {$user->id})\n";
    echo "Activity: {$activity->name} (ID: {$activity->id})\n";
    
    // Check if user has favorited the activity
    $hasFavorited = $user->hasFavorited($activity->id);
    echo "Has favorited: " . ($hasFavorited ? 'Yes' : 'No') . "\n";
    
    // Create a favorite if not exists
    if (!$hasFavorited) {
        Favorite::create(['user_id' => $user->id, 'activity_id' => $activity->id]);
        echo "Favorite created!\n";
    }
    
    // Check again
    $hasFavorited = $user->hasFavorited($activity->id);
    echo "Has favorited now: " . ($hasFavorited ? 'Yes' : 'No') . "\n";
    
    // Test the relationship
    $favoriteActivities = $user->favoriteActivities;
    echo "User's favorite activities count: " . $favoriteActivities->count() . "\n";
    
    echo "Total favorites in database: " . Favorite::count() . "\n";
} else {
    echo "No users or activities found.\n";
}
