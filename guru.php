<?php
include_once 'koneksi.php';

// persiapan query
$query = "SELECT * FROM tb_guru
            INNER JOIN tb_mapel
            ON tb_guru.id_mapel = tb_mapel.id_mapel
";

// query
$result = mysqli_query($conn, $query);

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

    <title>Siswa</title>
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
                        <a class="nav-link active" href="guru.php">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mapel.php">Mapel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="konten container">
        <h1 class="p-3 text-center">Tabel Guru</h1>

        <a href="tambah_guru.php" class="btn btn-success my-2">Tambah Guru +</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis kelamin</th>
                    <th>Mapel</th>
                    <th>Nip</th>
                    <th>Alamat</th>
                    <th>Tanggal lahir</th>
                    <th>Jurusan</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $angka = 1; ?>
                <?php while ($guru = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th><?= $angka++; ?>.</th>
                        <td><?= $guru['nama_guru']; ?></td>
                        <td><?= $guru['jk']; ?></td>
                        <td><?= $guru['mapel']; ?></td>
                        <td><?= $guru['nip']; ?></td>
                        <td><?= $guru['alamat']; ?></td>
                        <td><?= $guru['tgl_lahir']; ?></td>
                        <td><?= $guru['jurusan_guru']; ?></td>
                        <td><a href="edit_guru.php?id=<?= $guru['id_guru']; ?>" class="btn btn-warning">Edit</a> <a href="hapus_guru.php?id=<?= $guru['id_guru']; ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>