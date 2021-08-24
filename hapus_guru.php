<?php
include_once 'koneksi.php';

// ambil id dari url
$id_guru = $_GET['id'];

// query hapus 
$query = "DELETE FROM tb_guru WHERE id_guru = '$id_guru'";

mysqli_query($conn, $query);

$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    echo "
            <script>
                alert('Data berhasil di dihapus');
                window.location.href = 'guru.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal di dihapus');
                window.location.href = 'guru.php';
            </script>
        ";
}
