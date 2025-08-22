<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="errorAlert" class="alert alert-danger text-red-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 mb-2">📅 Booking Management</h1>
                    <p class="text-gray-600">Manage all activity bookings and monitor availability</p>
                </div>
                
                <!-- Advanced Filter Section -->
                <div class="mt-6 lg:mt-0">
                    <div class="bg-gradient-to-br from-orange-50 via-yellow-50 to-orange-100 border-2 border-orange-200 rounded-2xl p-6 shadow-lg backdrop-blur-sm">
                        <h3 class="text-lg font-bold text-orange-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filter Bookings
                        </h3>
                        
                        <form method="GET" action="{{ route('admin.bookings.index') }}" class="space-y-4">
                            <!-- Activity Selection Dropdown -->
                            <div class="relative">
                                <label class="text-sm font-bold text-orange-800 mb-2 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    Activity Selection
                                </label>
                                <div class="relative group">
                                    <select name="activity_id" id="activitySelect" 
                                            class="w-full bg-gradient-to-r from-orange-50 via-white to-orange-50 border-2 border-orange-300 rounded-xl px-4 py-3 pr-12 text-gray-800 font-medium focus:ring-4 focus:ring-orange-200 focus:border-orange-500 focus:bg-gradient-to-r focus:from-orange-100 focus:to-orange-50 transition-all duration-300 appearance-none shadow-lg hover:shadow-xl hover:border-orange-400 cursor-pointer group-hover:bg-gradient-to-r group-hover:from-orange-100 group-hover:to-orange-50">
                                        <option value="" class="bg-white text-gray-600 py-2">🎯 All Activities</option>
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}" 
                                                    {{ $activityId == $activity->id ? 'selected' : '' }}
                                                    class="bg-white text-gray-800 py-3 hover:bg-orange-50">
                                                🏃‍♂️ {{ $activity->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <!-- Enhanced Custom Dropdown Arrow -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300">
                                            <svg class="w-4 h-4 text-white transition-transform duration-300 group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Range Selection -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
                                <div class="relative">
                                    <label class="text-sm font-bold text-orange-800 mb-3 flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center shadow-lg date-label-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <span>From Date</span>
                                    </label>
                                    
                                    <!-- Hidden actual input -->
                                    <input type="date" name="start_date" value="{{ $startDate }}" id="start_date_input" class="hidden">
                                    
                                    <!-- Custom Date Display -->
                                    <div id="startDateDisplay" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-gray-800 font-medium bg-gradient-to-r from-white to-gray-50 border-2 border-orange-300 rounded-2xl focus-within:border-orange-500 focus-within:ring-4 focus-within:ring-orange-200 transition-all duration-300 shadow-lg hover:shadow-xl hover:border-orange-400 cursor-pointer group min-h-[56px] flex items-center justify-between">
                                        <div class="flex items-center gap-2 sm:gap-4 flex-1 min-w-0">
                                            <!-- Calendar icon hidden on mobile, shown on sm and up -->
                                            <div class="hidden sm:flex w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div id="startDateText" class="text-sm sm:text-base font-semibold text-gray-700 break-words">
                                                    {{ $startDate ? \Carbon\Carbon::parse($startDate)->format('M d, Y') : 'Select start date' }}
                                                </div>
                                                <div class="text-xs sm:text-sm text-gray-500">Choose from date</div>
                                            </div>
                                        </div>
                                        <div class="text-orange-500 group-hover:text-orange-600 transition-colors duration-300 flex-shrink-0">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Custom Calendar Dropdown for Start Date -->
                                    <div id="startCalendarDropdown" class="absolute top-full left-0 right-0 lg:left-auto lg:right-auto lg:w-[400px] mt-1 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible transform scale-95 transition-all duration-300 z-50">
                                        <div class="p-4 lg:h-[300px] lg:overflow-y-auto">
                                            <!-- Calendar Header -->
                                            <div class="flex items-center justify-between mb-4">
                                                <button type="button" id="startPrevMonth" class="w-8 h-8 lg:w-10 lg:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                    </svg>
                                                </button>
                                                <div class="text-center">
                                                    <h3 id="startCalendarMonth" class="text-lg lg:text-xl font-bold text-gray-800"></h3>
                                                    <p id="startCalendarYear" class="text-sm lg:text-base text-gray-600"></p>
                                                </div>
                                                <button type="button" id="startNextMonth" class="w-8 h-8 lg:w-10 lg:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <!-- Days of Week -->
                                            <div class="grid grid-cols-7 gap-1 lg:gap-2 mb-2 lg:mb-3">
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Sun</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Mon</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Tue</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Wed</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Thu</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Fri</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Sat</div>
                                            </div>
                                            
                                            <!-- Calendar Days -->
                                            <div id="startCalendarDays" class="grid grid-cols-7 gap-1 lg:gap-2 mb-4 lg:mb-6">
                                                <!-- Days will be populated by JavaScript -->
                                            </div>
                                            
                                            <!-- Quick Select Options -->
                                            <div class="pt-3 lg:pt-4 border-t border-gray-200">
                                                <div class="flex justify-center gap-2 lg:gap-3">
                                                    <button type="button" class="start-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all duration-300" data-days="0">Today</button>
                                                    <button type="button" class="start-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-all duration-300" data-days="-7">Last Week</button>
                                                    <button type="button" class="start-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-all duration-300" data-days="-30">Last Month</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="text-sm font-bold text-orange-800 mb-3 flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center shadow-lg date-label-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <span>To Date</span>
                                    </label>
                                    
                                    <!-- Hidden actual input -->
                                    <input type="date" name="end_date" value="{{ $endDate }}" id="end_date_input" class="hidden">
                                    
                                    <!-- Custom Date Display -->
                                    <div id="endDateDisplay" class="w-full px-4 sm:px-6 py-3 sm:py-4 text-gray-800 font-medium bg-gradient-to-r from-white to-gray-50 border-2 border-orange-300 rounded-2xl focus-within:border-orange-500 focus-within:ring-4 focus-within:ring-orange-200 transition-all duration-300 shadow-lg hover:shadow-xl hover:border-orange-400 cursor-pointer group min-h-[56px] flex items-center justify-between">
                                        <div class="flex items-center gap-2 sm:gap-4 flex-1 min-w-0">
                                            <!-- Calendar icon hidden on mobile, shown on sm and up -->
                                            <div class="hidden sm:flex w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300 flex-shrink-0">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div id="endDateText" class="text-sm sm:text-base font-semibold text-gray-700 break-words">
                                                    {{ $endDate ? \Carbon\Carbon::parse($endDate)->format('M d, Y') : 'Select end date' }}
                                                </div>
                                                <div class="text-xs sm:text-sm text-gray-500">Choose to date</div>
                                            </div>
                                        </div>
                                        <div class="text-orange-500 group-hover:text-orange-600 transition-colors duration-300 flex-shrink-0">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 transform group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Custom Calendar Dropdown for End Date -->
                                    <div id="endCalendarDropdown" class="absolute top-full left-0 right-0 lg:left-auto lg:right-auto lg:w-[400px] mt-1 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible transform scale-95 transition-all duration-300 z-50">
                                        <div class="p-4 lg:h-[300px] lg:overflow-y-auto">
                                            <!-- Calendar Header -->
                                            <div class="flex items-center justify-between mb-4">
                                                <button type="button" id="endPrevMonth" class="w-8 h-8 lg:w-10 lg:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                    </svg>
                                                </button>
                                                <div class="text-center">
                                                    <h3 id="endCalendarMonth" class="text-lg lg:text-xl font-bold text-gray-800"></h3>
                                                    <p id="endCalendarYear" class="text-sm lg:text-base text-gray-600"></p>
                                                </div>
                                                <button type="button" id="endNextMonth" class="w-8 h-8 lg:w-10 lg:h-10 rounded-lg bg-gray-100 hover:bg-orange-100 flex items-center justify-center transition-all duration-300">
                                                    <svg class="w-4 h-4 lg:w-5 lg:h-5 text-gray-600 hover:text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                            <!-- Days of Week -->
                                            <div class="grid grid-cols-7 gap-1 lg:gap-2 mb-2 lg:mb-3">
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Sun</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Mon</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Tue</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Wed</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Thu</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Fri</div>
                                                <div class="text-center py-2 lg:py-3 text-sm lg:text-base font-medium lg:font-semibold text-gray-500">Sat</div>
                                            </div>
                                            
                                            <!-- Calendar Days -->
                                            <div id="endCalendarDays" class="grid grid-cols-7 gap-1 lg:gap-2 mb-4 lg:mb-6">
                                                <!-- Days will be populated by JavaScript -->
                                            </div>
                                            
                                            <!-- Quick Select Options -->
                                            <div class="pt-3 lg:pt-4 border-t border-gray-200">
                                                <div class="flex justify-center gap-2 lg:gap-3">
                                                    <button type="button" class="end-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all duration-300" data-days="0">Today</button>
                                                    <button type="button" class="end-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-all duration-300" data-days="7">Next Week</button>
                                                    <button type="button" class="end-quick-select px-3 py-1 lg:px-4 lg:py-2 text-xs lg:text-sm font-medium bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition-all duration-300" data-days="30">Next Month</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                                <button type="submit" 
                                        class="flex-1 bg-gradient-to-r from-orange-500 via-orange-600 to-red-500 hover:from-orange-600 hover:via-orange-700 hover:to-red-600 text-white px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl font-bold flex items-center justify-center gap-2 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span>Apply Filters</span>
                                </button>
                                <a href="{{ route('admin.bookings.index') }}" 
                                   class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg font-bold flex items-center justify-center gap-2 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-180 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    <span>Reset All</span>
                                </a>
                            </div>

                            <!-- Quick Filter Chips -->
                            <div class="pt-3 border-t border-orange-200">
                                <p class="text-xs font-semibold text-orange-700 mb-2 uppercase tracking-wide">Quick Filters:</p>
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('admin.bookings.index', ['start_date' => \Carbon\Carbon::now()->toDateString(), 'end_date' => \Carbon\Carbon::now()->toDateString()]) }}" 
                                       class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold transition-colors">
                                        📅 Today
                                    </a>
                                    <a href="{{ route('admin.bookings.index', ['start_date' => \Carbon\Carbon::now()->startOfWeek()->toDateString(), 'end_date' => \Carbon\Carbon::now()->endOfWeek()->toDateString()]) }}" 
                                       class="bg-green-100 hover:bg-green-200 text-green-800 px-3 py-1 rounded-full text-xs font-semibold transition-colors">
                                        📅 This Week
                                    </a>
                                    <a href="{{ route('admin.bookings.index', ['start_date' => \Carbon\Carbon::now()->startOfMonth()->toDateString(), 'end_date' => \Carbon\Carbon::now()->endOfMonth()->toDateString()]) }}" 
                                       class="bg-purple-100 hover:bg-purple-200 text-purple-800 px-3 py-1 rounded-full text-xs font-semibold transition-colors">
                                        📅 This Month
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile-Optimized Summary Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 sm:p-6 rounded-xl border border-blue-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-blue-600 text-xs sm:text-sm font-medium mb-1">Total Bookings</p>
                            <p class="text-2xl sm:text-3xl font-bold text-blue-800">{{ $totalBookings }}</p>
                        </div>
                        <div class="text-3xl sm:text-4xl text-blue-500">📊</div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 sm:p-6 rounded-xl border border-green-200">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-green-600 text-xs sm:text-sm font-medium mb-1">Total Participants</p>
                            <p class="text-2xl sm:text-3xl font-bold text-green-800">{{ $totalParticipants }}</p>
                        </div>
                        <div class="text-3xl sm:text-4xl text-green-500">👥</div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 sm:p-6 rounded-xl border border-purple-200 sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-purple-600 text-xs sm:text-sm font-medium mb-1">Total Revenue</p>
                            <p class="text-2xl sm:text-3xl font-bold text-purple-800">${{ number_format($totalRevenue, 2) }}</p>
                        </div>
                        <div class="text-3xl sm:text-4xl text-purple-500">💰</div>
                    </div>
                </div>
            </div>

            <!-- Mobile-Optimized Quick Actions -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mb-6 sm:mb-8">
                <a href="{{ route('admin.bookings.availability') }}" 
                   class="flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-3 rounded-lg transition-colors font-medium">
                    <span>📊</span>
                    <span>View Availability</span>
                </a>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center justify-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-lg transition-colors font-medium">
                    <span>←</span>
                    <span>Back to Dashboard</span>
                </a>
                
                <!-- Clear Bookings Dropdown -->
                <div class="relative">
                    <button type="button" id="clearBookingsBtn" 
                            class="flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg transition-colors font-medium w-full sm:w-auto">
                        <span>🗑️</span>
                        <span>Clear Bookings</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="clearBookingsDropdown" class="hidden absolute top-full left-0 right-0 sm:left-auto sm:right-auto sm:w-72 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 z-50">
                        <div class="p-4">
                            <h4 class="text-lg font-bold text-red-600 mb-3">⚠️ Clear Bookings</h4>
                            <p class="text-sm text-gray-600 mb-4">Choose how you want to clear bookings. This action cannot be undone!</p>
                            
                            <!-- Clear All Bookings -->
                            <form method="POST" action="{{ route('admin.bookings.clear-all') }}" class="mb-4" onsubmit="return confirm('Are you absolutely sure you want to delete ALL bookings? This action cannot be undone!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg transition-colors font-medium mb-2">
                                    🗑️ Clear ALL Bookings
                                </button>
                            </form>
                            
                            <!-- Clear by Date Range -->
                            <div class="border-t border-gray-200 pt-4">
                                <h5 class="font-semibold text-gray-800 mb-2">Clear by Date Range</h5>
                                <form method="POST" action="{{ route('admin.bookings.clear-date-range') }}" onsubmit="return confirm('Are you sure you want to delete bookings in this date range?')">
                                    @csrf
                                    @method('DELETE')
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">From Date</label>
                                            <input type="date" name="start_date" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1">To Date</label>
                                            <input type="date" name="end_date" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                        </div>
                                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors font-medium text-sm">
                                            Clear Date Range
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <!-- Bookings by Date -->
            <div class="space-y-6">
                @forelse($dailyStats as $date => $stats)
                    @php
                        $carbonDate = \Carbon\Carbon::parse($date);
                        $isToday = $carbonDate->isToday();
                        $isTomorrow = $carbonDate->isTomorrow();
                        $isPast = $carbonDate->isPast() && !$isToday;
                        $isFuture = $carbonDate->isFuture();
                    @endphp
                    
                    <div class="bg-gradient-to-r from-orange-50 to-yellow-50 border-2 {{ $isToday ? 'border-green-400 shadow-lg' : ($isTomorrow ? 'border-blue-400' : ($isPast ? 'border-gray-300' : 'border-orange-200')) }} rounded-xl p-4 sm:p-6 transition-all duration-300 hover:shadow-lg">
                        <!-- Mobile-Optimized Date Header -->
                        <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6">
                            <div class="flex items-start sm:items-center gap-3">
                                <div class="text-2xl sm:text-3xl flex-shrink-0">
                                    @if($isToday) 🌟
                                    @elseif($isTomorrow) 🔜
                                    @elseif($isPast) ✅
                                    @else 📅
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3">
                                        <h3 class="text-lg sm:text-2xl font-bold text-orange-800 truncate">{{ $carbonDate->format('F j, Y') }}</h3>
                                        @if($isToday)
                                            <span class="bg-green-500 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-bold animate-pulse w-fit">TODAY</span>
                                        @elseif($isTomorrow)
                                            <span class="bg-blue-500 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-bold w-fit">TOMORROW</span>
                                        @elseif($isPast)
                                            <span class="bg-gray-400 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full text-xs sm:text-sm font-medium w-fit">COMPLETED</span>
                                        @endif
                                    </div>
                                    <p class="text-orange-600 font-medium text-sm sm:text-base mt-1">
                                        📊 {{ $stats['total_bookings'] }} booking{{ $stats['total_bookings'] != 1 ? 's' : '' }} • 
                                        👥 {{ $stats['total_participants'] }} participant{{ $stats['total_participants'] != 1 ? 's' : '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-2 sm:px-4 sm:py-2 rounded-lg shadow-md">
                                    <div class="text-center">
                                        <div class="text-xs sm:text-sm font-medium">Total Revenue</div>
                                        <div class="text-lg sm:text-xl font-bold">${{ number_format($stats['total_revenue'], 2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bookings for this date -->
                        <div class="space-y-4">
                            @foreach($stats['bookings'] as $booking)
                                <div class="bg-white rounded-xl border border-gray-200 p-4 sm:p-5 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <!-- Mobile-First Header -->
                                    <div class="flex items-start gap-3 mb-4">
                                        <div class="w-1 sm:w-2 h-12 sm:h-8 bg-gradient-to-b from-orange-400 to-orange-600 rounded-full flex-shrink-0"></div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-base sm:text-lg font-bold text-gray-800 truncate">{{ $booking->activity->name }}</h4>
                                            <div class="flex flex-col sm:flex-row sm:items-center gap-2 mt-1">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold inline-flex items-center gap-1 w-fit">
                                                    ✅ {{ ucfirst($booking->status) }}
                                                </span>
                                                <span class="text-gray-500 text-xs sm:text-sm">
                                                    Booking #{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Mobile-Optimized Info Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
                                        <div class="bg-blue-50 p-3 rounded-lg text-center sm:text-left">
                                            <div class="text-blue-600 font-medium text-xs uppercase tracking-wide mb-1">Participants</div>
                                            <div class="text-blue-800 font-bold text-lg sm:text-xl">{{ $booking->participants }}</div>
                                        </div>
                                        <div class="bg-yellow-50 p-3 rounded-lg text-center sm:text-left">
                                            <div class="text-yellow-600 font-medium text-xs uppercase tracking-wide mb-1">Price/Person</div>
                                            <div class="text-yellow-800 font-bold text-sm sm:text-lg">${{ number_format($booking->price_per_person, 2) }}</div>
                                        </div>
                                        <div class="bg-green-50 p-3 rounded-lg text-center sm:text-left">
                                            <div class="text-green-600 font-medium text-xs uppercase tracking-wide mb-1">Total</div>
                                            <div class="text-green-800 font-bold text-lg sm:text-xl">${{ number_format($booking->total_price, 2) }}</div>
                                        </div>
                                        <div class="bg-purple-50 p-3 rounded-lg text-center sm:text-left col-span-2 sm:col-span-2 lg:col-span-1">
                                            <div class="text-purple-600 font-medium text-xs uppercase tracking-wide mb-1">Booked</div>
                                            <div class="text-purple-800 font-medium text-xs sm:text-sm">{{ $booking->created_at->format('M j, g:i A') }}</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Full-Width Action Button on Mobile -->
                                    <div class="pt-3 border-t border-gray-100">
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}" 
                                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            <span>View Details</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 sm:py-16 px-4">
                        <div class="bg-gradient-to-br from-orange-100 to-yellow-100 rounded-full w-16 h-16 sm:w-24 sm:h-24 flex items-center justify-center mx-auto mb-4 sm:mb-6">
                            <div class="text-3xl sm:text-4xl">📅</div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-600 mb-2 sm:mb-3">No bookings found</h3>
                        <p class="text-gray-500 text-base sm:text-lg mb-4 sm:mb-6">No bookings were found for the selected date range.</p>
                        <div>
                            <a href="{{ route('admin.bookings.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg transition-colors font-semibold text-sm sm:text-base">
                                Reset Filters
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 300);
            }
        }, 3000);
    </script>

    <!-- Enhanced Dropdown JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const activitySelect = document.getElementById('activitySelect');
            const dropdownContainer = activitySelect?.parentElement;
            const dropdownArrow = dropdownContainer?.querySelector('.w-8.h-8');
            
            if (activitySelect && dropdownArrow) {
                // Enhanced dropdown interactions
                activitySelect.addEventListener('focus', function() {
                    dropdownArrow.style.transform = 'rotate(180deg) scale(1.1)';
                    dropdownArrow.style.boxShadow = '0 8px 25px rgba(249, 115, 22, 0.4)';
                    dropdownContainer.classList.add('ring-4', 'ring-orange-200');
                    this.style.background = 'linear-gradient(135deg, #fed7aa, #fdba74)';
                });
                
                activitySelect.addEventListener('blur', function() {
                    dropdownArrow.style.transform = 'rotate(0deg) scale(1)';
                    dropdownArrow.style.boxShadow = '0 4px 14px rgba(249, 115, 22, 0.2)';
                    dropdownContainer.classList.remove('ring-4', 'ring-orange-200');
                    this.style.background = '';
                });
                
                // Add hover effect to dropdown container
                dropdownContainer.addEventListener('mouseenter', function() {
                    if (!activitySelect.matches(':focus')) {
                        dropdownArrow.style.transform = 'scale(1.05)';
                        dropdownArrow.style.boxShadow = '0 6px 20px rgba(249, 115, 22, 0.3)';
                    }
                });
                
                dropdownContainer.addEventListener('mouseleave', function() {
                    if (!activitySelect.matches(':focus')) {
                        dropdownArrow.style.transform = 'scale(1)';
                        dropdownArrow.style.boxShadow = '0 4px 14px rgba(249, 115, 22, 0.2)';
                    }
                });
                
                // Auto-submit form when activity is selected (optional)
                activitySelect.addEventListener('change', function() {
                    if (this.value !== '') {
                        // Add a subtle loading effect
                        const submitBtn = document.querySelector('button[type="submit"]');
                        if (submitBtn) {
                            const originalText = submitBtn.innerHTML;
                            submitBtn.innerHTML = `
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Filtering...</span>
                            `;
                            
                            // Submit form after short delay for UX
                            setTimeout(() => {
                                this.form.submit();
                            }, 500);
                        }
                    }
                });
            }
            
            // Add hover effects to quick filter chips
            const quickFilters = document.querySelectorAll('a[href*="start_date"]');
            quickFilters.forEach(chip => {
                chip.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.transition = 'transform 0.2s ease';
                });
                chip.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Enhanced date input styling
            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.parentElement.classList.add('scale-105');
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.parentElement.classList.remove('scale-105');
                });

                // Add value change animation
                input.addEventListener('change', function() {
                    this.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 150);
                });
            });
        });
    </script>

    <!-- Custom Date Picker Styling -->
    <style>
        /* Enhanced dropdown styling */
        select {
            background-image: none !important;
        }
        
        select option {
            background: white;
            color: #374151;
            padding: 12px 16px;
            font-weight: 500;
            border-radius: 8px;
            margin: 2px 0;
        }
        
        select option:hover, select option:focus {
            background: linear-gradient(135deg, #fed7aa, #fdba74) !important;
            color: #9a3412 !important;
        }
        
        select option:checked {
            background: linear-gradient(135deg, #f97316, #ea580c) !important;
            color: white !important;
            font-weight: 600;
        }
        
        /* Enhanced date picker styling */
        input[type="date"] {
            position: relative;
            background-image: none !important;
            font-size: 14px !important;
            line-height: 1.4 !important;
            height: auto !important;
            min-height: 48px !important;
        }
        
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
            position: absolute;
            right: 12px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        input[type="date"]::-webkit-datetime-edit {
            padding: 0 !important;
            font-weight: 500 !important;
            font-size: 14px !important;
            line-height: 1.4 !important;
            color: #374151 !important;
        }
        
        input[type="date"]::-webkit-datetime-edit-fields-wrapper {
            padding: 0 !important;
            font-size: 14px !important;
            display: flex !important;
            align-items: center !important;
        }
        
        input[type="date"]::-webkit-datetime-edit-text {
            color: #6B7280 !important;
            padding: 0 2px !important;
            font-size: 14px !important;
        }
        
        input[type="date"]::-webkit-datetime-edit-month-field,
        input[type="date"]::-webkit-datetime-edit-day-field,
        input[type="date"]::-webkit-datetime-edit-year-field {
            background: transparent !important;
            color: #374151 !important;
            font-weight: 500 !important;
            border: none !important;
            outline: none !important;
            padding: 1px 2px !important;
            border-radius: 3px !important;
            transition: all 0.2s ease !important;
            font-size: 14px !important;
            min-width: auto !important;
        }
        
        input[type="date"]:focus::-webkit-datetime-edit-month-field,
        input[type="date"]:focus::-webkit-datetime-edit-day-field,
        input[type="date"]:focus::-webkit-datetime-edit-year-field {
            background: #FED7AA !important;
            color: #9A3412 !important;
        }
        
        /* Firefox date picker styling */
        input[type="date"]::-moz-placeholder {
            color: #9CA3AF !important;
            font-weight: 500 !important;
            font-size: 14px !important;
        }
        
        /* Custom hover effects for date containers */
        .group:hover input[type="date"] {
            background: linear-gradient(135deg, #ffffff, #fefefe);
        }
        
        .group:hover .absolute div {
            background: #FED7AA;
            transform: scale(1.1);
            transition: all 0.3s ease;
        }
        
        /* Animation for date input focus */
        input[type="date"]:focus {
            background: linear-gradient(135deg, #ffffff, #ffffff) !important;
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.15), 0 0 0 4px rgba(251, 146, 60, 0.1) !important;
        }
        
        /* Custom styles for date labels */
        .date-label-icon {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 14px rgba(249, 115, 22, 0.3);
            }
            50% {
                box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
            }
        }
    </style>

    <script>
        // Calendar functionality for date pickers
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'];
        
        let startCurrentDate = new Date();
        let endCurrentDate = new Date();
        let startSelectedDate = null;
        let endSelectedDate = null;

        // Initialize with existing values
        const startDateValue = '{{ $startDate }}';
        const endDateValue = '{{ $endDate }}';
        
        if (startDateValue) {
            startSelectedDate = new Date(startDateValue);
            startCurrentDate = new Date(startDateValue);
        }
        
        if (endDateValue) {
            endSelectedDate = new Date(endDateValue);
            endCurrentDate = new Date(endDateValue);
        }

        // Toggle calendar functions
        function toggleStartCalendar() {
            const dropdown = document.getElementById('startCalendarDropdown');
            const isVisible = dropdown.classList.contains('opacity-100');
            
            // Hide end calendar if open
            hideEndCalendar();
            
            if (isVisible) {
                hideStartCalendar();
            } else {
                showStartCalendar();
            }
        }

        function toggleEndCalendar() {
            const dropdown = document.getElementById('endCalendarDropdown');
            const isVisible = dropdown.classList.contains('opacity-100');
            
            // Hide start calendar if open
            hideStartCalendar();
            
            if (isVisible) {
                hideEndCalendar();
            } else {
                showEndCalendar();
            }
        }

        function showStartCalendar() {
            const dropdown = document.getElementById('startCalendarDropdown');
            dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.add('opacity-100', 'visible', 'scale-100');
            renderStartCalendar();
        }

        function hideStartCalendar() {
            const dropdown = document.getElementById('startCalendarDropdown');
            dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.remove('opacity-100', 'visible', 'scale-100');
        }

        function showEndCalendar() {
            const dropdown = document.getElementById('endCalendarDropdown');
            dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.add('opacity-100', 'visible', 'scale-100');
            renderEndCalendar();
        }

        function hideEndCalendar() {
            const dropdown = document.getElementById('endCalendarDropdown');
            dropdown.classList.add('opacity-0', 'invisible', 'scale-95');
            dropdown.classList.remove('opacity-100', 'visible', 'scale-100');
        }

        // Render calendar functions
        function renderStartCalendar() {
            const year = startCurrentDate.getFullYear();
            const month = startCurrentDate.getMonth();
            
            document.getElementById('startCalendarMonth').textContent = monthNames[month];
            document.getElementById('startCalendarYear').textContent = year;
            
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            const daysContainer = document.getElementById('startCalendarDays');
            daysContainer.innerHTML = '';
            
            // Empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'h-10 lg:h-12';
                daysContainer.appendChild(emptyDay);
            }
            
            // Days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('button');
                dayElement.type = 'button';
                dayElement.textContent = day;
                
                const dayDate = new Date(year, month, day);
                const isToday = dayDate.toDateString() === new Date().toDateString();
                const isSelected = startSelectedDate && dayDate.toDateString() === startSelectedDate.toDateString();
                
                let classes = 'h-10 w-10 lg:h-12 lg:w-12 rounded-lg text-xs lg:text-base font-medium lg:font-semibold transition-all duration-300 hover:scale-105';
                
                if (isSelected) {
                    classes += ' bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg';
                } else if (isToday) {
                    classes += ' bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700';
                } else {
                    classes += ' text-gray-700 hover:bg-gradient-to-r hover:from-orange-100 hover:to-orange-200 hover:text-orange-700';
                }
                
                dayElement.className = classes;
                dayElement.addEventListener('click', () => selectStartDate(dayDate));
                
                daysContainer.appendChild(dayElement);
            }
        }

        function renderEndCalendar() {
            const year = endCurrentDate.getFullYear();
            const month = endCurrentDate.getMonth();
            
            document.getElementById('endCalendarMonth').textContent = monthNames[month];
            document.getElementById('endCalendarYear').textContent = year;
            
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            const daysContainer = document.getElementById('endCalendarDays');
            daysContainer.innerHTML = '';
            
            // Empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'h-10 lg:h-12';
                daysContainer.appendChild(emptyDay);
            }
            
            // Days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('button');
                dayElement.type = 'button';
                dayElement.textContent = day;
                
                const dayDate = new Date(year, month, day);
                const isToday = dayDate.toDateString() === new Date().toDateString();
                const isSelected = endSelectedDate && dayDate.toDateString() === endSelectedDate.toDateString();
                const isPastStartDate = startSelectedDate && dayDate < startSelectedDate;
                
                let classes = 'h-10 w-10 lg:h-12 lg:w-12 rounded-lg text-xs lg:text-base font-medium lg:font-semibold transition-all duration-300 hover:scale-105';
                
                if (isPastStartDate) {
                    classes += ' text-gray-300 cursor-not-allowed bg-gray-50';
                    dayElement.disabled = true;
                } else if (isSelected) {
                    classes += ' bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg';
                } else if (isToday) {
                    classes += ' bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700';
                } else {
                    classes += ' text-gray-700 hover:bg-gradient-to-r hover:from-orange-100 hover:to-orange-200 hover:text-orange-700';
                }
                
                dayElement.className = classes;
                
                if (!isPastStartDate) {
                    dayElement.addEventListener('click', () => selectEndDate(dayDate));
                }
                
                daysContainer.appendChild(dayElement);
            }
        }

        // Date selection functions
        function selectStartDate(date) {
            startSelectedDate = date;
            
            // Update hidden input
            document.getElementById('start_date_input').value = date.toISOString().split('T')[0];
            
            // Update display
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            document.getElementById('startDateText').textContent = date.toLocaleDateString('en-US', options);
            
            // If end date is before start date, clear it
            if (endSelectedDate && endSelectedDate < date) {
                endSelectedDate = null;
                document.getElementById('end_date_input').value = '';
                document.getElementById('endDateText').textContent = 'Select end date';
            }
            
            // Hide calendar
            setTimeout(hideStartCalendar, 200);
            
            // Re-render end calendar to update disabled dates
            if (document.getElementById('endCalendarDropdown').classList.contains('opacity-100')) {
                renderEndCalendar();
            }
        }

        function selectEndDate(date) {
            endSelectedDate = date;
            
            // Update hidden input
            document.getElementById('end_date_input').value = date.toISOString().split('T')[0];
            
            // Update display
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            document.getElementById('endDateText').textContent = date.toLocaleDateString('en-US', options);
            
            // Hide calendar
            setTimeout(hideEndCalendar, 200);
        }

        // Month navigation
        function changeStartMonth(direction) {
            startCurrentDate.setMonth(startCurrentDate.getMonth() + direction);
            renderStartCalendar();
        }

        function changeEndMonth(direction) {
            endCurrentDate.setMonth(endCurrentDate.getMonth() + direction);
            renderEndCalendar();
        }

        // Quick select functions
        function selectStartQuickDate(daysFromToday) {
            const date = new Date();
            date.setDate(date.getDate() + daysFromToday);
            selectStartDate(date);
        }

        function selectEndQuickDate(daysFromToday) {
            const date = new Date();
            date.setDate(date.getDate() + daysFromToday);
            selectEndDate(date);
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Set up click handlers for date displays
            document.getElementById('startDateDisplay').addEventListener('click', toggleStartCalendar);
            document.getElementById('endDateDisplay').addEventListener('click', toggleEndCalendar);
            
            // Set up month navigation
            document.getElementById('startPrevMonth').addEventListener('click', () => changeStartMonth(-1));
            document.getElementById('startNextMonth').addEventListener('click', () => changeStartMonth(1));
            document.getElementById('endPrevMonth').addEventListener('click', () => changeEndMonth(-1));
            document.getElementById('endNextMonth').addEventListener('click', () => changeEndMonth(1));
            
            // Set up quick select buttons
            document.querySelectorAll('.start-quick-select').forEach(btn => {
                btn.addEventListener('click', () => {
                    const days = parseInt(btn.dataset.days);
                    selectStartQuickDate(days);
                });
            });
            
            document.querySelectorAll('.end-quick-select').forEach(btn => {
                btn.addEventListener('click', () => {
                    const days = parseInt(btn.dataset.days);
                    selectEndQuickDate(days);
                });
            });
            
            // Close calendars when clicking outside
            document.addEventListener('click', function(e) {
                const startCalendar = document.getElementById('startCalendarDropdown');
                const startDisplay = document.getElementById('startDateDisplay');
                const endCalendar = document.getElementById('endCalendarDropdown');
                const endDisplay = document.getElementById('endDateDisplay');
                
                if (!startCalendar.contains(e.target) && !startDisplay.contains(e.target)) {
                    hideStartCalendar();
                }
                
                if (!endCalendar.contains(e.target) && !endDisplay.contains(e.target)) {
                    hideEndCalendar();
                }
            });
        });

        // Clear Bookings Dropdown Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const clearBookingsBtn = document.getElementById('clearBookingsBtn');
            const clearBookingsDropdown = document.getElementById('clearBookingsDropdown');

            if (clearBookingsBtn && clearBookingsDropdown) {
                clearBookingsBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    clearBookingsDropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!clearBookingsDropdown.contains(e.target) && !clearBookingsBtn.contains(e.target)) {
                        clearBookingsDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-layout>
