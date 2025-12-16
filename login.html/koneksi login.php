<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);

// Jika username dan password ditemukan
if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    // Cek role untuk arahkan halaman
    if ($data['role'] == "admin") {
        header("Location: dashboard_admin.php");
        exit();
    } elseif ($data['role'] == "user") {
        header("Location: dashboard_user.php");
        exit();
    } else {
        echo "Role tidak dikenali!";
    }
} else {
    echo "<script>alert('Username atau password salah!'); window.location='index.html';</script>";
}
?>
