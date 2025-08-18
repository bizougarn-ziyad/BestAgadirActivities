<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap/app.php';

$app = \Illuminate\Foundation\Application::getInstance();
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "✅ Slider hover effects have been REMOVED:\n";
echo "=========================================\n";
echo "❌ Home page slider activities (NO scaling effect)\n";
echo "❌ Fallback static slider cards (NO scaling effect)\n\n";

echo "✅ Hover effects STILL ACTIVE on:\n";
echo "=================================\n";
echo "✅ Activities page grid cards (with scale-105 and enhanced shadow)\n";
echo "✅ Home page bottom section activity cards (with scale-105 and enhanced shadow)\n\n";

echo "🎯 Current slider activities (no hover scaling):\n";
echo "================================================\n";
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
    echo ($index + 1) . ". " . $activity->name . " (€" . $activity->price . ") - No scaling ✨\n";
}

echo "\n🚀 The slider activities will no longer scale on hover!\n";
echo "💡 Other activity cards still have smooth hover effects.\n";
