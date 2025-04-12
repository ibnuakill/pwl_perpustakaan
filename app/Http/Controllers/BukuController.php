<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|unique:bukus',
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'foto_cover' =>
            'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('foto_cover')) {
            $fileName = time() . '.' . $request->foto_cover->extension();
            $request->foto_cover->move(
                public_path('images'),
                $fileName
            );
            $validated['foto_cover'] = $fileName;
        }
        Buku::create($validated);
        return redirect()->route('buku.index')->with(
            'success',
            'Data berhasil disimpan!'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'foto_cover' =>
            'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('foto_cover')) {
            $fileName = time() . '.' . $request->foto_cover->extension();
            $request->foto_cover->move(
                public_path('images'),
                $fileName
            );
            $validated['foto_cover'] = $fileName;
        }
        $buku->update($validated);
        return redirect()->route('buku.index')->with(
            'success',
            'Data berhasil diperbarui!'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
