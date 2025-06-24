<?php
require 'function.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
        alert('ID tidak ditemukan.');
        document.location.href = 'datamahasiswa.php';
    </script>";
    exit;
}

$id = intval($_GET['id']);

if (hapusdata($id) > 0) {
    echo "<script>
        alert('Data berhasil dihapus.');
        document.location.href = 'datamahasiswa.php';
    </script>";
} else {
    echo "Gagal dihapus: " . mysqli_error($koneksi);
}
?>
