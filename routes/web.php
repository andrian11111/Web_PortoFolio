<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return redirect()->route('dashboard.index'); // Redirect ke dashboard.index
})->name('home');

//LOGIN 2
Route::middleware('guest')->group(function () {
    // Route untuk menampilkan form login
    Route::get('/login', [UserController::class, 'showUserForm'])->name('login.form');

    // Route untuk memproses login
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

// Rute untuk logout pengguna
Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});


//dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');
Route::get('/dashboard-skill', function () {
    return view('dashboard.skill');
})->name('dashboard.skill');
Route::get('/dashboard-service', function () {
    return view('dashboard.service');
})->name('dashboard.service');
Route::get('/dashboard-portofolio', function () {
    return view('dashboard.portofolio');
})->name('dashboard.portofolio');



// Grouping routes untuk Portofolio
Route::prefix('dashboard-portofolio')->group(function () {
    Route::get('/', [PortofolioController::class, 'index'])->name('dashboard.portofolio'); // List of portofolio
    Route::get('/create', [PortofolioController::class, 'create'])->name('dashboard.page-editable.portofolio.tambah'); // Form to create new portofolio
    Route::post('/store', [PortofolioController::class, 'store'])->name('dashboard.portofolio.store'); // Store new portofolio
    Route::get('/edit/{portofolio}', [PortofolioController::class, 'edit'])->name('dashboard.page-editable.portofolio.edit'); // Form to edit existing portofolio
    Route::put('/update/{portofolio}', [PortofolioController::class, 'update'])->name('dashboard.portofolio.update'); // Update portofolio
    Route::delete('/delete/{portofolio}', [PortofolioController::class, 'destroy'])->name('dashboard.portofolio.delete'); // Delete portofolio
    Route::get('/lihat/{id}', [PortofolioController::class, 'show'])->name('dashboard.portofolio.show'); // View single portofolio details
});


//Groping route untuk Skill
Route::prefix('dashboard/skills')->group(function () {
    Route::get('/', [SkillController::class, 'index'])->name('dashboard.skill'); // List all skills
    Route::get('/create', [SkillController::class, 'create'])->name('skill.create'); // Form to create a new skill
    Route::post('/store', [SkillController::class, 'store'])->name('store'); // Store a new skill
    Route::get('/{skill}/show', [SkillController::class, 'show'])->name('show'); // Show a specific skill
    Route::get('/{skill}/edit', [SkillController::class, 'edit'])->name('edit'); // Form to edit a skill
    Route::put('/{skill}/update', [SkillController::class, 'update'])->name('update'); // Update a skill
    Route::delete('/{skill}/delete', [SkillController::class, 'destroy'])->name('delete'); // Delete a skill
});




Route::prefix('services')->group(function () {
    // Route ke halaman daftar layanan
    Route::get('/', [ServiceController::class, 'index'])->name('dashboard.service');
    // Route ke halaman form tambah layanan
    Route::get('/create', [ServiceController::class, 'create'])->name('services.create');
    // Route untuk menyimpan layanan baru
    Route::post('/', [ServiceController::class, 'store'])->name('services.store');
    // Route untuk melihat detail layanan
    Route::get('/{service}', [ServiceController::class, 'show'])->name('show');
    // Route ke halaman edit layanan
    Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    // Route untuk memperbarui layanan
    // Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
    // Route untuk menghapus layanan
    Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');




//MENAMPILKAN DARI DASHBOARD KE WELCOME.BLADE
Route::get('/', [HomeController::class, 'index']);




