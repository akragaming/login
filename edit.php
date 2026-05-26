<?php
include 'koneksi.php';

if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM identitas WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(!$d){
    die("Data tidak ditemukan");
}

if($_SESSION['role'] != 'admin' && $_SESSION['id'] != $d['user_id']){
    die("Akses ditolak!");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { height:100vh; display:flex; justify-content:center; align-items:center; background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4); }
        .box { background:white; padding:40px; width:400px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,0.1); }
        h2 { margin-bottom:20px; color:#333; text-align:center; }
        input, textarea { width:100%; padding:12px; margin-bottom:15px; border-radius:10px; border:1px solid #ddd; outline:none; }
        button { width:100%; padding:12px; border:none; border-radius:10px; background:#3b82f6; color:white; font-weight:600; cursor:pointer; }
        .kembali { display:block; text-align:center; margin-top:15px; color:#4f46e5; text-decoration:none; font-size:14px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Edit Identitas</h2>
    <form method="POST" action="proses_edit.php">
        <input type="hidden" name="id" value="<?= $d['id']; ?>">
        <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required>
        <textarea name="alamat" rows="3" required><?= htmlspecialchars($d['alamat']); ?></textarea>
        <input type="email" name="email" value="<?= htmlspecialchars($d['email']); ?>" required>
        <input type="text" name="jabatan" value="<?= htmlspecialchars($d['jabatan']); ?>" required>
        <input type="number" name="umur" value="<?= htmlspecialchars($d['umur']); ?>" required>
        <button type="submit">Update Data</button>
    </form>
    <a href="data.php" class="kembali">← Batal</a>
</div>
</body>
</html>