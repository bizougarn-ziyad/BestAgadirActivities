<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Testing Route URL Generation\n";
echo "===========================\n\n";

// Get first activity
$activity = Activity::where('is_active', true)->first();

if (!$activity) {
    echo "❌ No active activities found.\n";
    exit;
}

echo "Activity ID: {$activity->id}\n";

// Test route generation
$checkAvailabilityRoute = route('activity.check.availability');
$checkMonthRoute = route('activity.check.month.availability');

echo "Check availability route: {$checkAvailabilityRoute}\n";
echo "Check month route: {$checkMonthRoute}\n\n";

// Test full URL with parameters
$testDate = '2025-08-20';
$fullUrl = $checkAvailabilityRoute . "?activity_id={$activity->id}&date={$testDate}";

echo "Full URL that would be generated: {$fullUrl}\n\n";

// Test if we can make a simple HTTP request
echo "Testing HTTP Request\n";
echo "===================\n";

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'timeout' => 10,
        'ignore_errors' => true
    ]
]);

try {
    $response = file_get_contents($fullUrl, false, $context);
    
    if ($response === false) {
        echo "❌ HTTP request failed\n";
        $error = error_get_last();
        echo "Error: " . ($error['message'] ?? 'Unknown error') . "\n";
    } else {
        echo "✅ HTTP request successful\n";
        echo "Response: " . substr($response, 0, 200) . "...\n";
        
        $data = json_decode($response, true);
        if ($data) {
            echo "JSON parsed successfully\n";
            echo "Success: " . ($data['success'] ? 'true' : 'false') . "\n";
        } else {
            echo "❌ Failed to parse JSON\n";
        }
    }
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}

echo "\nTesting Laravel Request\n";
echo "======================\n";

// Test using Laravel's HTTP client
try {
    $httpClient = new \GuzzleHttp\Client();
    $response = $httpClient->get($fullUrl);
    
    echo "Status: " . $response->getStatusCode() . "\n";
    echo "Body: " . $response->getBody() . "\n";
    
} catch (Exception $e) {
    echo "❌ Guzzle request failed: " . $e->getMessage() . "\n";
}

echo "\nChecking Application Base URL\n";
echo "============================\n";

echo "APP_URL: " . config('app.url') . "\n";
echo "Current URL: " . request()->url() ?? 'N/A' . "\n";
