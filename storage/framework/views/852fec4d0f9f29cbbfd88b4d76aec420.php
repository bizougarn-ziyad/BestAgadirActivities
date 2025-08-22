<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if(session('success')): ?>
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div id="errorAlert" class="alert alert-danger text-red-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 w-full">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <div class="relative pt-[135px] pb-20 bg-gradient-to-br from-orange-50 via-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full mb-8">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6">
                Premium <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-500">Activities</span>
            </h1>
            
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                Discover the most exclusive and luxurious experiences Agadir has to offer. From desert safaris to coastal adventures, every activity is carefully curated for unforgettable memories.
            </p>
            <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Professional Guides</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Small Groups</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Premium Service</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Best Prices</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Activities Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if($activities->count() > 0): ?>
                <!-- Filter and Sort Section -->
                <div class="flex flex-wrap justify-between items-center mb-12">
                    <div class="flex items-center gap-4 mb-4 md:mb-0">
                        <h2 class="text-2xl font-bold text-gray-800">
                            <?php echo e($activities->total()); ?> Activities Found
                        </h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 cursor-pointer">
                            <option>Sort by Popular</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest First</option>
                        </select>
                    </div>
                </div>

                <!-- Activities Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">
                    <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="group relative bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col h-full transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-2xl cursor-pointer">
                            <!-- Image Container -->
                            <div class="relative h-64 overflow-hidden flex-shrink-0">
                                <?php if($activity->hasImageData()): ?>
                                    <img src="<?php echo e($activity->image_data_url); ?>" alt="<?php echo e($activity->name); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-br from-orange-200 to-orange-300 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Price Badge -->
                                <div class="absolute top-3 right-3">
                                    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg">
                                        <?php echo e(number_format($activity->price, 0)); ?>€
                                    </div>
                                </div>
                                
                                <!-- Rating Badge -->
                                <div class="absolute top-3 left-3">
                                    <div class="bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full flex items-center gap-1 shadow-md">
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                        <span class="text-xs font-semibold text-gray-800"><?php echo e($activity->average_rating); ?></span>
                                    </div>
                                </div>

                                <!-- Favorite Button -->
                                <button class="absolute bottom-3 right-3 w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md cursor-pointer favorite-btn transition-all duration-300 hover:scale-110" data-activity-id="<?php echo e($activity->id); ?>">
                                    <svg class="w-4 h-4 heart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Content -->
                            <div class="p-5 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold text-gray-800 mb-4 line-clamp-2">
                                    <?php echo e($activity->name); ?>

                                </h3>
                                
                                <!-- Activity Features -->
                                <div class="flex items-center gap-3 mb-4 text-xs text-gray-500 flex-grow">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Full Day</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <span>Small Group</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-2 mt-auto">
                                    <a href="<?php echo e(route('activity.detail', $activity->id)); ?>" class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 font-semibold py-2 px-3 rounded-xl shadow-md text-sm cursor-pointer text-center">
                                        Details
                                    </a>
                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="<?php echo e(route('activity.booking.form', $activity->id)); ?>" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2 px-3 rounded-xl shadow-md text-sm cursor-pointer text-center">
                                            Book Now
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2 px-3 rounded-xl shadow-md text-sm cursor-pointer text-center">
                                            Login to Book
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <!-- No Activities Found -->
                        <div class="col-span-full flex flex-col items-center justify-center py-20">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-2xl font-bold text-gray-600 mb-4">No Activities Found</h3>
                                <p class="text-gray-500 mb-6">No activities are currently available. Please check back later.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if($activities->hasPages()): ?>
                    <div class="flex justify-center mt-16">
                        <div class="bg-gradient-to-br from-white via-orange-50 to-blue-50 rounded-2xl shadow-xl border border-gray-100 px-8 pt-8 pb-4">
                            <div class="flex flex-col items-center space-y-4">
                                <!-- Pagination Links -->
                                <div class="pagination-wrapper">
                                    <?php echo e($activities->links('pagination.custom')); ?>

                                </div>
                                
                                <!-- Page Info at Bottom - Desktop -->
                                <div class="hidden sm:block text-sm text-gray-600 font-medium">
                                    Page <?php echo e($activities->currentPage()); ?> of <?php echo e($activities->lastPage()); ?>

                                </div>
                                
                                <!-- Page Info for Mobile -->
                                <div class="sm:hidden text-xs text-gray-500">
                                    Page <?php echo e($activities->currentPage()); ?> of <?php echo e($activities->lastPage()); ?>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

    <style>
        /* Custom pagination styles */
        .pagination-wrapper nav > div:first-child {
            @apply hidden;
        }
        
        .pagination-wrapper .relative.z-0.inline-flex {
            @apply shadow-2xl;
        }
        
        .pagination-wrapper .relative.z-0.inline-flex > * {
            @apply transition-all duration-200 ease-in-out;
        }
        
        .pagination-wrapper .relative.z-0.inline-flex > *:hover {
            @apply transform scale-105;
        }
        
        .pagination-wrapper .relative.z-0.inline-flex > span[aria-current="page"] span {
            @apply shadow-lg ring-2 ring-blue-300 ring-opacity-50;
        }
    </style>
            <?php endif; ?>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-3xl font-bold text-white mb-4">Stay Updated</h3>
            <p class="text-orange-100 text-lg mb-8">Get notified about new activities and exclusive offers in Agadir</p>
            
            <!-- Newsletter Form -->
            <form id="newsletterForm" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <?php echo csrf_field(); ?>
                <input type="email" 
                       id="newsletterEmail"
                       name="email" 
                       placeholder="Enter your email" 
                       class="flex-1 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-white/50 text-white border rounded-2xl"
                       required>
                <button type="submit" 
                        id="subscribeBtn"
                        class="bg-white text-orange-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors duration-300 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                    Subscribe
                </button>
            </form>
            
            <!-- Message Display -->
            <div id="newsletterMessage" class="mt-4 hidden">
                <p id="messageText" class="text-white text-sm"></p>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>

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
                        window.location.href = '<?php echo e(route("login")); ?>';
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
                    window.location.href = '<?php echo e(route("login")); ?>';
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

// Newsletter subscription functionality
document.getElementById('newsletterForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const emailInput = document.getElementById('newsletterEmail');
    const submitBtn = document.getElementById('subscribeBtn');
    const messageDiv = document.getElementById('newsletterMessage');
    const messageText = document.getElementById('messageText');
    
    // Disable form and show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'Subscribing...';
    messageDiv.classList.add('hidden');
    
    try {
        const formData = new FormData(form);
        
        const response = await fetch('<?php echo e(route("newsletter.subscribe")); ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                               document.querySelector('input[name="_token"]')?.value
            }
        });
        
        const data = await response.json();
        
        // Show message
        messageText.textContent = data.message;
        messageDiv.classList.remove('hidden');
        
        if (data.success) {
            // Clear form on success
            emailInput.value = '';
            showToast(data.message, 'success');
        } else {
            showToast(data.message, 'error');
        }
        
    } catch (error) {
        console.error('Newsletter subscription error:', error);
        messageText.textContent = 'An error occurred. Please try again later.';
        messageDiv.classList.remove('hidden');
        showToast('An error occurred. Please try again later.', 'error');
    } finally {
        // Re-enable form
        submitBtn.disabled = false;
        submitBtn.textContent = 'Subscribe';
        
        // Hide message after 5 seconds
        setTimeout(() => {
            messageDiv.classList.add('hidden');
        }, 5000);
    }
});
</script>
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/activities.blade.php ENDPATH**/ ?>