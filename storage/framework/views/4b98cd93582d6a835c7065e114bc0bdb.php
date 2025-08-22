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
    <div class="pt-[107.05px] min-h-screen bg-[#fffaf0]">
        <!-- Luxury Hero Section -->
        <div class="relative bg-gradient-to-br from-orange-500 via-orange-600 to-red-500 text-white py-16 md:py-24 lg:py-32 overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-10 left-4 md:top-20 md:left-20 w-24 md:w-40 h-24 md:h-40 bg-white rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-10 right-4 md:bottom-20 md:right-20 w-20 md:w-32 h-20 md:h-32 bg-yellow-200 rounded-full blur-2xl animate-pulse delay-700"></div>
                <div class="absolute top-1/2 left-1/2 w-16 md:w-24 h-16 md:h-24 bg-orange-200 rounded-full blur-xl animate-pulse delay-1000"></div>
            </div>
            
            <!-- Hero Content -->
            <div class="relative max-w-4xl mx-auto px-4 text-center">
                <div class="mb-6 md:mb-8">
                    <div class="inline-block p-4 md:p-6 bg-white/20 rounded-full backdrop-blur-sm mb-6 md:mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-12 md:w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-light mb-6 md:mb-8 leading-tight tracking-tight">
                    Let's Create Your<br>
                    <span class="font-bold bg-gradient-to-r from-yellow-200 to-white bg-clip-text text-transparent">Perfect Adventure</span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl opacity-70 max-w-3xl mx-auto font-light leading-relaxed px-2">
                    Reach out to our travel specialists for personalized assistance
                </p>
            </div>
        </div>

        <!-- Luxury Contact Section -->
        <div class="max-w-6xl mx-auto px-4 py-10 md:py-16 lg:py-20 pb-16 md:pb-20 lg:pb-24">
            <div class="grid lg:grid-cols-5 gap-8 lg:gap-16 items-start">
                <!-- Contact Information - Simplified & Elegant -->
                <div class="lg:col-span-2 order-2 lg:order-1">
                    <div class="lg:sticky lg:top-32">
                        <div class="mb-8 lg:mb-12">
                            <h2 class="text-2xl md:text-3xl lg:text-4xl font-light text-gray-800 mb-4 lg:mb-6 tracking-tight">
                                Ready to <span class="font-semibold text-orange-500">Explore?</span>
                            </h2>
                            <p class="text-base md:text-lg text-gray-600 leading-relaxed font-light">
                                Our travel specialists are standing by to craft your perfect Moroccan experience.
                            </p>
                        </div>

                        <!-- Elegant Contact Cards -->
                        <div class="space-y-6 lg:space-y-8">
                            <!-- WhatsApp Contact -->
                            <div class="group bg-white rounded-2xl p-6 lg:p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100">
                                <div class="flex items-center gap-4 lg:gap-6">
                                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.893 3.690z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-1 lg:mb-2">WhatsApp</h3>
                                        <p class="text-orange-600 font-medium text-base lg:text-lg">+212 661-123-456</p>
                                        <p class="text-gray-500 text-xs lg:text-sm mt-1">Instant responses • Available 24/7</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Contact -->
                            <div class="group bg-white rounded-2xl p-6 lg:p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100">
                                <div class="flex items-center gap-4 lg:gap-6">
                                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-1 lg:mb-2">Email</h3>
                                        <p class="text-orange-600 font-medium text-base lg:text-lg">info@bestagadiractivities.com</p>
                                        <p class="text-gray-500 text-xs lg:text-sm mt-1">Response within 2 hours</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="group bg-white rounded-2xl p-6 lg:p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100">
                                <div class="flex items-center gap-4 lg:gap-6">
                                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-8 lg:w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-1 lg:mb-2">Visit Us</h3>
                                        <p class="text-orange-600 font-medium">Avenue Mohamed V</p>
                                        <p class="text-gray-600">Agadir 80000, Morocco</p>
                                        <p class="text-gray-500 text-xs lg:text-sm mt-1">Near the main marina</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Luxury Contact Form -->
                <div class="lg:col-span-3 order-1 lg:order-2">
                    <div class="bg-white rounded-3xl shadow-2xl p-6 md:p-8 lg:p-12 border border-gray-100">
                        <div class="text-center mb-8 lg:mb-12">
                            <h3 class="text-2xl md:text-3xl lg:text-4xl font-light text-gray-800 mb-3 lg:mb-4">
                                Send Us a <span class="font-semibold text-orange-500">Message</span>
                            </h3>
                            <p class="text-gray-600 font-light text-sm md:text-base">Tell us about your dream adventure and we'll make it happen</p>
                        </div>

                        <?php if(auth()->guard()->guest()): ?>
                            <!-- Login Required Notice -->
                            <div class="bg-orange-50 border-l-4 border-orange-400 text-orange-700 px-6 py-4 rounded-lg mb-8">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-medium">Login Required</p>
                                        <p class="text-sm">Please <a href="<?php echo e(route('login')); ?>" class="underline font-medium">login to your account</a> to send us a message. This helps us provide you with personalized assistance.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <!-- Daily Limit Info - Only show when limit is exceeded -->
                            <?php
                                $todayMessageCount = \App\Models\ContactMessage::getTodayMessageCount(auth()->id());
                                $remainingMessages = 3 - $todayMessageCount;
                            ?>
                            
                            <?php if($remainingMessages <= 0): ?>
                                <div id="limitExceededAlert" class="bg-red-50 border-l-4 border-red-400 text-red-700 px-6 py-4 rounded-lg mb-8">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-sm">You have reached your daily limit of 3 messages. Please try again tomorrow.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if(session('success')): ?>
                            <div id="successAlert" class="bg-green-50 border-l-4 border-green-400 text-green-700 px-6 py-4 rounded-lg mb-8">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <?php echo e(session('success')); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div id="errorAlert" class="bg-red-50 border-l-4 border-red-400 text-red-700 px-6 py-4 rounded-lg mb-8">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <?php echo e(session('error')); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-6 py-4 rounded-lg mb-8">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <ul class="list-disc list-inside">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                            $formDisabled = !auth()->check() || (auth()->check() && \App\Models\ContactMessage::hasReachedDailyLimit(auth()->id()));
                        ?>

                        <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="space-y-6 lg:space-y-8 <?php echo e($formDisabled ? 'opacity-50 pointer-events-none' : ''); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Name Fields -->
                            <div class="grid md:grid-cols-2 gap-4 lg:gap-6">
                                <div class="group">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required value="<?php echo e(old('first_name')); ?>" <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                           class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                           placeholder="John">
                                </div>
                                <div class="group">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required value="<?php echo e(old('last_name')); ?>" <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                           class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                           placeholder="Doe">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="group">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">Email Address</label>
                                <input type="email" id="email" name="email" required value="<?php echo e(old('email')); ?>" <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                       class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                       placeholder="john@example.com">
                            </div>

                            <!-- Phone -->
                            <div class="group">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">Phone Number (Optional)</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                       class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed"
                                       placeholder="+212 6XX-XXX-XXX">
                            </div>

                            <!-- Subject -->
                            <div class="group">
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">What can we help you with?</label>
                                <select id="subject" name="subject" required <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                        class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 disabled:bg-gray-100 disabled:cursor-not-allowed">
                                    <option value="">Choose a topic</option>
                                    <option value="general_inquiry" <?php echo e(old('subject') == 'general_inquiry' ? 'selected' : ''); ?>>General Inquiry</option>
                                    <option value="booking_question" <?php echo e(old('subject') == 'booking_question' ? 'selected' : ''); ?>>Booking Question</option>
                                    <option value="custom_trip" <?php echo e(old('subject') == 'custom_trip' ? 'selected' : ''); ?>>Custom Trip Planning</option>
                                    <option value="group_booking" <?php echo e(old('subject') == 'group_booking' ? 'selected' : ''); ?>>Group Booking</option>
                                    <option value="feedback" <?php echo e(old('subject') == 'feedback' ? 'selected' : ''); ?>>Feedback</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="group">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2 lg:mb-3">Tell us about your dream adventure</label>
                                <textarea id="message" name="message" rows="5" required <?php echo e($formDisabled ? 'disabled' : ''); ?>

                                          class="w-full px-4 py-3 lg:px-6 lg:py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 font-light text-base lg:text-lg group-hover:border-gray-300 resize-none disabled:bg-gray-100 disabled:cursor-not-allowed"
                                          placeholder="Describe what you're looking for..."><?php echo e(old('message')); ?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-2 lg:pt-4">
                                <?php if($formDisabled): ?>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <a href="<?php echo e(route('login')); ?>" 
                                           class="group w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-4 lg:px-8 lg:py-5 rounded-xl hover:shadow-2xl transition-all duration-300 text-base lg:text-lg font-medium cursor-pointer transform hover:scale-[1.02] relative overflow-hidden block text-center">
                                            <span class="relative z-10 flex items-center justify-center">
                                                Login to Send Message
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6 ml-2 lg:ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 0a1 1 0 11-2 0 1 1 0 012 0zM3 12a1 1 0 11-2 0 1 1 0 012 0z" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php else: ?>
                                        <button type="button" disabled 
                                                class="w-full bg-gray-400 text-white px-6 py-4 lg:px-8 lg:py-5 rounded-xl text-base lg:text-lg font-medium cursor-not-allowed">
                                            Daily Limit Reached (3/3)
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="submit" 
                                            class="group w-full bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-4 lg:px-8 lg:py-5 rounded-xl hover:shadow-2xl transition-all duration-300 text-base lg:text-lg font-medium cursor-pointer transform hover:scale-[1.02] relative overflow-hidden">
                                        <span class="relative z-10 flex items-center justify-center">
                                            Send Message
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6 ml-2 lg:ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                        </span>
                                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-red-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Trust Section -->
            <div class="mt-16 lg:mt-20 mb-8 lg:mb-12 text-center">
                <div class="max-w-4xl mx-auto">
                    <h4 class="text-xl lg:text-2xl font-light text-gray-800 mb-6 lg:mb-8">Why travelers choose us</h4>
                    <div class="grid md:grid-cols-3 gap-6 lg:gap-8 mb-8 lg:mb-12">
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-green-100 rounded-full flex items-center justify-center mb-3 lg:mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 lg:h-8 lg:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h5 class="font-semibold text-gray-800 mb-2 text-base lg:text-lg">Response in 2 hours</h5>
                            <p class="text-gray-600 text-sm lg:text-base">Our team responds quickly to all inquiries</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-orange-100 rounded-full flex items-center justify-center mb-3 lg:mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 lg:h-8 lg:w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h5 class="font-semibold text-gray-800 mb-2 text-base lg:text-lg">Personalized experiences</h5>
                            <p class="text-gray-600 text-sm lg:text-base">Every trip is tailored to your preferences</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 lg:w-16 lg:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-3 lg:mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 lg:h-8 lg:w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <h5 class="font-semibold text-gray-800 mb-2 text-base lg:text-lg">Secure & trusted</h5>
                            <p class="text-gray-600 text-sm lg:text-base">Your information is safe with us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success and error messages after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            function hideAlert(alertId) {
                const alert = document.getElementById(alertId);
                if (alert) {
                    setTimeout(function() {
                        alert.style.transition = 'opacity 0.5s ease-out';
                        alert.style.opacity = '0';
                        setTimeout(() => {
                            alert.style.display = 'none';
                        }, 500);
                    }, 3000);
                }
            }

            // Hide success message
            hideAlert('successAlert');
            
            // Hide error message (from session)
            hideAlert('errorAlert');
            
            // Hide limit exceeded message
            hideAlert('limitExceededAlert');
        });
    </script>
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
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/contact.blade.php ENDPATH**/ ?>