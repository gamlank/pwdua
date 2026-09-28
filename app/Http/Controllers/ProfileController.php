<?php

namespace App\Http\Controllers;

use Illuminate\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $biodata = [
            'nama' => 'Galang Putra Santosa',
            'nim' => '2455200001',
            'foto' => 'images/pfp.gif',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => '2024',
            'email' => 'gputrasantosa4@gmail.com',
            'telepon' => '+62 813-2617-8561',
            'alamat' => 'Jl. Balaidesa Utara No. 1, Buduran, Sidoarjo',
            'deskripsi' => 'Hai salken kenal, Saya Lorem ipsum dolor sit amet, consequat irure ad do exercitation et culpa. Laboris in duis veniam eu fugiat laboris magna voluptate aliquip ex tempor ad. In in esse non elit deserunt consectetur ad ad nisi et culpa sint. Dolore veniam id minim est pariatur laborum sunt reprehenderit. Voluptate do est exercitation ad occaecat dolore sed ut..'
        ];

        return view('profile', compact('biodata'));
    }
};