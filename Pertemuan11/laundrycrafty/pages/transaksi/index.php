<?php 
session_start();
require '../../config/auth.php';
require '../../config/database.php';

$query = "
SELECT t.*, p.nama AS pelanggan, l.nama_layanan 
FROM transaksi t
JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
JOIN layanan l ON t.id_layanan = l.id_layanan
ORDER BY t.id_transaksi DESC
";

$data = mysqli_query($conn, $query);
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Transaksi Laundry</h3>
        <a href="tambah.php" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah Transaksi</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['id_transaksi'] ?></td>
                    <td><?= $row['pelanggan'] ?></td>
                    <td><?= $row['nama_layanan'] ?></td>
                    <td><?= $row['berat'] ?> Kg</td>
                    <td>Rp <?= number_format($row['total_harga'],0,",",".") ?></td>
                    <td>
                        <span class="badge 
                            <?= $row['status']=="Proses" ? "bg-warning" : ($row['status']=="Selesai" ? "bg-primary" : "bg-success") ?>">
                            <?= $row['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="detail.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
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
