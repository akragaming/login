<?php

$host = "localhost";
$user = "admin";
$pass = "123456789";
$db   = "db_tkj";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>