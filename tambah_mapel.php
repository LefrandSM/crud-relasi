<?php
include 'koneksi.php';

// cek tombol tambah di tekan
if (isset($_POST['tambah'])) {
    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan_mapel'];

    $query = "INSERT INTO tb_mapel VALUES ('', '$mapel', '$jurusan')";

    $result = mysqli_query($conn, $query);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
            <script>
                alert('Data berhasil di tambahkan');
                window.location.href = 'mapel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di tambahkan');
                window.location.href = 'mapel.php';
            </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/utility.css">

    <title>Tambah siswa</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link navbar-brand active" href="#">Welcome Admin!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guru.php">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="mapel.php">Mapel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="konten container">
        <h1 class="p-3 text-center">Tambah Mapel</h1>

        <a href="tambah_mapel.php" class="btn btn-success my-2">Tambah mapel +</a>

        <form action="" method="post" class="my-4">
            <div class="mb-3">
                <label for="mapel" class="form-label">Mapel</label>
                <input type="text" class="form-control" id="mapel" name="mapel">
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan_mapel" id=" rpl" value="rpl">
                    <label class="form-check-label" for="rpl">rpl</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan_mapel" id=" tkj" value="tkj">
                    <label class="form-check-label" for="tkj">tkj</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan_mapel" id="mm" value="mm">
                    <label class="form-check-label" for="mm">mm</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah Data Siswa</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>