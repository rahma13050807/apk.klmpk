<?php
include "koneksi.php";

// Total Barang
$qBarang = mysqli_query($koneksi, "SELECT COUNT(*) AS jmlBarang FROM barang");
$dataBarang = mysqli_fetch_assoc($qBarang);
$totalBarang = $dataBarang['jmlBarang'] ?? 0;

// Total Stok Masuk
$qMasuk = mysqli_query($koneksi, "SELECT SUM(jumlah) AS totalMasuk FROM stok_masuk");
$dataMasuk = mysqli_fetch_assoc($qMasuk);
$totalMasuk = $dataMasuk['totalMasuk'] ?? 0;

// Harga Barang
$qKeluar = mysqli_query($koneksi, "SELECT SUM(jumlah) AS harga barang FROM harga_barang");
$dataKeluar = mysqli_fetch_assoc($qKeluar);
$totalKeluar = $dataKeluar['kodekategori'] ?? 0;

$id = $_GET['id'];

$query = "DELETE FROM barang WHERE id = '$id'";
mysqli_query($koneksi, $query);

header("Location: dashboard.php");
exit;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Gudang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-4xl font-bold mb-7 text-gray-700">📊 Dashboard Gudang</h1>

    <div class="grid grid-cols-4 gap-6">

        <div class="bg-indigo-600 text-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg">Total Stok</h2>
            <p class="text-5xl font-extrabold"><?= $totalBarang ?></p>
        </div>

        <div class="bg-green-600 text-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg">Stok Barang</h2>
            <p class="text-5xl font-extrabold"><?= $totalMasuk ?></p>
        </div>

        <div class="bg-red-600 text-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg">Harga BarangS</h2>
            <p class="text-5xl font-extrabold"><?= $totalKeluar ?></p>
        </div>


    </div>
</body>
</html>
