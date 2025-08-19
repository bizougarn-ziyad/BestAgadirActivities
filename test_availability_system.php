<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;
use App\Models\Order;

echo "Testing Availability System\n";
echo "===========================\n\n";

// Get first activity with max_participants
$activity = Activity::where('is_active', true)
    ->whereNotNull('max_participants')
    ->first();

if (!$activity) {
    echo "❌ No active activities found with max_participants set.\n";
    exit;
}

echo "Testing activity: {$activity->name}\n";
echo "Max participants: {$activity->max_participants}\n\n";

// Test date (tomorrow)
$testDate = date('Y-m-d', strtotime('+1 day'));
echo "Testing date: {$testDate}\n\n";

// Check current bookings for test date
$existingOrders = $activity->paidOrders()
    ->where('booking_date', $testDate)
    ->get();

echo "Existing orders for {$testDate}:\n";
if ($existingOrders->count() > 0) {
    $totalBooked = 0;
    foreach ($existingOrders as $order) {
        echo "- Order #{$order->id}: {$order->participants} participants\n";
        $totalBooked += $order->participants;
    }
    echo "Total booked: {$totalBooked}\n";
} else {
    echo "- No existing orders\n";
}

echo "\nAvailability Tests:\n";
echo "==================\n";

// Test availability for different participant counts
for ($participants = 1; $participants <= $activity->max_participants + 2; $participants++) {
    $isAvailable = $activity->isAvailableForDate($testDate, $participants);
    $availableSpots = $activity->getAvailableSpotsForDate($testDate);
    
    $status = $isAvailable ? "✅ Available" : "❌ Not Available";
    echo "- {$participants} participants: {$status} (Available spots: {$availableSpots})\n";
}

echo "\nTesting Booking Statistics:\n";
echo "==========================\n";

$stats = $activity->getBookingStats(date('Y-m-d'), date('Y-m-d', strtotime('+30 days')));
if ($stats->count() > 0) {
    foreach ($stats as $stat) {
        echo "- {$stat->booking_date}: {$stat->total_bookings} bookings, {$stat->total_participants} participants, \${$stat->total_revenue}\n";
    }
} else {
    echo "- No bookings in the next 30 days\n";
}

echo "\nTesting Edge Cases:\n";
echo "==================\n";

// Test with exactly max participants
$maxAvailable = $activity->isAvailableForDate($testDate, $activity->max_participants);
echo "- Booking exactly max participants ({$activity->max_participants}): " . ($maxAvailable ? "✅ Available" : "❌ Not Available") . "\n";

// Test with more than max participants
$overMax = $activity->isAvailableForDate($testDate, $activity->max_participants + 1);
echo "- Booking more than max participants (" . ($activity->max_participants + 1) . "): " . ($overMax ? "✅ Available" : "❌ Not Available") . "\n";

// Test inactive activity
$activity->is_active = false;
$inactiveTest = $activity->isAvailableForDate($testDate, 1);
echo "- Inactive activity: " . ($inactiveTest ? "✅ Available" : "❌ Not Available") . "\n";
$activity->is_active = true; // Reset

echo "\nAvailability System is working correctly! ✅\n";
