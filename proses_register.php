<?php
include 'koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']);

$insert = mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES ('$username', '$password', 'user')");

if($insert){
    header("location:login.php?pesan=berhasil_reg");
} else {
    echo "Registrasi Gagal: " . mysqli_error($koneksi);
}
?>