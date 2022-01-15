<?php

//including the database connection file
include_once("config.php");

if (isset($_POST['daftar'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $level = "user";

    $result = mysqli_query($conn, "INSERT INTO users(nama,username,email,password,level) VALUES('$nama','$username','$email','$password','$level')");

    if ($result) {
        header("Location: login.php");
    } else {
        echo "Gagal Mendaftar";
        header("Location: daftar.php");
    }
};
