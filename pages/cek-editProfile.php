<?php

include "../config/koneksi.php";

$idUser = (isset($_POST['idUser']) ? $_POST['idUser'] : '');
$nama = (isset($_POST['nama']) ? $_POST['nama'] : '');
$username = (isset($_POST['username']) ? $_POST['username'] : '');
$password1 = (isset($_POST['password1']) ? $_POST['password1'] : '');
$password2 = (isset($_POST['password2']) ? $_POST['password2'] : '');

if (isset($_POST['edit'])) {
    $password1 = trim($password1);
    $password2 = trim($password2);


    if ($password1 != "" && $password2 != "") {
        // Validasi Password
        if ($password1 !== $password2) {
            header('location:profile.php?password=gagal');
            exit();
        }

        $query = mysqli_query($koneksi, "UPDATE user SET nama ='$nama', username='$username', password='$password1', password2='$password2' WHERE id = '$idUser'");
    } else {
        $query = mysqli_query($koneksi, "UPDATE user SET nama ='$nama', username='$username' WHERE id = '$idUser'");
    }



    if ($query) {
        header('location:profile.php?pesan=berhasil');
    } else {
        header('location:profile.php?pesan=gagal');
    }
}
