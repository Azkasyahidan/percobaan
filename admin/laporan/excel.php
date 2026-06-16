<?php

include('../../koneksi.php');

header(
"Content-Type: application/vnd.ms-excel"
);

header(
"Content-Disposition: attachment; filename=laporan.xls"
);

$data =
mysqli_query(
$conn,
"SELECT * FROM pesanan"
);

?>

<table border="1">

<tr>

<th>Nama</th>
<th>Total</th>
<th>Status</th>

</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['nama_pelanggan']; ?></td>

<td><?= $d['total_harga']; ?></td>

<td><?= $d['status']; ?></td>

</tr>

<?php } ?>

</table>