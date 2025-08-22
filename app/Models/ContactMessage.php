<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ContactMessage extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'status'
    ];

    /**
     * Get the user that sent this message
     */
    public function user()
    {
        return $this->belongsTo(UserData::class);
    }

    /**
     * Check how many messages a user has sent today
     */
    public static function getTodayMessageCount($userId)
    {
        return static::where('user_id', $userId)
            ->whereDate('created_at', Carbon::today())
            ->count();
    }

    /**
     * Check if user has reached daily limit
     */
    public static function hasReachedDailyLimit($userId, $limit = 3)
    {
        return static::getTodayMessageCount($userId) >= $limit;
    }
}
