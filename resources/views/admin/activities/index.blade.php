<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Activities - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="flex items-center space-x-3 mb-4 sm:mb-0">
                        <i class="fas fa-hiking text-3xl text-orange-600"></i>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manage Activities</h1>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.activities.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium rounded-md transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Add Activity
                        </a>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div id="successMessage" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Error Messages -->
            @if (session('error') || $errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') ?? 'An error occurred.' }}
                    </div>
                </div>
            @endif

            <!-- Activities Grid -->
            @if($activities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    @foreach($activities as $activity)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <!-- Activity Image -->
                            <div class="relative h-48 bg-gray-200">
                                @if($activity->hasImageData())
                                    <img src="{{ $activity->image_data_url }}" 
                                         alt="{{ $activity->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-300">
                                        <i class="fas fa-image text-4xl text-gray-500"></i>
                                    </div>
                                @endif
                                
                                <!-- Status Badge -->
                                <div class="absolute top-2 right-2">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $activity->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $activity->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Activity Content -->
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $activity->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                                    {{ Str::limit($activity->bio, 120) }}
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-dollar-sign text-orange-600 mr-1"></i>
                                        <span class="text-lg font-bold text-orange-600">{{ number_format($activity->price, 2) }}</span>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $activity->created_at->format('M d, Y') }}
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex space-x-2 mt-4">
                                    <a href="{{ route('admin.activities.edit', $activity) }}" 
                                       class="flex-1 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium py-2 px-3 rounded text-center transition-colors duration-200">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    <button onclick="confirmDelete({{ $activity->id }}, '{{ addslashes($activity->name) }}')"
                                            class="flex-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-2 px-3 rounded transition-colors duration-200">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($activities->hasPages())
                    <div class="bg-white rounded-lg shadow-md p-4">
                        {{ $activities->links() }}
                    </div>
                @endif

            @else
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <i class="fas fa-hiking text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Activities Found</h3>
                    <p class="text-gray-500 mb-6">You haven't added any activities yet. Start by creating your first activity!</p>
                    <a href="{{ route('admin.activities.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Add Your First Activity
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md mx-4">
            <div class="flex items-center mb-4">
                <i class="fas fa-exclamation-triangle text-red-500 text-2xl mr-3"></i>
                <h3 class="text-lg font-semibold">Confirm Deletion</h3>
            </div>
            <p class="text-gray-600 mb-6">
                Are you sure you want to delete "<span id="activityName"></span>"? This action cannot be undone.
            </p>
            <div class="flex space-x-3">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded transition-colors duration-200">
                    Cancel
                </button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded transition-colors duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide success message after 3 seconds
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.transition = 'opacity 0.5s ease-out';
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.remove();
                }, 500); // Remove after fade out
            }, 3000); // Wait 3 seconds before starting fade
        }

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
</body>
</html>
