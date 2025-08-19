<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Http\Request;
use App\Http\Controllers\ActivityController;
use App\Models\Activity;

try {
    // Get the first activity
    $activity = Activity::first();
    if (!$activity) {
        echo "No activities found.\n";
        exit;
    }
    
    echo "Testing availability endpoint for Activity ID: " . $activity->id . "\n";
    echo "Activity: " . $activity->name . "\n";
    
    // Create a mock request
    $request = new Request();
    $request->merge([
        'activity_id' => $activity->id,
        'date' => '2025-08-20'
    ]);
    
    // Test the controller method directly
    $controller = new ActivityController();
    $response = $controller->checkAvailability($request);
    
    echo "Response status: " . $response->getStatusCode() . "\n";
    echo "Response content: " . $response->getContent() . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
