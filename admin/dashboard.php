<?php

session_start();

if (!isset($_SESSION['admin_login'])) {
    header("Location: login.php");
    exit;
}

require '../koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM pesanan ORDER BY id DESC");

$totalPesanan = mysqli_num_rows($data);

mysqli_data_seek($data, 0);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin Aroma Catering</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    padding:40px;

    background:
    linear-gradient(
        rgba(0,0,0,.65),
        rgba(0,0,0,.65)
    ),
    url('https://images.unsplash.com/photo-1555244162-803834f70033');

    background-size:cover;
    background-position:center;
}

.container{
    max-width:1200px;
    margin:auto;
}

.dashboard{
    background:white;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

.title{
    text-align:center;
    margin-bottom:30px;
}

.title h1{
    color:#ff7b00;
}

.title p{
    color:#777;
}

.card{
    background:linear-gradient(
    135deg,
    #ff7b00,
    #ffb347
    );

    color:white;

    padding:25px;
    border-radius:15px;

    width:250px;

    margin-bottom:25px;
}

.card h2{
    font-size:40px;
}

.card p{
    font-size:18px;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#ff7b00;
    color:white;
    padding:15px;
}

table td{
    padding:12px;
    text-align:center;
}

table tr:nth-child(even){
    background:#f8f8f8;
}

table tr:hover{
    background:#fff0df;
}

.status{
    font-weight:bold;
}

.btn-selesai{
    background:#28a745;
    color:white;
    padding:8px 15px;
    border-radius:8px;
    text-decoration:none;
}

.btn-selesai:hover{
    background:#1f7e34;
}

.logout{
    display:inline-block;
    margin-top:25px;
    background:#dc3545;
    color:white;
    padding:12px 25px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.logout:hover{
    background:#b02a37;
}

</style>

</head>
<body>

<div class="container">

<div class="dashboard">

<div class="title">
<h1>🍽️ Dashboard Admin Aroma Catering</h1>
<p>Sistem Manajemen Pesanan Catering</p>
</div>

<div class="card">
<h2><?= $totalPesanan ?></h2>
<p>Total Pesanan</p>
</div>

<table>

<tr>
<th>No</th>
<th>Nama Pelanggan</th>
<th>Menu</th>
<th>Jumlah</th>
<th>Total</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php $no=1; ?>

<?php while($row=mysqli_fetch_assoc($data)): ?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nama_pelanggan'] ?></td>

<td><?= $row['menu'] ?></td>

<td><?= $row['jumlah'] ?></td>

<td>Rp <?= number_format($row['total']) ?></td>

<td class="status"><?= $row['status'] ?></td>

<td>

<a
class="btn-selesai"
href="selesai.php?id=<?= $row['id'] ?>"
onclick="return confirm('Pesanan sudah selesai?')">
Selesai
</a>

</td>

</tr>

<?php endwhile; ?>

</table>

<a href="logout.php" class="logout">
Logout
</a>

</div>

</div>

</body>
</html>