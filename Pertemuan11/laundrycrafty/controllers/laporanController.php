<?php
require '../config/database.php';

header("Content-Type: application/json");

$periode = $_GET['periode'] ?? "harian";

switch ($periode) {

    case "harian":
        $sql = "SELECT SUM(total_harga) AS pendapatan 
                FROM transaksi
                WHERE tanggal_masuk = CURDATE()";
        break;

    case "mingguan":
        $sql = "SELECT SUM(total_harga) AS pendapatan 
                FROM transaksi
                WHERE YEARWEEK(tanggal_masuk) = YEARWEEK(NOW())";
        break;

    default:
    case "bulanan":
        $sql = "SELECT SUM(total_harga) AS pendapatan 
                FROM transaksi
                WHERE MONTH(tanggal_masuk) = MONTH(NOW())";
        break;
}

$data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

echo json_encode([
    "periode"     => $periode,
    "pendapatan"  => $data['pendapatan'] ?? 0
]);

?>
