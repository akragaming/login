<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Data</title>

<style>

body{
    font-family:Poppins,sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4);
}

.box{
    background:white;
    padding:40px;
    width:350px;
    border-radius:20px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ddd;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#10b981;
    color:white;
}

</style>
</head>
<body>

<div class="box">

<h2>Tambah Data</h2>

<form method="POST"
action="proses_tambah.php">

<input type="text"
name="nama"
placeholder="Nama"
required>

<input type="text"
name="alamat"
placeholder="Alamat"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="text"
name="jabatan"
placeholder="Jabatan"
required>

<input type="number"
name="umur"
placeholder="Umur"
required>

<button type="submit">
Simpan
</button>

</form>

</div>

</body>
</html>