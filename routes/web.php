<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ListMahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [ProfileController::class, 'index']);

// Opsi 1
Route::get('/list-mahasiswa', function () {
    return 'galang';
});

Route::prefix('v1')->group(function () {
    Route::get('/list-mahasiswa', [ListMahasiswaController::class, 'ListMahasiswaFromController']);
    Route::get('/list-mahasiswa/{nama}', [ListMahasiswaController::class, 'NamaMahasiswa']);

    // http://127.0.0.1:8000/v1/kalkulator/
    Route::get('/kalkulator', [KalkulatorController::class, 'Pertambahan']);

    // http://127.0.0.1:8000/v1/kalkulator/10/10
    Route::get('/kalkulator/{angka1}/{angka2}', [KalkulatorController::class, 'Hasil']);
});