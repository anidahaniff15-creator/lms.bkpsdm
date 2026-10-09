<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Route Khusus Peserta
Route::middleware(['auth', 'verified', 'role:peserta'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route dummy biar nggak error pas diklik di dashboard peserta
    Route::get('/pelatihan', function () {
        return 'Halaman Katalog Pelatihan (Dalam Pengembangan)';
    })->name('pelatihan.index');
});

// Route Khusus Admin
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route dummy biar nggak error pas diklik di dashboard admin
    Route::get('/pelatihan', function () {
        return 'Halaman Kelola Pelatihan Admin (Dalam Pengembangan)';
    })->name('pelatihan.index');

    Route::get('/pendaftaran', function () {
        return 'Halaman Kelola Pendaftaran Admin (Dalam Pengembangan)';
    })->name('pendaftaran.index');
});

// Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';