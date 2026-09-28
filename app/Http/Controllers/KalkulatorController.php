<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function pertambahan($angka1, $angka2)
    {
        $hasil = $angka1 + $angka2;
        return $hasil;
    }

    public function pengurangan($angka1, $angka2)
    {
        $hasil = $angka1 - $angka2;
        return $hasil;
    }

    public function hasil($angka1, $angka2)
    {
        $variabel1 = $this->pertambahan($angka1, $angka2);
        $variabel2 = $this->pengurangan($angka1, $angka2);

        return view('kalkulator', compact('angka1', 'angka2', 'variabel1', 'variabel2'));
    }
}