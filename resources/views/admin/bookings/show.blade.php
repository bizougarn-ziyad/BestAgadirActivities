<x-layout>
    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-4xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 mb-2">🎟️ Booking Details</h1>
                    <p class="text-gray-600">Booking ID: #{{ $booking->id }}</p>
                </div>
                <a href="{{ route('admin.bookings.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                    <span>←</span>
                    <span>Back to Bookings</span>
                </a>
            </div>

            <!-- Status Badge -->
            <div class="mb-6">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold
                    @if($booking->status === 'paid') bg-green-100 text-green-800
                    @elseif($booking->status === 'unpaid') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-800 @endif">
                    @if($booking->status === 'paid') ✅
                    @elseif($booking->status === 'unpaid') ⏳
                    @else ❌ @endif
                    {{ ucfirst($booking->status) }}
                </span>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Booking Information -->
                <div class="space-y-6">
                    <!-- Activity Details -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border border-orange-200">
                        <h3 class="text-xl font-bold text-orange-800 mb-4 flex items-center gap-2">
                            <span>🏄‍♂️</span>
                            <span>Activity Details</span>
                        </h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-orange-700">Name:</span>
                                <span class="text-orange-900 ml-2">{{ $booking->activity->name }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-orange-700">Description:</span>
                                <p class="text-orange-900 mt-1 text-sm">{{ Str::limit($booking->activity->bio, 150) }}</p>
                            </div>
                            <div>
                                <span class="font-medium text-orange-700">Max Participants:</span>
                                <span class="text-orange-900 ml-2">{{ $booking->activity->max_participants }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                        <h3 class="text-xl font-bold text-blue-800 mb-4 flex items-center gap-2">
                            <span>📋</span>
                            <span>Booking Information</span>
                        </h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-blue-700">Booking Date:</span>
                                <span class="text-blue-900 ml-2">{{ \Carbon\Carbon::parse($booking->booking_date)->format('l, F j, Y') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-blue-700">Participants:</span>
                                <span class="text-blue-900 ml-2">{{ $booking->participants }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-blue-700">Booked On:</span>
                                <span class="text-blue-900 ml-2">{{ $booking->created_at->format('M j, Y \a\t g:i A') }}</span>
                            </div>
                            @if($booking->session_id)
                            <div>
                                <span class="font-medium text-blue-700">Session ID:</span>
                                <span class="text-blue-900 ml-2 text-xs font-mono">{{ $booking->session_id }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Financial Information -->
                <div class="space-y-6">
                    <!-- Pricing Details -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                        <h3 class="text-xl font-bold text-green-800 mb-4 flex items-center gap-2">
                            <span>💰</span>
                            <span>Financial Details</span>
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-green-700">Price per person:</span>
                                <span class="text-green-900 font-semibold">${{ number_format($booking->price_per_person, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-green-700">Number of participants:</span>
                                <span class="text-green-900">{{ $booking->participants }}</span>
                            </div>
                            <hr class="border-green-300">
                            <div class="flex justify-between items-center text-lg">
                                <span class="font-bold text-green-700">Total Amount:</span>
                                <span class="text-green-900 font-bold">${{ number_format($booking->total_price, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Availability Information -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                        <h3 class="text-xl font-bold text-purple-800 mb-4 flex items-center gap-2">
                            <span>📊</span>
                            <span>Availability Status</span>
                        </h3>
                        @php
                            $availableSpots = $booking->activity->getAvailableSpotsForDate($booking->booking_date);
                            $bookedSpots = $booking->activity->max_participants - $availableSpots;
                        @endphp
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Spots booked for this date:</span>
                                <span class="text-purple-900 font-semibold">{{ $bookedSpots }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Spots still available:</span>
                                <span class="text-purple-900 font-semibold">{{ $availableSpots }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Maximum capacity:</span>
                                <span class="text-purple-900 font-semibold">{{ $booking->activity->max_participants }}</span>
                            </div>
                            
                            <!-- Progress Bar -->
                            <div class="mt-4">
                                <div class="flex justify-between text-sm text-purple-600 mb-2">
                                    <span>Booking Progress</span>
                                    <span>{{ number_format(($bookedSpots / $booking->activity->max_participants) * 100, 1) }}% Full</span>
                                </div>
                                <div class="w-full bg-purple-200 rounded-full h-3">
                                    <div class="bg-purple-600 h-3 rounded-full transition-all duration-300" 
                                         style="width: {{ ($bookedSpots / $booking->activity->max_participants) * 100 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex gap-4">
                    <a href="{{ route('admin.bookings.index') }}" 
                       class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition-colors flex items-center gap-2">
                        <span>📋</span>
                        <span>View All Bookings</span>
                    </a>
                    <a href="{{ route('admin.activities.show', $booking->activity->id) }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors flex items-center gap-2">
                        <span>🏄‍♂️</span>
                        <span>View Activity</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
