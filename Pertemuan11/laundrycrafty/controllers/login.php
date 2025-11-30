<?php
session_start();
require '../config/database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: ../dashboard.php");
} else {
    echo "<script>alert('Login gagal!'); window.location='../index.php';</script>";
}
?>
