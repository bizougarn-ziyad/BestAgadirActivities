<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

echo "Deep Debugging Availability Issue\n";
echo "=================================\n\n";

// Get first activity
$activity = Activity::where('is_active', true)
    ->whereNotNull('max_participants')
    ->first();

$testDate = '2025-08-21'; // Use a specific date

echo "Activity: {$activity->name} (ID: {$activity->id})\n";
echo "Max participants: {$activity->max_participants}\n";
echo "Test date: {$testDate}\n\n";

// Clean up any existing orders for this date
Order::where('activity_id', $activity->id)
    ->whereDate('booking_date', $testDate)
    ->delete();

echo "Step 1: Create a test order manually\n";
echo "====================================\n";

$order = new Order();
$order->activity_id = $activity->id;
$order->participants = 7;
$order->booking_date = $testDate;
$order->status = 'paid';
$order->total_price = $activity->price * 7;
$order->price_per_person = $activity->price;
$order->session_id = 'manual_test_' . time();
$order->save();

echo "Created order ID: {$order->id}\n";
echo "Order date: {$order->booking_date}\n";
echo "Order participants: {$order->participants}\n";
echo "Order status: {$order->status}\n\n";

echo "Step 2: Test different query methods\n";
echo "====================================\n";

// Method 1: Direct query
$directQuery = Order::where('activity_id', $activity->id)
    ->where('status', 'paid')
    ->where('booking_date', $testDate)
    ->get();

echo "Direct query results: " . $directQuery->count() . "\n";
foreach ($directQuery as $o) {
    echo "- Order {$o->id}: {$o->participants} participants on {$o->booking_date}\n";
}

// Method 2: Using whereDate
$dateQuery = Order::where('activity_id', $activity->id)
    ->where('status', 'paid')
    ->whereDate('booking_date', $testDate)
    ->get();

echo "\nWhereDate query results: " . $dateQuery->count() . "\n";
foreach ($dateQuery as $o) {
    echo "- Order {$o->id}: {$o->participants} participants on {$o->booking_date}\n";
}

// Method 3: Through relationship
$relationshipQuery = $activity->paidOrders()
    ->where('booking_date', $testDate)
    ->get();

echo "\nRelationship query results: " . $relationshipQuery->count() . "\n";
foreach ($relationshipQuery as $o) {
    echo "- Order {$o->id}: {$o->participants} participants on {$o->booking_date}\n";
}

// Method 4: Sum through relationship
$sumResult = $activity->paidOrders()
    ->where('booking_date', $testDate)
    ->sum('participants');

echo "\nSum through relationship: {$sumResult}\n";

// Method 5: Using whereDate in relationship
$relationshipDateQuery = $activity->paidOrders()
    ->whereDate('booking_date', $testDate)
    ->get();

echo "\nRelationship whereDate query results: " . $relationshipDateQuery->count() . "\n";
foreach ($relationshipDateQuery as $o) {
    echo "- Order {$o->id}: {$o->participants} participants on {$o->booking_date}\n";
}

$sumDateResult = $activity->paidOrders()
    ->whereDate('booking_date', $testDate)
    ->sum('participants');

echo "\nSum with whereDate: {$sumDateResult}\n";

echo "\nStep 3: Test availability methods\n";
echo "=================================\n";

$availableSpots = $activity->getAvailableSpotsForDate($testDate);
echo "getAvailableSpotsForDate result: {$availableSpots}\n";
echo "Expected result: " . ($activity->max_participants - 7) . "\n";

$isAvailable = $activity->isAvailableForDate($testDate, 5);
echo "isAvailableForDate(5): " . ($isAvailable ? 'true' : 'false') . "\n";

$isAvailableOverbook = $activity->isAvailableForDate($testDate, 10);
echo "isAvailableForDate(10): " . ($isAvailableOverbook ? 'true' : 'false') . "\n";

echo "\nStep 4: Raw SQL to verify\n";
echo "=========================\n";

$rawSql = DB::select("
    SELECT 
        id, 
        activity_id, 
        participants, 
        booking_date, 
        status,
        DATE(booking_date) as date_only
    FROM orders 
    WHERE activity_id = ? 
    AND status = 'paid'
    AND DATE(booking_date) = ?
", [$activity->id, $testDate]);

echo "Raw SQL results: " . count($rawSql) . "\n";
foreach ($rawSql as $row) {
    echo "- Order {$row->id}: {$row->participants} participants, date: {$row->booking_date}, date_only: {$row->date_only}\n";
}

// Clean up
$order->delete();
echo "\nTest order cleaned up\n";
