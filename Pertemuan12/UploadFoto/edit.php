<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-warning text-dark text-center">
            <h3>Edit Data Siswa</h3>
        </div>

        <div class="card-body p-4">

            <form method="post" action="update.php" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $d['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" value="<?= $d['nis']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option <?= ($d['jenis_kelamin']=="Laki-laki"?"selected":"") ?>>Laki-laki</option>
                        <option <?= ($d['jenis_kelamin']=="Perempuan"?"selected":"") ?>>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telp" class="form-control" value="<?= $d['telp']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"><?= $d['alamat']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Lama</label><br>
                    <img src="uploads/<?= $d['foto']; ?>" width="120" class="rounded shadow">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="text-end">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>
