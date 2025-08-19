<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;

try {
    echo "Testing ActivityController checkAvailability method directly...\n";
    
    $controller = new ActivityController();
    $request = new Request(['activity_id' => 1, 'date' => '2025-08-20']);
    
    $response = $controller->checkAvailability($request);
    
    echo "Status Code: " . $response->getStatusCode() . "\n";
    echo "Response: " . $response->getContent() . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
