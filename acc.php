<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// GET nomor
$no = $_GET['no'];

$result = mysqli_query($conn, "UPDATE tiket SET status = 'Lunas' WHERE id_tiket = '$no'");

if ($result) {
    header("Location: admin.php");
} else {
    echo "Gagal UPDATE";
}
