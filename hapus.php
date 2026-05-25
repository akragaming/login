<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];

$cek = mysqli_query($koneksi,
"SELECT * FROM identitas
WHERE id='$id'");

$data = mysqli_fetch_array($cek);

if(
$_SESSION['role'] != 'admin'
&& $_SESSION['id'] != $data['user_id']
){
die("Akses ditolak");
}

mysqli_query($koneksi,
"DELETE FROM identitas
WHERE id='$id'");

header("location:data.php");
?>