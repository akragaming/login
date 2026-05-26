<?php
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$cek = mysqli_query($koneksi, "SELECT * FROM identitas WHERE id='$id'");
$data = mysqli_fetch_array($cek);

if(!$data){
    die("Data tidak ditemukan");
}

if($_SESSION['role'] != 'admin' && $_SESSION['id'] != $data['user_id']){
    die("Akses ditolak");
}

$hapus = mysqli_query($koneksi, "DELETE FROM identitas WHERE id='$id'");

if($hapus){
    header("location:data.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>