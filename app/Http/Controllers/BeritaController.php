<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{

    public function index()
    {
        $berita = Berita::with('user')
            ->orderBy('id_berita', 'desc')
            ->get();

        return view('admin.berita.berita', compact('berita'));
    }


    public function create()
    {
        $users = User::all();

        return view('admin.berita.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => $request->id_user,
        ];

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.berita')
            ->with('success', 'Berita berhasil ditambahkan!');
    }



    public function show(string $id)
    {
        $berita = Berita::with('user')
            ->where('id_berita', $id)
            ->firstOrFail();

        return view('admin.berita.show', compact('berita'));
    }


    public function edit(string $id)
    {
        $berita = Berita::where('id_berita', $id)
            ->firstOrFail();

        $users = User::all();

        return view(
            'admin.berita.edit',
            compact('berita', 'users')
        );
    }


    // =========================
    // UPDATE BERITA
    // =========================
    public function update(Request $request, string $id)
    {
        // Cari berdasarkan primary key id_berita
        $berita = Berita::where('id_berita', $id)
            ->firstOrFail();

        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:Publish,Draft',
            'id_user' => 'required|exists:user,id_user',
        ]);

        // Data yang akan diperbarui
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->status = $request->status;
        $berita->id_user = $request->id_user;

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $berita->gambar = $request->file('gambar')
                ->store('berita', 'public');
        }

        // Simpan perubahan
        $berita->save();

        return redirect()
            ->route('admin.berita.berita')
            ->with('success', 'Berita berhasil diperbarui!');
    }


    // =========================
    // HAPUS BERITA
    // =========================
    public function destroy(string $id)
    {
        $berita = Berita::where('id_berita', $id)
            ->firstOrFail();

        // Hapus gambar
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.berita')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
