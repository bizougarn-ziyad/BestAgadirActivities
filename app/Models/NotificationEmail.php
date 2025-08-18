<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationEmail extends Model
{
    protected $table = 'notification_emails';
    
    protected $fillable = [
        'email',
        'is_active'
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
