@extends('dashboard.layout.template')

@section('title', 'Dashboard Service')

@section('content')

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
        <h2 class="text-gray-300 text-4xl font-medium">Service</h2>
    </div>
</div>
<!-- Page Title End -->

<div class="px-10">
    <a href="{{ route('services.create') }}" class="btn bg-info text-white mb-5">
        <i class="ti ti-info-circle text-base me-4"></i> Tambah Service
    </a>

    <div class="card overflow-hidden">
        <div>
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                        Nama Layanan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-end text-sm text-gray-500">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $service->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ Str::limit($service->description, 50) }}
                                        </td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <a href="{{ route('services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a> |
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card -->
</div>

@endsection
