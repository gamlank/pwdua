<?php

// use Illuminate\Support\Facades\Route;

// // Praktek Kelas
// use App\Http\Controllers\KalkulatorController;
// use App\Http\Controllers\ListMahasiswaController;

// // Tugas 1
// use App\Http\Controllers\ProfileController;

// Route::get('/profile', [ProfileController::class, 'index']);

// // Praktek Kelas
// // Opsi 1
// Route::get('/list-mahasiswa', function () {
//     return 'galang';
//     Route::get('/kalkulator/{angka1}/{angka2}', [KalkulatorController::class, 'Hasil']);
// });

// // Tugas 2
// use App\Http\Controllers\SongController;
// use App\Http\Controllers\ArtistController;
// use App\Http\Controllers\PlaylistController;

// // Router 1: SongController
// Route::prefix('songs')->group(function () {
//     Route::get('/', [SongController::class, 'index']);
//     Route::get('/create', [SongController::class, 'create']);
//     Route::get('/search/{keyword}', [SongController::class, 'search']);
//     Route::get('/genre/{genre}', [SongController::class, 'filterByGenre']);
//     Route::get('/{id}', [SongController::class, 'show']);
// });

// // Router 2: ArtistController
// Route::prefix('artists')->group(function () {
//     Route::get('/', [ArtistController::class, 'index']);
//     Route::get('/{id}', [ArtistController::class, 'show']);
//     Route::get('/{id}/top-tracks', [ArtistController::class, 'topTracks']);
//     Route::get('/{id}/albums', [ArtistController::class, 'albums']);
//     Route::get('/{id}/bio', [ArtistController::class, 'bio']);
// });

// // Router 3: PlaylistController
// Route::prefix('playlists')->group(function () {
//     Route::get('/', [PlaylistController::class, 'index']);
//     Route::get('/create', [PlaylistController::class, 'create']);
//     Route::get('/{id}', [PlaylistController::class, 'show']);
//     Route::get('/{id}/add/{songName}', [PlaylistController::class, 'addSong']);
//     Route::get('/{id}/duration', [PlaylistController::class, 'duration']);
// });

// Tugas 4
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;

Route::get('/', function () {
    return redirect()->route('artists.index');
});

Route::get('artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::post('artists', [ArtistController::class, 'store'])->name('artists.store');
Route::get('artists/{artist}', [ArtistController::class, 'show'])->name('artists.show')->whereNumber('artist');
Route::get('artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit')->whereNumber('artist');
Route::put('artists/{artist}', [ArtistController::class, 'update'])->name('artists.update')->whereNumber('artist');
Route::delete('artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy')->whereNumber('artist');