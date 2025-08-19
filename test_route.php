<?php

use Illuminate\Support\Facades\Route;

// Test route that directly calls the method
Route::get('/test-availability-direct', function () {
    try {
        $controller = new \App\Http\Controllers\ActivityController();
        $request = new \Illuminate\Http\Request();
        $request->merge(['activity_id' => 1, 'date' => '2025-08-20']);
        
        $response = $controller->checkAvailability($request);
        return $response;
    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
});
