<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap/app.php';

$app = \Illuminate\Foundation\Application::getInstance();
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "New Slider Activities (Jet Ski, Parasailing, Horseback):\n";
echo "=========================================================\n";

// Get specific activities for the slider (same logic as in routes/web.php)
$sliderActivityNames = [
    'Jet Ski Adventure',
    'Parasailing Over Agadir Bay', 
    'Horseback Beach Riding'
];

$sliderActivities = App\Models\Activity::where('is_active', true)
    ->whereIn('name', $sliderActivityNames)
    ->get()
    ->sortBy(function($activity) use ($sliderActivityNames) {
        return array_search($activity->name, $sliderActivityNames);
    })
    ->values();

foreach($sliderActivities as $index => $activity) {
    echo ($index + 1) . '. ' . $activity->name . ' (ID: ' . $activity->id . ') - €' . $activity->price . PHP_EOL;
}

echo "\nVerifying these activities exist and are active:\n";
echo "===============================================\n";

foreach($sliderActivityNames as $name) {
    $activity = App\Models\Activity::where('name', $name)->where('is_active', true)->first();
    if ($activity) {
        echo "✅ " . $activity->name . " (ID: " . $activity->id . ") - €" . $activity->price . PHP_EOL;
    } else {
        echo "❌ " . $name . " - NOT FOUND OR INACTIVE" . PHP_EOL;
    }
}
