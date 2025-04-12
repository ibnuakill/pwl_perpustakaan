<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; // Nama tabel di database

    protected $primaryKey = 'id'; // Primary key tabel

    // Menambahkan kolom yang bisa diisi secara massal
    protected $fillable = ['kode_buku', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit', 'foto_cover'];


    public $timestamps = true; // Aktifkan timestamps (created_at, updated_at)
}
