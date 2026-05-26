<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "2526_01";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>