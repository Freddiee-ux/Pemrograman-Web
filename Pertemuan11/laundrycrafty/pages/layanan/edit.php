<?php 
require '../../config/database.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM layanan WHERE id_layanan=$id"));
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

<div class="container mt-4">

    <h3>Edit Layanan</h3>

    <div class="card p-4 shadow-sm">
        <form action="../../controllers/layananController.php" method="POST">

            <input type="hidden" name="id_layanan" value="<?= $data['id_layanan'] ?>">

            <div class="mb-3">
                <label>Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control" value="<?= $data['nama_layanan'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Harga / Kg</label>
                <input type="number" name="harga_per_kg" class="form-control" value="<?= $data['harga_per_kg'] ?>" required>
            </div>

            <button name="update_layanan" class="btn btn-success">Simpan Perubahan</button>

        </form>
    </div>

</div>

<?php include '../../includes/footer.php'; ?>
