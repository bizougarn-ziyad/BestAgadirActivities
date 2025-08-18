<?php
require_once 'vendor/autoload.php';

use App\Models\Activity;

$app = require_once 'bootstrap/app.php';

$activities = Activity::take(5)->get(['id', 'name']);

foreach ($activities as $activity) {
    echo $activity->id . ': ' . $activity->name . PHP_EOL;
}
