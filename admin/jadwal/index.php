<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
}

include('../../koneksi.php');

$data =
mysqli_query(
$conn,
"SELECT * FROM jadwal_pengambilan"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Jadwal</title>

<link rel="stylesheet"
href="../../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<h2>Data Jadwal Pengambilan</h2>

<a
class="btn"
href="tambah.php">
Tambah Jadwal
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>

<th>Hari</th>
<th>Mulai</th>
<th>Selesai</th>
<th>Aksi</th>

</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['hari']; ?></td>

<td><?= $d['jam_mulai']; ?></td>

<td><?= $d['jam_selesai']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id']; ?>">
Edit
</a>

|

<a
onclick="hapus(<?= $d['id']; ?>)"
href="#">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

<script>

function hapus(id){

Swal.fire({

title:'Hapus Jadwal?',
text:'Data akan dihapus permanen',

icon:'warning',

showCancelButton:true,

confirmButtonText:'Ya'

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