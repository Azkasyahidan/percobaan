<?php

include('../../koneksi.php');

$id =
$_GET['id'];

$data =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM menu_makanan
WHERE id='$id'"
)
);

if(isset($_POST['update'])){

$nama =
$_POST['nama'];

$harga =
$_POST['harga'];

$stok =
$_POST['stok'];

mysqli_query(
$conn,
"UPDATE menu_makanan

SET

nama_menu='$nama',
harga='$harga',
stok='$stok'

WHERE id='$id'"
);

header("Location:index.php");

}
?>

<form method="POST">

<input
type="text"
name="nama"
value="<?= $data['nama_menu']; ?>">

<br><br>

<input
type="number"
name="harga"
value="<?= $data['harga']; ?>">

<br><br>

<input
type="number"
name="stok"
value="<?= $data['stok']; ?>">

<br><br>

<button
name="update">

Update

</button>

</form>