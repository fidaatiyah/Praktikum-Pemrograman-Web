<?php
require 'function.php';

$query = "SELECT * FROM mahasiswa";
$rows = query($query); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2a4d9c;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 90%;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 14px;
            text-align: center;
        }
        th {
            background-color: #2a4d9c;
            color: white;
        }
        a button {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-tambah {
            margin-bottom: 20px;
            background-color: skyblue;
            color: black;
        }
        .btn-hapus {
            background-color: pink;
            color: black;
        }
    </style>
</head>
<body>

    <h1>Data Mahasiswa</h1>
    <div style="text-align: center;">
        <a href="tambahdata.php">
            <button class="btn-tambah">Tambah Data</button>
        </a>
    </div>

    <table>
        <tr> 
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        <?php 
        $i = 1;
        foreach ($rows as $mhs): ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <?php if (!empty($mhs['foto'])): ?>
                    <img src="img/<?= htmlspecialchars($mhs['foto']) ?>" alt="Foto Mahasiswa" width="80">
                <?php else: ?>
                    <em>Tidak ada foto</em>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($mhs["nama"]) ?></td>
            <td><?= htmlspecialchars($mhs["nim"]) ?></td>
            <td><?= htmlspecialchars($mhs["jurusan"]) ?></td>
            <td><?= htmlspecialchars($mhs["noHP"]) ?></td>
            <td>
                <a href="hapusdata.php?id=<?= $mhs['id'] ?>">
                    <button class="btn-hapus">Hapus</button>
                </a>
                <!-- Tambahan jika nanti mau edit -->
                <!-- <a href="editdata.php?id=<?= $mhs['id'] ?>"><button>Edit</button></a> -->
            </td>
        </tr>
        <?php $i++; endforeach; ?>
    </table>
    
</body>
</html>
