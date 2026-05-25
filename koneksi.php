<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "sarpras"
);

if(!$koneksi){
    die("Koneksi gagal");
}

?>