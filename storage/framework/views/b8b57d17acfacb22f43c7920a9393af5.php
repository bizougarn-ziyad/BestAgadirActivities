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
    <!-- Booking Success Hero Section -->
    <div class="relative pt-[107px] pb-20 bg-gradient-to-br from-green-50 via-white to-blue-50 min-h-screen">
        <!-- Success Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Card -->
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                <!-- Header with Success Icon -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-12 text-center">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Booking Confirmed!</h1>
                    <p class="text-xl text-green-100">Thank you for your booking. Your payment has been processed successfully.</p>
                </div>

                <!-- Content Section -->
                <div class="px-8 py-12">
                    <?php if(isset($order) && $order): ?>
                        <!-- Booking Details Card -->
                        <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                Booking Details
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php if($order->activity): ?>
                                    <div class="bg-white p-6 rounded-xl border border-gray-200">
                                        <div class="flex items-center gap-3 mb-4">
                                            <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500">Activity</p>
                                                <p class="text-lg font-semibold text-gray-800"><?php echo e($order->activity->name); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="bg-white p-6 rounded-xl border border-gray-200">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Booking Date</p>
                                            <p class="text-lg font-semibold text-gray-800"><?php echo e($order->booking_date ? $order->booking_date->format('F j, Y') : 'N/A'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white p-6 rounded-xl border border-gray-200">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Participants</p>
                                            <p class="text-lg font-semibold text-gray-800"><?php echo e($order->participants); ?> <?php echo e($order->participants == 1 ? 'person' : 'people'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-white p-6 rounded-xl border border-gray-200">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Price per Person</p>
                                            <p class="text-lg font-semibold text-gray-800">$<?php echo e(number_format($order->price_per_person, 2)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Total and Reference -->
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-orange-50 p-6 rounded-xl border-2 border-orange-200">
                                    <div class="text-center">
                                        <p class="text-sm font-medium text-orange-600 mb-2">Total Paid</p>
                                        <p class="text-3xl font-bold text-orange-800">$<?php echo e(number_format($order->total_price, 2)); ?></p>
                                    </div>
                                </div>
                                
                                <div class="bg-blue-50 p-6 rounded-xl border-2 border-blue-200">
                                    <div class="text-center">
                                        <p class="text-sm font-medium text-blue-600 mb-2">Booking Reference</p>
                                        <p class="text-2xl font-mono font-bold text-blue-800"><?php echo e(strtoupper(substr($order->session_id, -8))); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($session)): ?>
                        <!-- Payment Information -->
                        <div class="bg-green-50 rounded-2xl p-8 mb-8">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                Payment Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1">Session ID</p>
                                    <p class="text-sm font-mono text-gray-800 bg-white px-3 py-2 rounded-lg border break-all overflow-hidden"><?php echo e($session->id); ?></p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1">Payment Status</p>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <?php echo e(ucfirst($session->payment_status)); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Important Notice -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-8 mb-8">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-yellow-800 mb-2">Important Notice</h4>
                                <p class="text-yellow-700 leading-relaxed">
                                    Please save this confirmation for your records. You may be asked to present this information 
                                    on the day of your activity. A confirmation email has also been sent to your registered email address.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button onclick="savePaymentDetails()" class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Save Payment Details
                        </button>
                        <a href="<?php echo e(url('/')); ?>" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Return to Home
                        </a>
                        <a href="<?php echo e(route('activities')); ?>" class="bg-white border-2 border-orange-500 text-orange-500 hover:bg-orange-50 px-8 py-4 rounded-2xl font-semibold text-center transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2v0M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                            </svg>
                            Browse More Activities
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function savePaymentDetails() {
            // Get all the payment and booking details
            const bookingDetails = {
                <?php if(isset($order) && $order): ?>
                activity: "<?php echo e($order->activity ? $order->activity->name : 'N/A'); ?>",
                bookingDate: "<?php echo e($order->booking_date ? $order->booking_date->format('F j, Y') : 'N/A'); ?>",
                participants: "<?php echo e($order->participants); ?>",
                pricePerPerson: "$<?php echo e(number_format($order->price_per_person, 2)); ?>",
                totalPaid: "$<?php echo e(number_format($order->total_price, 2)); ?>",
                bookingReference: "<?php echo e(strtoupper(substr($order->session_id, -8))); ?>",
                <?php endif; ?>
                <?php if(isset($session)): ?>
                sessionId: "<?php echo e($session->id); ?>",
                paymentStatus: "<?php echo e(ucfirst($session->payment_status)); ?>",
                <?php endif; ?>
                confirmationDate: new Date().toLocaleDateString()
            };

            // Create the content for the file
            let content = "=== BEST AGADIR ACTIVITIES - PAYMENT CONFIRMATION ===\n\n";
            content += "Booking Confirmed!\n";
            content += "Thank you for your booking. Your payment has been processed successfully.\n\n";
            
            <?php if(isset($order) && $order): ?>
            content += "BOOKING DETAILS:\n";
            content += "Activity: " + bookingDetails.activity + "\n";
            content += "Booking Date: " + bookingDetails.bookingDate + "\n";
            content += "Participants: " + bookingDetails.participants + " " + (bookingDetails.participants == "1" ? "person" : "people") + "\n";
            content += "Price per Person: " + bookingDetails.pricePerPerson + "\n";
            content += "Total Paid: " + bookingDetails.totalPaid + "\n";
            content += "Booking Reference: " + bookingDetails.bookingReference + "\n\n";
            <?php endif; ?>
            
            <?php if(isset($session)): ?>
            content += "PAYMENT INFORMATION:\n";
            content += "Session ID: " + bookingDetails.sessionId + "\n";
            content += "Payment Status: " + bookingDetails.paymentStatus + "\n\n";
            <?php endif; ?>
            
            content += "IMPORTANT NOTICE:\n";
            content += "Please save this confirmation for your records.\n";
            content += "You may be asked to present this information on the day of your activity.\n";
            content += "A confirmation email has also been sent to your registered email address.\n\n";
            content += "Confirmation saved on: " + bookingDetails.confirmationDate + "\n";
            content += "\n=== END OF CONFIRMATION ===";

            // Create and download the file
            const blob = new Blob([content], { type: 'text/plain' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'Payment_Confirmation_<?php echo e(isset($order) && $order ? strtoupper(substr($order->session_id, -8)) : "Details"); ?>.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
            
            // Show success message
            alert('Payment details saved successfully! Check your downloads folder.');
        }
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
<?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/booking-success.blade.php ENDPATH**/ ?>