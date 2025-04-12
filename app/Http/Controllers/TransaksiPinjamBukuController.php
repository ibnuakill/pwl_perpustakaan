<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPinjamBuku;
use App\Models\Buku;
use App\Models\AnggotaPerpus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiPinjamBukuController extends Controller
{
    public function laporan()
    {
        $transaksis = TransaksiPinjamBuku::with(['buku', 'anggota'])->get();
        // Hitung lama_pinjam dan denda untuk setiap transaksi
        foreach ($transaksis as $transaksi) {
            if ($transaksi->tanggal_kembali) {
                $tanggalPinjam = Carbon::parse($transaksi->tanggal_pinjam);
                $tanggalKembali = Carbon::parse($transaksi->tanggal_kembali);
                // Hitung lama pinjam
                $transaksi->lama_pinjam = $tanggalPinjam->diffInDays($tanggalKembali);
                // Hitung denda
                if ($transaksi->lama_pinjam > 3) {
                    $transaksi->denda = ($transaksi->lama_pinjam - 3) * 1000;
                } else {
                    $transaksi->denda = 0;
                }
            } else {
                // Jika belum dikembalikan, set lama_pinjam dan denda ke null
                $transaksi->lama_pinjam = null;
                $transaksi->denda = null;
            }
        }
        return view(
            'transaksi_pinjam_buku.laporan',
            compact('transaksis')
        );
    }
    public function index()
    {
        $transaksis = TransaksiPinjamBuku::with([
            'buku',
            'anggota'
        ])->get();
        return view(
            'transaksi_pinjam_buku.index',
            compact('transaksis')
        );
    }
    public function create()
    {
        $bukus = Buku::all();
        $anggotas = AnggotaPerpus::all();
        return view(
            'transaksi_pinjam_buku.create',
            compact('bukus', 'anggotas')
        );
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'anggota_id' => 'required|exists:anggota_perpus,id',
            'tanggal_pinjam' => 'required|date',
        ]);
        TransaksiPinjamBuku::create($validated);
        return redirect()->route('transaksi_pinjam_buku.index')
            > with('success', 'Data berhasil disimpan!');
    }
    public function edit(TransaksiPinjamBuku
    $transaksi_pinjam_buku)
    {
        $bukus = Buku::all();
        $anggotas = AnggotaPerpus::all();
        return view(
            'transaksi_pinjam_buku.edit',
            compact('transaksi_pinjam_buku', 'bukus', 'anggotas')
        );
    }
    public function update(Request $request, TransaksiPinjamBuku
    $transaksi_pinjam_buku)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'anggota_id' => 'required|exists:anggota_perpus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
        ]);
        if ($request->tanggal_kembali) {
            $tanggalPinjam =
                \Carbon\Carbon::parse($transaksi_pinjam_buku->tanggal_pinjam);
            $tanggalKembali = \Carbon\Carbon::parse($request
                ->tanggal_kembali);
            $selisihHari = $tanggalKembali
                ->diffInDays($tanggalPinjam);
            if ($selisihHari > 3) {
                $denda = ($selisihHari - 3) * 1000;
                $validated['denda'] = $denda;
            }
        }
        $transaksi_pinjam_buku->update($validated);
        return redirect()->route('transaksi_pinjam_buku.index')
            > with('success', 'Data berhasil diperbarui!');
    }
    public function destroy(TransaksiPinjamBuku
    $transaksi_pinjam_buku)
    {
        $transaksi_pinjam_buku->delete();
        return redirect()->route('transaksi_pinjam_buku.index')
            > with('success', 'Data berhasil dihapus!');
    }
}
