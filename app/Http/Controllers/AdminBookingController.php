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
        $query = Order::with(['activity', 'user'])
            ->where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate]);

        // Add activity filter if selected
        if ($activityId) {
            $query->where('activity_id', $activityId);
        }

        // Get bookings grouped by date
        $allBookings = $query->orderBy('booking_date', 'asc')
            ->get()
            ->groupBy(function($booking) {
                return Carbon::parse($booking->booking_date)->toDateString();
            });

        // Separate upcoming and completed bookings
        $upcomingBookings = [];
        $completedBookings = [];
        $today = Carbon::now()->toDateString();

        foreach ($allBookings as $date => $bookings) {
            if ($date >= $today) {
                $upcomingBookings[$date] = $bookings;
            } else {
                $completedBookings[$date] = $bookings;
            }
        }

        // Calculate summary statistics for all bookings
        $summaryQuery = Order::where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate]);

        if ($activityId) {
            $summaryQuery->where('activity_id', $activityId);
        }

        $totalBookings = $summaryQuery->count();
        $totalParticipants = $summaryQuery->sum('participants');
        $totalRevenue = $summaryQuery->sum('total_price');

        // Calculate statistics for upcoming bookings
        $upcomingQuery = Order::where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->where('booking_date', '>=', $today);

        if ($activityId) {
            $upcomingQuery->where('activity_id', $activityId);
        }

        $totalUpcomingBookings = $upcomingQuery->count();
        $totalUpcomingParticipants = $upcomingQuery->sum('participants');
        $totalUpcomingRevenue = $upcomingQuery->sum('total_price');

        // Calculate statistics for completed bookings
        $completedQuery = Order::where('status', 'paid')
            ->whereBetween('booking_date', [$startDate, $endDate])
            ->where('booking_date', '<', $today);

        if ($activityId) {
            $completedQuery->where('activity_id', $activityId);
        }

        $totalCompletedBookings = $completedQuery->count();
        $totalCompletedParticipants = $completedQuery->sum('participants');
        $totalCompletedRevenue = $completedQuery->sum('total_price');

        // Get daily statistics for upcoming bookings
        $upcomingDailyStats = [];
        foreach ($upcomingBookings as $date => $bookings) {
            $upcomingDailyStats[$date] = [
                'total_bookings' => $bookings->count(),
                'total_people' => $bookings->sum('participants'),
                'total_revenue' => $bookings->sum('total_price'),
                'orders' => $bookings,
            ];
        }

        // Get daily statistics for completed bookings
        $completedDailyStats = [];
        foreach ($completedBookings as $date => $bookings) {
            $completedDailyStats[$date] = [
                'total_bookings' => $bookings->count(),
                'total_people' => $bookings->sum('participants'),
                'total_revenue' => $bookings->sum('total_price'),
                'orders' => $bookings,
            ];
        }

        return view('admin.bookings.index', compact(
            'upcomingDailyStats',
            'completedDailyStats',
            'totalBookings', 
            'totalParticipants', 
            'totalRevenue',
            'totalUpcomingBookings',
            'totalUpcomingParticipants',
            'totalUpcomingRevenue',
            'totalCompletedBookings',
            'totalCompletedParticipants',
            'totalCompletedRevenue',
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

    /**
     * Clear all bookings (for testing/admin purposes)
     */
    public function clearAll(Request $request)
    {
        try {
            // Delete all orders
            $deletedCount = Order::count();
            Order::truncate(); // This is faster than deleteAll for clearing everything
            
            return redirect()->route('admin.bookings.index')
                ->with('success', "Successfully cleared all {$deletedCount} bookings from the system.");
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings.index')
                ->with('error', 'Failed to clear bookings: ' . $e->getMessage());
        }
    }

    /**
     * Clear bookings for a specific date range
     */
    public function clearDateRange(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        try {
            $deletedCount = Order::whereBetween('booking_date', [
                $request->start_date, 
                $request->end_date
            ])->count();
            
            Order::whereBetween('booking_date', [
                $request->start_date, 
                $request->end_date
            ])->delete();
            
            return redirect()->route('admin.bookings.index')
                ->with('success', "Successfully cleared {$deletedCount} bookings between {$request->start_date} and {$request->end_date}.");
        } catch (\Exception $e) {
            return redirect()->route('admin.bookings.index')
                ->with('error', 'Failed to clear bookings: ' . $e->getMessage());
        }
    }
}
