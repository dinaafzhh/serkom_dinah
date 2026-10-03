<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::first();

        return view('admin.profil.profil')->with('profil', $profil);
    }

    public function create()
    {
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'npsn' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:100',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        Profil::create($data);

        return redirect()
            ->route('admin.profil.profil')
            ->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);

        return view('admin.profil.edit')->with('profil', $profil);
    }

    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        $data = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'npsn' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:100',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }

            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        $profil->update($data);

        return redirect()
            ->route('admin.profil.profil')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);

        if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
            Storage::disk('public')->delete($profil->foto);
        }

        $profil->delete();

        return redirect()
            ->route('admin.profil.profil')
            ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
