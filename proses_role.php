<?php
session_start();
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

$id = $_POST['id'];
$role = $_POST['role'];

mysqli_query($koneksi,
"UPDATE user SET
role='$role'
WHERE id='$id'
");

header("location:user.php");
?>