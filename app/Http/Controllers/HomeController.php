<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio; // Import model Portofolio
use App\Models\Skill; // Import model Skill
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data portofolio dan skill
        $portofolios = Portofolio::all();
        $skills = Skill::all();
        $services = Service::all();
    
        // Kirim data ke view welcome.blade.php
        return view('welcome', compact('portofolios', 'skills', 'services')); // Pastikan 'services' ditambahkan
    }
}
