<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>
<h2>DATA SISWA</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telp</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>

    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM siswa");
    while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?= $d['id']; ?></td>
        <td><?= $d['nis']; ?></td>
        <td><?= $d['nama']; ?></td>
        <td><?= $d['jenis_kelamin']; ?></td>
        <td><?= $d['telp']; ?></td>
        <td><?= $d['alamat']; ?></td>
        <td><img src="uploads/<?= $d['foto']; ?>" width="70"></td>
        <td>
            <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
