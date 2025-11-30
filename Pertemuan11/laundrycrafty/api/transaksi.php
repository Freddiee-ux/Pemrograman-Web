<?php
require '../config/database.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];


/* ==========================================================
   GET -> semua transaksi / detail transaksi
========================================================== */
if ($method == "GET") {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = mysqli_query($conn, "
            SELECT t.*, p.nama AS pelanggan, l.nama_layanan
            FROM transaksi t
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            JOIN layanan l ON t.id_layanan = l.id_layanan
            WHERE t.id_transaksi=$id
        ");

        echo json_encode([
            "status" => "success",
            "data" => mysqli_fetch_assoc($sql)
        ]);
        exit;
    }

    $sql = mysqli_query($conn, "
        SELECT t.*, p.nama AS pelanggan, l.nama_layanan
        FROM transaksi t
        JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
        JOIN layanan l ON t.id_layanan = l.id_layanan
        ORDER BY t.id_transaksi DESC
    ");

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
   POST -> tambah transaksi
========================================================== */
if ($method == "POST") {

    $input = json_decode(file_get_contents("php://input"), true);

    $id_pelanggan = $input['id_pelanggan'];
    $id_layanan   = $input['id_layanan'];
    $berat        = $input['berat'];
    $total        = $input['total_harga'];

    $tgl_masuk   = date("Y-m-d");
    $tgl_selesai = date("Y-m-d", strtotime("+2 days"));
    $status      = "Proses";

    mysqli_query($conn, "
        INSERT INTO transaksi 
        VALUES(NULL, '$id_pelanggan', '$id_layanan',
               '$tgl_masuk', '$tgl_selesai',
               '$berat', '$total', '$status')
    ");

    echo json_encode(["status"=>"success","message"=>"Transaksi ditambahkan"]);
    exit;
}



/* ==========================================================
   PUT -> update status transaksi
========================================================== */
if ($method == "PUT") {

    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['id']) || !isset($input['status'])) {
        echo json_encode(["status" => "error", "message" => "Parameter kurang"]);
        exit;
    }

    $id     = $input['id'];
    $status = $input['status'];

    mysqli_query($conn, "
        UPDATE transaksi 
        SET status='$status' 
        WHERE id_transaksi=$id
    ");

    echo json_encode(["status"=>"success","message"=>"Status transaksi diperbarui"]);
    exit;
}

echo json_encode(["status" => "error", "message" => "Method tidak didukung"]);
?>
