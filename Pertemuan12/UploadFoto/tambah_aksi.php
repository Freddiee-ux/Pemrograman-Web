<?php
include 'koneksi.php';

$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$jk     = $_POST['jenis_kelamin'];
$telp   = $_POST['telp'];
$alamat = $_POST['alamat'];

$foto = $_FILES['foto']['name'];

// path di server (ABSOLUTE)
$target_dir  = __DIR__ . '/uploads/';
$target_file = $target_dir . basename($foto);

// pastikan folder uploads ada
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // di Windows biasanya juga jalan
}

if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
    // di database cukup simpan nama filenya saja
    mysqli_query($koneksi, "INSERT INTO siswa 
        VALUES('', '$nis', '$nama', '$jk', '$telp', '$alamat', '$foto')");
    header("Location: index.php");
    exit;
} else {
    echo "Upload foto gagal!";
}
?>
