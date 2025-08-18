<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Activity;

class FavoriteController extends Controller
{
    /**
     * Toggle favorite status for an activity.
     */
    public function toggle(Request $request, $activityId)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add favorites',
                'redirect' => route('login')
            ], 401);
        }

        $user = Auth::user();
        $activity = Activity::findOrFail($activityId);

        // Check if the favorite already exists
        $favorite = Favorite::where('user_id', $user->id)
                           ->where('activity_id', $activityId)
                           ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            $isFavorited = false;
            $message = 'Removed from favorites';
        } else {
            // Add to favorites
            Favorite::create([
                'user_id' => $user->id,
                'activity_id' => $activityId,
            ]);
            $isFavorited = true;
            $message = 'Added to favorites';
        }

        return response()->json([
            'success' => true,
            'is_favorited' => $isFavorited,
            'message' => $message,
            'favorites_count' => $activity->favorites()->count()
        ]);
    }

    /**
     * Get user's favorite activities.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $favoriteActivities = $user->favoriteActivities()
                                  ->where('is_active', true)
                                  ->orderBy('favorites.created_at', 'desc')
                                  ->paginate(12);

        return view('favorites', compact('favoriteActivities'));
    }

    /**
     * Check if an activity is favorited by the current user.
     */
    public function check($activityId)
    {
        if (!Auth::check()) {
            return response()->json([
                'is_favorited' => false,
                'authenticated' => false
            ]);
        }

        $user = Auth::user();
        $isFavorited = $user->hasFavorited($activityId);

        return response()->json([
            'is_favorited' => $isFavorited,
            'authenticated' => true
        ]);
    }
}
