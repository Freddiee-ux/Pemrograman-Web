<?php 
session_start();
require '../../config/auth.php';
require '../../config/database.php';

$data = mysqli_query($conn, "SELECT * FROM layanan");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Layanan Laundry</h3>
        <a href="tambah.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Layanan</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Layanan</th>
                        <th>Harga / Kg</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?= $row['id_layanan'] ?></td>
                        <td><?= $row['nama_layanan'] ?></td>
                        <td>Rp <?= number_format($row['harga_per_kg'],0,",",".") ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id_layanan'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="../../controllers/layananController.php?hapus=<?= $row['id_layanan'] ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?php include '../../includes/footer.php'; ?>
