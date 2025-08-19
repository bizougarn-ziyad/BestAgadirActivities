<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="errorAlert" class="alert alert-danger text-red-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 w-full">
            {{ session('error') }}
        </div>
    @endif
    <div class="pt-[107.05px] lg:max-w-[1200px] mx-auto md:h-[100dvh] flex justify-center md:flex-row">
        <div class="containerAll md:flex px-2 flex flex-col mx-auto md:gap-0 md:flex-row md:justify-around items-center xl:gap-8">
            <div class="container-description flex flex-col justify-center md:justify-normal items-center ">
            <div class=" md:h-[400px] xl:h-[500px] xl:w-full flex flex-col justify-center gap-5 xl:justify-between h-[calc(100dvh-90px)] items-center md:items-start ">
                <h1 class="text-center md:text-left font-bold px-1 text-[20px] xl:text-[55px] sm:text-[30px] xl:w-[750px] md:w-[430px] sm:w-[520px] lg:w-[550px] w-[300px]">Experience the <span class="text-orange-500 font-bold">real</span> Morocco, Right Here in Agadir!</h1>
                <p class="text-center md:text-left mt-3 text-[15px] px-3 xl:text-[22px] sm:text-[18px] xl:w-[750px] sm:w-[420px] lg:w-[450px] w-[300px]">Join us for an unforgettable journey through the vibrant culture, stunning landscapes, and rich history of Morocco, all from the comfort of Agadir.</p>
                <div class="flex justify-center md:justify-start mt-10 gap-1">
                    <div class="flex items-center px-5 gap-2">
                        <img src="{{ asset('images/star.png') }}" alt="Star-rating" class="w-[27px] xl:w-[35px]">
                        <div>
                            <p class="text-[13px] sm:text-[17px] xl:text-[20px] font-bold">4.8<span class="text-[11px] text-gray-600 font-normal">/5</span></p>
                            <p class="text-[11px] sm:text-[15px] xl:text-[18px] text-gray-600">Based on 1000+ reviews</p>
                        </div>
                    </div>
                    <div class="flex items-center px-4 gap-2">
                        <img src="{{ asset('images/price.png') }}" alt="price" class="w-[27px] xl:w-[40px]">
                        <div>
                            <p class="text-[13px] sm:text-[17px] font-bold">Fair Prices</p>
                            <p class="text-[11px] sm:text-[15px] xl:text-[18px] text-gray-600">No tourist markup</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center md:justify-start mt-15">
                    <a href="{{ route('activities') }}" class="bg-orange-500 text-white px-6 py-2 sm:py-4 sm:px-7 rounded-[10px] hover:bg-orange-400 transition duration-300 cursor-pointer">Our Activities &#10230;</a>
                </div>
            </div>
        </div>

        <div class="container-activities flex flex-col justify-center lg:justify-normal md:mt-[30px]  h-[calc(100dvh)] sm:h-auto lg:w-[380px]">
            <h2 class="text-[18px] font-bold text-center mb-5 text-orange-500 md:hidden">Best Selling Activities</h2>
            <div class="swiper mySwiper w-[320px] h-[500px] lg:w-[350px] xl:w-[380px] xl:h-[583px] shadow-[0_1px_25px_rgba(0,0,0,0.1)] rounded-lg">
                <div class="swiper-wrapper">
                    @if(isset($sliderActivities) && $sliderActivities->count() > 0)
                        @foreach($sliderActivities as $index => $activity)
                        <div class="swiper-slide">
                            <div class="rounded-2xl px-3 py-1 text-center text-white bg-green-400 absolute right-4 top-2 z-10 text-[13px] xl:text-[17px] font-semibold min-w-[60px]">{{ number_format($activity->price, 0) }}€</div>
                            
                            @if($activity->hasImageData())
                                <img src="{{ $activity->image_data_url }}" alt="{{ $activity->name }}" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px] w-full">
                            @else
                                @php
                                    $images = ['activity1.jpg', 'activity2.jpg', 'activity3.jpg'];
                                    $currentImage = $images[$index % count($images)];
                                @endphp
                                <img src="{{ asset('images/' . $currentImage) }}" alt="{{ $activity->name }}" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px]">
                            @endif
                            
                            <div class="mt-5 flex justify-center items-center gap-2">
                                <img src="{{ asset('images/secondstar.png') }}" alt="ratings" class="w-[15px] ">
                                <p class="text-[13px] xl:text-[17px] font-bold m-0 p-0">{{ $activity->average_rating }} <span class="text-gray-400 font-normal">({{ $activity->review_count }} ratings)</span></p>
                            </div>
                            
                            <div class="flex flex-col px-4 mt-7 gap-2">
                                <p class="text-[13px] xl:text-[17px] font-bold">{{ $activity->name }}</p>
                                <p class="text-[13px] xl:text-[17px] text-gray-600">{{ $activity->bio }}</p>
                            </div>
                            
                            <div class="flex justify-between items-center px-4 mt-5 gap-3">
                                <a href="{{ route('activity.detail', $activity->id) }}" class="bg-white text-black border border-gray-500 px-6 py-1 rounded-[20px] hover:bg-gray-200 transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer text-center">Details</a>
                                @auth
                                    <a href="{{ route('activity.booking.form', $activity->id) }}" class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] cursor-pointer w-[50%] text-center">Book Now</a>
                                @else
                                    <a href="{{ route('login') }}" class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] cursor-pointer w-[50%] text-center">Login to Book</a>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static slides if no activities found -->
                    <div class="swiper-slide">
                        <div class="rounded-2xl px-3 py-1 text-center text-white bg-green-400 absolute right-4 top-2 z-10 text-[13px] xl:text-[17px] font-semibold min-w-[60px]">25€</div>
                        <img src="{{ asset('images/activity1.jpg') }}" alt="Activity 1" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px]">
                        
                        <div class="mt-5 flex justify-center items-center gap-2">
                            <img src="{{ asset('images/secondstar.png') }}" alt="ratings" class="w-[15px] ">
                            <p class="text-[13px] xl:text-[17px] font-bold m-0 p-0">4.3 <span class="text-gray-400 font-normal">(45 ratings)</span></p>
                        </div>
                        
                        <div class="flex flex-col px-4 mt-7 gap-2">
                            <p class="text-[13px] xl:text-[17px] font-bold">Desert Adventure Experience</p>
                            <p class="text-[13px] xl:text-[17px] text-gray-600">Enjoy an amazing desert adventure with multiple activities.</p>
                        </div>
                        
                        <div class="flex justify-between items-center px-4 mt-5 gap-3">
                            <a href="{{ route('activities') }}" class="bg-white text-black border border-gray-500 px-6 py-1 rounded-[20px] hover:bg-gray-200 transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer text-center">Details</a>
                            <a href="{{ route('activities') }}" class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] cursor-pointer w-[50%] text-center">Book Now</a>
                        </div>
                    </div>
                @endif
                </div>
                <div class="swiper-button-prev after:text-black"></div>
                <div class="swiper-button-next after:text-black"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        </div>
        
    </div>

