<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location:../login.php");
}

include('../../koneksi.php');

$data =
mysqli_query(
$conn,
"SELECT * FROM menu_makanan
ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Menu Makanan</title>

<link rel="stylesheet"
href="../../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<h2>Data Menu</h2>

<a
class="btn"
href="tambah.php">
Tambah Menu
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>

<th>Gambar</th>
<th>Nama</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>

</tr>

<input 
type="text" 
id="searchMenu" 
placeholder="Cari Menu...">

<?php while($m=mysqli_fetch_assoc($data)){ ?>

<tr>

<td>
<img
src="../../assets/img/<?= $m['gambar']; ?>"
width="80">
</td>

<td><?= $m['nama_menu']; ?></td>

<td>Rp <?= number_format($m['harga']); ?></td>

<td><?= $m['stok']; ?></td>

<td>

<a href="edit.php?id=<?= $m['id']; ?>">
Edit
</a>

|

<a
href="#"
onclick="hapus(
<?= $m['id']; ?>
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

title:'Hapus Menu?',

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