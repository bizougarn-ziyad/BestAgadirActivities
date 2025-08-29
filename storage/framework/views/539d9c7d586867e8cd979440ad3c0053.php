<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <title>Forgot Password</title>
</head>
<body class="bg-[#fffaf0]">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-[450px] w-full">
            <div class="bg-white p-8 border border-gray-200 rounded-lg shadow-lg">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Forgot Password</h2>
                    <p class="text-gray-600 mt-2">Enter your email to reset your password</p>
                </div>

                <?php if(session('status')): ?>
                    <div class="mb-4 text-sm font-medium text-green-600">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form class="space-y-6" method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                        <input type="email" name="email" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                               placeholder="Enter your email" value="<?php echo e(old('email')); ?>" required autofocus>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold cursor-pointer">
                        Send Password Reset Link
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="<?php echo e(route('login')); ?>" class="text-orange-500 hover:text-orange-600 font-semibold">
                        Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>

<script>
// Check authentication status on page load and redirect if authenticated
document.addEventListener('DOMContentLoaded', function() {
    // Check authentication status
    fetch('/auth-status', {
        method: 'GET',
        headers: {
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        },
        cache: 'no-store'
    })
    .then(response => response.json())
    .then(data => {
        if (data.authenticated && data.redirect_url) {
            window.location.replace(data.redirect_url);
        }
    })
    .catch(error => {
        console.error('Auth status check failed:', error);
    });

    // Handle browser back/forward navigation
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            fetch('/auth-status', {
                method: 'GET',
                headers: {
                    'Cache-Control': 'no-cache',
                    'Pragma': 'no-cache'
                },
                cache: 'no-store'
            })
            .then(response => response.json())
            .then(data => {
                if (data.authenticated && data.redirect_url) {
                    window.location.replace(data.redirect_url);
                }
            });
        }
    });
});
</script>

</body>
</html><?php /**PATH C:\Users\ziyad\Herd\BestAgadirActivities\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>