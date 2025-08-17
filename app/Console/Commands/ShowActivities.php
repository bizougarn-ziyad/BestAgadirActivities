<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activity;

class ShowActivities extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'activities:show';

    /**
     * The console command description.
     */
    protected $description = 'Display all activities in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $activities = Activity::all();
        
        $this->info("Total activities: " . $activities->count());
        $this->line("");
        
        foreach ($activities as $activity) {
            $this->line("Name: " . $activity->name);
            $this->line("Price: " . $activity->price . " MAD");
            $this->line("Active: " . ($activity->is_active ? 'Yes' : 'No'));
            $this->line("Description: " . substr($activity->bio, 0, 100) . "...");
            $this->line("---");
        }
        
        return 0;
    }
}
