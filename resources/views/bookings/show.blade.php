<x-layout>
    <!-- Hero Section -->
    <div class="bg-gradient-to-br from-blue-50 via-white to-orange-50 py-20 mt-[80px]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Booking Details</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Complete information about your booking</p>
            </div>
        </div>
    </div>

    <!-- Booking Details Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('bookings.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to My Bookings
            </a>
        </div>

        <!-- Booking Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
                <div class="flex items-center justify-between text-white">
                    <div>
                        <h2 class="text-2xl font-bold">Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</h2>
                        <p class="text-blue-100">Confirmation Details</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Confirmed
                        </span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                @if($booking->activity)
                    <!-- Activity Details -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Activity Information</h3>
                        
                        <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-8">
                            <!-- Activity Image -->
                            @if($booking->activity->image)
                                <div class="flex-shrink-0">
                                    <img 
                                        src="data:image/jpeg;base64,{{ $booking->activity->image }}" 
                                        alt="{{ $booking->activity->name }}"
                                        class="w-full lg:w-64 h-48 object-cover rounded-lg shadow-md"
                                    >
                                </div>
                            @endif
                            
                            <!-- Activity Info -->
                            <div class="flex-1">
                                <h4 class="text-2xl font-bold text-gray-800 mb-4">{{ $booking->activity->name }}</h4>
                                <p class="text-gray-600 mb-4 leading-relaxed">{{ $booking->activity->bio }}</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span><strong>Duration:</strong> {{ $booking->activity->duration }} hours</span>
                                    </div>
                                    
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        <span><strong>Max Participants:</strong> {{ $booking->activity->max_participants }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Booking Details -->
                <div class="border-t border-gray-200 pt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Booking Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="font-semibold text-gray-800">Activity Date</span>
                                </div>
                                <p class="text-lg text-gray-700 ml-8">{{ $booking->booking_date->format('l, F d, Y') }}</p>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span class="font-semibold text-gray-800">Number of Participants</span>
                                </div>
                                <p class="text-lg text-gray-700 ml-8">{{ $booking->participants }} {{ $booking->participants == 1 ? 'person' : 'people' }}</p>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                    <span class="font-semibold text-gray-800">Price per Person</span>
                                </div>
                                <p class="text-lg text-gray-700 ml-8">${{ number_format($booking->price_per_person, 2) }}</p>
                            </div>
                            
                            <div class="bg-blue-50 rounded-lg p-4 border border-blue-200">
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                    <span class="font-semibold text-blue-800">Total Amount Paid</span>
                                </div>
                                <p class="text-2xl font-bold text-blue-700 ml-8">${{ number_format($booking->total_price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Metadata -->
                <div class="border-t border-gray-200 pt-8 mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Payment Information</h3>
                    
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Payment Status</p>
                                <p class="font-semibold text-green-600">{{ ucfirst($booking->status) }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Booking Date</p>
                                <p class="font-semibold text-gray-800">{{ $booking->created_at->format('F d, Y \a\t g:i A') }}</p>
                            </div>
                            
                            @if($booking->session_id)
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Payment Session ID</p>
                                    <p class="font-mono text-sm text-gray-700">{{ $booking->session_id }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('bookings.index') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold rounded-lg transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Bookings
                    </a>
                    
                    @if($booking->activity)
                        <a href="{{ route('activity.detail', $booking->activity->id) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            View Activity
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
