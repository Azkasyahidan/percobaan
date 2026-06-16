<?php

include('../koneksi.php');

$nama = $_POST['nama'];

$menu_id = $_POST['menu_id'];

$jumlah = $_POST['jumlah'];

$tanggal = $_POST['tanggal'];

$jam = $_POST['jam'];

$menu =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM menu_makanan
WHERE id='$menu_id'"
)
);

$total =
$menu['harga'] * $jumlah;

mysqli_query(
$conn,
"INSERT INTO pesanan(

nama_pelanggan,
menu_id,
jumlah,
total_harga,
tanggal_pengambilan,
jam_pengambilan

)

VALUES(

'$nama',
'$menu_id',
'$jumlah',
'$total',
'$tanggal',
'$jam'

)"
);

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({

icon:'success',

title:'Pesanan Berhasil',

text:'Pesanan Anda telah masuk'

}).then(()=>{

window.location='../index.php';

});

</script>

</body>
</html>