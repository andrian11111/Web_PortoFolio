@extends('dashboard.layout.template')

@section('title', 'Dashboard Portofolio')

@section('content')

   <!-- Flash Message -->
   @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white px-4 py-2 rounded mb-6">
            {{ session('success') }}
        </div>

        <script>
            // Menghapus pesan otomatis setelah 10 detik
            setTimeout(() => {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.remove();
                }
            }, 10000);
        </script>
    @endif
<!-- Page Title Start -->
<div class="flex items-center justify-between flex-wrap gap-2 mb-6 mt-10 ml-10">
    <div>
        <h2 class="text-gray-300 text-4xl font-semibold">Portofolio</h2>
    </div>
</div>
<!-- Page Title End -->

<div class="px-10">
    <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-5">
        <a href="{{ route('dashboard.page-editable.portofolio.tambah') }}" class="flex items-center gap-2">
            <i class="ti ti-plus text-lg"></i> Tambah Portofolio
        </a>
    </button>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($portofolios as $portofolio)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $portofolio->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($portofolio->photo)
                                    <img src="{{ asset('storage/' . $portofolio->photo) }}" alt="Foto"
                                        class="h-16 w-16 object-cover rounded-lg">
                                @else
                                    <span class="text-sm text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('dashboard.page-editable.portofolio.edit', $portofolio->id) }}"
                                        class="text-blue-600 hover:text-blue-800">Edit</a>
                                    <form action="{{ route('dashboard.portofolio.delete', $portofolio->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">Tidak ada
                                data portofolio</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> <!-- end card -->
</div>

@endsection