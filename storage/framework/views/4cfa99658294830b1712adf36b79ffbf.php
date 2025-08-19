<?php
    use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
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
    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => '/','class' => 'cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/','class' => 'cursor-pointer']); ?>
        <img src="<?php echo e(asset('images/logoAgadir1.png')); ?>" alt="Logo Agadir" class="w-[220px] py-4 md:py-0 cursor-pointer">
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

    <!-- Navigation Links - Hidden on mobile, shown on medium+ -->
    <div class="hidden md:flex justify-center items-center space-x-2">
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => ''.e(route('activities')).'','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('activities')).'','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']); ?>Activities <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => '/about','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/about','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']); ?>About <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => '/contact','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/contact','class' => 'text-base md:hover:bg-gray-100 no-underline px-4 py-2 rounded-[20px] cursor-pointer']); ?>Contact <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
    </div>

    <!-- Mobile Menu Button (Hamburger) -->
    <button class="md:hidden p-2 pr-5 rounded-lg hover:bg-gray-100" id="mobileMenuButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="hidden md:flex gap-4 mr-3">
        <?php if(Auth::check() || session('is_admin')): ?>
            <!-- Dashboard link for admins -->
            <?php if(session('is_admin')): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="text-blue-600">Dashboard</span>
                </a>
            <?php endif; ?>
            
            <!-- Bookings for authenticated users -->
            <?php if(Auth::check()): ?>
                <a href="<?php echo e(route('bookings.index')); ?>" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300 flex items-center gap-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Bookings</span>
                </a>
            <?php endif; ?>
            
            <!-- Heart icon for authenticated users only -->
            <?php if(Auth::check() || session('is_admin')): ?>
                <a href="<?php echo e(route('favorites.index')); ?>" class="bg-red-100 hover:bg-red-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300 flex items-center gap-2" id="likeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="text-red-500">Favorites</span>
                </a>
            <?php endif; ?>
            <!-- Logout for regular users -->
            <?php if(!session('is_admin')): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-[20px] cursor-pointer transition duration-300">
                        Logout
                    </button>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <!-- Login button for guests -->
            <a href="<?php echo e(route('login')); ?>" class="bg-gray-100 px-4 py-2 rounded-[20px] cursor-pointer hover:bg-gray-200 transition duration-300">Login</a>
            <!-- Bookings button that redirects to login for guests -->
            <a href="<?php echo e(route('login')); ?>" class="bg-orange-500 px-4 py-2 rounded-[20px] text-white cursor-pointer hover:bg-orange-400 transition duration-300 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <span>Bookings</span>
            </a>
        <?php endif; ?>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) - Now fixed position overlay -->
<div class="items-top fixed w-full mx-auto pb-7 bg-white bg-opacity-95 hidden z-40 pt-10 shadow-[0_10px_35px_rgba(0,0,0,0.15)] px-4" id="mobileMenu">
    <div class="container flex  flex-col mx-auto mt-18 px-4 gap-2">
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => ''.e(route('activities')).'','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('activities')).'','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer']); ?>Activities <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => '/about','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/about','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg bg-orange-400 text-white cursor-pointer']); ?>About <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['href' => '/contact','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg  bg-orange-400 text-white cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '/contact','class' => 'block py-3 px-4 md:hover:bg-gray-100 rounded-[20px] text-xl text-center shadow-lg  bg-orange-400 text-white cursor-pointer']); ?>Contact <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
        <div class="space-y-2">
            <?php if(Auth::check() || session('is_admin')): ?>
                <!-- Dashboard link for admins (mobile) -->
                <?php if(session('is_admin')): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="w-full bg-blue-100 hover:bg-blue-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                        </svg>
                        <span class="text-blue-600">Dashboard</span>
                    </a>
                <?php endif; ?>

                <!-- Bookings for authenticated users (mobile) -->
                <?php if(Auth::check()): ?>
                    <a href="<?php echo e(route('bookings.index')); ?>" class="w-full bg-orange-500 hover:bg-orange-600 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center flex items-center justify-center gap-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Bookings</span>
                    </a>
                <?php endif; ?>
                
                <!-- Heart icon for authenticated users -->
                <a href="<?php echo e(route('favorites.index')); ?>" class="w-full bg-red-100 hover:bg-red-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer shadow-lg text-center flex items-center justify-center gap-2" id="mobileLikeButton">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span class="text-red-500">Favorites</span>
                </a>
                
                
            <?php else: ?>
                <!-- For guests - login and bookings buttons -->
                <div class="space-y-2">
                    <a href="<?php echo e(route('login')); ?>" class="w-full bg-gray-100 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center hover:bg-gray-200 transition duration-300">Login</a>
                    <a href="<?php echo e(route('login')); ?>" class="w-full bg-orange-500 px-4 py-3 rounded-[20px] text-white text-lg cursor-pointer hover:bg-orange-400 transition duration-300 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Bookings</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php if(Auth::check() || session('is_admin')): ?>
            <?php if(!session('is_admin')): ?>
                <div class="">
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="w-full">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full bg-red-700 text-white hover:bg-gray-200 px-4 py-3 rounded-[20px] text-lg cursor-pointer border shadow-lg text-center transition duration-300">
                            Logout
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<main>
    <?php echo e($slot); ?>

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
</script>

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
</body>
</html><?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/components/layout.blade.php ENDPATH**/ ?>