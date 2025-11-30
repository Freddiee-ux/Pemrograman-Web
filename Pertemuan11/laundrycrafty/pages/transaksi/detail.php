<?php
require '../../config/database.php';

$id = $_GET['id'];

$query = "
SELECT t.*, p.nama AS pelanggan, l.nama_layanan, l.harga_per_kg
FROM transaksi t
JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
JOIN layanan l ON t.id_layanan = l.id_layanan
WHERE t.id_transaksi = $id
";

$data = mysqli_fetch_assoc(mysqli_query($conn, $query));
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">

    <h3>Detail Transaksi</h3>

    <div class="card p-4 shadow-sm">

        <p><b>Pelanggan:</b> <?= $data['pelanggan'] ?></p>
        <p><b>Layanan:</b> <?= $data['nama_layanan'] ?></p>
        <p><b>Berat:</b> <?= $data['berat'] ?> Kg</p>
        <p><b>Total Harga:</b> Rp <?= number_format($data['total_harga'],0,",",".") ?></p>
        <p><b>Status:</b> <?= $data['status'] ?></p>

        <hr>

        <h5>Update Status</h5>
        <form action="../../controllers/transaksiController.php" method="POST">
            <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">

            <select name="status" class="form-control mb-3">
                <option value="Proses" <?= $data['status']=="Proses"?"selected":"" ?>>Proses</option>
                <option value="Selesai" <?= $data['status']=="Selesai"?"selected":"" ?>>Selesai</option>
                <option value="Sudah Diambil" <?= $data['status']=="Sudah Diambil"?"selected":"" ?>>Sudah Diambil</option>
            </select>

            <button name="update_status" class="btn btn-primary">Update</button>
        </form>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>
