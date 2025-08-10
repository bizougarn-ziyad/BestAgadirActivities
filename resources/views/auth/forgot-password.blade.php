<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
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

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                        <input type="email" name="email" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors @error('email')  @enderror" 
                               placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold">
                        Send Password Reset Link
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-semibold">
                        Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>