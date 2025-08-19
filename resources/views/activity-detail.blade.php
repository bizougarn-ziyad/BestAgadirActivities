<x-layout>
    <!-- Activity Detail Hero Section -->
    <div class="relative pt-[107px] pb-20 bg-gradient-to-br from-orange-50 via-white to-blue-50">
        <!-- Breadcrumb -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-gray-700 hover:text-orange-600 cursor-pointer">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('activities') }}" class="ml-1 text-gray-700 hover:text-orange-600 cursor-pointer md:ml-2">Activities</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-orange-600 font-medium md:ml-2">{{ $activity->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Activity Hero Content -->
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-stretch max-w-4xl md:max-w-2xl lg:max-w-none mx-auto">
                <!-- Left Column - Image -->
                <div class="relative">
                    <div class="relative h-80 md:h-[500px] lg:h-full rounded-3xl overflow-hidden shadow-2xl">
                        @if($activity->hasImageData())
                            <img src="{{ $activity->image_data_url }}" alt="{{ $activity->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-200 to-orange-300 flex items-center justify-center">
                                <svg class="w-20 h-20 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Rating Badge -->
                        <div class="absolute top-6 left-6">
                            <div class="bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full flex items-center gap-2 shadow-md">
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-sm font-semibold text-gray-800">{{ $activity->average_rating }} ({{ $activity->review_count }} reviews)</span>
                            </div>
                        </div>

                        <!-- Add to Favorites Button -->
                        <button class="absolute top-6 right-6 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all duration-300 cursor-pointer group favorite-btn" data-activity-id="{{ $activity->id }}">
                            <svg class="w-5 h-5 heart-icon transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Column - Content -->
                <div class="space-y-10">
                    <div class="space-y-6">
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800">
                            {{ $activity->name }}
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            {{ $activity->bio }}
                        </p>
                    </div>

                    <!-- Activity Features -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Duration</p>
                                <p class="text-sm text-gray-600">Full Day</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Group Size</p>
                                <p class="text-sm text-gray-600">Small Group</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Guide</p>
                                <p class="text-sm text-gray-600">Professional</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Price</p>
                                <p class="text-sm text-gray-600">Best Value</p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Section -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Book This Experience</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-lg text-gray-600">Price per person</span>
                                <span class="text-3xl font-bold text-orange-600">${{ number_format($activity->price, 2) }}</span>
                            </div>
                            @auth
                                <a href="{{ route('activity.booking.form', $activity->id) }}" class="block w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl cursor-pointer text-center">
                                    Book Now
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-4 px-6 rounded-xl text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl cursor-pointer text-center">
                                    Login to Book
                                </a>
                            @endauth
                            <p class="text-sm text-gray-500 text-center">Free cancellation up to 24 hours before the activity</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Details Section -->
    <div class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- What's Included -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        What's Included
                    </h3>
                    <ul class="space-y-3">
                        @php
                            $whatsIncluded = \App\Services\ActivityContentService::getWhatsIncluded($activity->name);
                        @endphp
                        @foreach($whatsIncluded as $item)
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-700">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Important Information -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        Good to Know
                    </h3>
                    <ul class="space-y-3">
                        @php
                            $goodToKnow = \App\Services\ActivityContentService::getGoodToKnow($activity->name, $activity->price);
                            $iconTypes = ['clock', 'location', 'weather', 'cancel', 'users', 'info'];
                        @endphp
                        @foreach($goodToKnow as $index => $item)
                            <li class="flex items-start gap-3">
                                @php
                                    $iconType = $iconTypes[$index % count($iconTypes)];
                                @endphp
                                @if($iconType == 'clock')
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @elseif($iconType == 'location')
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                @elseif($iconType == 'weather')
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                    </svg>
                                @elseif($iconType == 'cancel')
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @elseif($iconType == 'users')
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @endif
                                <span class="text-gray-700">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">What Our Guests Say</h2>
                <p class="text-xl text-gray-600">Real experiences from real travelers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($activity->getDisplayReviews() as $review)
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <!-- Reviewer Info -->
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r {{ $review['color'] }} rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">{{ $review['initial'] }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $review['name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $review['time_ago'] }}</p>
                            </div>
                        </div>
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 0; $i < $review['rating']; $i++)
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            @endfor
                            @for($i = $review['rating']; $i < 5; $i++)
                                <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-4">"{{ $review['comment'] }}"</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Related Activities Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">You Might Also Like</h2>
                <p class="text-xl text-gray-600">Discover more amazing experiences in Agadir</p>
            </div>

            <div class="text-center">
                <a href="{{ route('activities') }}" class="inline-flex items-center bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl cursor-pointer">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    View All Activities
                </a>
            </div>
        </div>
    </div>
</x-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load favorite status for the activity when page loads
    loadFavoriteStatus();
    
    // Handle favorite button click
    const favoriteButton = document.querySelector('.favorite-btn');
    
    if (favoriteButton) {
        favoriteButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const activityId = this.dataset.activityId;
            const heartIcon = this.querySelector('.heart-icon');
            
            // First check if user is authenticated
            fetch('/auth-status')
                .then(response => response.json())
                .then(authData => {
                    if (!authData.authenticated) {
                        // User is not authenticated, redirect to login
                        window.location.href = '{{ route("login") }}';
                        return;
                    }
                    
                    // User is authenticated, proceed with toggle
                    this.disabled = true;
                    
                    fetch(`/favorites/toggle/${activityId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateHeartIcon(heartIcon, data.is_favorited);
                            
                            // Show success message
                            showToast(data.message);
                        } else if (data.redirect) {
                            // User is not authenticated, redirect to login
                            window.location.href = data.redirect;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred. Please try again.', 'error');
                    })
                    .finally(() => {
                        // Re-enable button
                        this.disabled = false;
                    });
                })
                .catch(error => {
                    console.error('Auth check error:', error);
                    // On error, redirect to login to be safe
                    window.location.href = '{{ route("login") }}';
                });
        });
    }
});

function loadFavoriteStatus() {
    const favoriteButton = document.querySelector('.favorite-btn');
    
    if (favoriteButton) {
        const activityId = favoriteButton.dataset.activityId;
        const heartIcon = favoriteButton.querySelector('.heart-icon');
        
        fetch(`/favorites/check/${activityId}`)
            .then(response => response.json())
            .then(data => {
                if (data.authenticated) {
                    updateHeartIcon(heartIcon, data.is_favorited);
                } else {
                    // User is not authenticated, show gray heart
                    heartIcon.classList.remove('text-red-500');
                    heartIcon.classList.add('text-gray-600');
                    heartIcon.setAttribute('fill', 'none');
                }
            })
            .catch(error => {
                console.error('Error loading favorite status:', error);
            });
    }
}

function updateHeartIcon(heartIcon, isFavorited) {
    if (isFavorited) {
        heartIcon.classList.remove('text-gray-600');
        heartIcon.classList.add('text-red-500');
        heartIcon.setAttribute('fill', 'currentColor');
    } else {
        heartIcon.classList.remove('text-red-500');
        heartIcon.classList.add('text-gray-600');
        heartIcon.setAttribute('fill', 'none');
    }
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
    toast.className = `fixed top-[120px] right-4 ${bgColor} text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => document.body.removeChild(toast), 300);
    }, 2000);
}
</script>
