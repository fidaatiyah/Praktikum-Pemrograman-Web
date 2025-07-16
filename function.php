<?php    
$koneksi = mysqli_connect("localhost:3307", "root", "", "webif"); 

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahmahasiswa($data, $files) {
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $noHP = htmlspecialchars($data['noHP']);

    // Handle upload foto
    $foto = '';
    if (isset($files['foto']) && $files['foto']['error'] === 0) {
        $namaFile = $files['foto']['name'];
        $tmpName = $files['foto']['tmp_name'];

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (!in_array($ekstensi, $ekstensiValid)) {
            echo "<script>alert('Format file harus jpg, jpeg, atau png');</script>";
            return 0;
        }

        $namaBaru = uniqid() . '.' . $ekstensi;
        $folderTujuan = 'img/';
        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        if (!move_uploaded_file($tmpName, $folderTujuan . $namaBaru)) {
            echo "<script>alert('Gagal mengupload foto');</script>";
            return 0;
        }

        $foto = $namaBaru;
    }

    $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, noHP) 
              VALUES ('$foto', '$nama', '$nim', '$jurusan', '$noHP')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapusdata($id) {
    global $koneksi;

    // Hapus juga file foto dari folder jika ada
    $result = mysqli_query($koneksi, "SELECT foto FROM mahasiswa WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
    if ($data && !empty($data['foto'])) {
        $path = 'img/' . $data['foto'];
        if (file_exists($path)) {
            unlink($path); // hapus file foto
        }
    }

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function ubahdata($data, $files, $id) {
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $noHP = htmlspecialchars($data['noHP']);

    // Handle upload foto
    $foto = '';
    if (isset($files['foto']) && $files['foto']['error'] === 0) {
        $namaFile = $files['foto']['name'];
        $tmpName = $files['foto']['tmp_name'];

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (!in_array($ekstensi, $ekstensiValid)) {
            echo "<script>alert('Format file harus jpg, jpeg, atau png');</script>";
            return 0;
        }

        $namaBaru = uniqid() . '.' . $ekstensi;
        $folderTujuan = 'img/';
        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        if (!move_uploaded_file($tmpName, $folderTujuan . $namaBaru)) {
            echo "<script>alert('Gagal mengupload foto');</script>";
            return 0;
        }

        $foto = $namaBaru;
    }

    $query = "UPDATE mahasiswa SET foto='$namaBaru', nama='$nama', nim='$nim', jurusan
    ='$jurusan', noHP='$noHP' WHERE id=$id";
              
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function register($data)
{
    global $koneksi;
    $username = stripslashes ($data["username"]);
    $password1 = $data["password1"];
    $password2 = $data["password2"];

    $query ="SELECT * FROM user WHERE username= '$username'";

    $username_check = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($username_check) >0)
    {
        return "Username Sudah Terdaftar!";
    }

    if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $username)){
        return "Username tidak valid!";
    }

    if($password1 !== $password2)
    {
        return "Konfirmasi Password Salaaahhh";
    }

    $encrypt_pass = password_hash($password1, PASSWORD_DEFAULT);
    $query_insert = "INSERT INTO user (username,password) VALUE ('$username', '$encrypt_pass')";

    if(mysqli_query($koneksi, $query_insert))
    {
        return "Register Berhasil";
    }
    else {
        return "Gagal" . mysqli_error($koneksi);
    }

}
?>