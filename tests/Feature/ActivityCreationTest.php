<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Activity;
use App\Services\DefaultReviewService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivityCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function activity_is_created_with_default_reviews()
    {
        // Create an activity using the factory
        $activity = Activity::factory()->create();

        // Assert activity has reviews
        $this->assertNotNull($activity->reviews);
        $this->assertIsArray($activity->reviews);
        $this->assertGreaterThan(0, count($activity->reviews));

        // Assert each review has required fields
        foreach ($activity->reviews as $review) {
            $this->assertArrayHasKey('name', $review);
            $this->assertArrayHasKey('initial', $review);
            $this->assertArrayHasKey('rating', $review);
            $this->assertArrayHasKey('time_ago', $review);
            $this->assertArrayHasKey('comment', $review);
            $this->assertArrayHasKey('color', $review);
            
            // Assert rating is between 4-5
            $this->assertGreaterThanOrEqual(4, $review['rating']);
            $this->assertLessThanOrEqual(5, $review['rating']);
        }

        // Assert average rating and review count are calculated
        $this->assertGreaterThan(0, $activity->average_rating);
        $this->assertGreaterThan(0, $activity->review_count);
        $this->assertEquals(count($activity->reviews), $activity->review_count);
    }

    /** @test */
    public function activity_can_be_created_with_custom_method()
    {
        $activityData = [
            'name' => 'Test Activity',
            'bio' => 'This is a test activity',
            'price' => 100.00,
            'max_participants' => 10,
            'is_active' => true
        ];

        $activity = Activity::createWithDefaultReviews($activityData);

        // Assert activity was created
        $this->assertInstanceOf(Activity::class, $activity);
        $this->assertEquals('Test Activity', $activity->name);

        // Assert it has default reviews
        $this->assertNotNull($activity->reviews);
        $this->assertIsArray($activity->reviews);
        $this->assertGreaterThan(0, count($activity->reviews));

        // Assert rating stats are calculated
        $this->assertGreaterThan(0, $activity->average_rating);
        $this->assertGreaterThan(0, $activity->review_count);
    }

    /** @test */
    public function default_review_service_generates_valid_reviews()
    {
        $reviews = DefaultReviewService::generateDefaultReviews();

        $this->assertIsArray($reviews);
        $this->assertGreaterThan(0, count($reviews));
        $this->assertLessThanOrEqual(4, count($reviews));

        foreach ($reviews as $review) {
            $this->assertArrayHasKey('name', $review);
            $this->assertArrayHasKey('initial', $review);
            $this->assertArrayHasKey('rating', $review);
            $this->assertArrayHasKey('time_ago', $review);
            $this->assertArrayHasKey('comment', $review);
            $this->assertArrayHasKey('color', $review);
            
            // Validate data types and ranges
            $this->assertIsString($review['name']);
            $this->assertIsString($review['initial']);
            $this->assertIsInt($review['rating']);
            $this->assertGreaterThanOrEqual(4, $review['rating']);
            $this->assertLessThanOrEqual(5, $review['rating']);
            $this->assertIsString($review['comment']);
            $this->assertIsString($review['color']);
        }
    }

    /** @test */
    public function rating_stats_are_calculated_correctly()
    {
        $reviews = [
            ['rating' => 4],
            ['rating' => 5],
            ['rating' => 4],
        ];

        $stats = DefaultReviewService::calculateRatingStats($reviews);

        $this->assertEquals(4.3, $stats['average_rating']);
        $this->assertEquals(3, $stats['review_count']);
    }
}
