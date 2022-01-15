<?php
//including the database connection file
include_once("config.php");

if (isset($_POST['pesan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tgl = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $id_user = mysqli_real_escape_string($conn, $_POST['user']);

    $result = mysqli_query($conn, "INSERT INTO tiket(nama,tgl_pesan,jenis,qty,id_user,status) VALUES('$nama','$tgl','$jenis',$qty,$id_user,'Belum Lunas')");

    if ($result) {
        header("Location: pemesanan.php");
    } else {
        echo "Gagal Mendaftar";
        // header("Location: Pemesanan.php");
    }
}
