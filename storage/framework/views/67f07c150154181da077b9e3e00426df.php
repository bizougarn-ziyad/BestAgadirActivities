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
                    <h1 class="text-4xl font-bold text-orange-500 mb-2">🎟️ Booking Details</h1>
                    <p class="text-gray-600">Booking ID: #<?php echo e($booking->id); ?></p>
                </div>
                <a href="<?php echo e(route('admin.bookings.index')); ?>" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                    <span>←</span>
                    <span>Back to Bookings</span>
                </a>
            </div>

            <!-- Status Badge -->
            <div class="mb-6">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold
                    <?php if($booking->status === 'paid'): ?> bg-green-100 text-green-800
                    <?php elseif($booking->status === 'unpaid'): ?> bg-yellow-100 text-yellow-800
                    <?php else: ?> bg-red-100 text-red-800 <?php endif; ?>">
                    <?php if($booking->status === 'paid'): ?> ✅
                    <?php elseif($booking->status === 'unpaid'): ?> ⏳
                    <?php else: ?> ❌ <?php endif; ?>
                    <?php echo e(ucfirst($booking->status)); ?>

                </span>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Booking Information -->
                <div class="space-y-6">
                    <!-- Activity Details -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-xl border border-orange-200">
                        <h3 class="text-xl font-bold text-orange-800 mb-4 flex items-center gap-2">
                            <span>🏄‍♂️</span>
                            <span>Activity Details</span>
                        </h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-orange-700">Name:</span>
                                <span class="text-orange-900 ml-2"><?php echo e($booking->activity->name); ?></span>
                            </div>
                            <div>
                                <span class="font-medium text-orange-700">Description:</span>
                                <p class="text-orange-900 mt-1 text-sm"><?php echo e(Str::limit($booking->activity->bio, 150)); ?></p>
                            </div>
                            <div>
                                <span class="font-medium text-orange-700">Max Participants:</span>
                                <span class="text-orange-900 ml-2"><?php echo e($booking->activity->max_participants); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                        <h3 class="text-xl font-bold text-blue-800 mb-4 flex items-center gap-2">
                            <span>📋</span>
                            <span>Booking Information</span>
                        </h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-blue-700">Booking Date:</span>
                                <span class="text-blue-900 ml-2"><?php echo e(\Carbon\Carbon::parse($booking->booking_date)->format('l, F j, Y')); ?></span>
                            </div>
                            <div>
                                <span class="font-medium text-blue-700">Participants:</span>
                                <span class="text-blue-900 ml-2"><?php echo e($booking->participants); ?></span>
                            </div>
                            <div>
                                <span class="font-medium text-blue-700">Booked On:</span>
                                <span class="text-blue-900 ml-2"><?php echo e($booking->created_at->format('M j, Y \a\t g:i A')); ?></span>
                            </div>
                            <?php if($booking->session_id): ?>
                            <div>
                                <span class="font-medium text-blue-700">Session ID:</span>
                                <span class="text-blue-900 ml-2 text-xs font-mono"><?php echo e($booking->session_id); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Financial Information -->
                <div class="space-y-6">
                    <!-- Pricing Details -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-xl border border-green-200">
                        <h3 class="text-xl font-bold text-green-800 mb-4 flex items-center gap-2">
                            <span>💰</span>
                            <span>Financial Details</span>
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-green-700">Price per person:</span>
                                <span class="text-green-900 font-semibold">$<?php echo e(number_format($booking->price_per_person, 2)); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-green-700">Number of participants:</span>
                                <span class="text-green-900"><?php echo e($booking->participants); ?></span>
                            </div>
                            <hr class="border-green-300">
                            <div class="flex justify-between items-center text-lg">
                                <span class="font-bold text-green-700">Total Amount:</span>
                                <span class="text-green-900 font-bold">$<?php echo e(number_format($booking->total_price, 2)); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Availability Information -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                        <h3 class="text-xl font-bold text-purple-800 mb-4 flex items-center gap-2">
                            <span>📊</span>
                            <span>Availability Status</span>
                        </h3>
                        <?php
                            $availableSpots = $booking->activity->getAvailableSpotsForDate($booking->booking_date);
                            $bookedSpots = $booking->activity->max_participants - $availableSpots;
                        ?>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Spots booked for this date:</span>
                                <span class="text-purple-900 font-semibold"><?php echo e($bookedSpots); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Spots still available:</span>
                                <span class="text-purple-900 font-semibold"><?php echo e($availableSpots); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-purple-700">Maximum capacity:</span>
                                <span class="text-purple-900 font-semibold"><?php echo e($booking->activity->max_participants); ?></span>
                            </div>
                            
                            <!-- Progress Bar -->
                            <div class="mt-4">
                                <div class="flex justify-between text-sm text-purple-600 mb-2">
                                    <span>Booking Progress</span>
                                    <span><?php echo e(number_format(($bookedSpots / $booking->activity->max_participants) * 100, 1)); ?>% Full</span>
                                </div>
                                <div class="w-full bg-purple-200 rounded-full h-3">
                                    <div class="bg-purple-600 h-3 rounded-full transition-all duration-300" 
                                         style="width: <?php echo e(($bookedSpots / $booking->activity->max_participants) * 100); ?>%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex gap-4">
                    <a href="<?php echo e(route('admin.bookings.index')); ?>" 
                       class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg transition-colors flex items-center gap-2">
                        <span>📋</span>
                        <span>View All Bookings</span>
                    </a>
                    <a href="<?php echo e(route('admin.activities.show', $booking->activity->id)); ?>" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors flex items-center gap-2">
                        <span>🏄‍♂️</span>
                        <span>View Activity</span>
                    </a>
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
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/admin/bookings/show.blade.php ENDPATH**/ ?>