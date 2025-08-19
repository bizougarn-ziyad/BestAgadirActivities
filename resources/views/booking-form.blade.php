<x-layout>
    <!-- Booking Form Hero Section -->
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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('activity.detail', $activity->id) }}" class="ml-1 text-gray-700 hover:text-orange-600 cursor-pointer md:ml-2">{{ $activity->name }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-orange-600 font-medium md:ml-2">Book Now</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Booking Content -->
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start max-w-4xl md:max-w-2xl lg:max-w-none mx-auto">
                
                <!-- Left Column - Activity Image & Info -->
                <div class="relative">
                    <div class="relative h-80 md:h-[500px] lg:h-[600px] rounded-3xl overflow-hidden shadow-2xl mb-8">
                        @if($activity->hasImageData())
                            <img src="{{ $activity->image_data_url }}" alt="{{ $activity->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-200 to-orange-300 flex items-center justify-center">
                                <svg class="w-20 h-20 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Overlay with activity info -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                            <div class="absolute bottom-0 left-0 right-0 p-8">
                                <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">{{ $activity->name }}</h1>
                                <div class="flex items-center gap-4 text-white/90">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-2xl font-bold">${{ number_format($activity->price, 2) }}</span>
                                        <span class="text-lg opacity-80">per person</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Description Card -->
                    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            About This Activity
                        </h3>
                        <p class="text-gray-600 leading-relaxed">{{ $activity->bio }}</p>
                        
                        <!-- Activity Features -->
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="flex items-center gap-3 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">Free Cancellation</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">Instant Confirmation</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">Mobile Tickets</span>
                            </div>
                            <div class="flex items-center gap-3 text-green-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-medium">Small Groups</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Booking Form -->
                <div class="lg:sticky lg:top-8">
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

                    <!-- Booking Form Card -->
                    <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-8 text-white">
                            <h2 class="text-3xl font-bold mb-2">Book Your Experience</h2>
                            <p class="text-orange-100">Select your preferences and secure your spot</p>
                        </div>

                        <!-- Form Content -->
                        <form action="{{ route('activity.book', $activity->id) }}" method="POST" id="bookingForm" class="p-8">
                            @csrf
                            
                            <!-- Participants Selection -->
                            <div class="mb-8">
                                <label for="participants" class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                        </svg>
                                    </div>
                                    Number of Participants
                                </label>
                                
                                <!-- Custom Participants Picker Container -->
                                <div class="relative">
                                    <!-- Hidden Select Input -->
                                    <select id="participants" name="participants" required onchange="updatePrice()" class="hidden">
                                        @for($i = 1; $i <= min(20, $activity->max_participants); $i++)
                                            <option value="{{ $i }}" {{ old('participants', 1) == $i ? 'selected' : '' }}>
                                                {{ $i }} {{ $i == 1 ? 'Person' : 'People' }}
                                            </option>
                                        @endfor
                                    </select>
                                    
                                    <!-- Custom Participants Display -->
                                    <div id="participantsDisplay" class="w-full px-6 py-4 text-lg border-2 border-gray-200 rounded-2xl focus-within:border-orange-500 focus-within:ring-4 focus-within:ring-orange-100 transition-all duration-300 bg-gradient-to-r from-gray-50 to-white hover:from-white hover:to-gray-50 cursor-pointer group">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div id="selectedParticipantsText" class="text-lg font-semibold text-gray-700">
                                                        1 Person
                                                    </div>
                                                    <div id="selectedParticipantsSubtext" class="text-sm text-gray-500">
                                                        Choose number of participants
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-orange-500 group-hover:text-orange-600 transition-colors duration-300">
                                                <svg class="w-6 h-6 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Custom Participants Dropdown -->
                                    <div id="participantsDropdown" class="absolute top-full left-0 right-0 mt-1 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible transform scale-95 transition-all duration-300 z-50 max-h-40 overflow-y-auto">
                                        <div class="p-2">
                                            <!-- Participants Grid -->
                                            <div class="grid grid-cols-3 gap-2 mb-2">
                                                @for($i = 1; $i <= min(20, $activity->max_participants); $i++)
                                                    <button type="button" 
                                                            class="participant-option w-full px-3 py-3 text-sm font-medium border-2 border-gray-200 rounded-lg hover:border-orange-300 hover:bg-orange-50 transition-all duration-300 text-gray-700 hover:text-orange-700 {{ $i == 1 ? 'border-orange-500 bg-orange-100 text-orange-700' : '' }}"
                                                            data-value="{{ $i }}"
                                                            onclick="selectParticipants({{ $i }})">
                                                        <div class="flex flex-col items-center gap-1">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                @if($i == 1)
                                                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                                                @else
                                                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                                                @endif
                                                            </svg>
                                                            <span class="text-xs font-bold">{{ $i }}</span>
                                                            <span class="text-xs opacity-75">{{ $i == 1 ? 'Person' : 'People' }}</span>
                                                        </div>
                                                    </button>
                                                @endfor
                                            </div>
                                            
                                            <!-- Popular Choices -->
                                            <div class="pt-2 border-t border-gray-200">
                                                <p class="text-xs text-gray-500 mb-2 text-center">Popular choices</p>
                                                <div class="flex justify-center gap-2">
                                                    <button type="button" class="popular-choice-btn px-3 py-1 text-xs font-medium bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100 transition-all duration-300" onclick="selectParticipants(2)">2 People</button>
                                                    <button type="button" class="popular-choice-btn px-3 py-1 text-xs font-medium bg-green-50 text-green-700 rounded-md hover:bg-green-100 transition-all duration-300" onclick="selectParticipants(4)">4 People</button>
                                                    <button type="button" class="popular-choice-btn px-3 py-1 text-xs font-medium bg-purple-50 text-purple-700 rounded-md hover:bg-purple-100 transition-all duration-300" onclick="selectParticipants(6)">6 People</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @error('participants')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Date Selection -->
                            <div class="mb-8">
                                <label for="booking_date" class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Select Your Date
                                </label>
                                
                                <!-- Custom Date Picker Container -->
                                <div class="relative">
                                    <!-- Date Input (Hidden) -->
                                    <input type="date" id="booking_date" name="booking_date" 
                                           value="{{ old('booking_date') }}" 
                                           min="{{ date('Y-m-d') }}" required class="hidden">
                                    
                                    <!-- Custom Date Display -->
                                    <div id="dateDisplay" class="w-full px-6 py-4 text-lg border-2 border-gray-200 rounded-2xl focus-within:border-orange-500 focus-within:ring-4 focus-within:ring-orange-100 transition-all duration-300 bg-gradient-to-r from-gray-50 to-white hover:from-white hover:to-gray-50 cursor-pointer group">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div id="selectedDateText" class="text-lg font-semibold text-gray-700">
                                                        Choose your preferred date
                                                    </div>
                                                    <div id="selectedDateSubtext" class="text-sm text-gray-500">
                                                        Select from available dates
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-orange-500 group-hover:text-orange-600 transition-colors duration-300">
                                                <svg class="w-6 h-6 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Custom Calendar Dropdown -->
                                    <div id="calendarDropdown" class="absolute top-full left-0 right-0 mt-1 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible transform scale-95 transition-all duration-300 z-50">
                                        <div class="p-2">
                                            <!-- Calendar Header -->
                                            <div class="flex items-center justify-between mb-1">
                                                <button type="button" id="prevMonth" class="w-6 h-6 rounded-md bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-3 h-3 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                    </svg>
                                                </button>
                                                <div class="text-center">
                                                    <h3 id="calendarMonth" class="text-xs font-bold text-gray-800"></h3>
                                                    <p id="calendarYear" class="text-xs text-gray-600"></p>
                                                </div>
                                                <button type="button" id="nextMonth" class="w-6 h-6 rounded-md bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-3 h-3 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <!-- Days of Week -->
                                            <div class="grid grid-cols-7 gap-1 mb-1">
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">S</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">M</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">T</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">W</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">T</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">F</div>
                                                <div class="text-center py-1 text-xs font-medium text-gray-500">S</div>
                                            </div>
                                            
                                            <!-- Calendar Days -->
                                            <div id="calendarDays" class="grid grid-cols-7 gap-1 mb-2">
                                                <!-- Days will be populated by JavaScript -->
                                            </div>
                                            
                                            <!-- Quick Select Options -->
                                            <div class="pt-1 border-t border-gray-200">
                                                <div class="flex justify-center gap-1">
                                                    <button type="button" class="quick-select-btn px-2 py-1 text-xs font-medium bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100 transition-all duration-300" data-days="0">Today</button>
                                                    <button type="button" class="quick-select-btn px-2 py-1 text-xs font-medium bg-green-50 text-green-700 rounded-md hover:bg-green-100 transition-all duration-300" data-days="1">Tomorrow</button>
                                                    <button type="button" class="quick-select-btn px-2 py-1 text-xs font-medium bg-purple-50 text-purple-700 rounded-md hover:bg-purple-100 transition-all duration-300" data-days="7">Next Week</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @error('booking_date')
                                    <p class="text-red-500 text-sm mt-2 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Availability Information -->
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl mb-8 border-2 border-blue-200" id="availabilitySection">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                        </svg>
                                    </div>
                                    Availability Information
                                </h4>
                                <div class="space-y-3 text-gray-700" id="availabilityContent">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm">Maximum participants per day:</span>
                                        <span class="text-sm font-semibold">{{ $activity->max_participants }}</span>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg border border-blue-200" id="availabilityStatus">
                                        <div class="flex items-center gap-2 text-blue-700 text-sm">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Once you select a date, we'll show real-time availability for that specific day.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Summary -->
                            <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl mb-8 border-2 border-orange-200">
                                <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    Booking Summary
                                </h4>
                                <div class="space-y-3 text-gray-700">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg">Price per person:</span>
                                        <span class="text-lg font-semibold">${{ number_format($activity->price, 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg">Number of participants:</span>
                                        <span class="text-lg font-semibold" id="participantCount">1</span>
                                    </div>
                                    <div class="border-t border-orange-300 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xl font-bold text-gray-800">Total Amount:</span>
                                            <span class="text-2xl font-bold text-orange-600" id="totalPrice">${{ number_format($activity->price, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-bold py-6 px-8 rounded-2xl text-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Book Now & Pay Securely
                            </button>

                            <!-- Security Notice -->
                            <p class="text-center text-gray-500 text-sm mt-4 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Secure payment powered by Stripe
                            </p>
                        </form>
                    </div>

                    <!-- Cancellation Policy -->
                    <div class="bg-gray-50 rounded-2xl p-6 mt-8">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Cancellation Policy
                        </h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Free cancellation up to 24 hours before the activity starts. For cancellations within 24 hours, no refund will be provided.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom participants dropdown styling */
        .participant-option.selected {
            border-color: #f97316;
            background-color: #fed7aa;
            color: #ea580c;
        }
        
        .participant-option:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Scrollbar styling for participants dropdown */
        #participantsDropdown::-webkit-scrollbar {
            width: 6px;
        }
        
        #participantsDropdown::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        #participantsDropdown::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        #participantsDropdown::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Animation for dropdown arrow */
        .group:hover .transform {
            transform: rotate(180deg) scale(1.1);
        }
    </style>

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
            
            document.getElementById('participantCount').textContent = participants;
            document.getElementById('totalPrice').textContent = '$' + totalPrice.toFixed(2);
        }

        // Custom Participants Functions
        function toggleParticipantsDropdown() {
            const dropdown = document.getElementById('participantsDropdown');
            const isVisible = dropdown.classList.contains('opacity-100');
            
            if (isVisible) {
                hideParticipantsDropdown();
            } else {
                showParticipantsDropdown();
            }
        }

        function showParticipantsDropdown() {
            const dropdown = document.getElementById('participantsDropdown');
            dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.add('opacity-100', 'visible', 'scale-100');
        }

        function hideParticipantsDropdown() {
            const dropdown = document.getElementById('participantsDropdown');
            dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.remove('opacity-100', 'visible', 'scale-100');
        }

        function selectParticipants(count) {
            // Update hidden select
            document.getElementById('participants').value = count;
            
            // Update display text
            const text = count === 1 ? '1 Person' : `${count} People`;
            document.getElementById('selectedParticipantsText').textContent = text;
            
            // Update subtext with helpful message
            let subtextMessage = '';
            if (count === 1) {
                subtextMessage = 'Solo adventure - Perfect for self-discovery!';
            } else if (count === 2) {
                subtextMessage = 'Couples experience - Romantic and intimate!';
            } else if (count <= 4) {
                subtextMessage = 'Small group - Great for friends and family!';
            } else if (count <= 8) {
                subtextMessage = 'Medium group - Perfect for team building!';
            } else {
                subtextMessage = 'Large group - Amazing group experience!';
            }
            
            document.getElementById('selectedParticipantsSubtext').textContent = subtextMessage;
            
            // Update button states
            document.querySelectorAll('.participant-option').forEach(btn => {
                btn.classList.remove('selected', 'border-orange-500', 'bg-orange-100', 'text-orange-700');
                btn.classList.add('border-gray-200', 'text-gray-700');
            });
            
            // Highlight selected option
            const selectedBtn = document.querySelector(`[data-value="${count}"]`);
            if (selectedBtn) {
                selectedBtn.classList.add('selected', 'border-orange-500', 'bg-orange-100', 'text-orange-700');
                selectedBtn.classList.remove('border-gray-200', 'text-gray-700');
            }
            
            // Update price
            updatePrice();
            
            // Hide dropdown after selection
            setTimeout(hideParticipantsDropdown, 300);
        }

        // Custom Calendar Functions
        function toggleCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            const isVisible = dropdown.classList.contains('opacity-100');
            
            if (isVisible) {
                hideCalendar();
            } else {
                showCalendar();
            }
        }

        function showCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.add('opacity-100', 'visible', 'scale-100');
            renderCalendar();
        }

        function hideCalendar() {
            const dropdown = document.getElementById('calendarDropdown');
            dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.remove('opacity-100', 'visible', 'scale-100');
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
                emptyDay.className = 'h-12';
                daysContainer.appendChild(emptyDay);
            }
            
            // Check availability for all days in the month
            checkMonthAvailability(year, month, daysInMonth, daysContainer);
        }

        function checkMonthAvailability(year, month, daysInMonth, daysContainer) {
            // Create date range for the month
            const startDate = new Date(year, month, 1).toISOString().split('T')[0];
            const endDate = new Date(year, month, daysInMonth).toISOString().split('T')[0];
            
            // Fetch availability for the entire month
            fetch(`{{ route('activity.check.month.availability') }}?activity_id={{ $activity->id }}&start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    renderDaysWithAvailability(year, month, daysInMonth, daysContainer, data.availability || {});
                })
                .catch(error => {
                    console.error('Error checking month availability:', error);
                    // Fallback to render days without availability data
                    renderDaysWithAvailability(year, month, daysInMonth, daysContainer, {});
                });
        }

        function renderDaysWithAvailability(year, month, daysInMonth, daysContainer, availability) {
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
                const dayAvailability = availability[dateString];
                const isFullyBooked = dayAvailability && dayAvailability.is_fully_booked;
                const isLimited = dayAvailability && dayAvailability.available_spots <= 3 && dayAvailability.available_spots > 0;
                
                // Base classes - ultra compact for better visibility
                let classes = 'h-8 w-8 rounded-lg text-xs font-medium transition-all duration-300 relative overflow-hidden';
                
                if (isPast) {
                    classes += ' text-gray-300 cursor-not-allowed bg-gray-50';
                    dayElement.disabled = true;
                } else if (isFullyBooked) {
                    classes += ' text-red-400 cursor-not-allowed bg-red-50 line-through';
                    dayElement.disabled = true;
                    dayElement.title = 'Fully booked - No spots available';
                } else if (isSelected) {
                    classes += ' bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-sm transform scale-105';
                } else if (isToday) {
                    classes += ' bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 shadow-sm';
                } else if (isLimited) {
                    classes += ' text-yellow-700 bg-yellow-100 hover:bg-yellow-200 hover:scale-105 border border-yellow-300';
                    dayElement.title = `Limited spots: ${dayAvailability.available_spots} remaining`;
                } else {
                    classes += ' text-gray-700 hover:bg-gradient-to-r hover:from-orange-100 hover:to-orange-200 hover:text-orange-700 hover:scale-105';
                }
                
                dayElement.className = classes;
                
                if (!isPast && !isFullyBooked) {
                    dayElement.addEventListener('click', () => selectDate(dayDate));
                    
                    // Add ripple effect
                    dayElement.addEventListener('click', function(e) {
                        const ripple = document.createElement('span');
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        const x = e.clientX - rect.left - size / 2;
                        const y = e.clientY - rect.top - size / 2;
                        
                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = x + 'px';
                        ripple.style.top = y + 'px';
                        ripple.className = 'absolute bg-white bg-opacity-30 rounded-full animate-ping';
                        
                        this.appendChild(ripple);
                        setTimeout(() => ripple.remove(), 600);
                    });
                }
                
                // Add special styling for weekends if not booked
                const dayOfWeek = dayDate.getDay();
                if ((dayOfWeek === 0 || dayOfWeek === 6) && !isPast && !isSelected && !isFullyBooked && !isLimited) { // Sunday or Saturday
                    dayElement.classList.add('bg-gradient-to-r', 'from-purple-50', 'to-purple-100', 'text-purple-700');
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
            
            // Update subtext with relative date
            const today = new Date();
            const diffTime = date - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            let subtextMessage = '';
            if (diffDays === 0) {
                subtextMessage = 'Today - Get ready for an amazing experience!';
            } else if (diffDays === 1) {
                subtextMessage = 'Tomorrow - Just one day away!';
            } else if (diffDays <= 7) {
                subtextMessage = `In ${diffDays} days - Perfect timing!`;
            } else {
                subtextMessage = 'Advance booking - Great choice!';
            }
            
            document.getElementById('selectedDateSubtext').textContent = subtextMessage;
            
            // Re-render calendar to show selection
            renderCalendar();
            
            // Check availability for the selected date
            checkAvailability(formattedDate);
            
            // Hide calendar after selection
            setTimeout(hideCalendar, 300);
        }

        // Function to reset availability state
        function resetAvailabilityState() {
            // Reset submit button to enabled state
            const submitButton = document.getElementById('bookingForm').querySelector('button[type="submit"]');
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            submitButton.classList.add('hover:from-orange-600', 'hover:to-orange-700', 'hover:scale-105');
            
            // Reset all participant options to enabled
            const participantOptions = document.querySelectorAll('.participant-option');
            participantOptions.forEach(option => {
                option.disabled = false;
                option.classList.remove('opacity-50', 'cursor-not-allowed');
                option.classList.add('hover:border-orange-300', 'hover:bg-orange-50');
            });
            
            // DON'T clear availabilityContent as it contains the availabilityStatus element
            // Just ensure the status is reset to a neutral state
            const availabilityStatus = document.getElementById('availabilityStatus');
            if (availabilityStatus) {
                availabilityStatus.innerHTML = `
                    <div class="flex items-center gap-2 text-blue-700 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <span>Checking availability...</span>
                    </div>
                `;
            }
        }

        // Function to check availability for a specific date
        function checkAvailability(date) {
            // Clear previous state immediately
            resetAvailabilityState();
            
            // Show loading state
            const availabilityStatus = document.getElementById('availabilityStatus');
            availabilityStatus.innerHTML = `
                <div class="flex items-center gap-2 text-blue-700 text-sm">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Checking availability for selected date...</span>
                </div>
            `;

            // Make AJAX request to check availability
            fetch(`{{ route('activity.check.availability') }}?activity_id={{ $activity->id }}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Availability check response for', date, ':', data);
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

        // Function to update availability display
        function updateAvailabilityDisplay(data) {
            const availabilityContent = document.getElementById('availabilityContent');
            const submitButton = document.getElementById('bookingForm').querySelector('button[type="submit"]');
            const isFullyBooked = data.is_fully_booked;
            const isLimited = data.available_spots <= 3 && data.available_spots > 0;

            // Always reset state first
            resetAvailabilityState();

            let statusClass = 'border-green-200 bg-green-50';
            let statusText = 'Available';
            let statusIcon = '✅';
            let textClass = 'text-green-700';

            if (isFullyBooked) {
                statusClass = 'border-red-200 bg-red-50';
                statusText = 'Fully Booked';
                statusIcon = '🚫';
                textClass = 'text-red-700';
                // Disable submit button
                submitButton.disabled = true;
                submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                submitButton.classList.remove('hover:from-orange-600', 'hover:to-orange-700', 'hover:scale-105');
            } else {
                // Ensure submit button is enabled for available dates
                submitButton.disabled = false;
                submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                submitButton.classList.add('hover:from-orange-600', 'hover:to-orange-700', 'hover:scale-105');
                
                if (isLimited) {
                    statusClass = 'border-yellow-200 bg-yellow-50';
                    statusText = 'Limited Spots';
                    statusIcon = '⚠️';
                    textClass = 'text-yellow-700';
                }
            }

            availabilityContent.innerHTML = `
                <div class="flex justify-between items-center">
                    <span class="text-sm">Maximum participants per day:</span>
                    <span class="text-sm font-semibold">${data.max_participants}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm">Currently booked:</span>
                    <span class="text-sm font-semibold">${data.booked_spots}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm">Still available:</span>
                    <span class="text-sm font-semibold ${data.available_spots <= 3 ? 'text-orange-600' : 'text-green-600'}">${data.available_spots}</span>
                </div>
                <div class="bg-white p-3 rounded-lg border ${statusClass}" id="availabilityStatus">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2 ${textClass} text-sm font-medium">
                            <span>${statusIcon}</span>
                            <span>${statusText}</span>
                        </div>
                        <span class="${textClass} text-sm font-bold">${data.booking_percentage}% Full</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="h-2 rounded-full transition-all duration-500 ${isFullyBooked ? 'bg-red-500' : isLimited ? 'bg-yellow-500' : 'bg-green-500'}" 
                             style="width: ${data.booking_percentage}%"></div>
                    </div>
                    ${isFullyBooked ? 
                        '<p class="text-red-600 text-xs mt-2">This date is fully booked. Please select another date.</p>' : 
                        isLimited ? 
                            '<p class="text-yellow-600 text-xs mt-2">Only a few spots left! Book soon to secure your place.</p>' :
                            '<p class="text-green-600 text-xs mt-2">Great availability! Perfect time to book your experience.</p>'
                    }
                </div>
            `;

            // Update max participants in the dropdown if needed
            updateParticipantsDropdown(data.available_spots, data.max_participants);
        }

        // Function to show availability error
        function showAvailabilityError(message) {
            const availabilityStatus = document.getElementById('availabilityStatus');
            availabilityStatus.innerHTML = `
                <div class="flex items-center gap-2 text-red-700 text-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span>${message}</span>
                </div>
            `;
        }

        // Function to update participants dropdown based on availability
        function updateParticipantsDropdown(availableSpots, maxParticipants) {
            console.log('Updating participants dropdown - Available spots:', availableSpots, 'Max:', maxParticipants);
            
            const participantOptions = document.querySelectorAll('.participant-option');
            participantOptions.forEach(option => {
                const value = parseInt(option.dataset.value);
                if (value > availableSpots) {
                    option.disabled = true;
                    option.classList.add('opacity-50', 'cursor-not-allowed');
                    option.classList.remove('hover:border-orange-300', 'hover:bg-orange-50');
                } else {
                    option.disabled = false;
                    option.classList.remove('opacity-50', 'cursor-not-allowed');
                    option.classList.add('hover:border-orange-300', 'hover:bg-orange-50');
                }
            });
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

        // Initialize calendar on page load
        document.addEventListener('DOMContentLoaded', function() {
            updatePrice();
            
            // Set up participants dropdown event listeners
            document.getElementById('participantsDisplay').addEventListener('click', toggleParticipantsDropdown);
            
            // Close participants dropdown when clicking outside
            document.addEventListener('click', function(e) {
                const participantsDropdown = document.getElementById('participantsDropdown');
                const participantsDisplay = document.getElementById('participantsDisplay');
                
                if (!participantsDropdown.contains(e.target) && !participantsDisplay.contains(e.target)) {
                    hideParticipantsDropdown();
                }
            });
            
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
                checkAvailability(oldDate);
            }
            
            const oldParticipants = "{{ old('participants', 1) }}";
            if (oldParticipants) {
                selectParticipants(parseInt(oldParticipants));
            }
        });
    </script>
</x-layout>
