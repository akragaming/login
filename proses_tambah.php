<?php
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header("location:login.php");
    exit;
}

$user_id = $_SESSION['id'];
$nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$email   = mysqli_real_escape_string($koneksi, $_POST['email']);
$jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
$umur    = mysqli_real_escape_string($koneksi, $_POST['umur']);

// User biasa hanya boleh punya 1 data identitas
$cek = mysqli_query($koneksi, "SELECT * FROM identitas WHERE user_id='$user_id'");
if($_SESSION['role'] != 'admin' && mysqli_num_rows($cek) > 0){
    die("<script>alert('Anda sudah pernah mengisi data identitas!'); window.location='data.php';</script>");
}

$insert = mysqli_query($koneksi, "INSERT INTO identitas (user_id, nama, alamat, email, jabatan, umur) VALUES ('$user_id', '$nama', '$alamat', '$email', '$jabatan', '$umur')");

if($insert){
    header("location:data.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>