<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 flex items-center gap-3">
                        👥 Admin Management
                    </h1>
                    <p class="text-gray-600 mt-2">Manage administrator accounts for your platform</p>
                </div>
                <div>
                    <a href="{{ route('admin.admins.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                        ✨ <span>Add New Admin</span>
                    </a>
                </div>
            </div>

            @if($admins->count() > 0)
                <div class="bg-gradient-to-r from-orange-50 to-blue-50 rounded-xl p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="text-2xl">📊</div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Total Administrators</h3>
                                <p class="text-gray-600">{{ $admins->count() }} admin{{ $admins->count() !== 1 ? 's' : '' }} managing the platform</p>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-orange-500">{{ $admins->count() }}</div>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-orange-500 to-orange-400 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold">👤 Name</th>
                                <th class="px-6 py-4 text-left font-semibold">📧 Email</th>
                                <th class="px-6 py-4 text-left font-semibold">📅 Created</th>
                                <th class="px-6 py-4 text-center font-semibold">⚙️ Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($admins as $admin)
                                <tr class="border-b border-gray-100 hover:bg-orange-50 transition-colors duration-200">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $admin->name }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $admin->email }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $admin->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center space-x-3">
                                            <a href="{{ route('admin.admins.edit', $admin) }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white px-4 py-2 rounded-lg text-sm transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-105 flex items-center gap-1">
                                                ✏️ <span>Edit</span>
                                            </a>
                                            <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" class="inline" onsubmit="return confirm('⚠️ Are you sure you want to delete this admin? This action cannot be undone.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg text-sm transition-all duration-300 font-semibold shadow-md hover:shadow-lg transform hover:scale-105 flex items-center gap-1">
                                                    🗑️ <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-8xl mb-6">👥</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No Administrators Found</h3>
                    <p class="text-gray-600 text-lg mb-8">Get started by adding your first administrator account</p>
                    <a href="{{ route('admin.admins.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 inline-flex items-center gap-3">
                        ✨ <span>Add First Admin</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Auto-hide success alert after 3 seconds with fade effect
        setTimeout(function() {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.transition = 'opacity 0.3s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 300);
            }
        }, 3000);
    </script>
</x-layout>
