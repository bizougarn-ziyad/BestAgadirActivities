<?php

namespace App\Services;

class DefaultReviewService
{
    /**
     * Generate default reviews for a new activity
     */
    public static function generateDefaultReviews()
    {
        $defaultNames = [
            'Alex Johnson', 'Maria Garcia', 'David Chen', 'Sarah Wilson', 'Michael Brown',
            'Emily Davis', 'James Martinez', 'Lisa Anderson', 'Ryan Taylor', 'Jessica Lee',
            'Ahmed Benali', 'Sophie Martin', 'Marcus Thompson', 'Fatima El Idrissi',
            'Isabella Rodriguez', 'Youssef Benali', 'Emma Johnson', 'Oliver Schmidt',
            'Leila Alami', 'Victoria Chen', 'Karim Bennani', 'Anna Petrov', 'Thomas Anderson'
        ];

        $colors = [
            'from-blue-400 to-blue-500',
            'from-green-400 to-green-500',
            'from-purple-400 to-purple-500',
            'from-pink-400 to-pink-500',
            'from-indigo-400 to-indigo-500',
            'from-red-400 to-red-500',
            'from-yellow-400 to-yellow-500',
            'from-teal-400 to-teal-500',
            'from-orange-400 to-orange-500',
            'from-cyan-400 to-cyan-500',
            'from-amber-400 to-amber-500',
            'from-emerald-400 to-emerald-500'
        ];

        $timePeriods = [
            '2 days ago', '3 days ago', '5 days ago', '1 week ago', '10 days ago',
            '2 weeks ago', '3 weeks ago', '1 month ago'
        ];

        $positiveComments = [
            'Amazing experience! Highly recommend this activity to anyone visiting Agadir.',
            'Perfect activity with great organization. The staff was very professional and friendly.',
            'Absolutely wonderful! This exceeded all my expectations. Will definitely do it again.',
            'Great value for money and such a fun experience. The whole family enjoyed it.',
            'Fantastic activity! Well organized and the guide was very knowledgeable.',
            'One of the best activities we did in Agadir. Professional service and great atmosphere.',
            'Incredible experience! The staff made sure everyone had a great time.',
            'Highly recommended! Perfect for both beginners and experienced participants.',
            'Outstanding activity with beautiful scenery. The whole experience was memorable.',
            'Excellent organization and friendly staff. This activity is a must-do in Agadir.',
            'Amazing experience from start to finish. Very well planned and executed.',
            'Perfect activity for our vacation! Great service and unforgettable memories.',
            'Wonderful experience! The attention to detail and customer service was exceptional.',
            'Great activity with professional guides. Safe, fun, and very well organized.',
            'Fantastic experience! This activity offers great value and amazing memories.'
        ];

        $reviews = [];
        $numReviews = rand(2, 4); // Generate 2-4 default reviews

        $usedNames = [];
        $usedComments = [];

        for ($i = 0; $i < $numReviews; $i++) {
            // Select unique name
            do {
                $name = $defaultNames[array_rand($defaultNames)];
            } while (in_array($name, $usedNames));
            $usedNames[] = $name;

            // Select unique comment
            do {
                $comment = $positiveComments[array_rand($positiveComments)];
            } while (in_array($comment, $usedComments));
            $usedComments[] = $comment;

            $reviews[] = [
                'name' => $name,
                'initial' => strtoupper(substr($name, 0, 1)),
                'rating' => rand(4, 5), // Generate ratings between 4-5 stars
                'time_ago' => $timePeriods[array_rand($timePeriods)],
                'comment' => $comment,
                'color' => $colors[array_rand($colors)]
            ];
        }

        return $reviews;
    }

    /**
     * Calculate average rating and review count from reviews array
     */
    public static function calculateRatingStats($reviews)
    {
        if (empty($reviews)) {
            return [
                'average_rating' => 0,
                'review_count' => 0
            ];
        }

        $totalRating = array_sum(array_column($reviews, 'rating'));
        $reviewCount = count($reviews);
        $averageRating = round($totalRating / $reviewCount, 1);

        return [
            'average_rating' => $averageRating,
            'review_count' => $reviewCount
        ];
    }
}
