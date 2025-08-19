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
    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-4xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 mb-2">🏄‍♂️ Activity Details</h1>
                    <p class="text-gray-600"><?php echo e($activity->name); ?></p>
                </div>
                <div class="flex gap-3">
                    <a href="<?php echo e(route('admin.activities.edit', $activity)); ?>" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                        <span>✏️</span>
                        <span>Edit</span>
                    </a>
                    <a href="<?php echo e(route('admin.activities.index')); ?>" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                        <span>←</span>
                        <span>Back</span>
                    </a>
                </div>
            </div>

            <!-- Activity Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Activity Image -->
                <div>
                    <?php if($activity->hasImageData()): ?>
                        <img src="<?php echo e($activity->image_data_url); ?>" 
                             alt="<?php echo e($activity->name); ?>"
                             class="w-full h-64 lg:h-80 object-cover rounded-xl shadow-lg">
                    <?php else: ?>
                        <div class="w-full h-64 lg:h-80 bg-gradient-to-br from-orange-200 to-orange-300 rounded-xl flex items-center justify-center">
                            <svg class="w-20 h-20 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Activity Details -->
                <div class="space-y-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                        <h3 class="text-xl font-bold text-blue-800 mb-4">📋 Basic Information</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-blue-700">Status:</span>
                                <span class="px-3 py-1 rounded-full text-sm font-semibold <?php echo e($activity->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                    <?php echo e($activity->is_active ? 'Active' : 'Inactive'); ?>

                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-blue-700">Price:</span>
                                <span class="text-blue-900 font-semibold">$<?php echo e(number_format($activity->price, 2)); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-blue-700">Max Participants:</span>
                                <span class="text-blue-900 font-semibold"><?php echo e($activity->max_participants); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-blue-700">Rating:</span>
                                <span class="text-blue-900 font-semibold"><?php echo e($activity->average_rating); ?>/5 (<?php echo e($activity->review_count); ?> reviews)</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                        <h3 class="text-xl font-bold text-green-800 mb-4">📊 Booking Stats</h3>
                        <div class="space-y-3">
                            <?php
                                $totalBookings = $activity->paidOrders()->count();
                                $totalParticipants = $activity->paidOrders()->sum('participants');
                                $totalRevenue = $activity->paidOrders()->sum('total_price');
                            ?>
                            <div class="flex justify-between">
                                <span class="font-medium text-green-700">Total Bookings:</span>
                                <span class="text-green-900 font-semibold"><?php echo e($totalBookings); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-green-700">Total Participants:</span>
                                <span class="text-green-900 font-semibold"><?php echo e($totalParticipants); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-green-700">Total Revenue:</span>
                                <span class="text-green-900 font-semibold">$<?php echo e(number_format($totalRevenue, 2)); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-8">
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border border-orange-200">
                    <h3 class="text-xl font-bold text-orange-800 mb-4">📝 Description</h3>
                    <p class="text-orange-900 leading-relaxed"><?php echo e($activity->bio); ?></p>
                </div>
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
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/admin/activities/show.blade.php ENDPATH**/ ?>