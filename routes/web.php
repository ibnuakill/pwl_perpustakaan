<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiPinjamBukuController;

Route::get('/', [BukuController::class, 'index']);
Route::resource('buku', BukuController::class);
//start route laporan pinjam buku
Route::get('/laporan-pinjam', [TransaksiPinjamBukuController::class, 'laporan'])->name('laporan.pinjam');
//end route laporan pinjam buku
