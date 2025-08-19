<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;
use App\Models\Order;

try {
    $activity = Activity::first();
    if (!$activity) {
        echo "No activities found.\n";
        exit;
    }
    
    echo "Activity: " . $activity->name . "\n";
    echo "Max participants: " . $activity->max_participants . "\n";
    
    $testDate = '2024-12-20';
    echo "Available spots for " . $testDate . ": " . $activity->getAvailableSpotsForDate($testDate) . "\n";
    
    // Test with today's date
    $today = date('Y-m-d');
    echo "Available spots for " . $today . ": " . $activity->getAvailableSpotsForDate($today) . "\n";
    
    // Show some orders for this activity
    $orders = $activity->paidOrders()->take(3)->get();
    echo "\nRecent orders for this activity:\n";
    foreach ($orders as $order) {
        echo "- Date: " . $order->booking_date . ", Participants: " . $order->participants . "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
