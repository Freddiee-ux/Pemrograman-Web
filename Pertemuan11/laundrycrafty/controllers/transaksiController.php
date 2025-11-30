<?php
require '../config/database.php';

// =============================
// TAMBAH TRANSAKSI
// =============================
if (isset($_POST['id_pelanggan'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $id_layanan   = $_POST['id_layanan'];
    $berat        = $_POST['berat'];
    $total        = $_POST['total_harga'];
    $tgl_masuk    = date("Y-m-d");
    $tgl_selesai  = date("Y-m-d", strtotime("+2 days")); // default 2 hari
    $status       = "Proses";

    $query = "
        INSERT INTO transaksi
        VALUES (NULL, '$id_pelanggan', '$id_layanan',
                '$tgl_masuk', '$tgl_selesai',
                '$berat', '$total', '$status')
    ";

    mysqli_query($conn, $query);

    header("Location: ../pages/transaksi/index.php");
    exit;
}


// =============================
// UPDATE STATUS TRANSAKSI
// =============================
if (isset($_POST['update_status'])) {

    $id     = $_POST['id_transaksi'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE transaksi SET status='$status' WHERE id_transaksi=$id");

    header("Location: ../pages/transaksi/detail.php?id=$id");
    exit;
}
?>
