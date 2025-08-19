<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of bookings grouped by date.
     */
    public function index(Request $request)
    {
        $startDate = $request->get('start_date', Carbon::now()->subDays(30)->toDateString());
        $endDate = $request->get('end_date', Carbon::now()->addDays(30)->toDateString());
        $activityId = $request->get('activity_id');

        // Get all activities for the dropdown
        $activities = Activity::orderBy('name')->get();

        // Build query with filters
        $query = Order::with('activity')
            ->where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate]);

        // Add activity filter if selected
        if ($activityId) {
            $query->where('activity_id', $activityId);
        }

        // Get bookings grouped by date
        $bookingsByDate = $query->orderBy('booking_date', 'asc')
            ->get()
            ->groupBy(function($booking) {
                return Carbon::parse($booking->booking_date)->toDateString();
            });

        // Calculate summary statistics
        $summaryQuery = Order::where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate]);

        if ($activityId) {
            $summaryQuery->where('activity_id', $activityId);
        }

        $totalBookings = $summaryQuery->count();
        $totalParticipants = $summaryQuery->sum('participants');
        $totalRevenue = $summaryQuery->sum('total_price');

        // Get daily statistics
        $dailyStats = [];
        foreach ($bookingsByDate as $date => $bookings) {
            $dailyStats[$date] = [
                'total_bookings' => $bookings->count(),
                'total_participants' => $bookings->sum('participants'),
                'total_revenue' => $bookings->sum('total_price'),
                'bookings' => $bookings,
            ];
        }

        return view('admin.bookings.index', compact(
            'dailyStats',
            'totalBookings', 
            'totalParticipants', 
            'totalRevenue',
            'startDate',
            'endDate',
            'activities',
            'activityId'
        ));
    }

    /**
     * Show detailed view of a specific booking
     */
    public function show($id)
    {
        $booking = Order::with('activity')->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Get availability data for activities
     */
    public function availability(Request $request)
    {
        $date = $request->get('date', Carbon::now()->toDateString());
        
        $activities = Activity::where('is_active', true)->get();
        
        $availabilityData = [];
        foreach ($activities as $activity) {
            $availableSpots = $activity->getAvailableSpotsForDate($date);
            $bookedSpots = $activity->max_participants - $availableSpots;
            
            $availabilityData[] = [
                'activity' => $activity,
                'available_spots' => $availableSpots,
                'booked_spots' => $bookedSpots,
                'max_participants' => $activity->max_participants,
                'is_fully_booked' => $availableSpots == 0,
            ];
        }

        return view('admin.bookings.availability', compact('availabilityData', 'date'));
    }

    /**
     * Get availability data for a specific activity and date (AJAX)
     */
    public function getAvailability(Request $request)
    {
        $activityId = $request->get('activity_id');
        $date = $request->get('date');
        
        if (!$activityId || !$date) {
            return response()->json(['error' => 'Activity ID and date are required'], 400);
        }

        try {
            $activity = Activity::findOrFail($activityId);
            $availableSpots = $activity->getAvailableSpotsForDate($date);
            $bookedSpots = $activity->max_participants - $availableSpots;
            
            return response()->json([
                'success' => true,
                'available_spots' => $availableSpots,
                'booked_spots' => $bookedSpots,
                'max_participants' => $activity->max_participants,
                'is_fully_booked' => $availableSpots == 0,
                'booking_percentage' => $activity->max_participants > 0 ? round(($bookedSpots / $activity->max_participants) * 100, 1) : 0
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Activity not found'], 404);
        }
    }
}
