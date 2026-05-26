<?php
include 'koneksi.php';

$id = mysqli_real_escape_string($koneksi, $_POST['id']);

$cek = mysqli_query($koneksi, "SELECT * FROM identitas WHERE id='$id'");
$data = mysqli_fetch_array($cek);

if($_SESSION['role'] != 'admin' && $_SESSION['id'] != $data['user_id']){
    die("Akses ditolak");
}

$nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$email   = mysqli_real_escape_string($koneksi, $_POST['email']);
$jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
$umur    = mysqli_real_escape_string($koneksi, $_POST['umur']);

$update = mysqli_query($koneksi, "UPDATE identitas SET nama='$nama', alamat='$alamat', email='$email', jabatan='$jabatan', umur='$umur' WHERE id='$id'");

if($update){
    header("location:data.php");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>