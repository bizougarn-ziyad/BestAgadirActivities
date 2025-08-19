<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Http\Request;
use App\Http\Controllers\ActivityController;
use App\Models\Activity;

try {
    // Simulate an HTTP request to our availability endpoint
    $activity = Activity::first();
    echo "Testing availability for Activity: " . $activity->name . " (ID: " . $activity->id . ")\n";
    
    // Create request simulation
    $request = new Request();
    $request->merge([
        'activity_id' => $activity->id,
        'date' => '2025-08-20'
    ]);
    
    $controller = new ActivityController();
    $response = $controller->checkAvailability($request);
    
    echo "Response Status: " . $response->getStatusCode() . "\n";
    $responseData = json_decode($response->getContent(), true);
    
    if ($responseData['success']) {
        echo "✅ Availability check successful!\n";
        echo "Available spots: " . $responseData['available_spots'] . "\n";
        echo "Booked spots: " . $responseData['booked_spots'] . "\n";
        echo "Max participants: " . $responseData['max_participants'] . "\n";
        echo "Fully booked: " . ($responseData['is_fully_booked'] ? 'Yes' : 'No') . "\n";
    } else {
        echo "❌ Error: " . $responseData['error'] . "\n";
    }
    
} catch (Exception $e) {
    echo "❌ Exception: " . $e->getMessage() . "\n";
}

echo "\nNow when you go to the booking page and select a date, it should show real-time availability!\n";
