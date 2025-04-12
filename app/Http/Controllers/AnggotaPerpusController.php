<?php

namespace App\Http\Controllers;


use App\Models\AnggotaPerpus;
use Illuminate\Http\Request;

class AnggotaPerpusController extends Controller
{
    public function index()
    {
        $anggotas = AnggotaPerpus::all();
        return view(
            'anggota_perpus.index',
            compact('anggotas')
        );
    }
    public function create()
    {
        return view('anggota_perpus.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_anggota' => 'required|unique:anggota_perpus',
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        AnggotaPerpus::create($validated);
        return redirect()->route('anggota_perpus.index')
            > with('success', 'Data berhasil disimpan!');
    }
    public function edit(AnggotaPerpus $anggota_perpus)
    {
        return view(
            'anggota_perpus.edit',
            compact('anggota_perpus')
        );
    }
    public function update(Request $request, AnggotaPerpus
    $anggota_perpus)
    {
        $validated = $request->validate([
            'kode_anggota' =>
            'required|unique:anggota_perpus,kode_anggota,' .
                $anggota_perpus->id,
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        $anggota_perpus->update($validated);
        return redirect()->route('anggota_perpus.index')
            > with('success', 'Data berhasil diperbarui!');
    }
    public function destroy(AnggotaPerpus $anggota_perpus)
    {
        $anggota_perpus->delete();
        return redirect()->route('anggota_perpus.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
