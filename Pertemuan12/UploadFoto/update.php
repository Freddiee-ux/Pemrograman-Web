<?php
include 'koneksi.php';

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$foto_baru = $_FILES['foto']['name'];

if($foto_baru != ""){
    $target = "uploads/" . basename($foto_baru);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target);

    mysqli_query($koneksi, "UPDATE siswa SET 
        nis='$nis',
        nama='$nama',
        jenis_kelamin='$jk',
        telp='$telp',
        alamat='$alamat',
        foto='$foto_baru'
        WHERE id='$id'");
} else {
    mysqli_query($koneksi, "UPDATE siswa SET 
        nis='$nis',
        nama='$nama',
        jenis_kelamin='$jk',
        telp='$telp',
        alamat='$alamat'
        WHERE id='$id'");
}

header("location:index.php");
?>
