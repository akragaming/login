<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$umur = $_POST['umur'];

$cek = mysqli_query($koneksi,
"SELECT * FROM identitas
WHERE user_id='$user_id'");

if(mysqli_num_rows($cek) > 0){
?>

<!DOCTYPE html>
<html>
<head>
<title>Gagal</title>

<style>
body{
    font-family:Poppins,sans-serif;
    background:linear-gradient(135deg,#ef4444,#dc2626);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.box{
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
}

a{
    padding:10px 20px;
    background:#ef4444;
    color:white;
    text-decoration:none;
    border-radius:10px;
}
</style>
</head>
<body>

<div class="box">

<h2>Data Sudah Ada</h2>

<p>
User hanya bisa menambahkan data 1 kali
</p>

<a href="data.php">
Kembali
</a>

</div>

</body>
</html>

<?php

}else{

mysqli_query($koneksi,
"INSERT INTO identitas VALUES(
'',
'$nama',
'$alamat',
'$email',
'$jabatan',
'$umur',
'$user_id'
)");

header("location:data.php");

}
?>