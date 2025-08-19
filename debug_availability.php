<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;
use App\Models\Order;

echo "Debugging Availability Calculation\n";
echo "==================================\n\n";

// Get first activity
$activity = Activity::where('is_active', true)
    ->whereNotNull('max_participants')
    ->first();

$testDate = date('Y-m-d', strtotime('+1 day'));

echo "Activity: {$activity->name} (ID: {$activity->id})\n";
echo "Max participants: {$activity->max_participants}\n";
echo "Test date: {$testDate}\n\n";

// Create test order
$testOrder = new Order();
$testOrder->activity_id = $activity->id;
$testOrder->participants = 5;
$testOrder->booking_date = $testDate;
$testOrder->status = 'paid';
$testOrder->total_price = $activity->price * 5;
$testOrder->price_per_person = $activity->price;
$testOrder->session_id = 'debug_test_' . time();
$testOrder->save();

echo "Created test order with 5 participants\n\n";

// Debug queries
echo "Raw SQL Queries:\n";
echo "================\n";

$query1 = $activity->paidOrders()
    ->where('booking_date', $testDate);

echo "Query: " . $query1->toSql() . "\n";
echo "Bindings: " . json_encode($query1->getBindings()) . "\n\n";

$result = $query1->get();
echo "Results found: " . $result->count() . "\n";
foreach ($result as $order) {
    echo "- Order ID: {$order->id}, Participants: {$order->participants}, Date: {$order->booking_date}, Status: {$order->status}\n";
}

echo "\nSum query:\n";
$sum = $activity->paidOrders()
    ->where('booking_date', $testDate)
    ->sum('participants');
echo "Total booked participants: {$sum}\n";

echo "\nAvailability calculation:\n";
$available = $activity->getAvailableSpotsForDate($testDate);
echo "Available spots: {$available}\n";
echo "Expected available: " . ($activity->max_participants - 5) . "\n";

// Check if there's a date casting issue
echo "\nDate format debugging:\n";
echo "Input date: {$testDate}\n";
echo "Order booking_date: {$testOrder->booking_date}\n";
echo "Dates match: " . ($testDate == $testOrder->booking_date->format('Y-m-d') ? 'Yes' : 'No') . "\n";

// Clean up
$testOrder->delete();
echo "\nTest order cleaned up\n";
