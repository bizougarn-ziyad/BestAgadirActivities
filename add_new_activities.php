<?php

require_once 'vendor/autoload.php';

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Activity;

echo "Adding 10 new activities to Agadir...\n";
echo "=====================================\n";

$newActivities = [
    [
        'name' => 'Jet Ski Adventure',
        'bio' => 'Experience the thrill of riding a jet ski along Agadir\'s stunning coastline. Explore hidden coves, enjoy the Atlantic waves, and take in breathtaking views of the city from the water. Perfect for adrenaline seekers and water sports enthusiasts.',
        'price' => 180.00,
        'is_active' => true,
        'average_rating' => 4.6,
        'review_count' => 128,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Amazing experience! The instructor was professional and the views were incredible.'],
            ['rating' => 4, 'comment' => 'Great fun, would definitely do it again. A bit pricey but worth it.'],
            ['rating' => 5, 'comment' => 'Perfect way to see Agadir from a different perspective.']
        ]
    ],
    [
        'name' => 'Parasailing Over Agadir Bay',
        'bio' => 'Soar high above Agadir Bay with breathtaking panoramic views of the Atlas Mountains, marina, and endless Atlantic Ocean. This safe and exciting parasailing experience offers unforgettable aerial photography opportunities.',
        'price' => 250.00,
        'is_active' => true,
        'average_rating' => 4.8,
        'review_count' => 95,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Absolutely breathtaking! The views from up there are simply amazing.'],
            ['rating' => 5, 'comment' => 'Best activity I did in Agadir. Highly recommended for everyone.'],
            ['rating' => 4, 'comment' => 'Great experience, though a bit scary at first. Staff was very reassuring.']
        ]
    ],
    [
        'name' => 'Agadir Horseback Beach Riding',
        'bio' => 'Gallop along Agadir\'s pristine beach on well-trained horses. Enjoy the sunset while riding through the sand dunes and along the shoreline. Suitable for all skill levels with professional guides and quality equipment.',
        'price' => 140.00,
        'is_active' => true,
        'average_rating' => 4.5,
        'review_count' => 156,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Magical sunset ride! The horses were gentle and well-cared for.'],
            ['rating' => 4, 'comment' => 'Beautiful experience, even for beginners like me.'],
            ['rating' => 5, 'comment' => 'Riding on the beach at sunset was absolutely perfect.']
        ]
    ],
    [
        'name' => 'Agadir Night Market Food Tour',
        'bio' => 'Discover Agadir\'s vibrant night food scene with street food tastings, traditional snacks, and fresh juices. Visit local vendors, night markets, and hidden gems known only to locals. A culinary adventure you won\'t forget.',
        'price' => 85.00,
        'is_active' => true,
        'average_rating' => 4.7,
        'review_count' => 203,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Amazing food tour! Tried so many delicious local dishes.'],
            ['rating' => 5, 'comment' => 'Best way to experience authentic Moroccan street food.'],
            ['rating' => 4, 'comment' => 'Great variety of food and very knowledgeable guide.']
        ]
    ],
    [
        'name' => 'Agadir Fishing Trip',
        'bio' => 'Join local fishermen for an authentic deep-sea fishing experience in the Atlantic Ocean. Catch various fish species while learning traditional fishing techniques. Includes equipment, refreshments, and the option to cook your catch.',
        'price' => 195.00,
        'is_active' => true,
        'average_rating' => 4.4,
        'review_count' => 87,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Caught my first tuna! The crew was fantastic and very helpful.'],
            ['rating' => 4, 'comment' => 'Great day on the water, even though we didn\'t catch much.'],
            ['rating' => 5, 'comment' => 'Authentic experience with local fishermen. Highly recommended.']
        ]
    ],
    [
        'name' => 'Agadir Botanical Gardens Visit',
        'bio' => 'Explore exotic plants, cacti, and succulents from around the world in Agadir\'s beautiful botanical gardens. Perfect for nature lovers, photographers, and families. Includes guided tour and educational information about Moroccan flora.',
        'price' => 60.00,
        'is_active' => true,
        'average_rating' => 4.3,
        'review_count' => 142,
        'reviews' => [
            ['rating' => 4, 'comment' => 'Beautiful gardens with amazing variety of plants.'],
            ['rating' => 5, 'comment' => 'Perfect peaceful break from the city. Great for photos.'],
            ['rating' => 4, 'comment' => 'Educational and relaxing. Kids loved the different cacti.']
        ]
    ],
    [
        'name' => 'Taghazout Yoga & Wellness Retreat',
        'bio' => 'Find inner peace with morning yoga sessions overlooking the ocean in the charming surf village of Taghazout. Includes meditation, healthy breakfast, and wellness workshops. Perfect for relaxation and spiritual rejuvenation.',
        'price' => 120.00,
        'is_active' => true,
        'average_rating' => 4.9,
        'review_count' => 76,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Absolutely transformative experience. The setting is magical.'],
            ['rating' => 5, 'comment' => 'Best yoga session of my life with incredible ocean views.'],
            ['rating' => 5, 'comment' => 'Perfect way to start the day. Very professional instructors.']
        ]
    ],
    [
        'name' => 'Agadir Dune Buggy Safari',
        'bio' => 'Navigate through challenging sand dunes and rocky terrain on powerful dune buggies. Experience Moroccan desert landscapes, visit Berber villages, and enjoy traditional tea breaks. Adventure and culture combined in one exciting tour.',
        'price' => 275.00,
        'is_active' => true,
        'average_rating' => 4.6,
        'review_count' => 119,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Thrilling adventure! The buggies were powerful and fun to drive.'],
            ['rating' => 4, 'comment' => 'Great mix of adventure and cultural discovery.'],
            ['rating' => 5, 'comment' => 'Awesome day out! The desert scenery was spectacular.']
        ]
    ],
    [
        'name' => 'Traditional Berber Cooking Class',
        'bio' => 'Learn to prepare authentic Moroccan dishes like tagine, couscous, and pastries with a local Berber family. Shop for ingredients in the souk, cook together, and enjoy your homemade feast. Take recipes home as souvenirs.',
        'price' => 110.00,
        'is_active' => true,
        'average_rating' => 4.8,
        'review_count' => 164,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Amazing cultural experience! Learned so much about Moroccan cuisine.'],
            ['rating' => 5, 'comment' => 'The family was so welcoming and the food was delicious.'],
            ['rating' => 4, 'comment' => 'Great hands-on experience. I can now make tagine at home!']
        ]
    ],
    [
        'name' => 'Agadir Hot Air Balloon Flight',
        'bio' => 'Float peacefully above the stunning landscapes of Agadir and surrounding areas in a hot air balloon. Witness breathtaking sunrise views over the Atlas Mountains, coastline, and desert. Includes champagne celebration and flight certificate.',
        'price' => 320.00,
        'is_active' => true,
        'average_rating' => 4.9,
        'review_count' => 58,
        'reviews' => [
            ['rating' => 5, 'comment' => 'Once in a lifetime experience! The sunrise views were incredible.'],
            ['rating' => 5, 'comment' => 'Absolutely magical! Best way to see the beauty of Morocco from above.'],
            ['rating' => 5, 'comment' => 'Professional crew and unforgettable experience. Worth every dirham.']
        ]
    ]
];

$successCount = 0;
$errorCount = 0;

foreach ($newActivities as $activityData) {
    try {
        $activity = Activity::create($activityData);
        echo "✓ Added: {$activity->name} (ID: {$activity->id}) - \${$activity->price}\n";
        $successCount++;
    } catch (Exception $e) {
        echo "✗ Error adding {$activityData['name']}: " . $e->getMessage() . "\n";
        $errorCount++;
    }
}

echo "\n====================================\n";
echo "Summary:\n";
echo "✓ Successfully added: {$successCount} activities\n";
echo "✗ Errors: {$errorCount} activities\n";

// Show total count
$totalActivities = Activity::count();
echo "Total activities in database: {$totalActivities}\n";

echo "\nAll new activities have been added to the existing ones. No previous activities were removed.\n";
