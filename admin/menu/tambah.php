<?php

include('../../koneksi.php');

if(isset($_POST['simpan'])){

$nama = $_POST['nama'];

$harga = $_POST['harga'];

$kategori = $_POST['kategori'];

$deskripsi = $_POST['deskripsi'];

$stok = $_POST['stok'];

$gambar =
$_FILES['gambar']['name'];

$tmp =
$_FILES['gambar']['tmp_name'];

move_uploaded_file(
$tmp,
"../../assets/img/".$gambar
);

mysqli_query(
$conn,
"INSERT INTO menu_makanan(

nama_menu,
harga,
kategori,
deskripsi,
gambar,
stok

)

VALUES(

'$nama',
'$harga',
'$kategori',
'$deskripsi',
'$gambar',
'$stok'

)"
);

header("Location:index.php");

}
?>

<form
method="POST"
enctype="multipart/form-data">

<input
type="text"
name="nama"
placeholder="Nama Menu">

<br><br>

<input
type="number"
name="harga"
placeholder="Harga">

<br><br>

<input
type="number"
name="stok"
placeholder="Stok">

<br><br>

<input
type="text"
name="kategori"
placeholder="Kategori">

<br><br>

<textarea
name="deskripsi">
</textarea>

<br><br>

<input
type="file"
name="gambar">

<br><br>

<button
name="simpan">

Simpan

</button>

</form>