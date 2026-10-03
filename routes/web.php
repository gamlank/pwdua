<?php

use Illuminate\Support\Facades\Route;

// Praktek Kelas
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ListMahasiswaController;

// Tugas 1
use App\Http\Controllers\ProfileController;

// Tugas 2
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;


// Tugas 1
Route::get('/profile', [ProfileController::class, 'index']);

// Praktek Kelas
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

// Tugas 2
// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Group Router 1: SongController (5 Function)
Route::prefix('songs')->group(function () {
    Route::get('/', [SongController::class, 'index']);
    Route::get('/create', [SongController::class, 'create']);
    Route::get('/search/{keyword}', [SongController::class, 'search']);
    Route::get('/genre/{genre}', [SongController::class, 'filterByGenre']);
    Route::get('/{id}', [SongController::class, 'show']);
});

// Group Router 2: ArtistController (5 Function)
Route::prefix('artists')->group(function () {
    Route::get('/', [ArtistController::class, 'index']);
    Route::get('/{id}', [ArtistController::class, 'show']);
    Route::get('/{id}/top-tracks', [ArtistController::class, 'topTracks']);
    Route::get('/{id}/albums', [ArtistController::class, 'albums']);
    Route::get('/{id}/bio', [ArtistController::class, 'bio']);
});

// Group Router 3: PlaylistController (5 Function - Semua Menampilkan Coming Soon)
Route::prefix('playlists')->group(function () {
    Route::get('/', [PlaylistController::class, 'index']);
    Route::get('/create', [PlaylistController::class, 'create']);
    Route::get('/{id}', [PlaylistController::class, 'show']);
    Route::get('/{id}/add/{songName}', [PlaylistController::class, 'addSong']);
    Route::get('/{id}/duration', [PlaylistController::class, 'duration']);
});