<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error') || $errors->any())
        <div id="errorAlert" class="alert alert-danger text-red-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('error') ?? 'An error occurred.' }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 flex items-center gap-3">
                        🏄‍♂️ Activities Management
                    </h1>
                    <p class="text-gray-600 mt-2">Manage all exciting Agadir activities and experiences</p>
                </div>
                <div>
                    <a href="{{ route('admin.activities.create') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                        ✨ <span>Add New Activity</span>
                    </a>
                </div>
            </div>

            @if($activities->count() > 0)
                <div class="bg-gradient-to-r from-orange-50 to-blue-50 rounded-xl p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="text-2xl">📊</div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Total Activities</h3>
                                <p class="text-gray-600">{{ $activities->count() }} activit{{ $activities->count() !== 1 ? 'ies' : 'y' }} available</p>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-orange-500">{{ $activities->count() }}</div>
                    </div>
                </div>

                <!-- Activities Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    @foreach($activities as $activity)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105 border border-gray-100">
                            <!-- Activity Image -->
                            <div class="relative h-48 bg-gradient-to-br from-orange-100 to-blue-100">
                                @if($activity->hasImageData())
                                    <img src="{{ $activity->image_data_url }}" 
                                         alt="{{ $activity->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <div class="text-6xl text-orange-400">🏖️</div>
                                    </div>
                                @endif
                                
                                <!-- Status Badge -->
                                <div class="absolute top-3 right-3">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $activity->is_active ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} shadow-lg">
                                        {{ $activity->is_active ? '✅ Active' : '⏸️ Inactive' }}
                                    </span>
                                </div>

                                <!-- Price Badge -->
                                <div class="absolute top-3 left-3">
                                    <span class="px-3 py-1 text-sm font-bold rounded-full bg-orange-500 text-white shadow-lg">
                                        💰 €{{ number_format($activity->price, 0) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Activity Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $activity->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ Str::limit($activity->bio, 120) }}
                                </p>
                                
                                <div class="flex items-center justify-between mb-4 text-sm text-gray-500">
                                    <div class="flex items-center gap-1">
                                        📅 {{ $activity->created_at->format('M d, Y') }}
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <a href="{{ route('admin.activities.edit', $activity) }}" 
                                       class="flex-1 bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-white text-sm font-semibold py-2 px-3 rounded-lg text-center transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 flex items-center justify-center gap-1">
                                        ✏️ <span>Edit</span>
                                    </a>
                                    <button onclick="confirmDelete({{ $activity->id }}, '{{ addslashes($activity->name) }}')"
                                            class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-semibold py-2 px-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 flex items-center justify-center gap-1">
                                        🗑️ <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($activities->hasPages())
                    <div class="bg-gradient-to-r from-orange-50 to-blue-50 rounded-xl p-6">
                        <div class="flex justify-center">
                            {{ $activities->links() }}
                        </div>
                    </div>
                @endif

            @else
                <div class="text-center py-16">
                    <div class="text-8xl mb-6">🏄‍♂️</div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No Activities Found</h3>
                    <p class="text-gray-600 text-lg mb-8">Start creating amazing Agadir experiences for your customers</p>
                    <a href="{{ route('admin.activities.create') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 inline-flex items-center gap-3">
                        ✨ <span>Add Your First Activity</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Enhanced Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-8 max-w-md mx-4 shadow-2xl">
            <div class="flex items-center mb-6">
                <div class="text-3xl mr-4">⚠️</div>
                <h3 class="text-xl font-bold text-gray-800">Confirm Deletion</h3>
            </div>
            <p class="text-gray-600 mb-6 text-lg">
                Are you sure you want to delete "<span id="activityName" class="font-semibold text-orange-600"></span>"? This action cannot be undone.
            </p>
            <div class="flex gap-4">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-3 px-4 rounded-lg transition-all duration-300 font-semibold">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white py-3 px-4 rounded-lg transition-all duration-300 font-semibold">
                        🗑️ Delete
                    </button>
                </form>
            </div>
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

        // Auto-hide error alert after 3 seconds with fade effect
        setTimeout(function() {
            const alert = document.getElementById('errorAlert');
            if (alert) {
                alert.style.transition = 'opacity 0.3s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 300);
            }
        }, 3000);

        function confirmDelete(activityId, activityName) {
            document.getElementById('activityName').textContent = activityName;
            document.getElementById('deleteForm').action = `/admin/activities/${activityId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
    </script>
</x-layout>
