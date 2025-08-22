<?php

require_once 'vendor/autoload.php';

use Illuminate\Http\Request;
use App\Models\Activity;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->boot();

// Test the search functionality
$testDate = '2025-08-25'; // Example date
$testParticipants = 2;

echo "Testing search functionality...\n";
echo "Date: $testDate\n";
echo "Participants: $testParticipants\n\n";

// Get all activities
$allActivities = Activity::where('is_active', true)->get();
echo "Total active activities: " . $allActivities->count() . "\n";

// Filter by availability
$availableActivityIds = [];
foreach ($allActivities as $activity) {
    $isAvailable = $activity->isAvailableForDate($testDate, $testParticipants);
    $availableSpots = $activity->getAvailableSpotsForDate($testDate);
    
    echo "Activity: {$activity->name}\n";
    echo "  Max participants: {$activity->max_participants}\n";
    echo "  Available spots for $testDate: $availableSpots\n";
    echo "  Available for $testParticipants participants: " . ($isAvailable ? 'YES' : 'NO') . "\n\n";
    
    if ($isAvailable) {
        $availableActivityIds[] = $activity->id;
    }
}

echo "Available activities for search: " . count($availableActivityIds) . "\n";
echo "Activity IDs: " . implode(', ', $availableActivityIds) . "\n";
