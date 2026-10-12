<?php

// Tugas 3
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ArtistController extends Controller
// {
//     private $artists = [
//         1 => [
//             'id' => 1,
//             'name' => 'Cigarettes After Sex',
//             'genre' => 'Ambient Pop',
//             'origin' => 'El Paso, Texas, USA',
//             'bio' => 'Grup musik ambient pop asal El Paso, Texas, yang dibentuk pada tahun 2008 oleh Greg Gonzalez.',
//             'albums' => ['Cigarettes After Sex (2017)', 'Cry (2019)', 'X\'s (2024)'],
//             'top_tracks' => ['Apocalypse', 'K.', 'Sunsetz', 'Cry']
//         ],
//         2 => [
//             'id' => 2,
//             'name' => 'Oasis',
//             'genre' => 'Britpop / Rock',
//             'origin' => 'Manchester, England',
//             'bio' => 'Band rock asal Inggris yang dibentuk di Manchester pada tahun 1991 oleh Liam Gallagher dan Noel Gallagher.',
//             'albums' => ['Definitely Maybe (1994)', '(What\'s the Story) Morning Glory? (1995)', 'Be Here Now (1997)'],
//             'top_tracks' => ['Wonderwall', 'Don\'t Look Back in Anger', 'Champagne Supernova']
//         ],
//         3 => [
//             'id' => 3,
//             'name' => 'Avenged Sevenfold',
//             'genre' => 'Heavy Metal / Hard Rock',
//             'origin' => 'Huntington Beach, California, USA',
//             'bio' => 'Band heavy metal Amerika yang dibentuk pada tahun 1999 di Huntington Beach, California.',
//             'albums' => ['City of Evil (2005)', 'Avenged Sevenfold (2007)', 'Nightmare (2010)'],
//             'top_tracks' => ['Dear God', 'A Little Piece of Heaven', 'Hail to the King', 'Afterlife']
//         ],
//         4 => [
//             'id' => 4,
//             'name' => 'My Chemical Romance',
//             'genre' => 'Alternative Rock / Post-Hardcore',
//             'origin' => 'Newark, New Jersey, USA',
//             'bio' => 'Band rock Amerika yang dibentuk pada tahun 2001 oleh Gerard Way, Ray Toro, Frank Iero, dan Mikey Way.',
//             'albums' => ['Three Cheers for Sweet Revenge (2004)', 'The Black Parade (2006)', 'Danger Days (2010)'],
//             'top_tracks' => ['Welcome to the Black Parade', 'Helena', 'Famous Last Words', 'Teenagers']
//         ]
//     ];

//     public function index()
//     {
//         $artists = $this->artists;
//         return view('artists', compact('artists'));
//     }

//     public function show($id)
//     {
//         $artist = $this->artists[$id] ?? null;
//         return view('artists', compact('artist'));
//     }

//     public function topTracks($id)
//     {
//         $artist = $this->artists[$id] ?? null;
//         $tracks = $artist['top_tracks'] ?? [];
//         return view('artists', compact('artist', 'tracks'));
//     }

//     public function albums($id)
//     {
//         $artist = $this->artists[$id] ?? null;
//         $albums = $artist['albums'] ?? [];
//         return view('artists', compact('artist', 'albums'));
//     }

//     public function bio($id)
//     {
//         $artist = $this->artists[$id] ?? null;
//         return view('artists', compact('artist'));
//     }
// }

// Tugas 4
namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Genre;
use App\Models\LabelRecord;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::with(['genre', 'labelRecord'])->latest()->get();
        return view('artists', compact('artists'));
    }

    public function create()
    {
        $genres = Genre::all();
        $labels = LabelRecord::all();
        
        // Memastikan view yang dipanggil adalah file resources/views/artists_create.blade.php
        return view('artists_create', compact('genres', 'labels'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'genre_name'      => 'required|string|max:50',
        'label_record_id' => 'nullable|exists:label_records,id',
        'stage_name'      => 'required|string|max:100',
        'debut_year'      => 'required|digits:4',
    ]);

    // Cari genre berdasarkan nama, jika tidak ditemukan buat baru di database
    $genre = Genre::firstOrCreate([
        'name' => trim($validated['genre_name'])
    ]);

    // Simpan data musisi
    Artist::create([
        'genre_id'        => $genre->id,
        'label_record_id' => $validated['label_record_id'],
        'stage_name'      => $validated['stage_name'],
        'debut_year'      => $validated['debut_year'],
    ]);

    return redirect()->route('artists.index')->with('success', 'Musisi berhasil ditambahkan.');
}

    public function edit(Artist $artist)
    {
        $genres = Genre::all();
        $labels = LabelRecord::all();
        return view('artists_edit', compact('artist', 'genres', 'labels'));
    }

    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'genre_id'        => 'required|exists:genres,id',
            'label_record_id' => 'nullable|exists:label_records,id',
            'stage_name'      => 'required|string|max:100',
            'debut_year'      => 'required|digits:4',
        ]);

        $artist->update($validated);

        return redirect()->route('artists.index')->with('success', 'Data musisi berhasil diperbarui.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index')->with('success', 'Data musisi berhasil dihapus.');
    }
}