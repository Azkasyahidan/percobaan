<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include('../koneksi.php');

$jumlahMenunggu =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pesanan
WHERE status='Menunggu'"
)
);

$jumlahDiproses =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pesanan
WHERE status='Diproses'"
)
);

$jumlahSelesai =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pesanan
WHERE status='Selesai'"
)
);

$jumlahBatal =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pesanan
WHERE status='Dibatalkan'"
)
);

$pesananBaru =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM pesanan
WHERE status='Menunggu'"
)
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard Admin</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="sidebar">

<h2 style="color:white;padding:20px;">
🍽 Aroma Catering
</h2>

<a href="dashboard.php">
🏠 Dashboard
</a>

<a href="jadwal/index.php">
📅 Jadwal
</a>

<a href="../admin/logout.php">
🚪 Logout
</a>

<a href="../admin/pesanan/index.php">
📦 Pesanan
</a>

<a href="../admin/jadwal/index.php">
📅 Jadwal
</a>

<a href="pesanan/index.php">
📦 Pesanan
</a>

<a href="menu/index.php">
🍱 Menu
</a>

<a href="pesanan/index.php">
📦 Pesanan
</a>

<a href="jadwal/index.php">
📅 Jadwal
</a>

<a href="laporan/index.php">
💰 Laporan
</a>

</div>

<div style="margin-left:270px;padding:20px;">

<h1>Dashboard Admin</h1>

<div class="stat-grid">

<div class="stat-card">

<h3>Total Pesanan</h3>

<h1>
<?= $totalPesanan ?>
</h1>

</div>

<div class="stat-card">

<h3>Pesanan Selesai</h3>

<h1>
<?= $totalSelesai ?>
</h1>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="penjualanChart"></canvas>

<script>

const ctx =
document.getElementById(
'penjualanChart'
);

new Chart(ctx,{

type:'bar',

data:{

labels:[
'Menunggu',
'Diproses',
'Selesai',
'Dibatalkan'
],

datasets:[{

label:'Jumlah Pesanan',

data:[
<?= $jumlahMenunggu ?>,
<?= $jumlahDiproses ?>,
<?= $jumlahSelesai ?>,
<?= $jumlahBatal ?>
]

}]

}

});

</script>

</body>
</html>