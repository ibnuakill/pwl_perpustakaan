<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPerpus extends Model
{
    use HasFactory;

    protected $table = 'anggota_perpus'; // Pastikan nama tabel sesuai

    protected $fillable = ['kode_anggota', 'nama_anggota', 'alamat', 'telepon'];

    // Relasi ke TransaksiPinjamBuku
    public function transaksi()
    {
        return $this->hasMany(TransaksiPinjamBuku::class, 'anggota_id');
    }
}
