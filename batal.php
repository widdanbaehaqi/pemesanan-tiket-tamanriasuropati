<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// GET nomor
$no = $_GET['no'];

$result = mysqli_query($conn, "DELETE FROM tiket WHERE id_tiket = '$no'");

if ($result) {
    header("Location: pemesanan.php");
} else {
    echo "Gagal Delete";
}
