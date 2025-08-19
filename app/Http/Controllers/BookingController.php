<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class BookingController extends Controller
{
    public function index()
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view your bookings.');
        }

        $user = Auth::user();
        
        // Get user's paid bookings with activity details, ordered by booking date
        $bookings = $user->bookings()
            ->with('activity')
            ->where('status', 'paid')
            ->orderBy('booking_date', 'desc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view booking details.');
        }

        $user = Auth::user();
        
        // Get the specific booking for this user
        $booking = $user->bookings()
            ->with('activity')
            ->where('id', $id)
            ->where('status', 'paid')
            ->firstOrFail();

        return view('bookings.show', compact('booking'));
    }
}
