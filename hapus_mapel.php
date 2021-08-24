<?php
include_once 'koneksi.php';

// tangkap id melalui url
$id_mapel = $_GET['id'];

$query = "DELETE FROM tb_mapel WHERE id_mapel = '$id_mapel'";

mysqli_query($conn, $query);

$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    echo "
            <script>
                alert('Data berhasil di dihapus');
                window.location.href = 'mapel.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data gagal di dihapus');
                window.location.href = 'mapel.php';
            </script>
        ";
}
