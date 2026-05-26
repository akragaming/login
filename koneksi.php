<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$user = "2526_21";
$pass = "12345678";
$db   = "2526_21db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>