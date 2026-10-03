<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    private $songs = [
        1 => ['id' => 1, 'title' => 'Apocalypse', 'artist' => 'Cigarettes After Sex', 'genre' => 'Ambient Pop', 'duration' => '4:50'],
        2 => ['id' => 2, 'title' => 'K.', 'artist' => 'Cigarettes After Sex', 'genre' => 'Ambient Pop', 'duration' => '5:19'],
        3 => ['id' => 3, 'title' => 'Wonderwall', 'artist' => 'Oasis', 'genre' => 'Britpop', 'duration' => '4:18'],
        4 => ['id' => 4, 'title' => 'Don\'t Look Back in Anger', 'artist' => 'Oasis', 'genre' => 'Britpop', 'duration' => '4:48'],
        5 => ['id' => 5, 'title' => 'Dear God', 'artist' => 'Avenged Sevenfold', 'genre' => 'Heavy Metal', 'duration' => '6:33'],
        6 => ['id' => 6, 'title' => 'A Little Piece of Heaven', 'artist' => 'Avenged Sevenfold', 'genre' => 'Avant-garde Metal', 'duration' => '8:00'],
        7 => ['id' => 7, 'title' => 'Welcome to the Black Parade', 'artist' => 'My Chemical Romance', 'genre' => 'Alternative Rock', 'duration' => '5:11'],
        8 => ['id' => 8, 'title' => 'Helena', 'artist' => 'My Chemical Romance', 'genre' => 'Post-Hardcore', 'duration' => '3:22'],
    ];

    public function index()
    {
        $songs = $this->songs;
        return view('songs', compact('songs'));
    }

    public function show($id)
    {
        $song = $this->songs[$id] ?? null;
        return view('songs', compact('song'));
    }

    public function create()
    {
        $isCreate = true;
        return view('songs', compact('isCreate'));
    }

    public function search($keyword)
    {
        $songs = array_filter($this->songs, function ($song) use ($keyword) {
            return stripos($song['title'], $keyword) !== false;
        });
        return view('songs', compact('songs', 'keyword'));
    }

    public function filterByGenre($genre)
    {
        $songs = array_filter($this->songs, function ($song) use ($genre) {
            return strtolower($song['genre']) === strtolower($genre);
        });
        return view('songs', compact('songs', 'genre'));
    }
}