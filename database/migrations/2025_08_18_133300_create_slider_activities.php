<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Create the three activities for the slider
        $activities = [
            [
                'name' => '1h Sand Surf + Camel Ride + Moroccan Mint Tea + Dinner + Show',
                'bio' => 'Enjoy sand surfing, a camel ride, Moroccan mint tea, a tasty dinner, and a lively traditional show. All in one unforgettable experience.',
                'price' => 25.00,
                'is_active' => true,
                'average_rating' => 4.3,
                'review_count' => rand(15, 95),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Buggy Adventure + 30min horse ride + Dinner + Crocodile park tour',
                'bio' => 'Experience the thrill of driving a buggy through the stunning Moroccan desert. Enjoy a 30-minute horse ride, followed by a delicious dinner under the stars.',
                'price' => 65.00,
                'is_active' => true,
                'average_rating' => 4.6,
                'review_count' => rand(15, 95),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Surf lessons with professional + Breakfast + Bus ride from your hotel',
                'bio' => 'Join us for an unforgettable surfing experience in the beautiful Moroccan waves. Our professional instructors will guide you every step of the way.',
                'price' => 45.00,
                'is_active' => true,
                'average_rating' => 4.8,
                'review_count' => rand(15, 95),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('activities')->insert($activities);
    }

    public function down()
    {
        // Delete the activities by name
        DB::table('activities')->whereIn('name', [
            '1h Sand Surf + Camel Ride + Moroccan Mint Tea + Dinner + Show',
            'Buggy Adventure + 30min horse ride + Dinner + Crocodile park tour',
            'Surf lessons with professional + Breakfast + Bus ride from your hotel'
        ])->delete();
    }
};
