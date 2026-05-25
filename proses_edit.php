<?php
session_start();
include 'koneksi.php';

$id = $_POST['id'];

$cek = mysqli_query($koneksi,
"SELECT * FROM identitas
WHERE id='$id'");

$data = mysqli_fetch_array($cek);

if(
$_SESSION['role'] != 'admin'
&& $_SESSION['id'] != $data['user_id']
){
    die("Akses ditolak");
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$umur = $_POST['umur'];

$update = mysqli_query($koneksi,
"UPDATE identitas SET
nama='$nama',
alamat='$alamat',
email='$email',
jabatan='$jabatan',
umur='$umur'
WHERE id='$id'
");

if($update){

$status = "success";
$icon = "✓";
$title = "Update Berhasil";
$message = "Data berhasil diperbarui";
$bg = "linear-gradient(135deg,#10b981,#059669,#047857)";
$button = "#10b981";

$link = "data.php";

}else{

$status = "error";
$icon = "✖";
$title = "Update Gagal";
$message = "Data gagal diperbarui";
$bg = "linear-gradient(135deg,#ef4444,#dc2626,#7f1d1d)";
$button = "#ef4444";

$link = "edit.php?id=$id";

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title><?= $title; ?></title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    background:<?= $bg; ?>;
    overflow:hidden;
}

.box{
    width:380px;
    background:white;
    padding:40px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 10px 35px rgba(0,0,0,0.25);
    animation:muncul 0.7s ease;
}

@keyframes muncul{

    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}

.icon{
    width:100px;
    height:100px;
    margin:auto;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:50px;
    margin-bottom:20px;
    background:<?= $button; ?>;
    color:white;
}

h2{
    margin-bottom:12px;
    color:#222;
    font-size:30px;
}

p{
    color:#666;
    margin-bottom:30px;
    font-size:15px;
}

a{
    display:inline-block;
    padding:13px 28px;
    border-radius:12px;
    text-decoration:none;
    color:white;
    background:<?= $button; ?>;
    font-weight:500;
    transition:0.3s;
}

a:hover{
    transform:scale(1.05);
}

.loading{
    width:100%;
    height:6px;
    background:#eee;
    border-radius:10px;
    overflow:hidden;
    margin-top:25px;
}

.loading-bar{
    height:100%;
    width:0%;
    background:<?= $button; ?>;
    animation:loading 3s linear forwards;
}

@keyframes loading{

    from{
        width:0%;
    }

    to{
        width:100%;
    }

}

</style>
</head>

<body>

<div class="box">

<div class="icon">
<?= $icon; ?>
</div>

<h2>
<?= $title; ?>
</h2>

<p>
<?= $message; ?>
</p>

<a href="<?= $link; ?>">
Kembali
</a>

<div class="loading">

<div class="loading-bar"></div>

</div>

</div>

<script>

setTimeout(function(){

window.location='<?= $link; ?>';

},3000);

</script>

</body>
</html>