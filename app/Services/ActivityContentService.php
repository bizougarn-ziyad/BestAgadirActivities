<?php

namespace App\Services;

class ActivityContentService
{
    /**
     * Get randomized "What's Included" content based on activity type
     */
    public static function getWhatsIncluded($activityName)
    {
        $activityType = self::getActivityType($activityName);
        
        $includedOptions = [
            'beach' => [
                'Professional lifeguard supervision',
                'Beach chair and umbrella rental',
                'Fresh towels and changing facilities',
                'Beach volleyball equipment',
                'Snorkeling gear rental',
                'Refreshments and snacks',
                'Sunscreen and beach essentials',
                'Shower and locker facilities',
                'Beach games and activities',
                'First aid station access'
            ],
            'cultural' => [
                'Professional local guide',
                'All entrance fees',
                'Traditional welcome tea',
                'Cultural demonstration',
                'Photography assistance',
                'Historical documentation',
                'Local artisan interaction',
                'Traditional music experience',
                'Souvenir shopping guide',
                'Cultural etiquette briefing'
            ],
            'adventure' => [
                'Professional safety equipment',
                'Experienced certified guide',
                'Safety briefing and training',
                'All necessary gear rental',
                'Emergency first aid kit',
                'Transportation to/from site',
                'Energy snacks and water',
                'Action photography service',
                'Insurance coverage',
                'Achievement certificate'
            ],
            'nature' => [
                'Professional nature guide',
                'Transportation included',
                'Hiking equipment rental',
                'Traditional lunch included',
                'Natural pool access',
                'Wildlife spotting guide',
                'Photography assistance',
                'Bottled water and snacks',
                'Environmental education',
                'Safety equipment provided'
            ],
            'wellness' => [
                'Traditional spa treatments',
                'Authentic argan oil products',
                'Professional spa therapist',
                'Steam room access',
                'Relaxation tea service',
                'Luxury spa amenities',
                'Post-treatment refreshments',
                'Personalized treatment plan',
                'Premium organic products',
                'Tranquil environment access'
            ],
            'culinary' => [
                'Professional food guide',
                'All food tastings included',
                'Market tour and shopping',
                'Traditional cooking demonstration',
                'Recipe cards provided',
                'Local restaurant visits',
                'Authentic ingredient sampling',
                'Cultural dining etiquette',
                'Take-home spice samples',
                'Food safety briefing'
            ],
            'water_sports' => [
                'Professional surf instructor',
                'All equipment provided',
                'Safety briefing and training',
                'Wetsuit rental included',
                'Beach safety supervision',
                'Action photography service',
                'Post-surf refreshments',
                'Equipment maintenance',
                'Progress assessment',
                'Certificate of participation'
            ],
            'transportation' => [
                'Round-trip transportation',
                'Air-conditioned vehicle',
                'Professional driver guide',
                'Fuel and tolls included',
                'Comfortable seating',
                'Route planning assistance',
                'Rest stop coordination',
                'Luggage assistance',
                'Local area information',
                'Flexible scheduling'
            ]
        ];

        $baseIncluded = $includedOptions[$activityType] ?? $includedOptions['cultural'];
        
        // Randomly select 4-6 items
        $shuffled = collect($baseIncluded)->shuffle();
        $count = rand(4, 6);
        
        return $shuffled->take($count)->toArray();
    }

