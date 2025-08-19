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
    <!-- Favorites Header Section -->
    <div class="relative pt-[150px] pb-20 bg-gradient-to-br from-red-50 via-white to-pink-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-red-500 to-pink-500 rounded-full mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">My Favorite Activities</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover and book your saved Agadir adventures</p>
            </div>
        </div>
    </div>

    <!-- Favorites Content Section -->
    <div class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if($favoriteActivities->count() > 0): ?>
                <!-- Favorites Count -->
                <div class="flex justify-between items-center mb-12">
                    <h2 class="text-2xl font-bold text-gray-800"><?php echo e($favoriteActivities->total()); ?> Favorite<?php echo e($favoriteActivities->total() !== 1 ? 's' : ''); ?></h2>
                    <a href="<?php echo e(route('activities')); ?>" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Explore More Activities
                    </a>
                </div>

                <!-- Favorites Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">
                    <?php $__currentLoopData = $favoriteActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group relative bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col h-full">
                            <!-- Image Container -->
                            <div class="relative h-64 overflow-hidden flex-shrink-0">
                                <?php if($activity->hasImageData()): ?>
                                    <img src="<?php echo e($activity->image_data_url); ?>" alt="<?php echo e($activity->name); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-br from-orange-200 to-orange-300 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Favorite Heart Button -->
                                <button class="absolute top-4 right-4 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 favorite-btn" data-activity-id="<?php echo e($activity->id); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                </button>

                                <!-- Price Badge -->
                                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full">
                                    <span class="font-bold text-orange-600">€<?php echo e(number_format($activity->price, 0)); ?></span>
                                </div>
                            </div>

                            <!-- Activity Content -->
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-orange-600 transition-colors"><?php echo e($activity->name); ?></h3>
                                
                                <!-- Activity Features -->
                                <div class="flex items-center gap-3 mb-4 text-xs text-gray-500">
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
                                    <a href="<?php echo e(route('activity.detail', $activity->id)); ?>" class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 font-semibold py-2 px-3 rounded-xl shadow-md text-sm hover:shadow-lg transition-all duration-300 text-center">
                                        Details
                                    </a>
                                    <a href="<?php echo e(route('activity.booking.form', $activity->id)); ?>" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2 px-3 rounded-xl shadow-md text-sm hover:shadow-lg transition-all duration-300 text-center">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <?php if($favoriteActivities->hasPages()): ?>
                    <div class="flex justify-center">
                        <div class="bg-white rounded-xl shadow-lg p-4">
                            <?php echo e($favoriteActivities->links()); ?>

                        </div>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <!-- No Favorites Placeholder -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-red-100 to-pink-100 rounded-full mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">No Favorites Yet</h3>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-8">Start exploring our amazing Agadir activities and add them to your favorites!</p>
                    <a href="<?php echo e(route('activities')); ?>" class="inline-flex items-center bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Explore Activities
                    </a>
                </div>
            <?php endif; ?>
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
    // Handle favorite button clicks
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const activityId = this.dataset.activityId;
            const heartIcon = this.querySelector('svg');
            
            // Disable button temporarily
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
                    if (data.is_favorited) {
                        // Activity was added to favorites
                        heartIcon.classList.add('text-red-500');
                        heartIcon.classList.remove('text-gray-400');
                    } else {
                        // Activity was removed from favorites - remove the card from view
                        const card = this.closest('.group');
                        card.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        
                        setTimeout(() => {
                            // Reload the page to update the favorites list
                            window.location.reload();
                        }, 300);
                    }
                    
                    // Show success message
                    if (data.message) {
                        // Create a simple toast notification
                        const toast = document.createElement('div');
                        toast.className = 'fixed top-[120px] right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300';
                        toast.textContent = data.message;
                        document.body.appendChild(toast);
                        
                        setTimeout(() => {
                            toast.style.opacity = '0';
                            setTimeout(() => document.body.removeChild(toast), 300);
                        }, 2000);
                    }
                } else if (data.redirect) {
                    // User is not authenticated, redirect to login
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                // Re-enable button
                this.disabled = false;
            });
        });
    });
});
</script>
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/favorites.blade.php ENDPATH**/ ?>