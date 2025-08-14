<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Activity - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-orange-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-10 md:p-16">
                
                <!-- Header -->
                <div class="max-w-full mx-auto">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-plus-circle text-3xl text-orange-600"></i>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Add New Activity</h1>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Dashboard
                        </a>
                    </div>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <strong>Please correct the following errors:</strong>
                            </div>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Activity Name -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-tag mr-2"></i>Activity Name
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror" 
                                   placeholder="Enter activity name (e.g., Sunset Camel Ride)"
                                   required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Activity Bio/Description -->
                        <div class="space-y-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-align-left mr-2"></i>Activity Description
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea id="bio" 
                                      name="bio" 
                                      rows="6"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 resize-vertical @error('bio') border-red-500 @enderror" 
                                      placeholder="Describe the activity in detail. Include what participants can expect, duration, highlights, and any special features..."
                                      required>{{ old('bio') }}</textarea>
                            <div class="flex justify-between items-center text-sm text-gray-500">
                                <span>Provide a detailed description of the activity</span>
                                <span id="bioCount">0/2000 characters</span>
                            </div>
                            @error('bio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price and Image Row -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Price -->
                            <div class="space-y-2">
                                <label for="price" class="block text-sm font-medium text-gray-700">
                                    <i class="fas fa-dollar-sign mr-2"></i>Price (USD)
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}"
                                           step="0.01"
                                           min="0"
                                           class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('price') border-red-500 @enderror" 
                                           placeholder="0.00"
                                           required>
                                </div>
                                @error('price')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Activity Image -->
                            <div class="space-y-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">
                                    <i class="fas fa-image mr-2"></i>Activity Image
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="file" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 @error('image') border-red-500 @enderror"
                                           required>
                                </div>
                                <p class="text-sm text-gray-500">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Accepted formats: JPEG, PNG, JPG, GIF. Max size: 2MB
                                </p>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="hidden space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-eye mr-2"></i>Image Preview
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                <img id="previewImg" src="" alt="Image preview" class="max-w-full h-64 object-cover rounded-lg mx-auto">
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6">
                            <button type="submit" 
                                    class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-save mr-2"></i>
                                Add Activity
                            </button>
                            <button type="button" 
                                    onclick="resetForm()"
                                    class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-undo mr-2"></i>
                                Clear Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character count for bio
        const bioTextarea = document.getElementById('bio');
        const bioCount = document.getElementById('bioCount');
        
        function updateBioCount() {
            const count = bioTextarea.value.length;
            bioCount.textContent = `${count}/2000 characters`;
            
            if (count > 1800) {
                bioCount.classList.add('text-red-500');
                bioCount.classList.remove('text-gray-500');
            } else {
                bioCount.classList.add('text-gray-500');
                bioCount.classList.remove('text-red-500');
            }
        }
        
        bioTextarea.addEventListener('input', updateBioCount);
        
        // Initial count
        updateBioCount();

        // Image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');
            }
        });

        // Reset form function
        function resetForm() {
            if (confirm('Are you sure you want to clear all form data?')) {
                document.querySelector('form').reset();
                imagePreview.classList.add('hidden');
                updateBioCount();
            }
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const bio = document.getElementById('bio').value.trim();
            const price = document.getElementById('price').value;
            const image = document.getElementById('image').files[0];

            let errors = [];

            if (!name) errors.push('Activity name is required');
            if (!bio) errors.push('Activity description is required');
            if (!price || price < 0) errors.push('Valid price is required');
            if (!image) errors.push('Activity image is required');

            if (errors.length > 0) {
                e.preventDefault();
                alert('Please fix the following errors:\n\n' + errors.join('\n'));
            }
        });
    </script>
</body>
</html>
