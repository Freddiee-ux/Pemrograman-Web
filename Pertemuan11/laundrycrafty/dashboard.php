<?php 
session_start();
require 'config/auth.php'; 
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container mt-4">
    <h3>Dashboard LaundryCrafty</h3>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card p-3 shadow">
                <h5>Pelanggan</h5>
                <p>Total: 25</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow">
                <h5>Transaksi</h5>
                <p>Hari ini: 12</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow">
                <h5>Pendapatan</h5>
                <p>Rp 320.000</p>
            </div>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>
