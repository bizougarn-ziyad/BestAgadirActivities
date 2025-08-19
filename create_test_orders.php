<?php
/**
 * Create test orders to simulate availability scenarios
 */

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use App\Models\Order;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Creating Test Orders for Availability Testing\n";
echo "============================================\n\n";

$activity = Activity::first();

if (!$activity) {
    echo "❌ No activities found\n";
    exit(1);
}

echo "Activity: {$activity->title} (Max participants: {$activity->max_participants})\n\n";

// Create test orders for specific dates
$testDate1 = date('Y-m-d', strtotime('+5 days'));
$testDate2 = date('Y-m-d', strtotime('+6 days'));

echo "Creating orders for availability testing:\n";

// Make date 1 fully booked (15 participants)
$order1 = Order::create([
    'activity_id' => $activity->id,
    'booking_date' => $testDate1,
    'participants' => 15, // Fully book this date
    'total_price' => 750.00, // 15 * 50
    'price_per_person' => 50.00,
    'status' => 'paid',
    'session_id' => 'test_session_1',
    'user_id' => null,
    'created_at' => now(),
    'updated_at' => now()
]);

echo "✅ Created order for $testDate1 - 15 participants (FULLY BOOKED)\n";

// Make date 2 partially booked (5 participants)
$order2 = Order::create([
    'activity_id' => $activity->id,
    'booking_date' => $testDate2,
    'participants' => 5, // Partially book this date
    'total_price' => 250.00, // 5 * 50
    'price_per_person' => 50.00,
    'status' => 'paid',
    'session_id' => 'test_session_2',
    'user_id' => null,
    'created_at' => now(),
    'updated_at' => now()
]);

echo "✅ Created order for $testDate2 - 5 participants (10 spots remaining)\n\n";

// Verify the availability
echo "Verifying availability:\n";
echo "-----------------------\n";

// Check date 1 (should be fully booked)
$bookedSpots1 = $activity->paidOrders()
    ->whereDate('booking_date', $testDate1)
    ->sum('participants');
$availableSpots1 = max(0, $activity->max_participants - $bookedSpots1);

echo "📅 $testDate1:\n";
echo "   - Booked: $bookedSpots1 participants\n";
echo "   - Available: $availableSpots1 spots\n";
echo "   - Status: " . ($availableSpots1 > 0 ? 'AVAILABLE' : 'FULLY BOOKED') . "\n\n";

// Check date 2 (should be available)
$bookedSpots2 = $activity->paidOrders()
    ->whereDate('booking_date', $testDate2)
    ->sum('participants');
$availableSpots2 = max(0, $activity->max_participants - $bookedSpots2);

echo "📅 $testDate2:\n";
echo "   - Booked: $bookedSpots2 participants\n";
echo "   - Available: $availableSpots2 spots\n";
echo "   - Status: " . ($availableSpots2 > 0 ? 'AVAILABLE' : 'FULLY BOOKED') . "\n\n";

echo "🎯 Test scenario created!\n";
echo "Now you can test the frontend:\n";
echo "1. Select date $testDate1 (should show FULLY BOOKED)\n";
echo "2. Select date $testDate2 (should show AVAILABLE with 10 spots)\n";
echo "3. Switch back to $testDate1 (should show FULLY BOOKED again)\n\n";

echo "To clean up test data later, run:\n";
echo "DELETE FROM orders WHERE session_id IN ('test_session_1', 'test_session_2');\n";
?>
