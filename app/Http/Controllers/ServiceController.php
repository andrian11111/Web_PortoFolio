<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua layanan
        $services = Service::all();
        return view('dashboard.service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat layanan baru
        return view('dashboard.serv.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Menyimpan data ke database
        Service::create($validated);

        return redirect()->route('dashboard.service')->with('success', 'Service berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        // Menampilkan detail layanan tertentu
        return view('dashboard.service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // Menampilkan form untuk mengedit layanan tertentu
        return view('dashboard.serv.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update data layanan
        $service->update($validated);

        return redirect()->route('dashboard.service')->with('success', 'Service berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Hapus layanan dari database
        $service->delete();

        return redirect()->route('dashboard.service')->with('success', 'Service berhasil dihapus!');
    }
}
