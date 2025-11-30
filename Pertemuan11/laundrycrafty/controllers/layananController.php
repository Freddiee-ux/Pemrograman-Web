<?php
require '../config/database.php';

// =============================
// TAMBAH LAYANAN
// =============================
if (isset($_POST['nama_layanan'])) {

    $nama = $_POST['nama_layanan'];
    $harga = $_POST['harga_per_kg'];

    $query = "INSERT INTO layanan VALUES(NULL, '$nama', '$harga')";
    mysqli_query($conn, $query);

    header("Location: ../pages/layanan/index.php");
    exit;
}


// =============================
// UPDATE LAYANAN
// =============================
if (isset($_POST['update_layanan'])) {

    $id     = $_POST['id_layanan'];
    $nama   = $_POST['nama_layanan'];
    $harga  = $_POST['harga_per_kg'];

    $query = "
        UPDATE layanan 
        SET nama_layanan='$nama', harga_per_kg='$harga'
        WHERE id_layanan=$id
    ";

    mysqli_query($conn, $query);

    header("Location: ../pages/layanan/index.php");
    exit;
}


// =============================
// HAPUS LAYANAN
// =============================
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    mysqli_query($conn, "DELETE FROM layanan WHERE id_layanan=$id");

    header("Location: ../pages/layanan/index.php");
    exit;
}
?>
