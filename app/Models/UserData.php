<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class UserData extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable;

    protected $table = 'user_data';

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the e-mail address where password reset links are sent.
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     */
    public function sendPasswordResetNotification($token)
    {
        // You can customize this or use the default Laravel implementation
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }

    /**
     * Get the favorites for the user.
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    /**
     * Get the activities that the user has favorited.
     */
    public function favoriteActivities()
    {
        return $this->belongsToMany(Activity::class, 'favorites', 'user_id', 'activity_id')->withTimestamps();
    }

    /**
     * Check if the user has favorited a specific activity.
     */
    public function hasFavorited($activityId)
    {
        return $this->favorites()->where('activity_id', $activityId)->exists();
    }

    /**
     * Get the user's bookings (orders).
     */
    public function bookings()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
