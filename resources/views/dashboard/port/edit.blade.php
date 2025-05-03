@extends('dashboard.layout.template')

@section('title', 'Edit Portofolio')

@section('content')

<h2 class="text-2xl font-medium mb-6">Edit Portofolio</h2>

{{-- Tampilkan pesan error jika validasi gagal --}}
@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form Edit Portofolio --}}
<form action="{{ route('dashboard.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Pastikan ini menggunakan PUT untuk update --}}
    
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Portofolio</label>
        <input type="text" id="name" name="name"
            class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md"
            value="{{ old('name', $portofolio->name) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="photo" class="block text-sm font-medium text-gray-700">Foto Portofolio</label>
        <input type="file" id="photo" name="photo"
            class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md">
        
        {{-- Menampilkan foto lama jika ada --}}
        @if($portofolio->photo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $portofolio->photo) }}" alt="Foto" width="100">
            </div>
        @endif
    </div>

    <button type="submit" class="btn bg-success text-white">Update</button>
</form>


@endsection
