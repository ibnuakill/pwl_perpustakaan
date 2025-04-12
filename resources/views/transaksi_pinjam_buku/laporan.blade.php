<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Laporan Peminjaman dan Pengembalian Buku</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Nama Anggota</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Lama Pinjam (Hari)</th>
            <th>Denda (Rp)</th>
        </tr>
        @foreach ($transaksis as $key => $transaksi)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $transaksi->buku->judul_buku }}</td>
            <td>{{ $transaksi->anggota->nama_anggota }}</td>
            <td>{{ $transaksi->tanggal_pinjam }}</td>
            <td>{{ $transaksi->tanggal_kembali ?? '-' }}</td>
            <td>{{ $transaksi->lama_pinjam ?? '-' }}</td>
            <td>Rp {{ number_format($transaksi->denda ?? 0, 0, ',',
                '.') }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
