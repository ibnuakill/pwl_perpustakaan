<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiPinjamBuku extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pinjam_bukus'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = ['buku_id', 'anggota_id', 'tanggal_pinjam', 'tanggal_kembali', 'denda'];

    // Relasi ke AnggotaPerpus
    public function anggota()
    {
        return $this->belongsTo(AnggotaPerpus::class, 'anggota_id');
    }

    // Relasi ke Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
