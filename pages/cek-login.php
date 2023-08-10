<?php
session_start();


include '../config/koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$user = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$see = mysqli_fetch_assoc($user);
if ($see['username'] != null) {
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $see['nama'];
    $_SESSION['id'] = $see['id'];
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
