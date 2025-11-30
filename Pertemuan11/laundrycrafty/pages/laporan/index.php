<?php 
session_start();
require '../../config/auth.php';
require '../../config/database.php';

$filter = "";
if (isset($_GET['dari']) && isset($_GET['sampai'])) {
    $dari   = $_GET['dari'];
    $sampai = $_GET['sampai'];
    $filter = "WHERE tanggal_masuk BETWEEN '$dari' AND '$sampai'";
}

$data = mysqli_query($conn, "
SELECT t.*, p.nama AS pelanggan 
FROM transaksi t
JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
$filter
ORDER BY t.tanggal_masuk DESC
");

$total = mysqli_fetch_assoc(mysqli_query($conn, "
SELECT SUM(total_harga) AS pendapatan FROM transaksi $filter
"))['pendapatan'];
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">

    <h3>Laporan Pendapatan</h3>

    <div class="card p-4 shadow-sm mb-4">
        <form method="GET">

            <div class="row">
                <div class="col-md-4">
                    <label>Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label>&nbsp;</label><br>
                    <button class="btn btn-primary w-100"><i class="bi bi-search"></i> Filter</button>
                </div>
            </div>

        </form>
    </div>

    <div class="card shadow-sm p-4">

        <h5 class="mb-3">Total Pendapatan:  
            <span class="text-success fw-bold">
                Rp <?= number_format($total ?? 0,0,",",".") ?>
            </span>
        </h5>

        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['tanggal_masuk'] ?></td>
                    <td><?= $row['pelanggan'] ?></td>
                    <td>Rp <?= number_format($row['total_harga'],0,",",".") ?></td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>

</div>

<?php include '../../includes/footer.php'; ?>
