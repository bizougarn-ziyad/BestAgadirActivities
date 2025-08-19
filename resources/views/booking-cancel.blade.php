<x-layout>
    <!-- Booking Cancel Hero Section -->
    <div class="relative pt-[107px] pb-20 bg-gradient-to-br from-red-50 via-white to-orange-50 min-h-screen">
        <!-- Cancel Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Cancel Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                <!-- Header with Cancel Icon -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-8 py-12 text-center">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Booking Cancelled</h1>
                    <p class="text-xl text-red-100">Your booking has been cancelled and no payment has been processed.</p>
                </div>

                <!-- Content Section -->
                <div class="px-8 py-12">
                    <!-- Error Message Display -->
                    @if(session('error'))
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-red-800">Error Details</h3>
                                    <p class="text-red-700 mt-1">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Reassuring Message -->
                    <div class="text-center mb-12">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">No Worries, That's Perfectly Fine!</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                            Your booking process was cancelled and no charges have been made to your account. 
                            You can try booking again whenever you're ready, or explore our other amazing activities.
                        </p>
                    </div>

                    <!-- What Happened & Next Steps -->
                    <div class="bg-orange-50 rounded-2xl p-8 mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            What Happened?
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-3">Common Reasons for Cancellation:</h4>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        You decided to browse more options first
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Payment method needs to be updated
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        You want to check dates again
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Technical issue occurred
                                    </li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-3">Need Assistance?</h4>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <span>Call us for booking help</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Email us your questions</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        <span>Chat with our support team</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Categories -->
                    <div class="bg-blue-50 rounded-2xl p-8 mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            Explore Our Popular Activities
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center bg-white p-6 rounded-xl border border-gray-200 hover:border-orange-300 transition-colors cursor-pointer">
                                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-2">Adventure Tours</h4>
                                <p class="text-sm text-gray-600">Thrilling outdoor experiences</p>
                            </div>
                            
                            <div class="text-center bg-white p-6 rounded-xl border border-gray-200 hover:border-green-300 transition-colors cursor-pointer">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-2">Cultural Experiences</h4>
                                <p class="text-sm text-gray-600">Discover authentic Morocco</p>
                            </div>
                            
                            <div class="text-center bg-white p-6 rounded-xl border border-gray-200 hover:border-blue-300 transition-colors cursor-pointer">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-800 mb-2">Relaxing Tours</h4>
                                <p class="text-sm text-gray-600">Peaceful scenic journeys</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ url('/activities') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Browse All Activities
                        </a>
                        <a href="{{ url('/') }}" class="bg-white border-2 border-orange-500 text-orange-500 hover:bg-orange-50 px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Return to Home
                        </a>
                        <a href="/contact" class="bg-white border-2 border-blue-500 text-blue-500 hover:bg-blue-50 px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Get Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
