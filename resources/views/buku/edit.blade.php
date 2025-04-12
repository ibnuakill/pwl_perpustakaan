<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Data Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Kode Buku:</label>
        <input type="text" name="kode_buku" value="{{ $buku->kode_buku }}" readonly><br>
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" value="{{ $buku->judul_buku}}" required><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" value="{{ $buku->pengarang }}" required><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="{{ $buku->penerbit }}" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required><br>
        <label>Foto Cover:</label>
        <input type="file" name="foto_cover"><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
