<?php

require_once 'vendor/autoload.php';

// Create the application
$app = require_once 'bootstrap/app.php';

use App\Models\Activity;
use App\Models\Order;

// Get all activities
$activities = Activity::where('is_active', true)->get();

echo "Testing Activity Availability:\n";
echo "============================\n";

$testDate = '2025-08-22';
$testParticipants = 2;

echo "Test Date: $testDate\n";
echo "Test Participants: $testParticipants\n\n";

foreach ($activities as $activity) {
    echo "Activity: {$activity->name}\n";
    echo "Max Participants: {$activity->max_participants}\n";
    
    // Get paid orders for this date
    $bookedParticipants = $activity->paidOrders()
        ->whereDate('booking_date', $testDate)
        ->sum('participants');
    
    echo "Booked Participants for $testDate: $bookedParticipants\n";
    echo "Available Spots: " . ($activity->max_participants - $bookedParticipants) . "\n";
    
    $isAvailable = $activity->isAvailableForDate($testDate, $testParticipants);
    echo "Available for $testParticipants participants: " . ($isAvailable ? 'YES' : 'NO') . "\n";
    
    // Show all orders for this activity
    $orders = $activity->paidOrders()->whereDate('booking_date', $testDate)->get();
    if ($orders->count() > 0) {
        echo "Orders for this date:\n";
        foreach ($orders as $order) {
            echo "  - Order ID: {$order->id}, Participants: {$order->participants}, Date: {$order->booking_date}, Status: {$order->status}\n";
        }
    } else {
        echo "No orders for this date\n";
    }
    
    echo "\n" . str_repeat('-', 50) . "\n\n";
}
