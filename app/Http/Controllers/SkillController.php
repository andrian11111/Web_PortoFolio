<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all(); // Fetch all skills
        return view('dashboard.skill', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.skil.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('images', 'public');
        }

        // Create the skill
        Skill::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photoPath,
        ]);

        return redirect()->route('dashboard.skill')->with('success', 'Skill created successfully.');
    }

    /**
     * Show the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('dashboard.skil.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Jika ada file baru, hapus foto lama dan simpan foto baru
        if ($request->hasFile('photo')) {
            if ($skill->photo) {
                \Storage::disk('public')->delete($skill->photo);
            }
            $skill->photo = $request->file('photo')->store('images', 'public');
        }
    
        // Update data lainnya
        $skill->update([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $skill->photo, // Foto tetap jika tidak diupdate
        ]);
    
        return redirect()->route('dashboard.skill')->with('success', 'Skill berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        // Delete the photo if it exists
        if ($skill->photo) {
            \Storage::disk('public')->delete($skill->photo); // Delete the photo if exists
        }

        $skill->delete(); // Delete the portfolio record

        return redirect()->route('dashboard.skill')->with('success', 'Portofolio deleted successfully.');
    }
    
}
