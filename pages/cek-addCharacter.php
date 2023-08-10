<?php

include "../config/koneksi.php";


if (isset($_POST['submit'])) {

    $nama_hero = $_POST['nama_hero'];
    $role_hero = $_POST['role'];
    $deskripsi_hero = $_POST['deskripsi'];
    $gambar_hero = $_FILES['gambar']['name'];
    $idUser = $_POST['idUser'];

    $dir = "../asets/images/";
    $dirFile = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($dirFile, $dir . $gambar_hero);

    $addCharacter = mysqli_query($koneksi, "INSERT INTO tbl_character (id_character, nama_hero, role, deskripsi, gambar, id) VALUES('','$nama_hero','$role_hero','$deskripsi_hero','$gambar_hero','$idUser')");

    if ($addCharacter) {
        header('Location:addCharacter.php?pesan=berhasil');
    } else {
        header('Location:addCharacter.php?pesan=gagal');
    }
} elseif ($_GET['hapus']) {
    # code...
    $queryHapus = mysqli_query($koneksi, "SELECT gambar FROM tbl_character WHERE id_character = '$_POST[hapus]'");
    $data = mysqli_fetch_array($queryHapus);
    unlink("../assets/images/" . $data['gambar']);

    $query = mysqli_query($koneksi, "DELETE FROM tbl_character WHERE id_character = '$_GET[hapus]'");

    if ($query) {
        echo "
            '<script>
                alert('data berhasil dihapus');
                window.location.href= 'home.php'
            </script>'
        ";
    }
}
