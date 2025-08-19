<x-layout>
    @if (session('success'))
        <div id="successAlert" class="alert alert-success text-green-500 pt-[120px] m-0 pb-0 absolute left-[50%] transform -translate-x-1/2 text-[13px] w-full flex justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 pt-[120px]">
        <div class="bg-white rounded-xl shadow-[0_1px_25px_rgba(0,0,0,0.1)] p-8 max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-orange-500 flex items-center gap-3">
                        ✨ Add New Activity
                    </h1>
                    <p class="text-gray-600 mt-2">Create an amazing Agadir experience for your customers</p>
                </div>
                <a href="{{ route('admin.activities.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2">
                    ← <span>Back to Activities</span>
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-8 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="text-2xl">⚠️</div>
                        <div>
                            <h3 class="text-lg font-semibold text-red-800 mb-2">Please correct the following errors:</h3>
                            <ul class="space-y-1 text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center gap-2">
                                        <span class="text-red-500">•</span> {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Activity Name -->
                    <div>
                        <label for="name" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            🏷️ <span>Activity Name</span> <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Enter activity name (e.g., Sunset Camel Ride)"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            💰 <span>Price (EUR)</span> <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-lg">€</span>
                            </div>
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price') }}"
                                   step="0.01"
                                   min="0"
                                   placeholder="0.00"
                                   required
                                   class="w-full pl-12 pr-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('price') ? 'border-red-400' : 'border-gray-200' }}">
                        </div>
                        @error('price')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Max Participants -->
                    <div>
                        <label for="max_participants" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            👥 <span>Maximum Participants</span> <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="max_participants" 
                               name="max_participants" 
                               value="{{ old('max_participants', 15) }}"
                               min="1"
                               max="50"
                               placeholder="15"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 {{ $errors->has('max_participants') ? 'border-red-400' : 'border-gray-200' }}">
                        <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                            📋 <span>Maximum number of participants allowed per booking date (default: 15)</span>
                        </p>
                        @error('max_participants')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                ⚠️ {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Activity Description -->
                <div>
                    <label for="bio" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        📝 <span>Activity Description</span> <span class="text-red-500">*</span>
                    </label>
                    <textarea id="bio" 
                              name="bio" 
                              rows="6"
                              placeholder="Describe the activity in detail. Include what participants can expect, duration, highlights, and any special features..."
                              required
                              class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 resize-vertical {{ $errors->has('bio') ? 'border-red-400' : 'border-gray-200' }}">{{ old('bio') }}</textarea>
                    <div class="flex justify-between items-center text-sm text-gray-500 mt-2">
                        <span class="flex items-center gap-1">
                            💡 <span>Provide a detailed description of the activity</span>
                        </span>
                        <span id="bioCount">0/2000 characters</span>
                    </div>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            ⚠️ {{ $message }}
                        </p>
                    @enderror
                </div>
                            @error('bio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                <!-- Activity Image -->
                <div>
                    <label for="image" class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        📸 <span>Activity Image</span> <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               required
                               class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 {{ $errors->has('image') ? 'border-red-400' : 'border-gray-200' }}">
                    </div>
                    <p class="text-gray-500 text-sm mt-2 flex items-center gap-1">
                        💡 <span>Upload a high-quality image (JPEG, PNG, JPG, GIF - Max: 2MB)</span>
                    </p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            ⚠️ {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" class="hidden">
                    <label class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        👁️ <span>Image Preview</span>
                    </label>
                    <div class="border-2 border-dashed border-orange-200 rounded-xl p-6 bg-orange-50">
                        <img id="previewImg" src="" alt="Image preview" class="max-w-full h-64 object-cover rounded-lg mx-auto shadow-lg">
                    </div>
                </div>

                <!-- Activity Guidelines -->
                <div class="bg-gradient-to-r from-blue-50 to-orange-50 border-l-4 border-orange-500 p-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="text-2xl">💡</div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Activity Guidelines</h3>
                            <ul class="text-gray-600 space-y-1 text-sm">
                                <li>• Use clear, descriptive names that highlight the main activity</li>
                                <li>• Include duration, highlights, and what's included in the description</li>
                                <li>• Set competitive prices based on similar activities in Agadir</li>
                                <li>• Upload high-quality, appealing images that showcase the experience</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        ✨ <span>Create Activity</span>
                    </button>
                    <button type="button" onclick="resetForm()" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-8 py-4 rounded-xl transition-all duration-300 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                        🔄 <span>Clear Form</span>
                    </button>
                </div>
            </form>
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

        // Bio character counter
        const bioTextarea = document.getElementById('bio');
        const bioCount = document.getElementById('bioCount');
        
        function updateBioCount() {
            const currentLength = bioTextarea.value.length;
            bioCount.textContent = `${currentLength}/2000 characters`;
            
            if (currentLength > 2000) {
                bioCount.classList.add('text-red-500');
                bioCount.classList.remove('text-gray-500');
            } else {
                bioCount.classList.add('text-gray-500');
                bioCount.classList.remove('text-red-500');
            }
        }
        
        bioTextarea.addEventListener('input', updateBioCount);
        updateBioCount(); // Initial count

        // Enhanced Image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('⚠️ File size must be less than 2MB');
                    imageInput.value = '';
                    imagePreview.classList.add('hidden');
                    return;
                }
                
                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('⚠️ Please select a valid image file (JPEG, PNG, JPG, GIF)');
                    imageInput.value = '';
                    imagePreview.classList.add('hidden');
                    return;
                }
                
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

        // Enhanced reset form function
        function resetForm() {
            if (confirm('🔄 Are you sure you want to clear all form data?')) {
                document.querySelector('form').reset();
                imagePreview.classList.add('hidden');
                updateBioCount();
            }
        }

        // Enhanced form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const bio = document.getElementById('bio').value.trim();
            const price = document.getElementById('price').value;
            const image = document.getElementById('image').files[0];

            let errors = [];

            if (!name) errors.push('• Activity name is required');
            if (!bio) errors.push('• Activity description is required');
            if (bio.length > 2000) errors.push('• Description must be 2000 characters or less');
            if (!price || price < 0) errors.push('• Valid price is required');
            if (!image) errors.push('• Activity image is required');

            if (errors.length > 0) {
                e.preventDefault();
                alert('⚠️ Please fix the following errors:\n\n' + errors.join('\n'));
            }
        });
    </script>
</x-layout>