<!--// Date and Travelers Selection Section-->

<div class="max-w-[1200px] mx-auto sm:mt-[150px] mt-[50px] ">
    <h2 class="text-[16px] sm:text-[20px] md:text-[27px] xl:text-[29px] font-bold text-center text-orange-500 mb-[50px]">Variety of cheap Activities. One simple search.</h2>
    <div class="relative flex justify-center gap-2 lg:gap-5 max-w-[1200px] mx-auto">
        <!-- Date Selection Button -->
        <div>
            <button id="datePickerBtn" class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-700 hover:border-gray-400 focus:outline-none h-[80px] sm:w-[150px] text-left md:w-[200px] lg:w-[270px] cursor-pointer">
                <span id="date" class="text-[17px] lg:text-[20px]">Select a date</span>
                <span id="selectedDateDisplay" class="block text-gray-500 text-[13px] lg:text-[15px]"></span>
            </button>
            <!-- Calendar Container -->
            <div id="calendarContainer" class="hidden absolute left-[50%] top-[100%] translate-x-[-50%] mt-2 z-50 bg-white rounded-xl shadow-lg p-4 w-80">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <button id="prevMonth" class="text-gray-500 hover:text-black text-xl cursor-pointer">&larr;</button>
                    <h2 id="monthYear" class="text-lg font-semibold"></h2>
                    <button id="nextMonth" class="text-gray-500 hover:text-black text-xl cursor-pointer">&rarr;</button>
                </div>

                <!-- Days of Week -->
                <div class="grid grid-cols-7 text-center text-sm font-medium text-gray-500 mb-2">
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                    <div>Sun</div>
                </div>

                <!-- Calendar Grid -->
                <div id="calendarDays" class="grid grid-cols-7 text-center gap-1 text-sm"></div>
            </div>
        </div>

        <!-- Travelers Selection Button -->
        <div class="relative">
            <button id="travelersBtn" class="bg-white border border-gray-300 rounded-lg px-2 text-gray-700 hover:border-gray-400 focus:outline-none h-[80px] w-[110px] sm:w-[150px] text-left md:w-[200px] lg:w-[270px] cursor-pointer">
                <span id="Title" class="text-[17px] lg:text-[20px]">Participants</span>
                <span id="travelersCount" class="text-gray-500 block  text-[13px] lg:text-[15px]">1 Adult</span>
            </button>
            <!-- Travelers Dropdown -->
            <div id="travelersDropdown"  class="hidden absolute left-[50%] translate-x-[-50%] mt-2 z-50 bg-white rounded-xl shadow-lg p-4 w-80">
                <div class="space-y-4">
                    <!-- Adults -->
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">Adults</p>
                            <p class="text-sm text-gray-500">Aged 18+</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="decrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center cursor-pointer" data-type="adults">-</button>
                            <span class="w-6 text-center" id="adultsCount">2</span>
                            <button class="incrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center cursor-pointer" data-type="adults">+</button>
                        </div>
                    </div>
                    
                    <!-- Children -->
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">Children</p>
                            <p class="text-sm text-gray-500">Aged 0-17</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="decrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center cursor-pointer" data-type="children">-</button>
                            <span class="w-6 text-center" id="childrenCount">0</span>
                            <button class="incrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center cursor-pointer" data-type="children">+</button>
                        </div>
                    </div>
                    <!-- Apply Button - Now inside the dropdown -->
                    <div class="pt-4 border-t border-gray-200">
                        <button id="applyTravelers" class="w-full bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition duration-300 sm:w-[100px] cursor-pointer">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Button -->
        <button id="searchBtn" class="bg-orange-500 text-white px-3 py-2 rounded-lg hover:bg-orange-400 transition duration-300 w-[80px] sm:w-[120px] md:w-[200px] lg:w-[220px] text-left cursor-pointer">
            Search
        </button>    
    </div>
    <div class="max-w-[1200px] mx-auto px-5 relative">
        <img src="{{ asset('images/marina_agadir.avif') }}" alt="Marina Agadir" class="w-full h-[400px] xl:h-[500px] object-cover mt-[70px] rounded-lg shadow-lg blur-[2px]">
        <p class="font-bold absolute left-10 lg:left-15 top-20 lg:top-30 text-white bg-transparent text-[17px] sm:text-[25px] lg:text-[30px]">Can't decide ? <br>Explore every activity in the city</p>
        <a href="{{ route('activities') }}" class="bg-orange-500 text-white px-2 py-3 rounded-lg hover:bg-orange-400 transition duration-300 absolute left-10 lg:left-15 top-60 sm:text-[22px] text-[15px]">Search activities all over Agadir &rarr;</a>
    </div>
