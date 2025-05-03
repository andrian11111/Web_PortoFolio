@extends('dashboard.layout.template')

@section('title', 'Tambah Service')

@section('content')
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Tambah Layanan</h1>

        <!-- Flash Message for Success -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form untuk tambah data layanan -->
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <!-- Nama Layanan -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded-md text-gray-800 border-gray-300"
                    placeholder="Masukkan nama layanan" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi Layanan -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full px-4 py-2 border rounded-md text-gray-800 border-gray-300"
                    placeholder="Masukkan deskripsi layanan">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">
                Tambah Layanan
            </button>
        </form>

    </div>

</body>
@endsection
