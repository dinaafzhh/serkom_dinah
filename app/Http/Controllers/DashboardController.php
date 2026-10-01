<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalBerita = Berita::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalBerita',
            'totalEkstrakurikuler'
        ));
    }
}
