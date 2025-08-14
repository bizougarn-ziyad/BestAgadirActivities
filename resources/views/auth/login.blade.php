<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-[#fffaf0]" data-password-setup="{{ session('show_password_setup') ? 'true' : 'false' }}">
    <div class="min-h-screen flex items-center justify-center  px-4">
        <div class="max-w-[1200px] w-full ">
            <!-- Login/Signup Container -->
            <div class="flex flex-col md:flex-row gap-8 items-center justify-center ">
                
                <!-- Left Side - Login Form -->
                <div class="bg-white p-8 w-full max-w-[450px] transition-all duration-300 border border-gray-200 rounded-lg shadow-lg 
                     {{ session('show_password_setup') ? 'hidden' : 
                        (((isset($show_register) && $show_register) || session('show_register') || $errors->has('first_name') || $errors->has('last_name') || $errors->has('password_confirmation')) ? 'hidden' : '') }}" id="login-form">
                    
                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-[12px]">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->has('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-[12px]">
                            {{ $errors->first('error') }}
                        </div>
                    @endif

                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Welcome Back!</h2>
                        <p class="text-gray-600 mt-2">Please login to your account</p>
                    </div>

                    <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                        @csrf
                        <div>
                            <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                            <input type="email" name="email" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors @error('email')  @enderror" placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="text-gray-700 text-sm font-semibold">Password</label>
                            <input type="password" name="password" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors @error('password')  @enderror" placeholder="Enter your password">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" id="remember" class="w-4 h-4 border-gray-300 rounded focus:ring-orange-500 text-orange-500">
                                <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                            </div>
                            <a href="{{ url('/forgot-password') }}" class="text-sm text-orange-500 hover:text-orange-600">Forgot password?</a>
                        </div>

                        <button class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold">
                            Sign In
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Don't have an account? 
                            <a href="#" class="text-orange-500 hover:text-orange-600 font-semibold" id="signUp">Sign up</a>
                        </p>
                    </div>

                    <!-- Social Login Options -->

                    <div class="mt-8 text-center">
                        <p class="text-gray-600 mb-4">Or continue with</p>
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('auth.google') }}" class="flex items-center px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-300 cursor-pointer">
                                <img src="{{ asset('images/google.png') }}" alt="Google" class="w-5 h-5 mr-2">
                                Google
                            </a>
                            <a href="/" class="flex items-center px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-300 cursor-pointer">
                                <img src="{{ asset('images/facebook2.png') }}" alt="Facebook" class="w-6 h-6 mr-2">
                                Facebook
                            </a>
                </div>
            </div>
                </div>

                <!-- Right Side - Sign Up Form -->
                <div class="bg-white p-8 w-full max-w-[450px] transition-all duration-300 border border-gray-200 rounded-lg shadow-lg mt-5
                     {{ session('show_password_setup') ? 'hidden' : 
                        (((isset($show_register) && $show_register) || session('show_register') || $errors->has('first_name') || $errors->has('last_name') || $errors->has('password_confirmation') || ($errors->has('general') && !session('show_password_setup'))) ? '' : 'hidden') }}" id="sign-up-form">
                    
                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-[12px]">
                            @if($errors->has('general'))
                                {{ $errors->first('general') }}
                            @elseif($errors->count() == 1)
                                {{ $errors->first() }}
                            @else
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Create Account</h2>
                        <p class="text-gray-600 mt-2">Join us for amazing experiences</p>
                    </div>
                <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <input type="hidden" name="action" value="register">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-gray-700 text-sm font-semibold">First Name</label>
                            <input type="text" name="first_name" required class="w-full mt-2 px-4 py-3 border {{ $errors->has('first_name') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="First name" value="{{ old('first_name') }}">
                        </div>
                        <div>
                            <label class="text-gray-700 text-sm font-semibold">Last Name</label>
                            <input type="text" name="last_name" required class="w-full mt-2 px-4 py-3 border {{ $errors->has('last_name') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Last name" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                        <input type="email" name="email" required class="w-full mt-2 px-4 py-3 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Enter your email" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label class="text-gray-700 text-sm font-semibold">Password</label>
                        <input type="password" name="password" required minlength="8" class="w-full mt-2 px-4 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Create a password">
                    </div>

                    <div>
                        <label class="text-gray-700 text-sm font-semibold">Confirm Password</label>
                        <input type="password" name="password_confirmation" required minlength="8" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Confirm your password">
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold">
                        Create Account
                    </button>
                </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Already have an account? 
                            <a href="#" class="text-orange-500 hover:text-orange-600 font-semibold" id="signIn">Sign in</a>
                        </p>
                    </div>
                </div>

                <!-- Password Setup Form for Google OAuth users -->
                                <!-- Password Setup Form for Google OAuth users -->
                <div class="bg-white p-8 w-full max-w-[450px] transition-all duration-300 {{ session('show_password_setup') ? '' : 'hidden' }} mt-5 border border-gray-200 rounded-lg shadow-lg" id="password-setup-form">
                    
                    @if($errors->any() && session('show_password_setup'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-[12px]">
                            @if($errors->has('general'))
                                {{ $errors->first('general') }}
                            @elseif($errors->count() == 1)
                                {{ $errors->first() }}
                            @else
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800">Set Your Password</h2>
                        <p class="text-gray-600 mt-2">Complete your account setup by creating a password</p>
                    </div>

                    <form class="space-y-6" method="POST" action="{{ route('setup.password') }}">
                        @csrf
                        
                        <div>
                            <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                            <input type="email" name="email" readonly class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none" value="{{ session('setup_email', old('email')) }}">
                        </div>

                        <div>
                            <label class="text-gray-700 text-sm font-semibold">New Password</label>
                            <input type="password" name="password" required minlength="8" class="w-full mt-2 px-4 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Create a password">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="text-gray-700 text-sm font-semibold">Confirm Password</label>
                            <input type="password" name="password_confirmation" required minlength="8" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors" placeholder="Confirm your password">
                        </div>

                        <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold">
                            Set Password & Continue
                        </button>
                    </form>
                </div>

            </div>
            
        </div>
    </div>

@vite(['resources/js/login.js'])

</body>
</html>
