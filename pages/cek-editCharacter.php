<?php

include "../config/koneksi.php";

$nama_hero = (isset($_POST['nama_hero']) ? $_POST['nama_hero'] : '');
$role_hero = (isset($_POST['role']) ? $_POST['role'] : '');
$deskripsi_hero = (isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '');;
$idUser = (isset($_POST['idUser']) ? $_POST['idUser'] : '');;

if (isset($_POST['edit'])) {
    if ($_FILES['gambar']['name'] != "") {
        $queryHapus = "SELECT gambar FROM tbl_character WHERE id_character = '$_POST[id_character]'";
        $sqlHapus = mysqli_query($koneksi, $queryHapus);
        $data = mysqli_fetch_array($sqlHapus);
        unlink("../asets/images/" . $data['gambar']);

        $gambar_hero = $_FILES['gambar']['name'];
        $dir = "../asets/images/";
        $dirFile = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($dirFile, $dir . $gambar_hero);

        $query = "UPDATE tbl_character SET nama_hero = '$nama_hero', role = '$role_hero', deskripsi = '$deskripsi_hero', gambar = '$gambar_hero', id = '$idUser' WHERE id_character = '$_POST[id_character]'";
    } else {
        $query = "UPDATE tbl_character SET nama_hero = '$nama_hero', role = '$role_hero', deskripsi = '$deskripsi_hero', id = '$idUser' WHERE id_character = '$_POST[id_character]'";
    }
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header('location:editCharacter.php?pesan=berhasil');
    } else {
        header('location:editCharacter.php?pesan=gagal');
    }
}
