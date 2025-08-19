<x-layout>
    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-6xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 mb-2">📊 Activity Availability</h1>
                    <p class="text-gray-600">Monitor real-time availability for all activities</p>
                </div>
                
                <!-- Date Selector -->
                <div class="mt-4 lg:mt-0">
                    <form method="GET" action="{{ route('admin.bookings.availability') }}" class="flex items-center gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Check Date</label>
                            <input type="date" name="date" value="{{ $date }}" 
                                   class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                                Check
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Selected Date Display -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-blue-800">Availability for {{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}</h3>
                        <p class="text-blue-600 text-sm">Real-time capacity and booking status</p>
                    </div>
                    <div class="text-4xl text-blue-500">📅</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex gap-4 mb-8">
                <a href="{{ route('admin.bookings.index') }}" 
                   class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                    <span>📋</span>
                    <span>View Bookings</span>
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                    <span>←</span>
                    <span>Back to Dashboard</span>
                </a>
            </div>

            <!-- Availability Grid -->
            <div class="grid gap-6">
                @forelse($availabilityData as $data)
                    @php
                        $activity = $data['activity'];
                        $availableSpots = $data['available_spots'];
                        $bookedSpots = $data['booked_spots'];
                        $maxParticipants = $data['max_participants'];
                        $isFullyBooked = $data['is_fully_booked'];
                        $bookingPercentage = $maxParticipants > 0 ? ($bookedSpots / $maxParticipants) * 100 : 0;
                    @endphp
                    
                    <div class="bg-gradient-to-r from-white to-gray-50 border {{ $isFullyBooked ? 'border-red-300 bg-red-50' : 'border-gray-200' }} rounded-xl p-6 hover:shadow-lg transition-all">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <!-- Activity Info -->
                            <div class="flex-1 mb-4 lg:mb-0">
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $activity->name }}</h3>
                                    @if($isFullyBooked)
                                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">
                                            🚫 FULLY BOOKED
                                        </span>
                                    @elseif($availableSpots <= 3)
                                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">
                                            ⚠️ LIMITED SPOTS
                                        </span>
                                    @else
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                            ✅ AVAILABLE
                                        </span>
                                    @endif
                                </div>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit($activity->bio, 100) }}</p>
                                
                                <!-- Capacity Stats -->
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div class="bg-blue-50 p-3 rounded-lg">
                                        <span class="block text-blue-600 font-medium">Max Capacity</span>
                                        <span class="text-blue-800 font-bold text-lg">{{ $maxParticipants }}</span>
                                    </div>
                                    <div class="bg-red-50 p-3 rounded-lg">
                                        <span class="block text-red-600 font-medium">Booked</span>
                                        <span class="text-red-800 font-bold text-lg">{{ $bookedSpots }}</span>
                                    </div>
                                    <div class="bg-green-50 p-3 rounded-lg">
                                        <span class="block text-green-600 font-medium">Available</span>
                                        <span class="text-green-800 font-bold text-lg">{{ $availableSpots }}</span>
                                    </div>
                                    <div class="bg-purple-50 p-3 rounded-lg">
                                        <span class="block text-purple-600 font-medium">Price</span>
                                        <span class="text-purple-800 font-bold text-lg">${{ number_format($activity->price, 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Availability Visualization -->
                            <div class="lg:w-80 lg:ml-6">
                                <div class="text-center mb-4">
                                    <div class="text-3xl font-bold {{ $isFullyBooked ? 'text-red-600' : ($availableSpots <= 3 ? 'text-yellow-600' : 'text-green-600') }}">
                                        {{ number_format($bookingPercentage, 1) }}%
                                    </div>
                                    <div class="text-sm text-gray-600">Capacity Used</div>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                                    <div class="h-4 rounded-full transition-all duration-500 {{ $isFullyBooked ? 'bg-red-500' : ($availableSpots <= 3 ? 'bg-yellow-500' : 'bg-green-500') }}" 
                                         style="width: {{ $bookingPercentage }}%"></div>
                                </div>
                                
                                <!-- Visual Spots -->
                                <div class="flex flex-wrap gap-1 justify-center">
                                    @for($i = 1; $i <= $maxParticipants; $i++)
                                        <div class="w-3 h-3 rounded-full {{ $i <= $bookedSpots ? 'bg-red-400' : 'bg-green-400' }}" 
                                             title="{{ $i <= $bookedSpots ? 'Booked' : 'Available' }}"></div>
                                    @endfor
                                </div>
                                
                                <div class="flex justify-between text-xs text-gray-500 mt-2">
                                    <span>🔴 Booked</span>
                                    <span>🟢 Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">🏄‍♂️</div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No activities found</h3>
                        <p class="text-gray-500">No active activities are currently available.</p>
                    </div>
                @endforelse
            </div>

            <!-- Legend -->
            <div class="mt-8 bg-gray-50 rounded-xl p-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">📝 Legend</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-3">
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">✅ AVAILABLE</span>
                        <span class="text-sm text-gray-600">4+ spots remaining</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">⚠️ LIMITED SPOTS</span>
                        <span class="text-sm text-gray-600">1-3 spots remaining</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">🚫 FULLY BOOKED</span>
                        <span class="text-sm text-gray-600">No spots available</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
