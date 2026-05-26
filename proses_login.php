<?php
include 'koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_array($login);
    
    $_SESSION['id']       = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role'];
    
    header("location:data.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>