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
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
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
}
