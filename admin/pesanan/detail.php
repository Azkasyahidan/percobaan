<?php

include('../../koneksi.php');

$id = $_GET['id'];

$data =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT *

FROM pesanan

WHERE id='$id'"
)
);

?>

<h2>Detail Pesanan</h2>

<p>
Nama :
<?= $data['nama_pelanggan']; ?>
</p>

<p>
Jumlah :
<?= $data['jumlah']; ?>
</p>

<p>
Total :
Rp
<?= number_format(
$data['total_harga']
); ?>
</p>

<p>
Status :
<?= $data['status']; ?>
</p>

<a
href="update-status.php?id=<?= $id; ?>&status=Diproses">
Proses
</a>

|

<a
href="update-status.php?id=<?= $id; ?>&status=Selesai">
Selesai
</a>

|

<a
href="update-status.php?id=<?= $id; ?>&status=Dibatalkan">
Batalkan
</a>