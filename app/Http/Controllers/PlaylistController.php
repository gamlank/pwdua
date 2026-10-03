<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    // Mengarahkan seluruh fungsi ke tampilan Coming Soon
    public function index()
    {
        return view('playlists');
    }

    public function show($id)
    {
        return view('playlists');
    }

    public function create()
    {
        return view('playlists');
    }

    public function addSong($playlistId, $songName)
    {
        return view('playlists');
    }

    public function duration($id)
    {
        return view('playlists');
    }
}