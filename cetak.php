<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// GET nomor
$no = $_GET['no'];

$sql = "SELECT * FROM tiket WHERE id_tiket = '$no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$user = $row['id_user'];
$sql2 = "SELECT * FROM users WHERE id_user = $user";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="css/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        Tiket Taman Ria Suropati.
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>No.Tiket : <?php echo $row['id_tiket'] ?></strong><br>
                        Tanggal & Waktu Pemesanan : <?php echo $row['timestamp']; ?><br>
                        Pemesan : <?php echo $row2['nama']; ?><br>
                        Email: <?php echo $row2['email']; ?>
                    </address>
                </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Atas Nama</th>
                                <th>Tanggal Datang</th>
                                <th>Jenis</th>
                                <th>Jumlah Orang</th>
                                <th>Harga Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['tgl_pesan']; ?></td>
                                <td><?php echo $row['jenis']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td>
                                    <?php
                                    $harga;
                                    if ($row['jenis'] == "Paket") {
                                        $harga = 13500;
                                        echo "Rp " . $harga;
                                    } else {
                                        $harga = 15000;
                                        echo "Rp " . $harga;
                                    }
                                    ?>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Metode Pembayaran:</p>

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Pembayaran hanya dapat dilakukan di lokasi secara tunai.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Total:</th>
                                <td>
                                    <?php
                                    $total = $row['qty'] * $harga;
                                    echo "Rp " . $total;
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        window.print();
    </script>
</body>

</html>