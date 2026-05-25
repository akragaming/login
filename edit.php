<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM identitas
WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(!$d){
    die("Data tidak ditemukan");
}

if(
$_SESSION['role'] != 'admin'
&& $_SESSION['id'] != $d['user_id']
){
    die("Akses ditolak");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit Data</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4);
}

.box{
    width:400px;
    background:rgba(255,255,255,0.12);
    border:1px solid rgba(255,255,255,0.2);
    backdrop-filter:blur(12px);
    padding:35px;
    border-radius:20px;
    color:white;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:none;
    border-radius:10px;
    outline:none;
    background:rgba(255,255,255,0.2);
    color:white;
}

input::placeholder{
    color:#ddd;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#3b82f6;
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#2563eb;
}

</style>
</head>

<body>

<div class="box">

<h2>Edit Data</h2>

<form method="POST"
action="proses_edit.php">

<input type="hidden"
name="id"
value="<?= $d['id']; ?>">

<input type="text"
name="nama"
value="<?= $d['nama']; ?>"
required>

<input type="text"
name="alamat"
value="<?= $d['alamat']; ?>"
required>

<input type="email"
name="email"
value="<?= $d['email']; ?>"
required>

<input type="text"
name="jabatan"
value="<?= $d['jabatan']; ?>"
required>

<input type="number"
name="umur"
value="<?= $d['umur']; ?>"
required>

<button type="submit">
Update Data
</button>

</form>

</div>

</body>
</html>