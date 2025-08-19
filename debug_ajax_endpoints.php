<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;
use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;

echo "Testing AJAX Availability Endpoints\n";
echo "==================================\n\n";

// Get first activity
$activity = Activity::where('is_active', true)->first();

if (!$activity) {
    echo "❌ No active activities found.\n";
    exit;
}

echo "Testing activity: {$activity->name} (ID: {$activity->id})\n";
echo "Max participants: {$activity->max_participants}\n\n";

$testDate = date('Y-m-d', strtotime('+1 day'));

// Test the controller method directly
echo "Test 1: Direct Controller Method\n";
echo "================================\n";

try {
    $controller = new ActivityController();
    $request = new Request([
        'activity_id' => $activity->id,
        'date' => $testDate
    ]);

    $response = $controller->checkAvailability($request);
    $content = $response->getContent();
    $data = json_decode($content, true);
    
    echo "Response status: " . $response->getStatusCode() . "\n";
    echo "Response content: " . $content . "\n";
    
    if ($data && isset($data['success'])) {
        if ($data['success']) {
            echo "✅ Success: Available spots = " . $data['available_spots'] . "\n";
        } else {
            echo "❌ API Error: " . $data['error'] . "\n";
        }
    } else {
        echo "❌ Invalid JSON response\n";
    }
    
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}

echo "\nTest 2: Month Availability\n";
echo "=========================\n";

try {
    $startDate = date('Y-m-01'); // First day of month
    $endDate = date('Y-m-t');    // Last day of month
    
    $monthRequest = new Request([
        'activity_id' => $activity->id,
        'start_date' => $startDate,
        'end_date' => $endDate
    ]);

    $monthResponse = $controller->checkMonthAvailability($monthRequest);
    $monthContent = $monthResponse->getContent();
    $monthData = json_decode($monthContent, true);
    
    echo "Month response status: " . $monthResponse->getStatusCode() . "\n";
    
    if ($monthData && isset($monthData['success'])) {
        if ($monthData['success']) {
            echo "✅ Success: Found " . count($monthData['availability']) . " days\n";
        } else {
            echo "❌ API Error: " . $monthData['error'] . "\n";
        }
    } else {
        echo "❌ Invalid JSON response\n";
        echo "Content: " . $monthContent . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}

echo "\nTest 3: Activity Model Methods\n";
echo "=============================\n";

try {
    $available = $activity->getAvailableSpotsForDate($testDate);
    $isAvailable = $activity->isAvailableForDate($testDate, 1);
    
    echo "Available spots: {$available}\n";
    echo "Is available for 1 participant: " . ($isAvailable ? "Yes" : "No") . "\n";
    echo "✅ Model methods working\n";
    
} catch (Exception $e) {
    echo "❌ Model method error: " . $e->getMessage() . "\n";
}

echo "\nTest 4: Database Connection\n";
echo "==========================\n";

try {
    $orderCount = \App\Models\Order::count();
    echo "Total orders in database: {$orderCount}\n";
    echo "✅ Database connection working\n";
    
} catch (Exception $e) {
    echo "❌ Database error: " . $e->getMessage() . "\n";
}

echo "\nTest 5: Missing Activity Error\n";
echo "=============================\n";

try {
    $badRequest = new Request([
        'activity_id' => 99999, // Non-existent activity
        'date' => $testDate
    ]);

    $badResponse = $controller->checkAvailability($badRequest);
    $badContent = $badResponse->getContent();
    
    echo "Bad request response: {$badContent}\n";
    echo "Status code: " . $badResponse->getStatusCode() . "\n";
    
} catch (Exception $e) {
    echo "❌ Expected exception for missing activity: " . $e->getMessage() . "\n";
}
