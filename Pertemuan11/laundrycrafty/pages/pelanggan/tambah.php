<?php 
session_start();
require '../../config/auth.php';
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">
    <h3>Tambah Pelanggan</h3>

    <form action="../../controllers/pelangganController.php" method="POST">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>

</div>

<?php include '../../includes/footer.php'; ?>
