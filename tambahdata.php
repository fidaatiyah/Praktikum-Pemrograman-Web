<?php
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambahmahasiswa($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan.');
            document.location.href = 'datamahasiswa.php';
        </script>";
    } else {
        echo "Gagal ditambahkan: " . mysqli_error($koneksi);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TambahData</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" placeholder=" Nama Lengkap*" required /><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" placeholder=" NIM*" required /><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" placeholder=" Jurusan*" required /><br>

        <label for="noHP">No HP:</label>
        <input type="text" name="noHP" id="noHP" placeholder=" No HP*" required /><br>

      
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>
