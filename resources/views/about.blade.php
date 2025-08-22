<x-layout>
    <div class="pt-[107.05px] min-h-screen bg-[#fffaf0]">
        <!-- Hero Section with Parallax Effect -->
        <div class="relative bg-gradient-to-br from-orange-500 via-orange-600 to-red-500 text-white py-32 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full animate-pulse"></div>
                <div class="absolute top-40 right-20 w-24 h-24 bg-white rounded-full animate-bounce delay-300"></div>
                <div class="absolute bottom-20 left-1/3 w-20 h-20 bg-white rounded-full animate-pulse delay-700"></div>
            </div>
            
            <!-- Hero Content -->
            <div class="relative max-w-6xl mx-auto px-4 text-center">
                <div class="mb-8">
                    <div class="inline-block p-4 bg-white/20 rounded-full backdrop-blur-sm mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                    About <span class="text-yellow-300">Best Agadir</span><br>
                    <span class="bg-gradient-to-r from-yellow-200 to-white bg-clip-text text-transparent">Activities</span>
                </h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                    Your gateway to authentic Moroccan experiences in the heart of Agadir
                </p>
                <div class="mt-12">
                    <div class="animate-bounce">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-white opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-20">
            <!-- Company Overview with Diagonal Design -->
            <div class="relative mb-32">
                <!-- Diagonal Background -->
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-100 transform -skew-y-2 rounded-3xl"></div>
                
                <div class="relative grid lg:grid-cols-2 gap-16 items-center py-20 px-8">
                    <div class="order-2 lg:order-1">
                        <div class="mb-8">
                            <span class="inline-block px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-semibold mb-4">WHO WE ARE</span>
                            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
                                Crafting <span class="text-orange-500">Authentic</span><br>
                                Moroccan Adventures
                            </h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-3 h-3 bg-orange-500 rounded-full mt-3 flex-shrink-0"></div>
                                <p class="text-lg text-gray-700 leading-relaxed">
                                    Best Agadir Activities is your premier destination for authentic Moroccan experiences in Agadir. We specialize in carefully curated activities that showcase Morocco's rich culture, stunning landscapes, and warm hospitality.
                                </p>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-3 h-3 bg-orange-500 rounded-full mt-3 flex-shrink-0"></div>
                                <p class="text-lg text-gray-700 leading-relaxed">
                                    Founded by passionate locals, we combine deep regional knowledge with exceptional service to deliver the real Morocco beyond the tourist trail.
                                </p>
                            </div>
                        </div>

                        <!-- Stats Row -->
                        <div class="grid grid-cols-3 gap-6 mt-12">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-500">5+</div>
                                <div class="text-sm text-gray-600">Years Experience</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-500">1000+</div>
                                <div class="text-sm text-gray-600">Happy Guests</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-orange-500">4.8★</div>
                                <div class="text-sm text-gray-600">Average Rating</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="order-1 lg:order-2 relative">
                        <!-- Floating Image Cards -->
                        <div class="relative">
                            <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                                <img src="{{ asset('images/WhoWeAre.jpg') }}" alt="Agadir landscape" 
                                     class="w-full h-80 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            </div>
                            
                            <!-- Floating Elements -->
                            <div class="absolute -top-6 -right-6 bg-white rounded-2xl p-6 shadow-xl z-20 transform hover:scale-110 transition-transform duration-300">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-orange-500">25+</div>
                                    <div class="text-xs text-gray-600">Activities</div>
                                </div>
                            </div>
                            
                            <div class="absolute -bottom-6 -left-6 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-2xl p-6 shadow-xl z-20 transform hover:scale-110 transition-transform duration-300">
                                <div class="text-center">
                                    <div class="text-lg font-bold">24/7</div>
                                    <div class="text-xs opacity-90">Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Mission with Card Grid -->
            <div class="mb-32">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-full text-sm font-semibold mb-4">OUR MISSION</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-8 leading-tight">
                        Creating <span class="text-orange-500">Unforgettable</span><br>
                        Moroccan Memories
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed max-w-4xl mx-auto">
                        To provide authentic, safe, and unforgettable experiences that connect travelers with the true spirit of Morocco while supporting local communities and preserving our cultural heritage.
                    </p>
                </div>
                
                <!-- Mission Cards with Hover Effects -->
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-orange-100">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Authentic Experiences</h3>
                        <p class="text-gray-600 text-center leading-relaxed">We offer genuine local experiences that showcase the real Morocco, away from tourist traps.</p>
                        <div class="mt-6 h-1 bg-gradient-to-r from-orange-400 to-orange-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                    
                    <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-orange-100">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Safety First</h3>
                        <p class="text-gray-600 text-center leading-relaxed">Your safety is our top priority. All our activities are conducted with the highest safety standards.</p>
                        <div class="mt-6 h-1 bg-gradient-to-r from-green-400 to-green-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                    
                    <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-orange-100">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Local Support</h3>
                        <p class="text-gray-600 text-center leading-relaxed">We work directly with local communities, ensuring your tourism dollars support local families.</p>
                        <div class="mt-6 h-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    </div>
                </div>
            </div>

            <!-- What Makes Us Special with Timeline Design -->
            <div class="mb-32">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full text-sm font-semibold mb-4">WHAT MAKES US SPECIAL</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-8 leading-tight">
                        Why Choose <span class="text-orange-500">Our Adventures</span>
                    </h2>
                </div>
                
                <!-- Timeline Layout -->
                <div class="relative max-w-4xl mx-auto">
                    <!-- Vertical Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600 rounded-full hidden md:block"></div>
                    
                    <!-- Timeline Items -->
                    <div class="space-y-16">
                        <!-- Item 1 -->
                        <div class="flex items-center md:justify-between">
                            <div class="md:w-5/12 md:text-right">
                                <div class="bg-white p-8 rounded-2xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <div class="flex items-center gap-4 md:justify-end mb-4">
                                        <h3 class="text-2xl font-bold text-gray-800">Expert Local Guides</h3>
                                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">Our guides are not just knowledgeable – they're passionate locals who love sharing their culture and stories.</p>
                                </div>
                            </div>
                            <div class="hidden md:block w-6 h-6 bg-orange-500 rounded-full border-4 border-white shadow-lg z-10"></div>
                            <div class="md:w-5/12"></div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="flex items-center md:justify-between">
                            <div class="md:w-5/12"></div>
                            <div class="hidden md:block w-6 h-6 bg-orange-500 rounded-full border-4 border-white shadow-lg z-10"></div>
                            <div class="md:w-5/12">
                                <div class="bg-white p-8 rounded-2xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-800">Small Group Experiences</h3>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">We keep our groups small to ensure personalized attention and a more intimate experience.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 3 -->
                        <div class="flex items-center md:justify-between">
                            <div class="md:w-5/12 md:text-right">
                                <div class="bg-white p-8 rounded-2xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <div class="flex items-center gap-4 md:justify-end mb-4">
                                        <h3 class="text-2xl font-bold text-gray-800">Fair & Transparent Pricing</h3>
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">No hidden fees or tourist markups. We believe in honest, fair pricing for exceptional experiences.</p>
                                </div>
                            </div>
                            <div class="hidden md:block w-6 h-6 bg-orange-500 rounded-full border-4 border-white shadow-lg z-10"></div>
                            <div class="md:w-5/12"></div>
                        </div>
                        
                        <!-- Item 4 -->
                        <div class="flex items-center md:justify-between">
                            <div class="md:w-5/12"></div>
                            <div class="hidden md:block w-6 h-6 bg-orange-500 rounded-full border-4 border-white shadow-lg z-10"></div>
                            <div class="md:w-5/12">
                                <div class="bg-white p-8 rounded-2xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-800">24/7 Support</h3>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">From booking to post-trip assistance, our team is always here to help make your experience perfect.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics with Modern Design -->
            <div class="relative mb-32 overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500 via-red-500 to-pink-600 rounded-3xl"></div>
                <div class="absolute inset-0 bg-black/10 rounded-3xl"></div>
                
                <!-- Floating Shapes -->
                <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full animate-bounce"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white/10 rounded-full animate-pulse delay-500"></div>
                
                <div class="relative text-white p-12 md:p-16">
                    <div class="text-center mb-16">
                        <span class="inline-block px-6 py-3 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-6">OUR ACHIEVEMENTS</span>
                        <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                            Numbers That Tell<br>
                            <span class="text-yellow-300">Our Story</span>
                        </h2>
                    </div>
                    
                    <div class="grid md:grid-cols-4 gap-8 text-center">
                        <div class="group">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 transform group-hover:scale-110 transition-all duration-300">
                                <div class="text-5xl md:text-6xl font-bold mb-4 text-yellow-300">1000+</div>
                                <div class="text-xl font-semibold mb-2">Happy Travelers</div>
                                <div class="text-sm opacity-80">Memories Created</div>
                            </div>
                        </div>
                        <div class="group">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 transform group-hover:scale-110 transition-all duration-300">
                                <div class="text-5xl md:text-6xl font-bold mb-4 text-yellow-300">4.8★</div>
                                <div class="text-xl font-semibold mb-2">Average Rating</div>
                                <div class="text-sm opacity-80">Excellent Reviews</div>
                            </div>
                        </div>
                        <div class="group">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 transform group-hover:scale-110 transition-all duration-300">
                                <div class="text-5xl md:text-6xl font-bold mb-4 text-yellow-300">25+</div>
                                <div class="text-xl font-semibold mb-2">Unique Activities</div>
                                <div class="text-sm opacity-80">Adventures Available</div>
                            </div>
                        </div>
                        <div class="group">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 transform group-hover:scale-110 transition-all duration-300">
                                <div class="text-5xl md:text-6xl font-bold mb-4 text-yellow-300">5+</div>
                                <div class="text-xl font-semibold mb-2">Years Experience</div>
                                <div class="text-sm opacity-80">Local Expertise</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action with Creative Design -->
            <div class="relative">
                <!-- Background -->
                <div class="absolute inset-0 bg-gradient-to-r from-orange-50 to-red-50 rounded-3xl transform -skew-y-1"></div>
                
                <div class="relative text-center py-20 px-8">
                    <div class="max-w-4xl mx-auto">
                        <div class="mb-8">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-orange-500 to-red-500 rounded-full mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                        
                        <h2 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6 leading-tight">
                            Ready for Your<br>
                            <span class="bg-gradient-to-r from-orange-500 to-red-500 bg-clip-text text-transparent">Morocco Adventure?</span>
                        </h2>
                        
                        <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                            Join thousands of travelers who have discovered the magic of Morocco with us. Your authentic adventure awaits!
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-6 justify-center">
                            <a href="{{ route('activities') }}" 
                               class="group inline-flex items-center justify-center bg-gradient-to-r from-orange-500 to-red-500 text-white px-10 py-5 rounded-2xl hover:shadow-2xl transition-all duration-300 text-lg font-semibold cursor-pointer transform hover:scale-105">
                                <span>Explore Our Activities</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                            <a href="{{ route('contact') }}" 
                               class="group inline-flex items-center justify-center border-2 border-orange-500 text-orange-500 px-10 py-5 rounded-2xl hover:bg-orange-500 hover:text-white transition-all duration-300 text-lg font-semibold cursor-pointer transform hover:scale-105">
                                <span>Contact Us</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </a>
                        </div>
                        
                        <!-- Trust Indicators -->
                        <div class="mt-16 flex flex-wrap justify-center items-center gap-8 opacity-60">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-600">Free Cancellation</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-600">24/7 Support</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-600">Best Price Guarantee</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
