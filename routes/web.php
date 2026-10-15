<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Untuk mengecek user yang login
use App\Http\Controllers\AdminController; // Memanggil Controller Admin
use App\Http\Controllers\SiswaController; // Memanggil Controller Siswa
use App\Http\Controllers\ProfileController; // Memanggil Controller Profile
use App\Http\Controllers\JuriController;

// 1. Rute Halaman Depan (Welcome Page)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rute "Penyortir" Pintar (Otomatis arahkan sesuai Role sesaat setelah Login)
    Route::get('/dashboard', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'juri') {
            return redirect()->route('juri.dashboard');
        }
        return redirect()->route('siswa.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    //  Jalur Khusus Juri
    Route::middleware(['auth', 'role:juri'])->group(function () {
        Route::get('/juri/dashboard', [JuriController::class, 'index'])->name('juri.dashboard');
        Route::post('/juri/penilaian/{id}', [JuriController::class, 'nilaiPeserta'])->name('juri.penilaian');
    });

// 3. JALUR KHUSUS ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Halaman Utama Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // --- HALAMAN MENU BARU ---
    Route::get('/admin/kelola-lomba', [AdminController::class, 'kelolaLomba'])->name('admin.lomba');
    Route::get('/admin/kelola-siswa', [AdminController::class, 'kelolaSiswa'])->name('admin.siswa');
    Route::get('/admin/kelola-status', [AdminController::class, 'kelolaStatus'])->name('admin.status');

    // --- PROSES DATA (Tetap seperti sebelumnya) ---
    Route::post('/admin/lomba', [AdminController::class, 'storeLomba'])->name('admin.lomba.store');
    Route::get('/admin/lomba/{id}/edit', [AdminController::class, 'editLomba'])->name('admin.lomba.edit');
    Route::put('/admin/lomba/{id}', [AdminController::class, 'updateLomba'])->name('admin.lomba.update');
    Route::delete('/admin/lomba/{id}', [AdminController::class, 'destroyLomba'])->name('admin.lomba.destroy');
    Route::post('/admin/pendaftaran/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.status.update');

    Route::post('/admin/siswa', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');
    Route::get('/admin/siswa/{id}/edit', [AdminController::class, 'editSiswa'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/{id}', [AdminController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/{id}', [AdminController::class, 'destroySiswa'])->name('admin.siswa.destroy');
});

// 4. JALUR KHUSUS SISWA (Dijaga oleh Middleware Role:siswa)
Route::middleware(['auth', 'role:siswa'])->group(function () {
    // Halaman Dashboard Siswa
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');

    // Proses Daftar Lomba
    Route::post('/siswa/daftar', [SiswaController::class, 'daftarLomba'])->name('siswa.daftar');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Bawaan Breeze untuk rute Login, Register, Logout, dll (JANGAN DIHAPUS)
require __DIR__.'/auth.php';

