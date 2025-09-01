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
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-3xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 flex items-center gap-3">
                        ✨ Add New Admin
                    </h1>
                    <p class="text-gray-600 mt-2">Create a new administrator account for your platform</p>
                </div>
                <a href="<?php echo e(route('admin.admins.index')); ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                    ← <span>Back to Admins</span>
                </a>
            </div>

            <form action="<?php echo e(route('admin.admins.store')); ?>" method="POST" class="space-y-8">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            👤 <span>Full Name</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="<?php echo e(old('name')); ?>"
                               placeholder="Enter administrator's full name"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 <?php echo e($errors->has('name') ? 'border-red-400' : 'border-gray-200'); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            📧 <span>Email Address</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="<?php echo e(old('email')); ?>"
                               placeholder="admin@example.com"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 <?php echo e($errors->has('email') ? 'border-red-400' : 'border-gray-200'); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            🔒 <span>Password</span>
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Enter secure password"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 <?php echo e($errors->has('password') ? 'border-red-400' : 'border-gray-200'); ?>">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                            💡 <span>Minimum 8 characters required</span>
                        </p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            🔒 <span>Confirm Password</span>
                        </label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Confirm password"
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300">
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="bg-gradient-to-r from-blue-50 to-orange-50 border-l-4 border-orange-500 p-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="text-2xl">🛡️</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Security Information</h3>
                            <ul class="text-gray-600 space-y-1 text-sm">
                                <li>• Admin accounts have full access to the platform</li>
                                <li>• Passwords are securely encrypted and stored</li>
                                <li>• Use strong, unique passwords for security</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        ✨ <span>Create Admin Account</span>
                    </button>
                    <a href="<?php echo e(route('admin.admins.index')); ?>" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        ← <span>Cancel</span>
                    </a>
                </div>
            </form>
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
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/admin/admins/create.blade.php ENDPATH**/ ?>