<?php
     require 'function.php';
    $query = "SELECT * FROM mahasiswa";
    $rows = query($query); 
   

    ///ambil data dari (fetch) dari lemari result
   
       // while ($mhs = mysqli_fetch_assoc($result))
        //{ var_dump($mhs) ;

        //}
    
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <h1>Data Mahasiswa </h1>
    <a href="tambahdata.php"><button style="margin-bottom: 10px; background-color: skyblue; color: black;">Tambah Data</button></a>

    <table border="1" cellspacing="0" cellpadding="10">
       <tr> 
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>nohp</th>
            <th>Aksi</th>
        </tr>
         <?php 
         $i = 1;
         foreach ($rows as $mhs) { ?>
        <tr>
           
            <td><?= $i?> </td>
            <td>
                    <img src="img/<?= $mhs['foto'] ?>" alt="Foto Mahasiswa" width="80">
                </td>
            <td> <?= $mhs["nama"] ?> </td>
            <td><?= $mhs["nim"] ?></td>
            <td><?= $mhs["jurusan"] ?></td>
            <td><?= $mhs["noHP"] ?></td>
            <td>
                <a href="hapusdata.php/?id=<?= $mhs['id'] ?>"><button style="background-color: pink; color: black;">Hapus</button></a>
                
        </tr>
        <?php $i++; } ?>
    <table/>
       
</body>
</html>