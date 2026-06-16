<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location:../login.php");
}

include('../../koneksi.php');

$data =
mysqli_query(
$conn,
"SELECT

pesanan.*,
menu_makanan.nama_menu

FROM pesanan

JOIN menu_makanan

ON pesanan.menu_id =
menu_makanan.id

ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Pesanan Masuk</title>

<link rel="stylesheet"
href="../../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<h2>Pesanan Masuk</h2>

<table
border="1"
cellpadding="10">

<tr>

<th>Nama</th>
<th>Menu</th>
<th>Jumlah</th>
<th>Total</th>
<th>Status</th>
<th>Aksi</th>

</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td>
<?= $d['nama_pelanggan']; ?>
</td>

<td>
<?= $d['nama_menu']; ?>
</td>

<td>
<?= $d['jumlah']; ?>
</td>

<td>
Rp <?= number_format($d['total_harga']); ?>
</td>

<td>
<?= $d['status']; ?>
</td>

<td>

<a href="detail.php?id=<?= $d['id']; ?>">
Detail
</a>

|

<a href="edit.php?id=<?= $d['id']; ?>">
Edit
</a>

|

<a
href="#"
onclick="hapus(
<?= $d['id']; ?>
)">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

<script>

function hapus(id){

Swal.fire({

title:'Hapus Pesanan?',

icon:'warning',

showCancelButton:true

}).then((result)=>{

if(result.isConfirmed){

window.location=
'hapus.php?id='+id;

}

});

}

</script>

</body>
</html>