</div>

<!-- Luxurious Activities Showcase Section - Hidden on mobile -->
<div class="bg-gradient-to-br from-orange-50 via-white to-blue-50 py-20 mt-[200px] hidden md:block">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full mb-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-500">Luxurious</span> Experiences
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Immerse yourself in the finest activities Agadir has to offer. From desert adventures to coastal escapes, every moment is crafted for unforgettable memories.</p>
        </div>

        @if($activities->count() > 0)
            <!-- Activities Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($activities as $activity)
                    <div class="group relative bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl cursor-pointer">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            @if($activity->hasImageData())
                                <img src="{{ $activity->image_data_url }}" alt="{{ $activity->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-orange-200 to-orange-300 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Price Badge -->
                            <div class="absolute top-4 right-4">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                    {{ number_format($activity->price, 0) }}€
                                </div>
                            </div>
                            
                            <!-- Rating Badge -->
                            <div class="absolute top-4 left-4">
                                <div class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full flex items-center gap-1 shadow-md">
                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-gray-800">4.{{ rand(7, 9) }}</span>
                                </div>
                            </div>

                            <!-- Favorite Button -->
                            <button class="absolute bottom-4 right-4 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md cursor-pointer favorite-btn transition-all duration-300 hover:scale-110" data-activity-id="{{ $activity->id }}">
                                <svg class="w-5 h-5 heart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                {{ $activity->name }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                {{ Str::limit($activity->bio, 120) }}
                            </p>
                            
                            <!-- Activity Features -->
                            <div class="flex items-center gap-4 mb-6 text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Full Day</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span>Small Group</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-3">
                                <a href="{{ route('activity.detail', $activity->id) }}" class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-xl shadow-md cursor-pointer text-center">
                                    View Details
                                </a>
                                @auth
                                    <a href="{{ route('activity.booking.form', $activity->id) }}" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-4 rounded-xl shadow-md cursor-pointer text-center">
                                        Book Now
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-4 rounded-xl shadow-md cursor-pointer text-center">
                                        Login to Book
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <div class="inline-flex items-center justify-center">
                    <a href="{{ route('activities') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-4 px-8 rounded-full shadow-xl flex items-center gap-3 cursor-pointer">
                        <span>Explore All Activities</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <!-- No Activities Placeholder -->
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-orange-100 to-orange-200 rounded-full mb-8">
                    <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Amazing Activities Coming Soon</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">We're curating the most extraordinary experiences in Agadir. Stay tuned for luxury adventures that will take your breath away.</p>
            </div>
        @endif
    </div>
