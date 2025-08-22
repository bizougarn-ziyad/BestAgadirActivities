<x-layout>
    <!-- Booking Form Hero Section -->
    <div class="relative pt-[107px] pb-12 bg-gradient-to-br from-orange-50 via-white to-blue-50">
        <!-- Breadcrumb -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 md:mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm md:text-base">
                    <li class="inline-flex items-center">
                        <a href="/" class="text-gray-700 hover:text-orange-600 cursor-pointer">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('activities') }}" class="ml-1 text-gray-700 hover:text-orange-600 cursor-pointer md:ml-2 breadcrumb-text">Activities</a>
                        </div>
                    </li>
                    <li class="hidden sm:block">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('activity.detail', $activity->id) }}" class="ml-1 text-gray-700 hover:text-orange-600 cursor-pointer md:ml-2 breadcrumb-text">{{ $activity->name }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-orange-600 font-medium md:ml-2">Book Now</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Page Header -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:pt-15">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-orange-500 mb-2 md:mb-4">Complete Your Booking</h1>
            <p class="text-base sm:text-lg md:text-xl text-orange-400 px-2">Follow the steps below to secure your spot for an amazing experience</p>
        </div>
    </div>

    <!-- Main Booking Container -->
    <div class="bg-white py-8 md:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Progress Steps -->
            <div class="mb-8 md:mb-16">
                <!-- Mobile Progress Steps (Vertical) -->
                <div class="block md:hidden mb-6">
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</div>
                            <div class="ml-3 flex-1">
                                <span class="text-orange-600 font-semibold text-sm">Activity Info</span>
                                <div class="w-full h-0.5 bg-orange-200 mt-1"></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</div>
                            <div class="ml-3 flex-1">
                                <span class="text-orange-600 font-semibold text-sm">Booking Details</span>
                                <div class="w-full h-0.5 bg-orange-200 mt-1"></div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold text-sm">3</div>
                            <div class="ml-3 flex-1">
                                <span class="text-gray-500 font-semibold text-sm">Confirmation</span>
                                <div class="w-full h-0.5 bg-gray-200 mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Desktop Progress Steps (Horizontal) -->
                <div class="hidden md:flex justify-center items-center space-x-4 mb-8">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">1</div>
                        <span class="ml-2 text-orange-600 font-semibold">Activity Info</span>
                    </div>
                    <div class="w-12 h-0.5 bg-orange-200"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">2</div>
                        <span class="ml-2 text-orange-600 font-semibold">Booking Details</span>
                    </div>
                    <div class="w-12 h-0.5 bg-orange-200"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center font-bold">3</div>
                        <span class="ml-2 text-gray-500 font-semibold">Confirmation</span>
                    </div>
                </div>
            </div>

            <!-- Activity Overview Card -->
            <div class="bg-gradient-to-r from-blue-50 to-orange-50 rounded-2xl md:rounded-3xl p-4 sm:p-6 md:p-8 mb-8 md:mb-12 shadow-lg border border-gray-100">
                <div class="space-y-4 md:space-y-6">
                    <!-- Activity Details -->
                    <div class="text-center">
                        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-2 md:mb-4">{{ $activity->name }}</h2>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base md:text-lg px-2">{{ $activity->bio }}</p>
                    </div>
                    
                    <!-- Mobile Layout (Stacked) -->
                    <div class="block md:hidden space-y-4">
                        <div class="flex justify-center">
                            <div class="flex items-center gap-2 text-orange-600 bg-white px-4 py-2 rounded-xl shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xl sm:text-2xl font-bold">${{ number_format($activity->price, 2) }}</span>
                                <span class="text-sm sm:text-base opacity-80">per person</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-6">
                            <div class="flex items-center justify-center gap-2 text-green-600 bg-white px-3 py-2 rounded-lg shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium text-sm">Free Cancellation</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-green-600 bg-white px-3 py-2 rounded-lg shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium text-sm">Instant Confirmation</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Desktop Layout (Original) -->
                    <div class="hidden md:flex flex-wrap justify-center gap-8">
                        <div class="flex items-center gap-2 text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-2xl font-bold">${{ number_format($activity->price, 2) }}</span>
                            <span class="text-lg opacity-80">per person</span>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium">Free Cancellation</span>
                            </div>
                            <div class="flex items-center gap-2 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium">Instant Confirmation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-red-800">Please fix the following issues:</h3>
                    </div>
                    <ul class="text-red-700 space-y-2">
                        @foreach($errors->all() as $error)
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <p class="text-red-800 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Booking Form -->
            <form action="{{ route('activity.book', $activity->id) }}" method="POST" id="bookingForm" class="space-y-8">
                @csrf
                
                <!-- Step 1: Number of Participants -->
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 md:p-6 text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 md:w-8 md:h-8 bg-white/20 rounded-full flex items-center justify-center">
                                <span class="font-bold text-xs md:text-sm">1</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold">Select Number of Participants</h3>
                        </div>
                    </div>
                    
                    <div class="p-4 md:p-8">
                        <!-- Hidden Select Input -->
                        <select id="participants" name="participants" required onchange="updatePrice()" class="hidden">
                            @for($i = 1; $i <= min(20, $activity->max_participants); $i++)
                                <option value="{{ $i }}" {{ old('participants', 1) == $i ? 'selected' : '' }}>
                                    {{ $i }} {{ $i == 1 ? 'Person' : 'People' }}
                                </option>
                            @endfor
                        </select>
                        
                        <!-- Participants Grid -->
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4" id="participantsGrid">
                            @for($i = 1; $i <= min(20, $activity->max_participants); $i++)
                                <div class="participant-option border-2 border-gray-200 rounded-xl md:rounded-2xl p-3 md:p-4 text-center hover:border-orange-300 hover:bg-orange-50 transition-all duration-300 cursor-pointer {{ old('participants', 1) == $i ? 'border-orange-500 bg-orange-50' : '' }}" 
                                     data-value="{{ $i }}" onclick="selectParticipants({{ $i }})">
                                    <div class="w-6 h-6 md:w-8 md:h-8 mx-auto mb-1 md:mb-2 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                        </svg>
                                    </div>
                                    <div class="text-sm md:text-lg font-bold text-gray-800">{{ $i }}</div>
                                    <div class="text-xs md:text-sm text-gray-600">{{ $i == 1 ? 'Person' : 'People' }}</div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Step 2: Select Date -->
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 md:p-6 text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 md:w-8 md:h-8 bg-white/20 rounded-full flex items-center justify-center">
                                <span class="font-bold text-xs md:text-sm">2</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold">Choose Your Date</h3>
                        </div>
                    </div>
                    
                    <div class="p-4 md:p-8">
                        <!-- Quick Date Selection -->
                        <div class="mb-6">
                            <h4 class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4">Quick Select</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                                <button type="button" class="quick-select-btn bg-orange-100 hover:bg-orange-200 text-orange-700 px-3 py-2 md:px-4 md:py-3 rounded-lg md:rounded-xl font-medium transition-all duration-300 text-sm md:text-base" data-days="0">
                                    Today
                                </button>
                                <button type="button" class="quick-select-btn bg-orange-100 hover:bg-orange-200 text-orange-700 px-3 py-2 md:px-4 md:py-3 rounded-lg md:rounded-xl font-medium transition-all duration-300 text-sm md:text-base" data-days="1">
                                    Tomorrow
                                </button>
                                <button type="button" class="quick-select-btn bg-orange-100 hover:bg-orange-200 text-orange-700 px-3 py-2 md:px-4 md:py-3 rounded-lg md:rounded-xl font-medium transition-all duration-300 text-sm md:text-base" data-days="7">
                                    Next Week
                                </button>
                                <button type="button" class="quick-select-btn bg-orange-100 hover:bg-orange-200 text-orange-700 px-3 py-2 md:px-4 md:py-3 rounded-lg md:rounded-xl font-medium transition-all duration-300 text-sm md:text-base" data-days="14">
                                    In 2 Weeks
                                </button>
                            </div>
                        </div>

                        <!-- Date Display -->
                        <div class="mb-6">
                            <label class="text-base md:text-lg font-semibold text-gray-800 mb-3 md:mb-4 block">Or Select Custom Date</label>
                            <input type="hidden" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                            <div id="dateDisplay" class="w-full px-4 py-3 md:px-6 md:py-4 text-base md:text-lg border-2 border-gray-200 rounded-xl md:rounded-2xl cursor-pointer hover:border-blue-300 transition-all duration-300 bg-gradient-to-r from-gray-50 to-white">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3 md:gap-4">
                                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg">
                                            <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-base md:text-lg font-bold text-gray-800" id="selectedDateText">Select a date</div>
                                            <div class="text-xs md:text-sm text-gray-600">Click to open calendar</div>
                                        </div>
                                    </div>
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Calendar Container -->
                        <div id="calendarDropdown" class="hidden mt-4 bg-white rounded-xl shadow-lg border border-gray-200 p-3 md:p-4">
                            <!-- Calendar Header -->
                            <div class="flex items-center justify-between mb-3 md:mb-4">
                                <button type="button" id="prevMonth" class="w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </button>
                                <div class="text-center">
                                    <h3 id="calendarMonth" class="text-base md:text-lg font-bold text-gray-800"></h3>
                                    <p id="calendarYear" class="text-xs md:text-sm text-gray-600"></p>
                                </div>
                                <button type="button" id="nextMonth" class="w-8 h-8 md:w-10 md:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Days of Week -->
                            <div class="grid grid-cols-7 gap-1 mb-2">
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Sun</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Mon</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Tue</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Wed</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Thu</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Fri</div>
                                <div class="text-center py-2 text-sm font-medium text-gray-500">Sat</div>
                            </div>
                            
                            <!-- Calendar Days -->
                            <div id="calendarDays" class="grid grid-cols-7 gap-1"></div>
                        </div>

                        <!-- Availability Information Display -->
                        <div id="availabilityDisplay" class="mt-4 md:mt-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl md:rounded-2xl p-4 md:p-6 border border-blue-200 hidden">
                            <h4 class="text-base md:text-lg font-bold text-gray-800 mb-3 md:mb-4 flex items-center gap-2 md:gap-3">
                                <div class="w-6 h-6 md:w-8 md:h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">Daily Availability Information</span>
                            </h4>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 mb-3 md:mb-4">
                                <div class="bg-white rounded-lg md:rounded-xl p-3 md:p-4 border border-blue-100">
                                    <div class="text-xs md:text-sm text-gray-600 mb-1">Max Capacity</div>
                                    <div class="text-xl md:text-2xl font-bold text-blue-600" id="maxCapacity">{{ $activity->max_participants }}</div>
                                </div>
                                <div class="bg-white rounded-lg md:rounded-xl p-3 md:p-4 border border-blue-100">
                                    <div class="text-xs md:text-sm text-gray-600 mb-1">Already Booked</div>
                                    <div class="text-xl md:text-2xl font-bold text-orange-600" id="bookedSpots">-</div>
                                </div>
                                <div class="bg-white rounded-lg md:rounded-xl p-3 md:p-4 border border-blue-100">
                                    <div class="text-xs md:text-sm text-gray-600 mb-1">Still Available</div>
                                    <div class="text-xl md:text-2xl font-bold text-green-600" id="availableSpots">-</div>
                                </div>
                            </div>

                            <!-- Availability Status Bar -->
                            <div class="bg-white rounded-lg md:rounded-xl p-3 md:p-4 border border-blue-100">
                                <div class="flex justify-between items-center mb-2 md:mb-3">
                                    <span class="text-xs md:text-sm font-semibold text-gray-700">Booking Status</span>
                                    <span class="text-xs md:text-sm font-bold" id="bookingPercentage">0%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 md:h-3 mb-2 md:mb-3">
                                    <div id="progressBar" class="h-2 md:h-3 rounded-full transition-all duration-500 bg-green-500" style="width: 0%"></div>
                                </div>
                                <div id="availabilityStatus" class="text-center">
                                    <div class="flex items-center justify-center gap-2 text-blue-700 text-xs md:text-sm">
                                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>Select a date to see availability</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Booking Summary & Confirmation -->
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-4 md:p-6 text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 md:w-8 md:h-8 bg-white/20 rounded-full flex items-center justify-center">
                                <span class="font-bold text-xs md:text-sm">3</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold">Review Booking & Confirm</h3>
                        </div>
                    </div>
                    
                    <div class="p-4 md:p-8">
                        <!-- Booking Summary -->
                        <div class="bg-gradient-to-br from-orange-50 to-blue-50 rounded-xl md:rounded-2xl p-4 md:p-6 mb-6 md:mb-8">
                            <h4 class="text-base md:text-lg font-bold text-gray-800 mb-3 md:mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Booking Summary
                            </h4>
                            
                            <div class="space-y-3 md:space-y-4">
                                <div class="flex justify-between items-center py-2 md:py-3 border-b border-gray-200">
                                    <span class="text-sm md:text-base text-gray-600">Activity</span>
                                    <span class="font-semibold text-gray-800 text-sm md:text-base text-right">{{ $activity->name }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-2 md:py-3 border-b border-gray-200">
                                    <span class="text-sm md:text-base text-gray-600">Participants</span>
                                    <span class="font-semibold text-gray-800 text-sm md:text-base" id="summaryParticipants">1 Person</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-2 md:py-3 border-b border-gray-200">
                                    <span class="text-sm md:text-base text-gray-600">Date</span>
                                    <span class="font-semibold text-gray-800 text-sm md:text-base text-right" id="summaryDate">Not selected</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-2 md:py-3 border-b border-gray-200">
                                    <span class="text-sm md:text-base text-gray-600">Price per person</span>
                                    <span class="font-semibold text-gray-800 text-sm md:text-base">${{ number_format($activity->price, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 md:py-4 bg-white rounded-lg md:rounded-xl px-3 md:px-4 border-2 border-orange-200">
                                    <span class="text-base md:text-lg font-bold text-gray-800">Total Amount</span>
                                    <span class="text-xl md:text-2xl font-bold text-orange-600" id="totalPrice">${{ number_format($activity->price, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Submit -->
                        <div class="space-y-4 md:space-y-6">
                            <div class="flex items-start gap-3">
                                <input type="checkbox" id="terms" name="terms" required class="w-4 h-4 md:w-5 md:h-5 text-orange-500 border-2 border-gray-300 rounded focus:ring-orange-500 mt-0.5">
                                <label for="terms" class="text-xs md:text-sm text-gray-600 leading-relaxed">
                                    I agree to the <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Terms and Conditions</a> and <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Privacy Policy</a>
                                </label>
                            </div>
                            
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-3 px-6 md:py-4 md:px-8 rounded-xl md:rounded-2xl transition-all duration-300 transform hover:scale-105 focus:ring-4 focus:ring-orange-200 shadow-lg hover:shadow-xl">
                                <!-- Mobile Layout (Stacked) -->
                                <div class="flex flex-col items-center gap-1 md:hidden">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        <span class="text-base font-bold">Secure Your Booking Now</span>
                                    </div>
                                    <span class="text-lg font-bold" id="submitButtonPrice">${{ number_format($activity->price, 2) }}</span>
                                </div>
                                
                                <!-- Desktop Layout (Inline) -->
                                <div class="hidden md:flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    <span class="text-lg">Secure Your Booking Now</span>
                                    <span class="text-lg font-bold" id="submitButtonPriceDesktop">${{ number_format($activity->price, 2) }}</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Calendar variables
        let currentDate = new Date();
        let selectedDate = null;
        const minDate = new Date();
        
        // Month names
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        function updatePrice() {
            const participants = document.getElementById('participants').value || 1;
            const pricePerPerson = {{ $activity->price }};
            const totalPrice = participants * pricePerPerson;
            
            // Update summary section
            document.getElementById('summaryParticipants').textContent = participants == 1 ? '1 Person' : `${participants} People`;
            document.getElementById('totalPrice').textContent = '$' + totalPrice.toFixed(2);
            document.getElementById('submitButtonPrice').textContent = '$' + totalPrice.toFixed(2);
            document.getElementById('submitButtonPriceDesktop').textContent = '$' + totalPrice.toFixed(2);
        }

        // Participants selection function
        function selectParticipants(count) {
            // Update hidden select
            document.getElementById('participants').value = count;
            
            // Update UI - remove selected class from all options
            document.querySelectorAll('.participant-option').forEach(option => {
                option.classList.remove('border-orange-500', 'bg-orange-50');
                option.classList.add('border-gray-200');
            });
            
            // Add selected class to clicked option
            const selectedOption = document.querySelector(`[data-value="${count}"]`);
            if (selectedOption) {
                selectedOption.classList.add('border-orange-500', 'bg-orange-50');
                selectedOption.classList.remove('border-gray-200');
            }
            
            // Update price
            updatePrice();
        }

        // Calendar Functions
        function toggleCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            const isVisible = !dropdown.classList.contains('hidden');
            
            if (isVisible) {
                hideCalendar();
            } else {
                showCalendar();
            }
        }

        function showCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            dropdown.classList.remove('hidden');
            renderCalendar();
        }

        function hideCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            dropdown.classList.add('hidden');
        }

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            // Update header
            document.getElementById('calendarMonth').textContent = monthNames[month];
            document.getElementById('calendarYear').textContent = year;
            
            // Get first day of month and number of days
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            // Clear existing days
            const daysContainer = document.getElementById('calendarDays');
            daysContainer.innerHTML = '';
            
            // Add empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'h-10';
                daysContainer.appendChild(emptyDay);
            }
            
            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('button');
                dayElement.type = 'button';
                dayElement.textContent = day;
                
                const dayDate = new Date(year, month, day);
                const dateString = dayDate.toISOString().split('T')[0];
                const isToday = dayDate.toDateString() === new Date().toDateString();
                const isPast = dayDate < minDate;
                const isSelected = selectedDate && dayDate.toDateString() === selectedDate.toDateString();
                
                // Base classes
                let classes = 'h-10 w-10 rounded-lg text-sm font-medium transition-all duration-300';
                
                if (isPast) {
                    classes += ' text-gray-300 cursor-not-allowed bg-gray-50';
                    dayElement.disabled = true;
                } else if (isSelected) {
                    classes += ' bg-orange-500 text-white shadow-md';
                } else if (isToday) {
                    classes += ' bg-blue-500 text-white hover:bg-blue-600';
                } else {
                    classes += ' text-gray-700 hover:bg-orange-100 hover:text-orange-700';
                }
                
                dayElement.className = classes;
                
                if (!isPast) {
                    dayElement.addEventListener('click', () => selectDate(dayDate));
                }
                
                daysContainer.appendChild(dayElement);
            }
        }

        function selectDate(date) {
            selectedDate = date;
            const formattedDate = date.toISOString().split('T')[0];
            document.getElementById('booking_date').value = formattedDate;
            
            // Update display
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('selectedDateText').textContent = date.toLocaleDateString('en-US', options);
            document.getElementById('summaryDate').textContent = date.toLocaleDateString('en-US', options);
            
            // Show availability display section
            const availabilityDisplay = document.getElementById('availabilityDisplay');
            availabilityDisplay.classList.remove('hidden');
            
            // Re-render calendar to show selection
            renderCalendar();
            
            // Check availability for the selected date
            checkAvailability(formattedDate);
            
            // Hide calendar after selection
            setTimeout(hideCalendar, 300);
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            renderCalendar();
        }

        function selectQuickDate(daysFromToday) {
            const date = new Date();
            date.setDate(date.getDate() + daysFromToday);
            selectDate(date);
        }

        // Function to check availability for a specific date
        function checkAvailability(date) {
            // Show loading state
            const availabilityStatus = document.getElementById('availabilityStatus');
            if (availabilityStatus) {
                availabilityStatus.innerHTML = `
                    <div class="flex items-center gap-2 text-blue-700 text-sm">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Checking availability...</span>
                    </div>
                `;

                // Make AJAX request to check availability
                fetch(`{{ route('activity.check.availability') }}?activity_id={{ $activity->id }}&date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateAvailabilityDisplay(data);
                        } else {
                            showAvailabilityError(data.error || 'Failed to check availability');
                        }
                    })
                    .catch(error => {
                        console.error('Error checking availability:', error);
                        showAvailabilityError('Unable to check availability. Please try again.');
                    });
            }
        }

        // Function to update availability display
        function updateAvailabilityDisplay(data) {
            const availabilityStatus = document.getElementById('availabilityStatus');
            if (!availabilityStatus) return;

            const isFullyBooked = data.is_fully_booked;
            const isLimited = data.available_spots <= 3 && data.available_spots > 0;

            // Update the individual display elements
            document.getElementById('maxCapacity').textContent = data.max_participants;
            document.getElementById('bookedSpots').textContent = data.booked_spots;
            document.getElementById('availableSpots').textContent = data.available_spots;
            document.getElementById('bookingPercentage').textContent = data.booking_percentage + '%';

            // Update progress bar
            const progressBar = document.getElementById('progressBar');
            progressBar.style.width = data.booking_percentage + '%';

            let statusClass = 'text-green-700';
            let statusText = 'Available';
            let statusIcon = '✅';
            let barColor = 'bg-green-500';

            if (isFullyBooked) {
                statusClass = 'text-red-700';
                statusText = 'Fully Booked';
                statusIcon = '🚫';
                barColor = 'bg-red-500';
            } else if (isLimited) {
                statusClass = 'text-yellow-700';
                statusText = 'Limited Spots';
                statusIcon = '⚠️';
                barColor = 'bg-yellow-500';
            }

            // Update progress bar color
            progressBar.className = `h-3 rounded-full transition-all duration-500 ${barColor}`;

            // Update availability status
            availabilityStatus.innerHTML = `
                <div class="flex items-center justify-center gap-2 ${statusClass} font-medium">
                    <span class="text-lg">${statusIcon}</span>
                    <span>${statusText}</span>
                    <span class="text-sm opacity-75">(${data.available_spots} spots remaining)</span>
                </div>
                ${isFullyBooked ? 
                    '<p class="text-red-600 text-sm mt-2 text-center">This date is fully booked. Please select another date.</p>' : 
                    isLimited ? 
                        '<p class="text-yellow-600 text-sm mt-2 text-center">Only a few spots left! Book soon to secure your place.</p>' :
                        '<p class="text-green-600 text-sm mt-2 text-center">Great availability! Perfect time to book your experience.</p>'
                }
            `;
        }

        // Function to show availability error
        function showAvailabilityError(message) {
            const availabilityStatus = document.getElementById('availabilityStatus');
            if (availabilityStatus) {
                availabilityStatus.innerHTML = `
                    <div class="flex items-center gap-2 text-red-700 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>${message}</span>
                    </div>
                `;
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updatePrice();
            
            // Set up calendar event listeners
            document.getElementById('dateDisplay').addEventListener('click', toggleCalendar);
            document.getElementById('prevMonth').addEventListener('click', () => changeMonth(-1));
            document.getElementById('nextMonth').addEventListener('click', () => changeMonth(1));
            
            // Quick select buttons
            document.querySelectorAll('.quick-select-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const days = parseInt(btn.dataset.days);
                    selectQuickDate(days);
                });
            });
            
            // Close calendar when clicking outside
            document.addEventListener('click', function(e) {
                const calendar = document.getElementById('calendarDropdown');
                const display = document.getElementById('dateDisplay');
                
                if (!calendar.contains(e.target) && !display.contains(e.target)) {
                    hideCalendar();
                }
            });
            
            // Initialize with old values if they exist
            const oldDate = "{{ old('booking_date') }}";
            if (oldDate) {
                selectDate(new Date(oldDate));
            }
            
            const oldParticipants = "{{ old('participants', 1) }}";
            if (oldParticipants) {
                selectParticipants(parseInt(oldParticipants));
            }
        });
    </script>

    <!-- Mobile-Specific Styling -->
    <style>
        /* Improve calendar grid on mobile */
        @media (max-width: 640px) {
            #calendarDays button {
                min-height: 40px;
                font-size: 14px;
            }
            
            /* Better spacing for participant options */
            .participant-option {
                min-height: 70px;
            }
            
            /* Improve touch targets */
            .quick-select-btn {
                min-height: 44px;
            }
            
            /* Better calendar visibility */
            #calendarDropdown {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) !important;
                width: 90vw;
                max-width: 350px;
                z-index: 9999;
                max-height: 80vh;
                overflow-y: auto;
            }
            
            /* Calendar overlay */
            #calendarDropdown.fixed-overlay::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: -1;
            }
            
            /* Better breadcrumb on mobile */
            .breadcrumb-text {
                max-width: 120px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        
        /* Smooth transitions for mobile interactions */
        .participant-option:active {
            transform: scale(0.95);
        }
        
        .quick-select-btn:active {
            transform: scale(0.95);
        }
        
        /* Better form section spacing on mobile */
        @media (max-width: 768px) {
            .form-section {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</x-layout>
