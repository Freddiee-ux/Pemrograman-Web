<?php
require '../config/database.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

/* ==========================================================
   GET -> ambil semua pelanggan
========================================================== */
if ($method == "GET") {
    $sql = mysqli_query($conn, "SELECT * FROM pelanggan");
    $result = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "data" => $result
    ]);
    exit;
}


/* ==========================================================
   POST -> tambah pelanggan baru
========================================================== */
if ($method == "POST") {

    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['nama']) || !isset($input['alamat']) || !isset($input['no_hp'])) {
        echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
        exit;
    }

    $nama   = $input['nama'];
    $alamat = $input['alamat'];
    $no_hp  = $input['no_hp'];

    mysqli_query($conn, "INSERT INTO pelanggan VALUES(NULL, '$nama', '$alamat', '$no_hp')");

    echo json_encode(["status" => "success", "message" => "Pelanggan ditambahkan"]);
    exit;
}

echo json_encode(["status" => "error", "message" => "Method tidak didukung"]);
?>
