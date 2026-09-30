<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa', 'asc')->paginate(10);

        return view('admin.siswa.siswa', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }


    public function show(Siswa $siswa)
    {
        //
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }


    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required|max:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|integer',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('admin.siswa.siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
