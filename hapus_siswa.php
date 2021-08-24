<?php
include_once 'koneksi.php';

// tangkap id melalui url
$id_siswa = $_GET['id'];

$query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";

mysqli_query($conn, $query);

$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    echo "
            <script>
                alert('Data berhasil di dihapus');
                window.location.href = 'siswa.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal di dihapus');
                window.location.href = 'siswa.php';
            </script>
        ";
}
