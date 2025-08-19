<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'total_price', 
        'session_id',
        'user_id',
        'activity_id',
        'participants',
        'booking_date',
        'price_per_person'
    ];

    protected $casts = [
        'booking_date' => 'date'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(UserData::class, 'user_id');
    }
}
