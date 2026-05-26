<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// Kolom dideklarasikan secara spesifik tanpa mengikutsertakan 'id'
mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES(
'$username',
'$password',
'user'
)");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register Berhasil</title>

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
    background:linear-gradient(135deg,#10b981,#059669,#047857);
}

.box{
    background:white;
    padding:40px;
    width:380px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
    animation:muncul 0.7s ease;
}

@keyframes muncul{
    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

.icon{
    font-size:70px;
    margin-bottom:15px;
}

h2{
    color:#10b981;
    margin-bottom:10px;
}

p{
    color:#555;
    margin-bottom:25px;
}

a{
    display:inline-block;
    padding:12px 25px;
    background:#10b981;
    color:white;
    text-decoration:none;
    border-radius:10px;
    transition:0.3s;
}

a:hover{
    transform:scale(1.05);
}

</style>
</head>
<body>

<div class="box">

<div class="icon">
✓
</div>

<h2>Register Berhasil</h2>

<p>
Akun berhasil dibuat.
Silahkan login untuk masuk.
</p>

<a href="login.php">
Login Sekarang
</a>

</div>

</body>
</html>