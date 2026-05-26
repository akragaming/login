<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db   = "2526_01db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Koneksi gagal : " . mysqli_connect_error());
}

?>