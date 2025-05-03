@extends('dashboard.layout.template')

@section('title', 'Dashboard - Skill')

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
        <h2 class="text-gray-300 text-4xl font-medium">Skill</h2>
    </div>
</div>
<!-- Page Title End -->

<div class="px-10">
    <!-- Tambah Button -->
    <a href="{{ route('skill.create') }}" class="btn bg-purple-500 text-white mb-5 inline-block px-4 py-2 rounded">
        <i class="ti ti-plus text-base mr-2"></i> Tambah Skill
    </a>

    <!-- Table -->
    <div class="card overflow-hidden">
        <div>
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Description</th>
                                    <th scope="col" class="px-6 py-3 text-start text-sm text-gray-500">Photo</th>
                                    <th scope="col" class="px-6 py-3 text-end text-sm text-gray-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($skills as $skill)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $skill->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $skill->description ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            @if ($skill->photo)
                                                <img src="{{ asset('storage/' . $skill->photo) }}" alt="Photo"
                                                    class="w-12 h-12 rounded">
                                            @else
                                                <span>-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                            <a href="{{ route('edit', $skill->id) }}"
                                                class="text-blue-600 hover:text-blue-800 mr-4">Edit</a>
                                            <!-- <a href="{{ route('show', $skill->id) }}" class="text-green-600 hover:text-green-800 mr-4">Details</a> -->
                                            <form action="{{ route('delete', $skill->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
                                                    onclick="return confirm('Are you sure you want to delete this skill?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($skills->isEmpty())
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No skills found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card -->
</div>

@endsection