</div>

<div class="bg-orange-500  h-[300px] mt-[200px] w-full flex flex-col justify-between items-center">
    <div class="w-full px-5 flex justify-center items-center py-10 sm:gap-6 gap-4">
        <img src="{{ asset('images/facebook.png') }}" alt="" class="w-[40px] cursor-pointer">
        <img src="{{ asset('images/x.png') }}" alt="" class="w-[40px] cursor-pointer">
        <img src="{{ asset('images/instagram.png') }}" alt="" class="w-[40px] cursor-pointer">
        <img src="{{ asset('images/tik-tok.png') }}" alt="" class="w-[40px] cursor-pointer">
        <img src="{{ asset('images/youtube.png') }}" alt="" class="w-[40px] cursor-pointer">
    </div>
    <div class="items-center text-left text-white mb-[15px]">
        <p class="text-[13px]"><img src="{{ asset('images/stars-4.5.svg') }}" alt="" class="inline-block w-[70px] align-middle sm:w-[100px]">&nbsp &nbsp | 4.5 rating |&nbsp &nbsp 156,182 reviews &nbsp <img src="{{ asset('images/trustpilot.png') }}" alt="" class="inline-block ml-1 w-[20px] align-bottom sm:w-[30px]"> <span class="text-[13px]">TrustPilot</span></p>
    </div>
    <div class="mb-[30px]">
        <p class="text-center text-white text-[13px] mt-3">© 2025 Best Agadir Activity. All rights reserved.</p>
        <p class="text-center text-white text-[13px]">Terms of Service | Privacy Policy</p>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load favorite status for all activities when page loads
    loadFavoriteStatuses();
    
    // Handle favorite button clicks
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
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
    });
});

function loadFavoriteStatuses() {
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    favoriteButtons.forEach(button => {
        const activityId = button.dataset.activityId;
        const heartIcon = button.querySelector('.heart-icon');
        
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
    });
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
</x-layout>
