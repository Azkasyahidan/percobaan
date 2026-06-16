<?php

include('../../koneksi.php');

?>

<h1>Laporan Aroma Catering</h1>

<?php

$data =
mysqli_query(
$conn,
"SELECT * FROM pesanan"
);

while(
$d=mysqli_fetch_assoc($data)
){

echo
$d['nama_pelanggan']
.' - Rp '
.number_format(
$d['total_harga']
);

echo "<br>";

}
?>