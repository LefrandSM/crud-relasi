<?php
include 'koneksi.php';

// ambil id dari url
$id_guru = $_GET['id'];

// query data guru
$query = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru'";

$result = mysqli_query($conn, $query);

$guru = mysqli_fetch_assoc($result);

$jurusan_guru_awal = $guru['jurusan_guru'];

// data mapel yang bisa di pilih
$query = "SELECT * FROM tb_mapel WHERE jurusan_mapel = '$jurusan_guru_awal'";

$result = mysqli_query($conn, $query);


// cek tombol tambah di tekan
if (isset($_POST['edit'])) {
    $nama = $_POST['nama_guru'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jurusan_guru = $_POST['jurusan_guru'];
    $nip = $_POST['nip'];
    $id_mapel = $_POST['id_mapel'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];


    $query = "UPDATE tb_guru
                SET
            id_guru = '$id_guru',
            nama_guru = '$nama',
            jk = '$jenis_kelamin',
            id_mapel = '$id_mapel',
            nip = '$nip',
            alamat = '$alamat',
            tgl_lahir = '$tgl_lahir',
            jurusan_guru = '$jurusan_guru'
                WHERE
            id_guru = '$id_guru'
            ";

    $result = mysqli_query($conn, $query);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        echo "
            <script>
                alert('Data berhasil di edit');
                window.location.href = 'guru.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di edit');
                window.location.href = 'guru.php';
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

    <title>Edit guru</title>
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
        <h1 class="p-3 text-center">Edit Guru</h1>

        <a href="tambah_siswa.php" class="btn btn-success my-2">Tambah Guru +</a>

        <form action="" method="post" class="my-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama_guru" value="<?= $guru['nama_guru']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis kelamin</label>
                <?php if ($guru['jk'] == 'laki-laki') : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" checked>
                        <label class="form-check-label" for="laki-laki">laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                        <label class="form-check-label" for="perempuan">perempuan</label>
                    </div>
                <?php endif; ?>
                <?php if ($guru['jk'] == 'perempuan') : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
                        <label class="form-check-label" for="laki-laki">laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" checked>
                        <label class="form-check-label" for="perempuan">perempuan</label>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($guru['jurusan_guru'] == 'rpl') : ?>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="rpl" value="rpl" checked>
                        <label class="form-check-label" for="rpl">rpl</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="tkj" value="tkj">
                        <label class="form-check-label" for="tkj">tkj</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="mm" value="mm">
                        <label class="form-check-label" for="mm">mm</label>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($guru['jurusan_guru'] == 'tkj') : ?>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="rpl" value="rpl">
                        <label class="form-check-label" for="rpl">rpl</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="tkj" value="tkj" checked>
                        <label class="form-check-label" for="tkj">tkj</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="mm" value="mm">
                        <label class="form-check-label" for="mm">mm</label>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($guru['jurusan_guru'] == 'mm') : ?>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="rpl" value="rpl">
                        <label class="form-check-label" for="rpl">rpl</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="tkj" value="tkj">
                        <label class="form-check-label" for="tkj">tkj</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jurusan_guru" id="mm" value="mm" checked>
                        <label class="form-check-label" for="mm">mm</label>
                    </div>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="nip" class="form-label">Nip</label>
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mapel</label>
                <select class="form-select" aria-label="Default select example" name="id_mapel">
                    <option>Pilih mapel..</option>
                    <?php while ($mapel = mysqli_fetch_assoc($result)) : ?>
                        <option value="<?= $mapel['id_mapel']; ?>" <?php if ($mapel['id_mapel'] == $guru['id_mapel']) {
                                                                        echo 'selected';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>><?= $mapel['mapel']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $guru['tgl_lahir']; ?>">
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="alamat" id="alamat" style="height: 100px" name="alamat"><?= $guru['alamat']; ?></textarea>
                    <label for="alamat">Alamat</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="edit">Tambah Data Guru</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>