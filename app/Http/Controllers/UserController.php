<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the login form.
     */
    public function showUserForm()
    {
        return view('dashboard.login'); // Menampilkan halaman login
    }

    /**
     * Handle login attempt.
     */
    public function login(Request $request)
    {
        // Validasi input username dan password
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah username dan password cocok
        $username = $request->name;
        $password = $request->password;

        if ($username === 'agus' && $password === '12345') {
            // Jika username dan password sesuai, redirect ke dashboard
            return redirect()->route('dashboard.index')->with('success', 'Login berhasil!');
        }

        // Jika username atau password salah, kembalikan ke form login dengan pesan error
        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    /**
     * Logout the user.
     */
    public function logout()
    {
        // Logout pengguna
        Auth::logout();
    
        // Redirect ke halaman welcome
        return redirect()->route('welcome')->with('success', 'Anda telah logout.');
    }
    
}
