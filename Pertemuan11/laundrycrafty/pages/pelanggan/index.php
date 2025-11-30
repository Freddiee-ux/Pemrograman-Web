<?php 
session_start();
require '../../config/auth.php';
require '../../config/database.php';

$data = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">
    <h3>Data Pelanggan</h3>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nama</th><th>Alamat</th><th>No HP</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $row['id_pelanggan'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../../controllers/pelangganController.php?hapus=<?= $row['id_pelanggan'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include '../../includes/footer.php'; ?>
