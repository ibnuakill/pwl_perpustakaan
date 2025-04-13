<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<body>
    <h1>Laporan Buku</h1>
    <table>
        <tr>
            <th>N0</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Foto Cover</th>
        </tr>
        {{ $no = 1; }}
        @foreach ($laporans as $laporan)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $laporan->kode_buku }}</td>
            <td>{{ $laporan->judul_buku }}</td>
            <td>{{ $laporan->pengarang }}</td>
            <td>{{ $laporan->penerbit }}</td>
            <td>{{ $laporan->tahun_terbit }}</td>
            <td><img src="{{ public_path('images/' . $laporan->foto_cover)
}}" width="50"></td>
        </tr>
        @endforeach
    </table>
</body>

</html>