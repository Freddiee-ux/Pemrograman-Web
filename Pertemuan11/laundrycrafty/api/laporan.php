<?php
require '../config/database.php';

header("Content-Type: application/json");

$periode = $_GET['periode'] ?? "hari";

switch ($periode) {

    case "bulan":
        $sql = "
            SELECT SUM(total_harga) AS pendapatan
            FROM transaksi
            WHERE MONTH(tanggal_masuk) = MONTH(NOW())
        ";
        break;

    case "minggu":
        $sql = "
            SELECT SUM(total_harga) AS pendapatan
            FROM transaksi
            WHERE YEARWEEK(tanggal_masuk) = YEARWEEK(NOW())
        ";
        break;

    default:
    case "hari":
        $sql = "
            SELECT SUM(total_harga) AS pendapatan
            FROM transaksi
            WHERE tanggal_masuk = CURDATE()
        ";
        break;
}

$data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

echo json_encode([
    "status" => "success",
    "periode" => $periode,
    "pendapatan" => $data['pendapatan'] ?? 0
]);
?>
