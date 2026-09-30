<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{

    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view(
            'admin.ektrakurikuler.ektrakurikuler',
            compact('ekstrakurikuler')
        );
    }



    public function create()
    {
        return view('admin.ektrakurikuler.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil ditambahkan!'
            );
    }



    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::where(
            'id_ekskul',
            $id
        )->firstOrFail();

        return view(
            'admin.ektrakurikuler.edit',
            compact('ekstrakurikuler')
        );
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $ekstrakurikuler = Ekstrakurikuler::where(
            'id_ekskul',
            $id
        )->firstOrFail();



        $gambar = $ekstrakurikuler->gambar;



        if ($request->hasFile('gambar')) {

            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete(
                    $ekstrakurikuler->gambar
                );
            }

            $gambar = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }



        $ekstrakurikuler->update([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);


        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil diperbarui!'
            );
    }



    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::where(
            'id_ekskul',
            $id
        )->firstOrFail();



        if ($ekstrakurikuler->gambar) {

            Storage::disk('public')->delete(
                $ekstrakurikuler->gambar
            );

        }


        $ekstrakurikuler->delete();


        return redirect()
            ->route('admin.ektrakurikuler.ektrakurikuler')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil dihapus!'
            );
    }
}
