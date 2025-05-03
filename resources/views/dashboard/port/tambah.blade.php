@extends('dashboard.layout.template')

@section('title', 'Tambah Portofolio')

@section('content')

<h2 class="text-2xl font-medium mb-6">Tambah Portofolio</h2>

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

<form action="{{ route('dashboard.portofolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama Portofolio</label>
        <input type="text" id="name" name="name"
            class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md"
            value="{{ old('name') }}" required>
    </div>
    <div class="mb-4">
        <label for="photo" class="block text-sm font-medium text-gray-700">Foto Portofolio</label>
        <input type="file" id="photo" name="photo"
            class="mt-1 block w-full px-4 py-2 text-gray-800 border border-gray-300 rounded-md">
    </div>


    <button type="submit" class="btn bg-success text-white">Simpan</button>
</form>


@endsection