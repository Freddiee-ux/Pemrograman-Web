<?php
include 'koneksi.php';

$query = "SELECT * FROM siswa WHERE kelas = 'IX RPL' ORDER BY nis ASC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa Kelas IX RPL - PDF</title>
    <link rel="stylesheet" href="fpdf.css">
    
</head>
<body>
    <div class="print-button">
        <button onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
        <a href="index.php" class="back-button">← Kembali</a>
    </div>
    
    <div class="container">
        <div class="header">
            <h1>DAFTAR SISWA KELAS IX RPL</h1>
            <p>Jurusan: Rekayasa Perangkat Lunak</p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%;">NIS</th>
                    <th style="width: 40%;">Nama Siswa</th>s
                    <th style="width: 20%;">Jenis Kelamin</th>
                    <th style="width: 20%;">Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nis']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align: center;'>Tidak ada data siswa</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <div class="footer">
            <p>Dicetak pada: <?php echo date('d-m-Y H:i:s'); ?></p>
        </div>
    </div>
    
    <?php mysqli_close($koneksi); ?>
</body>
</html>
