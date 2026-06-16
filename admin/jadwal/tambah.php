<?php

include('../../koneksi.php');

if(isset($_POST['simpan'])){

$hari = $_POST['hari'];

$mulai = $_POST['mulai'];

$selesai = $_POST['selesai'];

mysqli_query(
$conn,
"INSERT INTO jadwal_pengambilan
(hari,jam_mulai,jam_selesai)

VALUES(

'$hari',
'$mulai',
'$selesai'

)"
);

header("Location:index.php");

}
?>

<form method="POST">

<h2>Tambah Jadwal</h2>

<input
type="text"
name="hari"
placeholder="Hari">

<br><br>

<input
type="time"
name="mulai">

<br><br>

<input
type="time"
name="selesai">

<br><br>

<button
name="simpan">

Simpan

</button>

</form>