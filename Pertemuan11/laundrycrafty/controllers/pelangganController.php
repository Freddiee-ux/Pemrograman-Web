<?php
require '../config/database.php';

// TAMBAH
if (isset($_POST['nama'])) {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];

    mysqli_query($conn, "INSERT INTO pelanggan VALUES (NULL,'$nama','$alamat','$no_hp')");
    header("Location: ../pages/pelanggan/index.php");
}

// HAPUS
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan=$id");
    header("Location: ../pages/pelanggan/index.php");
}
?>
