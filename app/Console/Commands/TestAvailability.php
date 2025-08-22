<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activity;
use App\Models\Order;

class TestAvailability extends Command
{
    protected $signature = 'test:availability';
    protected $description = 'Test activity availability logic';

    public function handle()
    {
        $this->info('Testing Activity Availability:');
        $this->info('============================');

        $testDate = '2025-08-22';
        $testParticipants = 2;

        $this->info("Test Date: $testDate");
        $this->info("Test Participants: $testParticipants");
        $this->info('');

        $activities = Activity::where('is_active', true)->get();

        foreach ($activities as $activity) {
            $this->info("Activity: {$activity->name}");
            $this->info("Max Participants: {$activity->max_participants}");
            
            // Get paid orders for this date
            $bookedParticipants = $activity->paidOrders()
                ->whereDate('booking_date', $testDate)
                ->sum('participants');
            
            $this->info("Booked Participants for $testDate: $bookedParticipants");
            $this->info("Available Spots: " . ($activity->max_participants - $bookedParticipants));
            
            $isAvailable = $activity->isAvailableForDate($testDate, $testParticipants);
            $this->info("Available for $testParticipants participants: " . ($isAvailable ? 'YES' : 'NO'));
            
            // Show all orders for this activity
            $orders = $activity->paidOrders()->whereDate('booking_date', $testDate)->get();
            if ($orders->count() > 0) {
                $this->info("Orders for this date:");
                foreach ($orders as $order) {
                    $this->info("  - Order ID: {$order->id}, Participants: {$order->participants}, Date: {$order->booking_date}, Status: {$order->status}");
                }
            } else {
                $this->info("No orders for this date");
            }
            
            $this->info('');
            $this->info(str_repeat('-', 50));
            $this->info('');
        }

        return 0;
    }
}
