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
    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Contact Message</h1>
                <p class="text-gray-600">Message from <?php echo e($contactMessage->first_name); ?> <?php echo e($contactMessage->last_name); ?></p>
            </div>
            <a href="<?php echo e(route('admin.contact-messages.index')); ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                ← Back to Messages
            </a>
        </div>
    </div>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Message Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <!-- Message Header -->
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                                <?php echo e(ucfirst(str_replace('_', ' ', $contactMessage->subject))); ?>

                            </h2>
                            <div class="flex items-center text-sm text-gray-500 space-x-4">
                                <span><?php echo e($contactMessage->created_at->format('M d, Y \a\t H:i')); ?></span>
                                <span>•</span>
                                <span><?php echo e($contactMessage->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>
                        <div>
                            <?php if($contactMessage->status === 'new'): ?>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-orange-100 text-orange-800">
                                    New
                                </span>
                            <?php elseif($contactMessage->status === 'read'): ?>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Read
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Message Body -->
                <div class="prose max-w-none">
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Message:</h3>
                        <p class="text-gray-800 whitespace-pre-wrap"><?php echo e($contactMessage->message); ?></p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Actions</h3>
                    <div class="flex flex-wrap gap-3">
                        <!-- Email Reply -->
                        <a href="mailto:<?php echo e($contactMessage->email); ?>?subject=Re: <?php echo e(urlencode($contactMessage->subject)); ?>&body=<?php echo e(urlencode('Hello ' . $contactMessage->first_name . ',\n\nThank you for contacting Best Agadir Activities. \n\nRegarding your inquiry about: ' . $contactMessage->subject . '\n\n')); ?>"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Reply via Email
                        </a>

                        <!-- WhatsApp -->
                        <?php if($contactMessage->phone): ?>
                            <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $contactMessage->phone)); ?>?text=<?php echo e(urlencode('Hello ' . $contactMessage->first_name . ', thank you for contacting Best Agadir Activities regarding: ' . $contactMessage->subject)); ?>"
                               target="_blank"
                               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.893 3.690z"/>
                                </svg>
                                WhatsApp
                            </a>
                        <?php endif; ?>

                        <!-- Delete -->
                        <form action="<?php echo e(route('admin.contact-messages.destroy', $contactMessage)); ?>" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this message?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Customer Info -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Customer Information</h3>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500">Name</label>
                        <p class="text-gray-800"><?php echo e($contactMessage->first_name); ?> <?php echo e($contactMessage->last_name); ?></p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Email</label>
                        <p class="text-gray-800"><?php echo e($contactMessage->email); ?></p>
                    </div>
                    <?php if($contactMessage->phone): ?>
                        <div>
                            <label class="text-sm font-medium text-gray-500">Phone</label>
                            <p class="text-gray-800"><?php echo e($contactMessage->phone); ?></p>
                        </div>
                    <?php endif; ?>
                    <div>
                        <label class="text-sm font-medium text-gray-500">User Account</label>
                        <p class="text-gray-800"><?php echo e($contactMessage->user->name ?? 'N/A'); ?></p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500">Messages Today</label>
                        <p class="text-gray-800"><?php echo e(\App\Models\ContactMessage::getTodayMessageCount($contactMessage->user_id)); ?>/3</p>
                    </div>
                </div>
            </div>

            <!-- Status Update -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">Update Status</h3>
                <form action="<?php echo e(route('admin.contact-messages.update-status', $contactMessage)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="mb-4">
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <option value="new" <?php echo e($contactMessage->status === 'new' ? 'selected' : ''); ?>>New</option>
                            <option value="read" <?php echo e($contactMessage->status === 'read' ? 'selected' : ''); ?>>Read</option>
                            <option value="replied" <?php echo e($contactMessage->status === 'replied' ? 'selected' : ''); ?>>Replied</option>
                        </select>
                    </div>
                    <button type="submit" 
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
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
<?php endif; ?><?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/admin/contact-messages/show.blade.php ENDPATH**/ ?>