    /**
     * Get randomized "Good to Know" content based on activity type
     */
    public static function getGoodToKnow($activityName, $price = 0)
    {
        $activityType = self::getActivityType($activityName);
        
        $goodToKnowOptions = [
            'beach' => [
                'Duration: Full day access',
                'Best time: 9 AM - 6 PM',
                'Weather dependent activity',
                'Suitable for all ages',
                'Changing facilities available',
                'Restaurants nearby',
                'Parking available on-site',
                'Wheelchair accessible areas',
                'Pet-friendly zones available',
                'Seasonal availability may vary'
            ],
            'cultural' => [
                'Duration: 2-3 hours',
                'Meeting point: Main entrance',
                'Comfortable walking shoes recommended',
                'Photography permitted',
                'Available in multiple languages',
                'Respectful dress code required',
                'Heritage site regulations apply',
                'Guided tours every hour',
                'Gift shop available',
                'Educational for all ages'
            ],
            'adventure' => [
                'Duration: 4-6 hours',
                'Minimum age: 12 years',
                'Good physical condition required',
                'Weather conditions may affect activity',
                'Safety briefing mandatory',
                'Emergency procedures in place',
                'Professional insurance covered',
                'Equipment quality guaranteed',
                'Maximum group size: 8 people',
                'Free cancellation 24h notice'
            ],
            'nature' => [
                'Duration: 6-8 hours',
                'Moderate fitness level required',
                'Operates in most weather conditions',
                'Seasonal variations in scenery',
                'Wildlife sighting not guaranteed',
                'Eco-friendly practices followed',
                'Swimming skills recommended',
                'Comfortable hiking shoes essential',
                'Bring sun protection',
                'Camera highly recommended'
            ],
            'wellness' => [
                'Duration: 2-4 hours',
                'Advance booking recommended',
                'Suitable for all skin types',
                'Traditional methods used',
                'Gender-separated facilities',
                'Relaxation time included',
                'Organic products only',
                'Professional therapists certified',
                'Quiet environment maintained',
                'Post-treatment care advised'
            ],
            'culinary' => [
                'Duration: 3-4 hours',
                'Dietary restrictions accommodated',
                'Local hygiene standards followed',
                'Vegetarian options available',
                'Cultural context provided',
                'Market visit included',
                'Recipe sharing encouraged',
                'Walking tour involved',
                'Small group experience',
                'Taste testing throughout'
            ],
            'water_sports' => [
                'Duration: 2-3 hours',
                'Swimming ability required',
                'Age restrictions: 8+ years',
                'Weather dependent activity',
                'Equipment provided and maintained',
                'Safety instructor present',
                'Beginner friendly instruction',
                'Group size limited',
                'Seasonal activity',
                'Sun protection recommended'
            ],
            'transportation' => [
                'Duration: 8-10 hours',
                'Comfortable transportation provided',
                'Multiple stops included',
                'Flexible departure times',
                'Air conditioning available',
                'Rest stops planned',
                'Local guide commentary',
                'Scenic route selection',
                'Weather independent',
                'Luggage space available'
            ]
        ];

        $baseGoodToKnow = $goodToKnowOptions[$activityType] ?? $goodToKnowOptions['cultural'];
        
        // Add price-specific information
        if ($price == 0) {
            $baseGoodToKnow[] = 'Completely free activity';
            $baseGoodToKnow[] = 'No hidden charges';
        } else {
            $baseGoodToKnow[] = 'Free cancellation up to 24 hours';
            $baseGoodToKnow[] = 'Secure payment options available';
        }
        
        // Randomly select 4-6 items
        $shuffled = collect($baseGoodToKnow)->shuffle();
        $count = rand(4, 6);
        
        return $shuffled->take($count)->toArray();
    }

    /**
     * Determine activity type based on activity name
     */
    private static function getActivityType($activityName)
    {
        $activityName = strtolower($activityName);
        
        // Beach activities
        if (str_contains($activityName, 'beach') || str_contains($activityName, 'marina')) {
            return 'beach';
        }
        
        // Cultural activities
        if (str_contains($activityName, 'kasbah') || str_contains($activityName, 'souk') || 
            str_contains($activityName, 'tour') || str_contains($activityName, 'heritage') ||
            str_contains($activityName, 'essaouira') || str_contains($activityName, 'argan')) {
            return 'cultural';
        }
        
        // Adventure activities
        if (str_contains($activityName, 'quad') || str_contains($activityName, 'hiking') ||
            str_contains($activityName, 'mountain') || str_contains($activityName, 'atlas') ||
            str_contains($activityName, 'camel') || str_contains($activityName, 'trekking')) {
            return 'adventure';
        }
        
        // Nature activities
        if (str_contains($activityName, 'paradise') || str_contains($activityName, 'valley') ||
            str_contains($activityName, 'crocoparc') || str_contains($activityName, 'nature')) {
            return 'nature';
        }
        
        // Wellness activities
        if (str_contains($activityName, 'hammam') || str_contains($activityName, 'spa') ||
            str_contains($activityName, 'massage') || str_contains($activityName, 'wellness')) {
            return 'wellness';
        }
        
        // Culinary activities
        if (str_contains($activityName, 'food') || str_contains($activityName, 'cooking') ||
            str_contains($activityName, 'culinary') || str_contains($activityName, 'taste')) {
            return 'culinary';
        }
        
        // Water sports
        if (str_contains($activityName, 'surf') || str_contains($activityName, 'water') ||
            str_contains($activityName, 'diving') || str_contains($activityName, 'swimming')) {
            return 'water_sports';
        }
        
        // Transportation/Tours
        if (str_contains($activityName, 'trip') || str_contains($activityName, 'transport') ||
            str_contains($activityName, 'transfer') || str_contains($activityName, 'day trip')) {
            return 'transportation';
        }
        
        // Golf activities
        if (str_contains($activityName, 'golf')) {
            return 'adventure';
        }
        
        // Default to cultural for unmatched activities
        return 'cultural';
    }

    /**
     * Get appropriate icons for activity type
     */
    public static function getActivityIcons($activityType)
    {
        $icons = [
            'check' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                       </svg>',
            'info' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                       </svg>',
            'clock' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>',
            'location' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                           </svg>',
            'weather' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                          </svg>',
            'users' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>',
            'cancel' => '<svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                         </svg>'
        ];

        return $icons;
    }
}
