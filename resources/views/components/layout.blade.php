@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    <title>Best Agadir Activity</title>
    <style>
        .swiper-pagination-bullet {
            background-color: #f97316; 
        }
        .swiper-pagination-bullet {
            background-color: #f97316; 
        }
        
        /* Custom styles for activities */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Smooth hover effects for activity cards */
        .activity-card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        .activity-card-hover:hover {
            transform: scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Luxury gradient background animation */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .luxury-gradient {
            background: linear-gradient(-45deg, #f97316, #ea580c, #fb923c, #fdba74);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Universal cursor pointer for interactive elements */
        button, a, .cursor-pointer, 
        input[type="submit"], input[type="button"], input[type="reset"],
        .swiper-button-prev, .swiper-button-next, .swiper-pagination-bullet,
        select, [role="button"], [onclick], 
        img[onclick], img[data-clickable],
        .clickable, .interactive,
        form button, form input[type="submit"],
        .nav-link, .menu-item,
        [data-toggle], [data-dismiss] {
            cursor: pointer !important;
        }
        
        /* Ensure links and buttons always have pointer cursor */
        a:not([disabled]), button:not([disabled]) {
            cursor: pointer !important;
        }
        
        /* Special case for images that look clickable */
        img[alt*="icon"], img[alt*="logo"], img[src*="icon"], 
        .social-icon, .logo-img {
            cursor: pointer;
        }
    </style>
</head>
<body class="font-[Outfit] bg-[#fffaf0]">
<!-- Responsive Navbar -->
<nav class="flex md:flex-row justify-between items-center mx-auto gap-2 bg-white px-2 lg:px-5 md:w-[770px] lg:w-[1000px] shadow-[0_1px_25px_rgba(0,0,0,0.1)] md:rounded-[35px] fixed top-0 left-1/2 -translate-x-1/2 w-full z-50 transition-all duration-300 ease-in-out md:mt-5">
    <x-navbar href="/" class="cursor-pointer">
        <img src="{{ asset('images/logoAgadir1.png') }}" alt="Logo Agadir" class="w-[220px] py-4 md:py-0 cursor-pointer">
    </x-navbar>

    <!-- Navigation Links - Hidden on mobile, shown on medium+ -->
    <div class="hidden md:flex justify-center items-center space-x-2">
        <x-navbar href="{{ route('activities') }}" class="text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer">Activities</x-navbar>
        <x-navbar href="/about" class="text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer">About</x-navbar>
        <x-navbar href="/contact" class="text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer">Contact</x-navbar>
    </div>

    <!-- Mobile Menu Button (Hamburger) -->
    <button class="md:hidden p-2 pr-5 rounded-lg hover:bg-gray-100" id="mobileMenuButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="hidden md:flex gap-4 mr-3">
        @if(Auth::check() || session('is_admin'))
            <!-- Dashboard link for admins -->
            @if(session('is_admin'))
                <a href="{{ route('admin.dashboard') }}" class="bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="text-blue-600">Dashboard</span>
                </a>
            @endif
            
            <!-- Heart icon for authenticated users only -->
            @if(Auth::check() || session('is_admin'))
                <a href="{{ route('favorites.index') }}" class="bg-red-100 hover:bg-red-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300 flex items-center gap-2" id="likeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="text-red-500">Favorites</span>
                </a>
            @endif
            <!-- Logout for regular users -->
            @if (!session('is_admin'))
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300">
                        Logout
                    </button>
                </form>
            @endif
        @else
            <!-- Login button for guests -->
            <a href="{{ route('login') }}" class="bg-gray-100 px-4 py-2 rounded-[20px] cursor-pointer hover:bg-gray-200 transition duration-300">Login</a>
        @endif
        <button class="bg-orange-500 px-4 py-2 rounded-[20px] text-white cursor-pointer hover:bg-orange-400 transition duration-300">Book Now</button>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) - Now fixed position overlay -->
<div class="items-top fixed w-full mx-auto pb-7 bg-white bg-opacity-95 hidden z-40 pt-10 shadow-[0_10px_35px_rgba(0,0,0,0.15)] px-4" id="mobileMenu">
    <div class="container flex  flex-col mx-auto mt-18 px-4 gap-2">
        <x-navbar href="{{ route('activities') }}" class="block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer">Activities</x-navbar>
        <x-navbar href="/about" class="block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer">About</x-navbar>
        <x-navbar href="/contact" class="block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg  bg-orange-400 text-white cursor-pointer">Contact</x-navbar>
        <div class="space-y-2">
            @if(Auth::check() || session('is_admin'))
                <!-- Dashboard link for admins (mobile) -->
                @if(session('is_admin'))
                    <a href="{{ route('admin.dashboard') }}" class="w-full bg-blue-100 hover:bg-blue-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                        <span class="text-blue-600">Dashboard</span>
                    </a>
                @endif
                
                <button class="w-full bg-orange-500 hover:bg-orange-400 px-4 py-3 rounded-[20px] text-white text-lg cursor-pointer transition duration-300">Book Now</button>

                <!-- Heart icon for authenticated users -->
                <a href="{{ route('favorites.index') }}" class="w-full bg-red-100 hover:bg-red-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer shadow-lg text-center flex items-center justify-center gap-2" id="mobileLikeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="text-red-500">Favorites</span>
                </a>
                
                
            @else
                <!-- For guests - keep login and book now in same row -->
                <div class="flex gap-3">
                    <a href="{{ route('login') }}" class="flex-1 bg-gray-100 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center hover:bg-gray-200 transition duration-300">Login</a>
                    <button class="flex-1 bg-orange-500 px-4 py-3 rounded-[20px] text-white text-lg cursor-pointer hover:bg-orange-400 transition duration-300">Book Now</button>
                </div>
            @endif
        </div>
        @if(Auth::check() || session('is_admin'))
            @if (!session('is_admin'))
                <div class="">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full bg-red-700 text-white hover:bg-gray-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center transition duration-300">
                            Logout
                        </button>
                    </form>
                </div>
            @endif
        @endif
    </div>
</div>

<main>
    {{ $slot }}
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
    
</body>
</html>