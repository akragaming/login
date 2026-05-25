<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi,
"SELECT * FROM user
WHERE username='$username'
AND password='$password'
");

$cek = mysqli_num_rows($data);

if($cek > 0){

    $d = mysqli_fetch_assoc($data);

    $_SESSION['id'] = $d['id'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['role'] = $d['role'];

    header("location:data.php");

}else{
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Gagal</title>

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
    background:linear-gradient(135deg,#ef4444,#dc2626,#7f1d1d);
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
    color:#ef4444;
    margin-bottom:10px;
}

p{
    color:#555;
    margin-bottom:25px;
}

a{
    display:inline-block;
    padding:12px 25px;
    background:#ef4444;
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
✖
</div>

<h2>Login Gagal</h2>

<p>
Username atau password salah.
Silahkan coba lagi.
</p>

<a href="login.php">
Kembali Login
</a>

</div>

</body>
</html>

<?php } ?>