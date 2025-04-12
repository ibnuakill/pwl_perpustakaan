<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Data Buku</h1>
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Kode Buku:</label>
        <input type="text" name="kode_buku" required><br>
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" required><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>
        <label>Foto Cover:</label>
        <input type="file" name="foto_cover"><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
