<?php
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak! Hanya Admin yang bisa masuk.");
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(!$d){
    die("User tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Role User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { height:100vh; display:flex; justify-content:center; align-items:center; background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4); }
        .box { background:white; padding:40px; width:380px; border-radius:20px; box-shadow:0 10px 25px rgba(0,0,0,0.1); text-align:center; }
        h2 { margin-bottom:10px; color:#333; }
        p { color:#666; margin-bottom:20px; font-size:14px; }
        select { width:100%; padding:12px; margin-bottom:20px; border-radius:10px; border:1px solid #ddd; font-size:16px; outline:none; }
        button { width:100%; padding:12px; border:none; border-radius:10px; background:#f59e0b; color:white; font-weight:600; cursor:pointer; }
        .kembali { display:block; margin-top:15px; color:#4f46e5; text-decoration:none; font-size:14px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Ubah Hak Akses</h2>
    <p>Username: <b><?= htmlspecialchars($d['username']); ?></b></p>
    
    <form method="POST" action="proses_role.php">
        <input type="hidden" name="id" value="<?= $d['id']; ?>">
        <select name="role">
            <option value="user" <?= $d['role'] == 'user' ? 'selected' : ''; ?>>User Biasa</option>
            <option value="admin" <?= $d['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="data.php" class="kembali">← Batal</a>
</div>
</body>
</html>