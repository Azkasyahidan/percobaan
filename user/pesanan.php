<?php

include('../koneksi.php');

$id = $_GET['id'];

$menu =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM menu_makanan
WHERE id='$id'"
)
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Pesan Menu</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="container">

<h2>Form Pemesanan</h2>

<form
action="simpan-pesanan.php"
method="POST">

<input
type="hidden"
name="menu_id"
value="<?= $menu['id']; ?>"
>

<label>Menu</label>

<input
type="text"
value="<?= $menu['nama_menu']; ?>"
readonly>

<br><br>

<label>Harga</label>

<input
type="number"
id="harga"
value="<?= $menu['harga']; ?>"
readonly>

<br><br>

<label>Nama Pemesan</label>

<input
type="text"
name="nama"
required>

<br><br>

<label>Jumlah</label>

<input
type="number"
name="jumlah"
id="jumlah"
required
value="1">

<br><br>

<label>Tanggal Ambil</label>

<input
type="date"
name="tanggal"
required>

<br><br>

<label>Jam Ambil</label>

<input
type="time"
name="jam"
required>

<br><br>

<label>Total</label>

<input
type="number"
id="total"
readonly>

<br><br>

<button
class="btn"
type="submit">

Pesan Sekarang

</button>

</form>

</div>

<script>

hitung();

function hitung(){

let harga =
document.getElementById('harga').value;

let jumlah =
document.getElementById('jumlah').value;

document.getElementById('total').value =
harga * jumlah;

}

document
.getElementById('jumlah')
.addEventListener(
'keyup',
hitung
);

document
.getElementById('jumlah')
.addEventListener(
'change',
hitung
);

</script>

</body>
</html>