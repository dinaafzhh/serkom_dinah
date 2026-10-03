<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;

class LandingController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        $berita = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->first();

        $galeri = Galeri::orderBy('tanggal', 'desc')->get();

        $guru = Guru::orderBy('nama_guru', 'asc')->get();

        return view('landing', compact(
            'profil',
            'berita',
            'galeri',
            'guru'
        ));
    }
}
