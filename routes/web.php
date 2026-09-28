<?php

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
});