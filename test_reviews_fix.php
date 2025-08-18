<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Testing getDisplayReviews() method:\n";
echo "===================================\n";

// Test with a new activity
$activity = Activity::find(19); // Jet Ski Adventure
if ($activity) {
    echo "Activity: {$activity->name}\n\n";
    $displayReviews = $activity->getDisplayReviews();
    
    foreach ($displayReviews as $index => $review) {
        echo "Review " . ($index + 1) . ":\n";
        echo "- Name: " . ($review['name'] ?? 'N/A') . "\n";
        echo "- Initial: " . ($review['initial'] ?? 'N/A') . "\n";
        echo "- Color: " . ($review['color'] ?? 'N/A') . "\n";
        echo "- Time ago: " . ($review['time_ago'] ?? 'N/A') . "\n";
        echo "- Rating: " . ($review['rating'] ?? 'N/A') . "\n";
        echo "- Comment: " . substr($review['comment'] ?? 'N/A', 0, 50) . "...\n";
        echo "------------------------\n";
    }
} else {
    echo "Activity not found.\n";
}
