<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;

class PortofolioController extends Controller
{
    // Display the listing of the resource.
    public function index()
    {
        $portofolios = Portofolio::all(); // Fetch all portfolios from the database
        return view('dashboard.portofolio', compact('portofolios')); // Pass data to the view
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('dashboard.port.tambah'); // Render the create form
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validate name field
            'photo' => 'nullable|image|max:2048', // Validate photo field (optional)
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // If a file is uploaded, store it
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Create new portfolio record
        Portofolio::create([
            'name' => $request->name,
            'photo' => $photoPath,
        ]);

        return redirect()->route('dashboard.portofolio')->with('success', 'Portofolio created successfully.');
    }

    // Display the specified resource.
    public function show(Portofolio $portofolio)
    {
        return view('portofolio.show', compact('portofolio')); // Display portfolio details
    }

    // Show the form for editing the specified resource.
    public function edit(Portofolio $portofolio)
    {
        return view('dashboard.port.edit', compact('portofolio')); // Render edit form
    }

    // Update the specified resource in storage.
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validate name field
            'photo' => 'nullable|image|max:2048', // Validate photo field (optional)
        ]);

        $photoPath = $portofolio->photo; // Keep old photo path if no new photo uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($photoPath) {
                \Storage::disk('public')->delete($photoPath);
            }
            // Store the new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Update portfolio record
        $portofolio->update([
            'name' => $request->name,
            'photo' => $photoPath,
        ]);

        return redirect()->route('dashboard.portofolio')->with('success', 'Portofolio updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->photo) {
            \Storage::disk('public')->delete($portofolio->photo); // Delete the photo if exists
        }

        $portofolio->delete(); // Delete the portfolio record

        return redirect()->route('dashboard.portofolio')->with('success', 'Portofolio deleted successfully.');
    }
}