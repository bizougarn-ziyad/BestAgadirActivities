<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-orange-500 mb-6">Admin Dashboard</h1>
            <p class="text-lg text-orange-300 mb-8">Welcome to the admin panel!</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 cursor-pointer">
                <div class="bg-blue-100 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Users</h3>
                    <p class="text-blue-600">Manage admin accounts</p>
                </div>
                
                <div class="bg-orange-200 p-6 rounded-lg cursor-pointer  transition-colors duration-200">
                    <a href="{{ route('admin.activities.index') }}" class="block">
                        <h3 class="text-xl font-semibold text-orange-600 mb-2">Activities</h3>
                        <p class="text-orange-500">Manage activities</p>
                    </a>
                </div>
                
                <div class="bg-purple-100 p-6 rounded-lg cursor-pointer">
                    <h3 class="text-xl font-semibold text-purple-800 mb-2">Bookings</h3>
                    <p class="text-purple-600">Manage bookings</p>
                </div>
            </div>
            
            <div class="mt-8">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
