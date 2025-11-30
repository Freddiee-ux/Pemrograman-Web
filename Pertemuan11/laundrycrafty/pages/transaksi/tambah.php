<?php 
session_start();
require '../../config/auth.php';
require '../../config/database.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$layanan   = mysqli_query($conn, "SELECT * FROM layanan");
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">

    <h3>Tambah Transaksi</h3>

    <div class="card p-4 shadow-sm">

        <form action="../../controllers/transaksiController.php" method="POST">

            <div class="mb-3">
                <label>Pelanggan</label>
                <select name="id_pelanggan" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php while($p = mysqli_fetch_assoc($pelanggan)) { ?>
                        <option value="<?= $p['id_pelanggan'] ?>"><?= $p['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Layanan</label>
                <select name="id_layanan" class="form-control" required>
                    <option value="">-- Pilih Layanan --</option>
                    <?php while($l = mysqli_fetch_assoc($layanan)) { ?>
                        <option value="<?= $l['id_layanan'] ?>" data-harga="<?= $l['harga_per_kg'] ?>">
                            <?= $l['nama_layanan'] ?> - Rp <?= number_format($l['harga_per_kg'],0,",",".") ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Berat (Kg)</label>
                <input type="number" name="berat" id="berat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Total Harga</label>
                <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
            </div>

            <button class="btn btn-success">Simpan</button>

        </form>

    </div>

</div>

<script>
// hitung otomatis
document.querySelector("select[name=id_layanan]").addEventListener("change", hitung);
document.querySelector("#berat").addEventListener("keyup", hitung);

function hitung() {
    let layanan = document.querySelector("select[name=id_layanan]");
    let harga = layanan.options[layanan.selectedIndex].dataset.harga ?? 0;
    let berat = document.querySelector("#berat").value;

    document.querySelector("#total_harga").value = harga * berat;
}
</script>

<?php include '../../includes/footer.php'; ?>
