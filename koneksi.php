<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "root",
    "aroma_catering"
);

if(!$conn){
    die("Koneksi Database Gagal : "
    . mysqli_connect_error());
}

?>