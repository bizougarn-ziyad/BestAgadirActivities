<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activity;
use Illuminate\Http\Request;

class TestSearch extends Command
{
    protected $signature = 'test:search {date} {participants=1}';
    protected $description = 'Test search filtering logic';

    public function handle()
    {
        $searchDate = $this->argument('date');
        $participants = $this->argument('participants');
        
        $this->info("Testing search for date: $searchDate, participants: $participants");
        $this->info('');

        $query = Activity::where('is_active', true);
        
        // Filter by date and participants if provided
        if ($searchDate) {
            // Get all activities and then filter by availability
            $allActivities = $query->get();
            $availableActivityIds = [];
            
            $this->info("Total active activities: " . $allActivities->count());
            
            foreach ($allActivities as $activity) {
                $isAvailable = $activity->isAvailableForDate($searchDate, $participants);
                if ($isAvailable) {
                    $availableActivityIds[] = $activity->id;
                    $this->info("✓ {$activity->name} - Available");
                } else {
                    $this->info("✗ {$activity->name} - NOT Available");
                }
            }
            
            $this->info('');
            $this->info("Available activity IDs: " . implode(', ', $availableActivityIds));
            
            // Filter query to only include available activities
            $query = Activity::whereIn('id', $availableActivityIds)->where('is_active', true);
        }
        
        $activities = $query->orderBy('created_at', 'desc')->get();
        
        $this->info('');
        $this->info("Final filtered activities count: " . $activities->count());
        
        foreach ($activities as $activity) {
            $this->info("- {$activity->name}");
        }

        return 0;
    }
}
