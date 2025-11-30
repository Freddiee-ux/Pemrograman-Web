<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "laundrycrafty";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Gagal konek database!");
}
?>
<?php