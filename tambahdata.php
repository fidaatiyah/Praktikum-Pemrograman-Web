<?php
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambahmahasiswa($_POST, $_FILES) > 0) {

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
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f2f6fc;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }

        h1 {
            text-align: center;
            color: #2a4d9c;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #2a4d9c;
            outline: none;
        }

        button {
            background-color: #2a4d9c;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1d397c;
        }

        ::placeholder {
            color: #bbb;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Data Mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap*" required>

            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" placeholder="NIM*" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan*" required>

            <label for="noHP">No HP:</label>
            <input type="text" name="noHP" id="noHP" placeholder="No HP*" required>

            <label for="foto">Foto:</label>
           <input type="file" name="foto" id="foto" required>


            <button type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>
