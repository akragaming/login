<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi,
"SELECT * FROM user 
WHERE username='$username' 
AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['username'] = $data['username'];

    header("Location:data.php");

}else{

    echo "
    <script>
    alert('Username atau Password salah!');
    window.location='login.php';
    </script>
    ";

}
?>