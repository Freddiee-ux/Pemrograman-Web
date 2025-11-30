<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">
    <h3>Tambah Layanan</h3>

    <div class="card shadow-sm p-4">
        <form action="../../controllers/layananController.php" method="POST">

            <div class="mb-3">
                <label>Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga per Kg</label>
                <input type="number" name="harga_per_kg" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>

</div>

<?php include '../../includes/footer.php'; ?>
