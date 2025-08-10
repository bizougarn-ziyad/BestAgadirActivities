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
                    <button class="bg-orange-500 text-white px-6 py-2 sm:py-4 sm:px-7 rounded-[10px] hover:bg-orange-400 transition duration-300 cursor-pointer">Our Activities &#10230;</button>
                </div>
            </div>
        </div>

        <div class="container-activities flex flex-col justify-center lg:justify-normal md:mt-[30px]  h-[calc(100dvh)] sm:h-auto lg:w-[380px]">
            <h2 class="text-[18px] font-bold text-center mb-5 text-orange-500 md:hidden">Best Selling Activities</h2>
            <div class="swiper mySwiper w-[320px] h-[500px] lg:w-[350px] xl:w-[380px] xl:h-[583px] shadow-[0_1px_25px_rgba(0,0,0,0.1)] rounded-lg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <p class="rounded-2xl w-10 h-5.2 text-center text-white  bg-green-400 absolute right-4 top-2 z-100 text-[13px] xl:text-[17px] ">25€</p>
                        <img src="{{ asset('images/activity1.jpg') }} " alt="Activity 1" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px]">
                        
                        <div class="mt-5 flex justify-center items-center gap-2">
                            <img src="{{ asset('images/secondstar.png') }}" alt="ratings" class="w-[15px] ">
                            <p class="text-[13px] xl:text-[17px]  font-bold m-0 p-0">4.7 <span class="text-gray-400 font-normal">(52 ratings)</span></p>
                        </div>
                        
                        <div class="flex flex-col px-4 mt-7 gap-2">
                            <p class="text-[13px] xl:text-[17px] font-bold">1h Sand Surf + Camel Ride + Moroccan Mint Tea + Dinner + Show .</p>
                            <p class="text-[13px] xl:text-[17px]  text-gray-600">Enjoy sand surfing, a camel ride, Moroccan mint tea, a tasty dinner, and a lively traditional show. All in one unforgettable experience.</p>
                        </div>
                        
                        <div class="flex justify-between items-center px-4 mt-5 gap-3">
                            <button class="bg-white text-black border border-gray-500 px-6 py-1 rounded-[20px] hover:bg-gray-200 transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer">Details</button>
                            <button class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] cursor-pointer w-[50%]">Book Now</button>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <p class="rounded-2xl w-10 h-5.2 text-center text-white  bg-green-400 absolute right-4 top-2 z-100 text-[13px] xl:text-[17px] ">65€</p>      
                        <img src="{{ asset('images/activity3.jpg') }}" alt="Activity 3" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px]">
                        
                        <div class="mt-5 flex justify-center items-center gap-2">
                            <img src="{{ asset('images/secondstar.png') }}" alt="ratings" class="w-[15px] ">
                            <p class="text-[13px] xl:text-[17px] font-bold m-0 p-0">4.9 <span class="text-gray-400 font-normal">(19 ratings)</span></p>
                        </div>
                        
                        <div class="flex flex-col px-4 mt-7 gap-2">
                            <p class="text-[13px] xl:text-[17px] font-bold">Buggy Adventure + 30min horse ride + Dinner + Crocodile park tour.</p>
                            <p class="text-[13px] xl:text-[17px] text-gray-600">Experience the thrill of driving a buggy through the stunning Moroccan desert. Enjoy a 30-minute horse ride, followed by a delicious dinner under the stars.</p>
                        </div>
                        
                        <div class="flex justify-between items-center px-4 mt-5 gap-3">
                            <button class="bg-white text-black border border-gray-500 px-6 py-1 rounded-[20px] hover:bg-orange-500 hover:text-white transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer">Details</button>
                            <button class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer">Book Now</button>
                        </div>
                    </div>
                    
                    <div class="swiper-slide">
                        <p class="rounded-2xl w-10 h-5.2 text-center text-white  bg-green-400 absolute right-4 top-2 z-100 text-[13px] xl:text-[17px] ">45€</p>
                        <img src="{{ asset('images/activity2.jpg') }}" alt="Activity 2" class="h-[213px] lg:w-full xl:h-[250px] lg:h-[240px]">
                        <div class="mt-5 flex justify-center items-center gap-2">
                            <img src="{{ asset('images/secondstar.png') }}" alt="ratings" class="w-[15px] ">
                            <p class="text-[13px] xl:text-[17px] font-bold m-0 p-0">4.5 <span class="text-gray-400 font-normal">(27 ratings)</span></p>
                        </div>
                        
                        <div class="flex flex-col px-4 mt-7 gap-2">
                            <p class="text-[13px] xl:text-[17px] font-bold">Surf lessons with professional + Breakfast + Bus ride from your hotel.</p>
                            <p class="text-[13px] xl:text-[17px] text-gray-600">Join us for an unforgettable surfing experience in the beautiful Moroccan waves. Our professional instructors will guide you every step of the way.</p>
                        </div>
                        
                        <div class="flex justify-between items-center px-4 mt-5 gap-3">
                            <button class="bg-white text-black border border-gray-500 px-6 py-1 rounded-[20px] hover:bg-orange-500 hover:text-white transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer">Details</button>
                            <button class="bg-orange-500 text-white px-4 py-1 rounded-[20px] hover:bg-orange-400 transition duration-300 text-[13px] xl:text-[17px] w-[50%] cursor-pointer">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev after:text-black"></div>
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
            <button id="datePickerBtn" class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-700 hover:border-gray-400 focus:outline-none h-[80px] sm:w-[150px] text-left md:w-[200px] lg:w-[270px]">
                <span id="date" class="text-[17px] lg:text-[20px]">Select a date</span>
                <span id="selectedDateDisplay" class="block text-gray-500 text-[13px] lg:text-[15px]"></span>
            </button>
            <!-- Calendar Container -->
            <div id="calendarContainer" class="hidden absolute left-[50%] top-[100%] translate-x-[-50%] mt-2 z-50 bg-white rounded-xl shadow-lg p-4 w-80">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <button id="prevMonth" class="text-gray-500 hover:text-black text-xl">&larr;</button>
                    <h2 id="monthYear" class="text-lg font-semibold"></h2>
                    <button id="nextMonth" class="text-gray-500 hover:text-black text-xl">&rarr;</button>
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
            <button id="travelersBtn" class="bg-white border border-gray-300 rounded-lg px-2 text-gray-700 hover:border-gray-400 focus:outline-none h-[80px] w-[110px] sm:w-[150px] text-left md:w-[200px] lg:w-[270px]">
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
                            <button class="decrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center" data-type="adults">-</button>
                            <span class="w-6 text-center" id="adultsCount">2</span>
                            <button class="incrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center" data-type="adults">+</button>
                        </div>
                    </div>
                    
                    <!-- Children -->
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">Children</p>
                            <p class="text-sm text-gray-500">Aged 0-17</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="decrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center" data-type="children">-</button>
                            <span class="w-6 text-center" id="childrenCount">0</span>
                            <button class="incrementBtn bg-gray-100 hover:bg-gray-200 p-2 rounded-full w-8 h-8 flex items-center justify-center" data-type="children">+</button>
                        </div>
                    </div>
                    <!-- Apply Button - Now inside the dropdown -->
                    <div class="pt-4 border-t border-gray-200">
                        <button id="applyTravelers" class="w-full bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition duration-300 sm:w-[100px]">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Button -->
        <button id="searchBtn" class="bg-orange-500 text-white px-3 py-2 rounded-lg hover:bg-orange-400 transition duration-300 w-[80px] sm:w-[120px] md:w-[200px] lg:w-[220px] text-left">
            Search
        </button>    
    </div>
    <div class="max-w-[1200px] mx-auto px-5 relative">
        <img src="{{ asset('images/marina_agadir.avif') }}" alt="Marina Agadir" class="w-full h-[400px] xl:h-[500px] object-cover mt-[70px] rounded-lg shadow-lg blur-[2px]">
        <p class="font-bold absolute left-10 lg:left-15 top-20 lg:top-30 text-white bg-transparent text-[17px] sm:text-[25px] lg:text-[30px]">Can't decide ? <br>Explore every activity in the city</p>
        <button class="bg-orange-500 text-white px-2 py-3 rounded-lg hover:bg-orange-400 transition duration-300 absolute left-10 lg:left-15 top-60 sm:text-[22px] text-[15px]">Search activities all over Agadir &rarr;</button>
    </div>
</div>

<div class="bg-orange-500  h-[300px] mt-[200px] w-full flex flex-col justify-between items-center">
    <div class="max-w-[650px] mx-auto min-w-[300px] px-5 flex justify-around items-center py-10">
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
</x-layout>
