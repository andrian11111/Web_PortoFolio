@extends('dashboard.layout.template')

@section('title', 'Edit Skill')

@section('content')

<h2 class="text-2xl font-medium mb-6">Edit Skill</h2>

<form action="{{ route('update', $skill->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT') {{-- Pastikan menggunakan @method('PUT') --}}

    <!-- Nama Skill -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Skill</label>
        <input type="text" id="name" name="name" 
               class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-primary focus:border-primary" 
               value="{{ old('name', $skill->name) }}" required>
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Deskripsi Skill -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Skill</label>
        <textarea id="description" name="description" rows="4" 
                  class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-primary focus:border-primary">{{ old('description', $skill->description) }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Foto Skill -->
    <div>
        <label for="photo" class="block text-sm font-medium text-gray-700">Foto Skill</label>
        <input type="file" id="photo" name="photo" accept="image/*"
               class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md focus:ring focus:ring-primary focus:border-primary" 
               onchange="previewImage(event)">
        @error('photo')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Preview Foto -->
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700">Preview Foto</label>
        <img id="photo-preview" 
             src="{{ $skill->photo ? asset('storage/' . $skill->photo) : '#' }}" 
             alt="Foto Preview" 
             class="mt-2 w-32 h-32 object-cover rounded-md {{ $skill->photo ? '' : 'hidden' }}">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="px-6 py-2 bg-success text-white rounded-md hover:bg-success-dark focus:ring focus:ring-success-dark">Update</button>
</form>

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
