<?php

include('../../koneksi.php');

$data =
mysqli_fetch_assoc(

mysqli_query(

$conn,

"SELECT
SUM(total_harga)
AS total

FROM pesanan

WHERE status='Selesai'"

)

);

?>

<h2>

Total Pendapatan

</h2>

<h1>

Rp

<?= number_format(
$data['total']
); ?>

</h1>