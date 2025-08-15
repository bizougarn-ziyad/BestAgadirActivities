<x-layout>
    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-3xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 flex items-center gap-3">
                        ✏️ Edit Admin
                    </h1>
                    <p class="text-gray-600 mt-2">Update administrator account information</p>
                </div>
                <a href="{{ route('admin.admins.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                    ← <span>Back to Admins</span>
                </a>
            </div>

            <form action="{{ route('admin.admins.update', $admin) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            👤 <span>Full Name</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $admin->name) }}"
                               placeholder="Enter administrator's full name"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            📧 <span>Email Address</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $admin->email) }}"
                               placeholder="admin@example.com"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }}">
                        @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Password Field -->
                    <div>
                        <label for="password" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            🔒 <span>New Password</span> <span class="text-sm text-gray-500 font-normal">(Optional)</span>
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password"
                               placeholder="Leave blank to keep current password"
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('password') ? 'border-red-400' : 'border-gray-200' }}">
                        @error('password')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                        <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                            💡 <span>Minimum 8 characters if changing password</span>
                        </p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            🔒 <span>Confirm New Password</span>
                        </label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation"
                               placeholder="Confirm new password"
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300">
                    </div>
                </div>

                <!-- Account Info -->
                <div class="bg-gradient-to-r from-orange-50 to-blue-50 border-l-4 border-blue-500 p-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="text-2xl">ℹ️</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Account Information</h3>
                            <div class="text-gray-600 text-sm space-y-1">
                                <p><strong>Account Created:</strong> {{ $admin->created_at->format('F j, Y \a\t g:i A') }}</p>
                                <p><strong>Last Updated:</strong> {{ $admin->updated_at->format('F j, Y \a\t g:i A') }}</p>
                                <p><strong>Current Email:</strong> {{ $admin->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        ✏️ <span>Update Admin Account</span>
                    </button>
                    <a href="{{ route('admin.admins.index') }}" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        ← <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
