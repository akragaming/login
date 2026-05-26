<?php
session_start();
$host = "localhost";
$user = "2526_01";
$pass = "12345678";
$db   = "2526_01db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>