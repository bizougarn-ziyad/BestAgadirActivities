<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-5xl mx-auto">
            <!-- Header with Moroccan flair -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-orange-500 mb-3">🏛️ Admin Dashboard</h1>
                <p class="text-lg text-orange-300 mb-2">Welcome to the control center!</p>
                <p class="text-sm text-gray-600">🌅 Manage your Agadir activities platform with ease</p>
            </div>
            
            <!-- Management Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Admin Management Card -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl cursor-pointer hover:from-blue-100 hover:to-blue-200 transform hover:scale-105 transition-all duration-300 shadow-lg border border-blue-200">
                    <a href="{{ route('admin.admins.index') }}" class="block text-center">
                        <div class="text-6xl mb-4">👥</div>
                        <h3 class="text-2xl font-bold text-blue-800 mb-3">Admin Management</h3>
                        <p class="text-blue-600 text-sm leading-relaxed">Manage administrator accounts, permissions, and access control for your platform</p>
                        <div class="mt-4 flex items-center justify-center text-blue-700 text-sm font-semibold">
                            <span>Manage Admins</span>
                            <span class="ml-2">→</span>
                        </div>
                    </a>
                </div>
                
                <!-- Activities Management Card -->
                <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-8 rounded-xl cursor-pointer hover:from-orange-100 hover:to-orange-200 transform hover:scale-105 transition-all duration-300 shadow-lg border border-orange-200">
                    <a href="{{ route('admin.activities.index') }}" class="block text-center">
                        <div class="text-6xl mb-4">🏄‍♂️</div>
                        <h3 class="text-2xl font-bold text-orange-700 mb-3">Activities Hub</h3>
                        <p class="text-orange-600 text-sm leading-relaxed">Create, edit, and manage all exciting Agadir activities and experiences</p>
                        <div class="mt-4 flex items-center justify-center text-orange-700 text-sm font-semibold">
                            <span>Manage Activities</span>
                            <span class="ml-2">→</span>
                        </div>
                    </a>
                </div>
                
                <!-- Bookings Management Card -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-xl cursor-pointer hover:from-purple-100 hover:to-purple-200 transform hover:scale-105 transition-all duration-300 shadow-lg border border-purple-200">
                    <a href="#" class="block text-center">
                        <div class="text-6xl mb-4">📅</div>
                        <h3 class="text-2xl font-bold text-purple-800 mb-3">Booking Control</h3>
                        <p class="text-purple-600 text-sm leading-relaxed">Monitor reservations, manage schedules, and handle customer bookings</p>
                        <div class="mt-4 flex items-center justify-center text-purple-700 text-sm font-semibold">
                            <span>View Bookings</span>
                            <span class="ml-2">→</span>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Logout Section -->
            <div class="mt-8 text-center">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center mx-auto gap-2">
                        <span>🚪</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 300);
            }
        }, 3000);
    </script>
</x-layout>
