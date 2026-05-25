<?php
session_start();
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

$id = $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM user
WHERE id='$id'");

$d = mysqli_fetch_array($data);
?>

<form method="POST"
action="proses_role.php">

<input type="hidden"
name="id"
value="<?= $d['id']; ?>">

<select name="role">

<option value="admin">
Admin
</option>

<option value="user">
User
</option>

</select>

<button type="submit">
Simpan
</button>

</form>