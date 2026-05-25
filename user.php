<?php
session_start();
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    die("Akses ditolak");
}

$data = mysqli_query($koneksi,
"SELECT * FROM user");
?>

<table border="1">

<tr>
<th>Username</th>
<th>Role</th>
<th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>

<td><?= $d['username']; ?></td>

<td><?= $d['role']; ?></td>

<td>

<a href="edit_role.php?id=<?= $d['id']; ?>">
Edit Permission
</a>

</td>

</tr>

<?php } ?>

</table>