<?php

include('../../koneksi.php');

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM jadwal_pengambilan
WHERE id='$id'"
);

header("Location:index.php");