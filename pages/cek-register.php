<?php

session_start();

if (isset($_POST['submit'])) {
    include '../config/koneksi.php';

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password1 = mysqli_real_escape_string($koneksi, $_POST['password1']);
    $password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);

    //check username apabila sudah terdaftar

    $chekUsername = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($chekUsername) > 0) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        echo "<script>window.location='register.php';</script>";
        exit();
    }

    // Validasi Password
    if ($password1 !== $password2) {
        echo "<script>alert('Password tidak sesuai!');</script>";
        echo "<script>window.location='register.php';</script>";
        exit();
    }



    function validatePassword($password)
    {
        // Panjang minimal 8 karakter
        if (strlen($password) <= 8) {
            return false;
        }

        // Harus mengandung setidaknya 1 huruf kecil
        if (!preg_match("/[a-z]/", $password)) {
            return false;
        }

        // Harus mengandung setidaknya 1 huruf besar
        if (!preg_match("/[A-Z]/", $password)) {
            return false;
        }

        // Harus mengandung setidaknya 1 angka atau karakter khusus
        if (!preg_match("/[0-9\W]/", $password)) {
            return false;
        }

        return true;
    }

    if (!validatePassword($password1)) {
        echo "<script>alert('Password tidak memenuhi persyaratan!');</script>";
        echo "<script>window.location='register.php';</script>";
        exit();
    }


    //Registrasi User

    $addUser = mysqli_query($koneksi, "INSERT INTO user (nama, username, password, password2) VALUES('$nama','$username','$password1','$password2')");

    if ($addUser) {
        echo "<script>alert('Registrasi Berhasil!');</script>";
        echo "<script>window.location='login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal, coba lagi!');</script>";
        echo "<script>window.location='register.php';</script>";
        exit();
    }
}
