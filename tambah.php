<?php
include 'koneksi.php';
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { height:100vh; display:flex; justify-content:center; align-items:center; background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4); }
        .box { background:white; padding:40px; width:400px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,0.1); }
        h2 { margin-bottom:20px; color:#333; text-align:center; }
        input, textarea { width:100%; padding:12px; margin-bottom:15px; border-radius:10px; border:1px solid #ddd; outline:none; }
        button { width:100%; padding:12px; border:none; border-radius:10px; background:#10b981; color:white; font-weight:600; cursor:pointer; }
        .kembali { display:block; text-align:center; margin-top:15px; color:#4f46e5; text-decoration:none; font-size:14px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Tambah Identitas</h2>
    <form method="POST" action="proses_tambah.php">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <textarea name="alamat" placeholder="Alamat Rumah" rows="3" required></textarea>
        <input type="email" name="email" placeholder="Email Aktif" required>
        <input type="text" name="jabatan" placeholder="Jabatan" required>
        <input type="number" name="umur" placeholder="Umur" required>
        <button type="submit">Simpan Data</button>
    </form>
    <a href="data.php" class="kembali">← Kembali</a>
</div>
</body>
</html>