<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'image_data',
        'image_mime_type',
        'image_original_name',
        'price',
        'max_participants',
        'is_active',
        'average_rating',
        'review_count',
        'reviews'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'average_rating' => 'decimal:2',
        'review_count' => 'integer',
        'reviews' => 'array'
    ];

    /**
     * Get the image as a data URL for display
     */
    public function getImageDataUrlAttribute()
    {
        if ($this->image_data && $this->image_mime_type) {
            return 'data:' . $this->image_mime_type . ';base64,' . $this->image_data;
        }
        return null;
    }

    /**
     * Check if activity has image data
     */
    public function hasImageData()
    {
        return !empty($this->image_data) && !empty($this->image_mime_type);
    }

    /**
     * Get a limited number of reviews for display
     */
    public function getDisplayReviews($limit = 3)
    {
        if (!$this->reviews) {
            return [];
        }
        
        $colors = [
            'from-blue-400 to-blue-500',
            'from-green-400 to-green-500',
            'from-purple-400 to-purple-500',
            'from-pink-400 to-pink-500',
            'from-indigo-400 to-indigo-500',
            'from-red-400 to-red-500',
            'from-yellow-400 to-yellow-500',
            'from-teal-400 to-teal-500'
        ];
        
        $defaultNames = [
            'Alex Johnson', 'Maria Garcia', 'David Chen', 'Sarah Wilson', 'Michael Brown',
            'Emily Davis', 'James Martinez', 'Lisa Anderson', 'Ryan Taylor', 'Jessica Lee'
        ];
        
        $reviews = array_slice($this->reviews, 0, $limit);
        
        // Ensure each review has required fields
        foreach ($reviews as $index => &$review) {
            // Generate name if not present
            if (!isset($review['name'])) {
                $review['name'] = $defaultNames[$index % count($defaultNames)];
            }
            
            // Generate initial from name
            if (!isset($review['initial'])) {
                $review['initial'] = strtoupper(substr($review['name'], 0, 1));
            }
            
            // Generate color if not present
            if (!isset($review['color'])) {
                $review['color'] = $colors[$index % count($colors)];
            }
            
            // Set default time_ago if not present
            if (!isset($review['time_ago'])) {
                $timePeriods = ['3 days ago', '1 week ago', '2 weeks ago', '1 month ago', '2 months ago'];
                $review['time_ago'] = $timePeriods[$index % count($timePeriods)];
            }
        }
        
        return $reviews;
    }

    /**
     * Get formatted rating with star display
     */
    public function getStarRating()
    {
        return [
            'full_stars' => floor($this->average_rating),
            'has_half_star' => ($this->average_rating - floor($this->average_rating)) >= 0.5,
            'empty_stars' => 5 - ceil($this->average_rating)
        ];
    }

    /**
     * Get the favorites for this activity.
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Get the users who have favorited this activity.
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(UserData::class, 'favorites', 'activity_id', 'user_id')->withTimestamps();
    }

    /**
     * Get the total number of favorites for this activity.
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count();
    }

    /**
     * Get the orders for this activity.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the paid orders for this activity.
     */
    public function paidOrders()
    {
        return $this->hasMany(Order::class)->where('status', 'paid');
    }

    /**
     * Check availability for a specific date
     */
    public function isAvailableForDate($date, $requestedParticipants = 1)
    {
        if (!$this->is_active) {
            return false;
        }

        $bookedParticipants = $this->paidOrders()
            ->whereDate('booking_date', $date)
            ->sum('participants');

        $availableSlots = $this->max_participants - $bookedParticipants;
        
        return $availableSlots >= $requestedParticipants;
    }

    /**
     * Get available spots for a specific date
     */
    public function getAvailableSpotsForDate($date)
    {
        $bookedParticipants = $this->paidOrders()
            ->whereDate('booking_date', $date)
            ->sum('participants');

        return max(0, $this->max_participants - $bookedParticipants);
    }

    /**
     * Get booking statistics for a date range
     */
    public function getBookingStats($startDate = null, $endDate = null)
    {
        $query = $this->paidOrders();
        
        if ($startDate) {
            $query->where('booking_date', '>=', $startDate);
        }
        
        if ($endDate) {
            $query->where('booking_date', '<=', $endDate);
        }
        
        return $query->selectRaw('booking_date, COUNT(*) as total_bookings, SUM(participants) as total_participants, SUM(total_price) as total_revenue')
            ->groupBy('booking_date')
            ->orderBy('booking_date', 'desc')
            ->get();
    }
}
