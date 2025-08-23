<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function index()
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $activities = Activity::orderBy('created_at', 'desc')->paginate(9);
        $totalActivities = Activity::count();
        return view('admin.activities.index', compact('activities', 'totalActivities'));
    }

    public function create()
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        return view('admin.add-activities');
    }

    public function store(Request $request)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'max_participants' => 'required|integer|min:1|max:50',
        ], [
            'name.required' => 'Activity name is required.',
            'name.max' => 'Activity name cannot exceed 255 characters.',
            'bio.required' => 'Activity description is required.',
            'bio.max' => 'Activity description cannot exceed 2000 characters.',
            'image.required' => 'Activity image is required.',
            'image.image' => 'Please upload a valid image file.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, or GIF format.',
            'image.max' => 'Image size cannot exceed 2MB.',
            'price.required' => 'Activity price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'max_participants.required' => 'Maximum participants is required.',
            'max_participants.integer' => 'Maximum participants must be a valid number.',
            'max_participants.min' => 'At least 1 participant must be allowed.',
            'max_participants.max' => 'Maximum participants cannot exceed 50.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle file upload and convert to base64
            $imageData = null;
            $imageMimeType = null;
            $imageOriginalName = null;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Get image information
                $imageMimeType = $image->getMimeType();
                $imageOriginalName = $image->getClientOriginalName();
                
                // Convert image to base64
                $imageData = base64_encode(file_get_contents($image->getPathname()));
            }

            // Create activity
            Activity::create([
                'name' => $request->name,
                'bio' => $request->bio,
                'image_data' => $imageData,
                'image_mime_type' => $imageMimeType,
                'image_original_name' => $imageOriginalName,
                'price' => $request->price,
                'max_participants' => $request->max_participants,
                'is_active' => true
            ]);

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity added successfully!');

        } catch (\Exception $e) {
            Log::error('Failed to create activity: ' . $e->getMessage());
            
            return redirect()->back()
                ->withErrors(['error' => 'Failed to create activity. Please try again.'])
                ->withInput();
        }
    }

    public function edit(Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        return view('admin.activities.edit', compact('activity'));
    }

    public function show(Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        return view('admin.activities.show', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'max_participants' => 'required|integer|min:1|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = [
                'name' => $request->name,
                'bio' => $request->bio,
                'price' => $request->price,
                'max_participants' => $request->max_participants,
            ];

            // Handle file upload if new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Get image information
                $data['image_mime_type'] = $image->getMimeType();
                $data['image_original_name'] = $image->getClientOriginalName();
                
                // Convert image to base64
                $data['image_data'] = base64_encode(file_get_contents($image->getPathname()));
            }

            $activity->update($data);

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Failed to update activity. Please try again.'])
                ->withInput();
        }
    }

    public function destroy(Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        try {
            // No need to delete files since we're storing in database
            $activity->delete();

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Failed to delete activity. Please try again.']);
        }
    }
    public function bookActivity(Request $request, $activityId)
    {
        try {
            $activity = Activity::where('is_active', true)->findOrFail($activityId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Activity not found.');
        }
        
        // Validate the request
        $validator = Validator::make($request->all(), [
            'participants' => "required|integer|min:1|max:{$activity->max_participants}",
            'booking_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $selectedDate = Carbon::createFromFormat('Y-m-d', $value)->startOfDay();
                    $today = Carbon::today()->startOfDay();
                    
                    if ($selectedDate->lt($today)) {
                        $fail('Booking date cannot be in the past.');
                    }
                }
            ],
        ], [
            'participants.required' => 'Number of participants is required.',
            'participants.integer' => 'Number of participants must be a valid number.',
            'participants.min' => 'At least 1 participant is required.',
            'participants.max' => "Maximum {$activity->max_participants} participants allowed for this activity.",
            'booking_date.required' => 'Booking date is required.',
            'booking_date.date' => 'Please provide a valid date.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $participants = $request->participants;
            $bookingDate = $request->booking_date;
            
            // Check availability before proceeding
            if (!$activity->isAvailableForDate($bookingDate, $participants)) {
                $availableSpots = $activity->getAvailableSpotsForDate($bookingDate);
                return redirect()->back()
                    ->withErrors(['participants' => "Only {$availableSpots} spots available for this date. Maximum participants per activity: {$activity->max_participants}"])
                    ->withInput();
            }
            
            $pricePerPerson = $activity->price;
            $totalPrice = $pricePerPerson * $participants;

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            
            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $activity->name,
                            'description' => "Date: {$bookingDate} | Participants: {$participants}",
                        ],
                        'unit_amount' => $pricePerPerson * 100,
                    ],
                    'quantity' => $participants,
                ]],
                'mode' => 'payment',
                'success_url' => route('booking.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('booking.cancel', [], true),
                'metadata' => [
                    'activity_id' => $activity->id,
                    'participants' => $participants,
                    'booking_date' => $bookingDate,
                ]
            ]);

            $order = new Order();
            $order->status = 'unpaid';
            $order->total_price = $totalPrice;
            $order->session_id = $checkout_session->id;
            $order->activity_id = $activity->id;
            $order->participants = $participants;
            $order->booking_date = $bookingDate;
            $order->price_per_person = $pricePerPerson;
            $order->user_id = Auth::id(); // Add the authenticated user's ID
            $order->save();

            return redirect($checkout_session->url);
            
        } catch (\Exception $e) {
            Log::error('Booking error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Booking failed. Please try again.');
        }
    }

    public function checkout(){
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $activities = Activity::where('is_active', true)->get();
            
            if ($activities->isEmpty()) {
                return redirect()->back()->with('error', 'No activities available for checkout.');
            }
            
            $lineItems = [];
            $totalPrice = 0;
            
            foreach ($activities as $activity) {
                $totalPrice += $activity->price;
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $activity->name,
                        ],
                        'unit_amount' => $activity->price * 100,
                    ],
                    'quantity' => 1,
                ];
            }
            
            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success', [] , true)."?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('checkout.cancel', [] , true),
            ]);

            $order = new Order();
            $order->status = 'unpaid';
            $order->total_price = $totalPrice;
            $order->session_id = $checkout_session->id;
            $order->save();

            return redirect($checkout_session->url);
            
        } catch (\Exception $e) {
            Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Payment processing failed. Please try again.');
        }
    }

        public function success(Request $request)
        {
            // Debug: Log all request parameters
            Log::info('Success route accessed', [
                'all_params' => $request->all(),
                'session_id' => $request->get('session_id'),
                'query_string' => $request->getQueryString()
            ]);

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->get('session_id');

            try {
                Log::info('Attempting to retrieve Stripe session', ['session_id' => $sessionId]);
                $session = $stripe->checkout->sessions->retrieve($sessionId);
                
                if (!$session) {
                    Log::error('Stripe session not found', ['session_id' => $sessionId]);
                    return redirect()->route('checkout.cancel')
                        ->with('error', 'Payment session not found.');
                }

                Log::info('Stripe session retrieved successfully', [
                    'session_id' => $sessionId,
                    'payment_status' => $session->payment_status
                ]);

                // Update order status to paid
                $order = Order::where('session_id', $sessionId)->first();
                if ($order) {
                    $order->status = 'paid';
                    $order->save();
                    Log::info('Order status updated to paid', ['order_id' => $order->id]);
                } else {
                    Log::warning('Order not found for session', ['session_id' => $sessionId]);
                }

                $customer = null;
                if ($session->customer) {
                    try {
                        $customer = $stripe->customers->retrieve($session->customer);
                        Log::info('Customer retrieved successfully', ['customer_id' => $session->customer]);
                    } catch (\Exception $e) {
                        Log::warning('Failed to retrieve customer', [
                            'customer_id' => $session->customer,
                            'error' => $e->getMessage()
                        ]);
                    }
                } else {
                    Log::info('No customer ID in session - guest checkout');
                }

                return view('checkout-success', compact('customer', 'session'));
                
            } catch (\Exception $e) {
                throw new NotFoundHttpException();
            }
        }

        public function bookingSuccess(Request $request)
        {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
            $sessionId = $request->get('session_id');

            if (!$sessionId) {
                return redirect()->route('booking.cancel')
                    ->with('error', 'Invalid booking session.');
            }

            try {
                $session = $stripe->checkout->sessions->retrieve($sessionId);
                
                if (!$session) {
                    return redirect()->route('booking.cancel')
                        ->with('error', 'Booking session not found.');
                }

                // Update order status to paid
                $order = Order::where('session_id', $sessionId)->with('activity')->first();
                if ($order) {
                    $order->status = 'paid';
                    $order->save();
                }

                return view('booking-success', compact('order', 'session'));
                
            } catch (\Exception $e) {
                Log::error('Booking success error: ' . $e->getMessage());
                return redirect()->route('booking.cancel')
                    ->with('error', 'Booking verification failed.');
            }
        }

        public function bookingCancel()
        {
            return view('booking-cancel');
        }

        public function showBookingForm($activityId)
        {
            $activity = Activity::where('is_active', true)->findOrFail($activityId);
            return view('booking-form', compact('activity'));
        }

        public function cancel()
        {
            return view('checkout-cancel');
        }

        public function checkAvailability(Request $request)
        {
            try {
                $activityId = $request->get('activity_id');
                $date = $request->get('date');
                
                $activity = Activity::findOrFail($activityId);
                
                $availableSpots = $activity->getAvailableSpotsForDate($date);
                $bookedSpots = $activity->max_participants - $availableSpots;
                $isFullyBooked = $availableSpots == 0;
                $bookingPercentage = $activity->max_participants > 0 ? round(($bookedSpots / $activity->max_participants) * 100) : 0;
                
                return response()->json([
                    'success' => true,
                    'available_spots' => $availableSpots,
                    'booked_spots' => $bookedSpots,
                    'max_participants' => $activity->max_participants,
                    'is_fully_booked' => $isFullyBooked,
                    'booking_percentage' => $bookingPercentage,
                    'date' => $date
                ]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Unable to check availability'
                ], 500);
            }
        }

        public function checkMonthAvailability(Request $request)
        {
            try {
                $activityId = $request->get('activity_id');
                $startDate = $request->get('start_date');
                $endDate = $request->get('end_date');
                
                $activity = Activity::findOrFail($activityId);
                
                // Get all bookings for this activity in the date range
                $bookings = $activity->paidOrders()
                    ->whereBetween('booking_date', [$startDate, $endDate])
                    ->selectRaw('booking_date, SUM(participants) as total_participants')
                    ->groupBy('booking_date')
                    ->get()
                    ->keyBy('booking_date');
                
                $availability = [];
                $currentDate = new \DateTime($startDate);
                $endDateTime = new \DateTime($endDate);
                
                while ($currentDate <= $endDateTime) {
                    $dateString = $currentDate->format('Y-m-d');
                    $bookedParticipants = $bookings->get($dateString)?->total_participants ?? 0;
                    $availableSpots = max(0, $activity->max_participants - $bookedParticipants);
                    
                    $availability[$dateString] = [
                        'available_spots' => $availableSpots,
                        'booked_spots' => $bookedParticipants,
                        'max_participants' => $activity->max_participants,
                        'is_fully_booked' => $availableSpots == 0,
                    ];
                    
                    $currentDate->modify('+1 day');
                }
                
                return response()->json([
                    'success' => true,
                    'availability' => $availability
                ]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Unable to check availability'
                ], 500);
            }
        }
    }
