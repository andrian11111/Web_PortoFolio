@extends('dashboard.layout.template')

@section('title', 'Tambah Skill')

@section('content')

<h2 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Skill</h2>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama Skill -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Skill</label>
            <input type="text" id="name" name="name" 
                   class="mt-2 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-purple-500 focus:border-purple-500 transition duration-200" 
                   value="{{ old('name') }}" placeholder="Masukkan nama skill" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Deskripsi Skill -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Skill</label>
            <textarea id="description" name="description" rows="5" 
                      class="mt-2 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-purple-500 focus:border-purple-500 transition duration-200" 
                      placeholder="Berikan deskripsi singkat tentang skill">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Foto Skill -->
        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Foto Skill</label>
            <input type="file" id="photo" name="photo" accept="image/*"
                   class="mt-2 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-purple-500 focus:border-purple-500 transition duration-200" 
                   onchange="previewImage(event)">
            @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Preview Foto -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Preview Foto</label>
            <div class="flex items-center justify-center bg-gray-100 border border-gray-300 rounded-md w-32 h-32 mt-2">
                <img id="photo-preview" src="#" alt="Foto Preview" class="object-cover rounded-md hidden">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-8 py-3 bg-purple-600 text-white rounded-md font-medium hover:bg-purple-700 focus:ring focus:ring-purple-400 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    // Preview Foto
    function previewImage(event) {
        const reader = new FileReader();
        const photoPreview = document.getElementById('photo-preview');
        reader.onload = () => {
            photoPreview.src = reader.result;
            photoPreview.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
