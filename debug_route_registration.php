<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Testing Route Registration\n";
echo "=========================\n\n";

// Check if the route exists in the route collection
$router = app('router');
$routes = $router->getRoutes();

echo "Looking for availability routes:\n";

foreach ($routes as $route) {
    $uri = $route->uri();
    $name = $route->getName();
    $methods = implode('|', $route->methods());
    
    if (strpos($uri, 'availability') !== false) {
        echo "- {$methods} {$uri} -> {$name}\n";
        
        // Check if route has middleware
        $middleware = $route->gatherMiddleware();
        if (!empty($middleware)) {
            echo "  Middleware: " . implode(', ', $middleware) . "\n";
        } else {
            echo "  No middleware\n";
        }
        
        // Check action
        $action = $route->getAction();
        if (isset($action['controller'])) {
            echo "  Controller: {$action['controller']}\n";
        }
        echo "\n";
    }
}

echo "Testing Direct Route Access\n";
echo "==========================\n";

// Test if the controller class exists and method is callable
try {
    $controller = new \App\Http\Controllers\ActivityController();
    echo "✅ ActivityController instantiated successfully\n";
    
    if (method_exists($controller, 'checkAvailability')) {
        echo "✅ checkAvailability method exists\n";
    } else {
        echo "❌ checkAvailability method does not exist\n";
    }
    
    if (method_exists($controller, 'checkMonthAvailability')) {
        echo "✅ checkMonthAvailability method exists\n";
    } else {
        echo "❌ checkMonthAvailability method does not exist\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error instantiating controller: " . $e->getMessage() . "\n";
}

echo "\nTesting Route Matching\n";
echo "=====================\n";

// Test if Laravel can match the route
try {
    $request = \Illuminate\Http\Request::create('/activity/check-availability?activity_id=1&date=2025-08-20', 'GET');
    $route = $router->getRoutes()->match($request);
    
    echo "✅ Route matched: " . $route->getName() . "\n";
    echo "Action: " . $route->getActionName() . "\n";
    
} catch (Exception $e) {
    echo "❌ Route matching failed: " . $e->getMessage() . "\n";
}
