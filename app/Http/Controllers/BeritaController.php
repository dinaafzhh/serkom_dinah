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

    public function landing()
    {
        $berita = Berita::where('status', 'Publish')
            ->orderBy('tanggal', 'desc')
            ->first();

        return view('landing', compact('berita'));
    }

    public function detail(string $id)
    {
        $berita = Berita::with('user')
            ->where('id_berita', $id)
            ->where('status', 'Publish')
            ->firstOrFail();

        $beritaLainnya = Berita::where('status', 'Publish')
            ->where('id_berita', '!=', $id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.berita.detail', compact('berita', 'beritaLainnya'));
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

    public function update(Request $request, string $id)
    {
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

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal = $request->tanggal;
        $berita->status = $request->status;
        $berita->id_user = $request->id_user;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $berita->gambar = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->save();

        return redirect()
            ->route('admin.berita.berita')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $berita = Berita::where('id_berita', $id)
            ->firstOrFail();

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.berita')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
