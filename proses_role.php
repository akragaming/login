<?php
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

$id = mysqli_real_escape_string($koneksi, $_POST['id']);
$role = mysqli_real_escape_string($koneksi, $_POST['role']);

$update = mysqli_query($koneksi, "UPDATE user SET role='$role' WHERE id='$id'");

if($update){
    header("location:data.php");
} else {
    echo "Gagal mengubah role: " . mysqli_error($koneksi);
}
?>