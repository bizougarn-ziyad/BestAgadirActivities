<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class AgadirActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'name' => 'Agadir Beach Day',
                'bio' => 'Relax on 10km of pristine sandy beach with modern facilities, beach clubs, and water sports. Perfect for sunbathing, swimming, and enjoying the Atlantic coastline.',
                'price' => 0.00,
                'is_active' => true,
                'average_rating' => 4.6,
                'review_count' => 127,
                'reviews' => [
                    [
                        'name' => 'Lisa Anderson',
                        'initial' => 'L',
                        'rating' => 5,
                        'time_ago' => '1 week ago',
                        'comment' => 'Perfect beach day! Clean facilities, beautiful sand, and the water was perfect temperature. Great for families!',
                        'color' => 'from-pink-400 to-pink-500'
                    ],
                    [
                        'name' => 'Ahmed Benali',
                        'initial' => 'A',
                        'rating' => 4,
                        'time_ago' => '3 days ago',
                        'comment' => 'Amazing beach with great atmosphere. The sunset views are incredible. Highly recommend for relaxation.',
                        'color' => 'from-blue-400 to-blue-500'
                    ],
                    [
                        'name' => 'Sophie Martin',
                        'initial' => 'S',
                        'rating' => 5,
                        'time_ago' => '2 weeks ago',
                        'comment' => 'Best beach experience in Morocco! Clean, safe, and so many activities available. Will definitely return!',
                        'color' => 'from-green-400 to-green-500'
                    ]
                ]
            ],
            [
                'name' => 'Agadir Kasbah Tour',
                'bio' => 'Visit the historic 16th-century fortress ruins with panoramic views of Agadir, marina, and Atlantic coast. Best spot for sunset photography.',
                'price' => 150.00,
                'is_active' => true,
                'average_rating' => 4.8,
                'review_count' => 89,
                'reviews' => [
                    [
                        'name' => 'Marcus Thompson',
                        'initial' => 'M',
                        'rating' => 5,
                        'time_ago' => '4 days ago',
                        'comment' => 'Breathtaking views and rich history! Our guide was incredibly knowledgeable about the kasbah\'s heritage.',
                        'color' => 'from-purple-400 to-purple-500'
                    ],
                    [
                        'name' => 'Fatima El Idrissi',
                        'initial' => 'F',
                        'rating' => 5,
                        'time_ago' => '1 week ago',
                        'comment' => 'The sunset view from here is magical! Perfect spot for photography and learning about Agadir\'s history.',
                        'color' => 'from-orange-400 to-orange-500'
                    ],
                    [
                        'name' => 'David Wilson',
                        'initial' => 'D',
                        'rating' => 4,
                        'time_ago' => '10 days ago',
                        'comment' => 'Great historical site with amazing panoramic views. The climb is worth it for the spectacular scenery.',
                        'color' => 'from-teal-400 to-teal-500'
                    ]
                ]
            ],
            [
                'name' => 'Souk El Had Shopping Experience',
                'bio' => 'Explore Morocco\'s largest traditional market with thousands of stalls. Shop for spices, textiles, jewelry, and souvenirs while practicing your bargaining skills.',
                'price' => 50.00,
                'is_active' => true,
                'average_rating' => 4.4,
                'review_count' => 156,
                'reviews' => [
                    [
                        'name' => 'Isabella Rodriguez',
                        'initial' => 'I',
                        'rating' => 4,
                        'time_ago' => '5 days ago',
                        'comment' => 'Authentic Moroccan market experience! Great variety of goods and friendly vendors. Bargaining is fun!',
                        'color' => 'from-red-400 to-red-500'
                    ],
                    [
                        'name' => 'Youssef Benali',
                        'initial' => 'Y',
                        'rating' => 5,
                        'time_ago' => '2 weeks ago',
                        'comment' => 'Amazing selection of spices, textiles, and crafts. A true cultural immersion experience in Agadir.',
                        'color' => 'from-yellow-400 to-yellow-500'
                    ],
                    [
                        'name' => 'Emma Johnson',
                        'initial' => 'E',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Vibrant marketplace with so much to see! Perfect place to find unique souvenirs and gifts.',
                        'color' => 'from-indigo-400 to-indigo-500'
                    ]
                ]
            ],
            [
                'name' => 'Paradise Valley Hiking',
                'bio' => 'Hike to a stunning Atlas Mountains oasis with crystal-clear pools and palm groves. Swim in natural pools and enjoy traditional Moroccan lunch.',
                'price' => 250.00,
                'is_active' => true,
                'average_rating' => 4.9,
                'review_count' => 73,
                'reviews' => [
                    [
                        'name' => 'Oliver Schmidt',
                        'initial' => 'O',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Absolutely stunning! The natural pools are crystal clear and the hike is moderately challenging but worth every step.',
                        'color' => 'from-green-400 to-green-500'
                    ],
                    [
                        'name' => 'Leila Alami',
                        'initial' => 'L',
                        'rating' => 5,
                        'time_ago' => '1 week ago',
                        'comment' => 'Paradise indeed! Swimming in those natural pools surrounded by palm trees was unforgettable.',
                        'color' => 'from-blue-400 to-blue-500'
                    ],
                    [
                        'name' => 'James Miller',
                        'initial' => 'J',
                        'rating' => 5,
                        'time_ago' => '4 days ago',
                        'comment' => 'Best hiking experience in Morocco! The scenery is breathtaking and the lunch was delicious.',
                        'color' => 'from-amber-400 to-amber-500'
                    ]
                ]
            ],
            [
                'name' => 'Agadir Marina Walk',
                'bio' => 'Stroll through the elegant waterfront marina with luxury yachts, upscale restaurants, and boutique shops. Perfect for evening drinks and dining.',
                'price' => 0.00,
                'is_active' => true,
                'average_rating' => 4.5,
                'review_count' => 142,
                'reviews' => [
                    [
                        'name' => 'Victoria Chen',
                        'initial' => 'V',
                        'rating' => 4,
                        'time_ago' => '2 days ago',
                        'comment' => 'Beautiful marina with stunning yachts and great restaurants. Perfect for a romantic evening stroll.',
                        'color' => 'from-pink-400 to-pink-500'
                    ],
                    [
                        'name' => 'Karim Bennani',
                        'initial' => 'K',
                        'rating' => 5,
                        'time_ago' => '6 days ago',
                        'comment' => 'Elegant and sophisticated atmosphere. Great selection of restaurants and beautiful sea views.',
                        'color' => 'from-cyan-400 to-cyan-500'
                    ],
                    [
                        'name' => 'Anna Petrov',
                        'initial' => 'A',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Lovely marina with upscale dining options. The sunset views from here are absolutely gorgeous.',
                        'color' => 'from-purple-400 to-purple-500'
                    ]
                ]
            ],
            [
                'name' => 'Atlas Mountains Day Trip',
                'bio' => 'Full-day excursion to traditional Berber villages with mountain scenery, local cooperatives, and authentic mint tea experience.',
                'price' => 350.00,
                'is_active' => true,
                'average_rating' => 4.7,
                'review_count' => 95,
                'reviews' => [
                    [
                        'name' => 'Thomas Anderson',
                        'initial' => 'T',
                        'rating' => 5,
                        'time_ago' => '5 days ago',
                        'comment' => 'Incredible mountain views and authentic Berber culture experience. The mint tea ceremony was special!',
                        'color' => 'from-emerald-400 to-emerald-500'
                    ],
                    [
                        'name' => 'Aicha Benomar',
                        'initial' => 'A',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Beautiful mountain scenery and welcoming local communities. Great way to learn about Berber traditions.',
                        'color' => 'from-rose-400 to-rose-500'
                    ],
                    [
                        'name' => 'Roberto Silva',
                        'initial' => 'R',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Outstanding day trip! The mountain landscapes are breathtaking and the local hospitality is wonderful.',
                        'color' => 'from-orange-400 to-orange-500'
                    ]
                ]
            ],
            [
                'name' => 'Surfing Lessons at Taghazout',
                'bio' => 'Learn to surf at the world-famous Taghazout beach, 20 minutes from Agadir. Professional instructors and equipment provided for all levels.',
                'price' => 200.00,
                'is_active' => true,
                'average_rating' => 4.6,
                'review_count' => 118,
                'reviews' => [
                    [
                        'name' => 'Jake Thompson',
                        'initial' => 'J',
                        'rating' => 5,
                        'time_ago' => '2 days ago',
                        'comment' => 'Amazing surf lessons! The instructors are patient and skilled. Caught my first wave here!',
                        'color' => 'from-blue-400 to-blue-500'
                    ],
                    [
                        'name' => 'Sophia Williams',
                        'initial' => 'S',
                        'rating' => 4,
                        'time_ago' => '6 days ago',
                        'comment' => 'Great surf spot with excellent waves. The equipment is top quality and instructors are very helpful.',
                        'color' => 'from-teal-400 to-teal-500'
                    ],
                    [
                        'name' => 'Mehdi Benjelloun',
                        'initial' => 'M',
                        'rating' => 5,
                        'time_ago' => '4 days ago',
                        'comment' => 'Perfect waves for learning! Taghazout has amazing surf culture and the lessons were fantastic.',
                        'color' => 'from-cyan-400 to-cyan-500'
                    ]
                ]
            ],
            [
                'name' => 'Agadir Crocoparc Visit',
                'bio' => 'Visit 300+ Nile crocodiles in a 4-hectare botanical garden with natural ponds and waterfalls. Educational presentations and family-friendly environment.',
                'price' => 120.00,
                'is_active' => true,
                'average_rating' => 4.3,
                'review_count' => 164,
                'reviews' => [
                    [
                        'name' => 'Maria Garcia',
                        'initial' => 'M',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Fascinating experience! Kids loved seeing the crocodiles up close. Very educational and well-maintained.',
                        'color' => 'from-green-400 to-green-500'
                    ],
                    [
                        'name' => 'Hassan El Fassi',
                        'initial' => 'H',
                        'rating' => 4,
                        'time_ago' => '3 days ago',
                        'comment' => 'Great family attraction with beautiful botanical gardens. The crocodile feeding show was impressive!',
                        'color' => 'from-lime-400 to-lime-500'
                    ],
                    [
                        'name' => 'Jennifer Lee',
                        'initial' => 'J',
                        'rating' => 5,
                        'time_ago' => '5 days ago',
                        'comment' => 'Amazing place for families! Well-organized, safe, and the children learned so much about crocodiles.',
                        'color' => 'from-yellow-400 to-yellow-500'
                    ]
                ]
            ],
            [
                'name' => 'Traditional Hammam Spa Experience',
                'bio' => 'Authentic Moroccan wellness experience with steam bathing, black soap exfoliation, and argan oil massage. Deep relaxation and cultural immersion.',
                'price' => 180.00,
                'is_active' => true,
                'average_rating' => 4.8,
                'review_count' => 87,
                'reviews' => [
                    [
                        'name' => 'Catherine Brown',
                        'initial' => 'C',
                        'rating' => 5,
                        'time_ago' => '2 days ago',
                        'comment' => 'Incredibly relaxing and authentic experience! The argan oil massage was divine. Felt completely rejuvenated.',
                        'color' => 'from-pink-400 to-pink-500'
                    ],
                    [
                        'name' => 'Rachid Alaoui',
                        'initial' => 'R',
                        'rating' => 5,
                        'time_ago' => '1 week ago',
                        'comment' => 'Traditional hammam at its finest! Professional staff and authentic Moroccan wellness traditions.',
                        'color' => 'from-indigo-400 to-indigo-500'
                    ],
                    [
                        'name' => 'Elena Popov',
                        'initial' => 'E',
                        'rating' => 4,
                        'time_ago' => '4 days ago',
                        'comment' => 'Perfect way to unwind after exploring Agadir. The black soap treatment left my skin feeling amazing!',
                        'color' => 'from-purple-400 to-purple-500'
                    ]
                ]
            ],
            [
                'name' => 'Agadir Golf Course',
                'bio' => 'Play championship golf with ocean and mountain views. International standard courses with equipment rental and professional instruction available.',
                'price' => 300.00,
                'is_active' => true,
                'average_rating' => 4.7,
                'review_count' => 76,
                'reviews' => [
                    [
                        'name' => 'Michael O\'Connor',
                        'initial' => 'M',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Championship quality course with stunning views! Well-maintained greens and excellent facilities.',
                        'color' => 'from-green-400 to-green-500'
                    ],
                    [
                        'name' => 'Nadia Benjelloun',
                        'initial' => 'N',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Beautiful golf course with ocean views. Professional staff and great equipment rental options.',
                        'color' => 'from-blue-400 to-blue-500'
                    ],
                    [
                        'name' => 'Peter Hansen',
                        'initial' => 'P',
                        'rating' => 5,
                        'time_ago' => '5 days ago',
                        'comment' => 'Exceptional golf experience! The mountain and ocean backdrop makes every hole memorable.',
                        'color' => 'from-teal-400 to-teal-500'
                    ]
                ]
            ],
            [
                'name' => 'Argan Oil Cooperative Tour',
                'bio' => 'Learn about Morocco\'s liquid gold production. Watch traditional extraction methods, taste the oil, and buy authentic products directly from producers.',
                'price' => 100.00,
                'is_active' => true,
                'average_rating' => 4.5,
                'review_count' => 134,
                'reviews' => [
                    [
                        'name' => 'Laura Martinez',
                        'initial' => 'L',
                        'rating' => 4,
                        'time_ago' => '6 days ago',
                        'comment' => 'Educational and authentic! Learned so much about argan oil production and bought amazing products.',
                        'color' => 'from-amber-400 to-amber-500'
                    ],
                    [
                        'name' => 'Khalid Benali',
                        'initial' => 'K',
                        'rating' => 5,
                        'time_ago' => '2 days ago',
                        'comment' => 'Fascinating process to watch! The women\'s cooperative is inspiring and the products are top quality.',
                        'color' => 'from-orange-400 to-orange-500'
                    ],
                    [
                        'name' => 'Sarah Johnson',
                        'initial' => 'S',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Great cultural experience! Seeing the traditional methods and supporting local women cooperatives.',
                        'color' => 'from-yellow-400 to-yellow-500'
                    ]
                ]
            ],
            [
                'name' => 'Quad Biking Adventure',
                'bio' => 'Thrilling quad bike ride through dunes, rocky terrain, and villages with Atlantic and Atlas Mountain views. Suitable for all experience levels.',
                'price' => 220.00,
                'is_active' => true,
                'average_rating' => 4.6,
                'review_count' => 102,
                'reviews' => [
                    [
                        'name' => 'Alex Turner',
                        'initial' => 'A',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Adrenaline-pumping adventure! The dunes and mountain views are spectacular. Well-organized and safe.',
                        'color' => 'from-red-400 to-red-500'
                    ],
                    [
                        'name' => 'Samira Bennis',
                        'initial' => 'S',
                        'rating' => 4,
                        'time_ago' => '5 days ago',
                        'comment' => 'Exciting ride through diverse terrain! Great for adventure seekers with beautiful landscape views.',
                        'color' => 'from-orange-400 to-orange-500'
                    ],
                    [
                        'name' => 'Mark Wilson',
                        'initial' => 'M',
                        'rating' => 5,
                        'time_ago' => '1 week ago',
                        'comment' => 'Fantastic quad biking experience! Perfect mix of thrill and scenery. Highly recommend for adventure lovers.',
                        'color' => 'from-gray-400 to-gray-500'
                    ]
                ]
            ],
            [
                'name' => 'Sunset Camel Trekking',
                'bio' => 'Magical camel ride along the coastline at sunset with traditional Berber tea. Perfect romantic activity with stunning photo opportunities.',
                'price' => 160.00,
                'is_active' => true,
                'average_rating' => 4.8,
                'review_count' => 98,
                'reviews' => [
                    [
                        'name' => 'Emma Thompson',
                        'initial' => 'E',
                        'rating' => 5,
                        'time_ago' => '2 days ago',
                        'comment' => 'Absolutely magical experience! The sunset views from camelback are unforgettable. So romantic!',
                        'color' => 'from-pink-400 to-pink-500'
                    ],
                    [
                        'name' => 'Omar Amrani',
                        'initial' => 'O',
                        'rating' => 5,
                        'time_ago' => '4 days ago',
                        'comment' => 'Perfect sunset activity! The camel ride along the coast with Berber tea was incredibly peaceful.',
                        'color' => 'from-amber-400 to-amber-500'
                    ],
                    [
                        'name' => 'Julia Schmidt',
                        'initial' => 'J',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Beautiful camel trek at sunset! The coastline views are stunning and the experience is very authentic.',
                        'color' => 'from-purple-400 to-purple-500'
                    ]
                ]
            ],
            [
                'name' => 'Agadir Food Walking Tour',
                'bio' => 'Taste authentic Moroccan cuisine including tagine, couscous, and fresh seafood. Visit local markets, bakeries, and hidden culinary gems.',
                'price' => 130.00,
                'is_active' => true,
                'average_rating' => 4.7,
                'review_count' => 143,
                'reviews' => [
                    [
                        'name' => 'Antonio Rossi',
                        'initial' => 'A',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Incredible culinary journey! Tasted amazing tagines and discovered hidden local food gems. Delicious!',
                        'color' => 'from-green-400 to-green-500'
                    ],
                    [
                        'name' => 'Zainab El Mansouri',
                        'initial' => 'Z',
                        'rating' => 4,
                        'time_ago' => '6 days ago',
                        'comment' => 'Perfect introduction to Moroccan cuisine! Great variety of dishes and wonderful local food markets.',
                        'color' => 'from-red-400 to-red-500'
                    ],
                    [
                        'name' => 'Robert Davis',
                        'initial' => 'R',
                        'rating' => 5,
                        'time_ago' => '2 days ago',
                        'comment' => 'Amazing food tour! Every stop was delicious and our guide shared great culinary insights.',
                        'color' => 'from-blue-400 to-blue-500'
                    ]
                ]
            ],
            [
                'name' => 'Essaouira Day Trip',
                'bio' => 'UNESCO World Heritage city visit with blue and white medina, ancient ramparts, and bustling fishing port. Includes transportation and guided tour.',
                'price' => 280.00,
                'is_active' => true,
                'average_rating' => 4.6,
                'review_count' => 81,
                'reviews' => [
                    [
                        'name' => 'Caroline Dubois',
                        'initial' => 'C',
                        'rating' => 5,
                        'time_ago' => '4 days ago',
                        'comment' => 'Essaouira is magical! The blue and white medina is stunning and the seafood is incredible. Must-visit!',
                        'color' => 'from-blue-400 to-blue-500'
                    ],
                    [
                        'name' => 'Abdellah Bennani',
                        'initial' => 'A',
                        'rating' => 4,
                        'time_ago' => '1 week ago',
                        'comment' => 'Beautiful UNESCO heritage city! The ramparts and fishing port are fascinating. Great day trip.',
                        'color' => 'from-cyan-400 to-cyan-500'
                    ],
                    [
                        'name' => 'Lisa Chen',
                        'initial' => 'L',
                        'rating' => 5,
                        'time_ago' => '3 days ago',
                        'comment' => 'Absolutely loved Essaouira! The artisan shops and coastal views are breathtaking. Highly recommended!',
                        'color' => 'from-teal-400 to-teal-500'
                    ]
                ]
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
