<?php

include('../../koneksi.php');

$id = $_GET['id'];

$data =
mysqli_fetch_assoc(

mysqli_query(
$conn,
"SELECT * FROM jadwal_pengambilan
WHERE id='$id'"
)

);

if(isset($_POST['update'])){

$hari = $_POST['hari'];

$mulai = $_POST['mulai'];

$selesai = $_POST['selesai'];

mysqli_query(
$conn,
"UPDATE jadwal_pengambilan

SET

hari='$hari',
jam_mulai='$mulai',
jam_selesai='$selesai'

WHERE id='$id'"
);

header("Location:index.php");

}
?>

<form method="POST">

<h2>Edit Jadwal</h2>

<input
type="text"
name="hari"
value="<?= $data['hari']; ?>">

<br><br>

<input
type="time"
name="mulai"
value="<?= $data['jam_mulai']; ?>">

<br><br>

<input
type="time"
name="selesai"
value="<?= $data['jam_selesai']; ?>">

<br><br>

<button
name="update">

Update

</button>

</form>