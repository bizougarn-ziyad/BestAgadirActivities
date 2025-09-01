<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;
use App\Services\DefaultReviewService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $defaultReviews = DefaultReviewService::generateDefaultReviews();
        $ratingStats = DefaultReviewService::calculateRatingStats($defaultReviews);

        return [
            'name' => $this->faker->sentence(3),
            'bio' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 0, 500),
            'max_participants' => $this->faker->numberBetween(1, 20),
            'is_active' => true,
            'reviews' => $defaultReviews,
            'average_rating' => $ratingStats['average_rating'],
            'review_count' => $ratingStats['review_count'],
            'image_data' => null,
            'image_mime_type' => null,
            'image_original_name' => null,
        ];
    }

    /**
     * Indicate that the activity is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the activity has no image.
     */
    public function withoutImage(): static
    {
        return $this->state(fn (array $attributes) => [
            'image_data' => null,
            'image_mime_type' => null,
            'image_original_name' => null,
        ]);
    }
}
