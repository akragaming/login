<?php
session_start();
include 'koneksi.php';

// Proteksi halaman jika belum login
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}

// Mengambil id & role dari session dengan fallback jika kosong
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

// Cek apakah user ini sudah pernah mengisi identitas
$cekdata = mysqli_query($koneksi, "SELECT * FROM identitas WHERE user_id='$user_id'");
$sudah = mysqli_num_rows($cekdata);

// Ambil seluruh data identitas untuk ditampilkan di tabel
$data = mysqli_query($koneksi, "SELECT * FROM identitas");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Anggota Sarpras</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}
body{
    min-height:100vh;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4);
    padding:40px;
    overflow-x:hidden;
}
.container{
    max-width:1300px;
    margin:auto;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:20px;
}
.title{
    color:white;
    font-size:45px;
    font-weight:700;
}
.user-box{
    background:rgba(255,255,255,0.15);
    padding:14px 20px;
    border-radius:15px;
    color:white;
    backdrop-filter:blur(10px);
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}
.card{
    background:rgba(255,255,255,0.12);
    border:1px solid rgba(255,255,255,0.2);
    backdrop-filter:blur(12px);
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}
.top-action{
    display:flex;
    gap:15px;
    margin-bottom:25px;
    flex-wrap:wrap;
}
.btn{
    padding:12px 20px;
    border-radius:12px;
    text-decoration:none;
    color:white;
    font-weight:500;
    transition:0.3s;
}
.btn:hover{
    transform:translateY(-3px);
}
.tambah{
    background:#10b981;
}
.logout{
    background:#ef4444;
}
.table-box{
    overflow-x:auto;
}
table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:20px;
    min-width:900px;
}
table th{
    background:rgba(255,255,255,0.2);
    color:white;
    padding:16px;
    font-size:15px;
}
table td{
    background:rgba(255,255,255,0.08);
    color:white;
    padding:15px;
    text-align:center;
}
table tr:hover td{
    background:rgba(255,255,255,0.15);
    transition:0.3s;
}
.action-btn{
    padding:8px 14px;
    border-radius:10px;
    color:white;
    text-decoration:none;
    font-size:14px;
}
.edit{
    background:#3b82f6;
}
.hapus{
    background:#ef4444;
}
.noakses{
    color:#ddd;
    font-size:14px;
}
.role{
    padding:6px 14px;
    border-radius:10px;
    font-size:14px;
}
.admin{
    background:#10b981;
}
.user{
    background:#f59e0b;
}
.section-title{
    color:white;
    font-size:30px;
    margin-bottom:20px;
    margin-top:30px;
}
@media(max-width:900px){
    body{ padding:20px; }
    .title{ font-size:30px; }
    .header{ flex-direction:column; align-items:flex-start; }
}
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1 class="title">Data Anggota Sarpras</h1>
        <div class="user-box">
            Login sebagai: <b><?= htmlspecialchars($_SESSION['username']); ?></b> 
            (<?= htmlspecialchars($user_role); ?>)
        </div>
    </div>

    <div class="card">
        <div class="top-action">
            <?php if($user_role == 'admin' || $sudah == 0){ ?>
                <a href="tambah.php" class="btn tambah">+ Tambah Data</a>
            <?php } ?>
            <a href="logout.php" class="btn logout">Logout</a>
        </div>

        <div class="table-box">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Umur</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($d['nama']); ?></td>
                    <td><?= htmlspecialchars($d['alamat']); ?></td>
                    <td><?= htmlspecialchars($d['email']); ?></td>
                    <td><?= htmlspecialchars($d['jabatan']); ?></td>  
                    <td><?= htmlspecialchars($d['umur']); ?></td>
                    <td>
                        <?php if($user_role == 'admin' || $user_id == $d['user_id']){ ?>
                            <a class="action-btn edit" href="edit.php?id=<?= $d['id']; ?>">Edit</a>
                            <a class="action-btn hapus" href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin hapus data?')">Hapus</a>
                        <?php } else { ?>
                            <span class="noakses">Tidak Ada Akses</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <?php if($user_role == 'admin'){ ?>
            <h2 class="section-title">Daftar User Register</h2>
            <div class="table-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    $users = mysqli_query($koneksi, "SELECT * FROM user");
                    $no = 1;
                    while($u = mysqli_fetch_array($users)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($u['username']); ?></td>
                        <td>
                            <?php if($u['role'] == 'admin'){ ?>
                                <span class="role admin">Admin</span>
                            <?php } else { ?>
                                <span class="role user">User</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>