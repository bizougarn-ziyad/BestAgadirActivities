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
        
        return array_slice($this->reviews, 0, $limit);
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
}
