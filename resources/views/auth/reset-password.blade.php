<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Reset Password</title>
</head>
<body class="bg-[#fffaf0]">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-[450px] w-full bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Reset Password</h2>
                <p class="text-gray-600 mt-2">Enter your new password</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label class="text-gray-700 text-sm font-semibold">Email Address</label>
                    <input type="email" name="email" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors @error('email')  @enderror" value="{{ old('email', $request->email) }}" required readonly>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-sm font-semibold">New Password</label>
                    <input type="password" name="password" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors @error('password')  @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700 text-sm font-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition-colors" required>
                </div>

                <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-400 transition duration-300 font-semibold">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>