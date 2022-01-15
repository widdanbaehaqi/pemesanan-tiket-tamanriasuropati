<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$user = $_SESSION['username'];
$date = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Taman Ria Suropati</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="css/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Taman Ria Suropati</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Pelayanan Hari ini-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Pelayanan Tiket Hari Ini <br>Tanggal : <?php echo date("d-m-Y"); ?></h1>
                <p class="lead fw-normal text-muted mb-0">Beri tanda lunas pada setiap pengunjung yang telah menyelesaikan pembayaran</p>
            </div>
            <div class="row gx-2 justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No Tiket</th>
                                <th scope="col">Atas Nama</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Jumlah Orang</th>
                                <th scope="col">Status</th>
                                <th scope="col">ACC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tiket WHERE tgl_pesan = '$date' AND status = 'Belum Lunas'";
                            $result = mysqli_query($conn, $query);


                            while ($data = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $data['id_tiket'] . "</th>";
                                echo "<td>" . $data['nama'] . "</td>";
                                echo "<td>" . $data['tgl_pesan'] . "</td>";
                                echo "<td>" . $data['jenis'] . "</td>";
                                echo "<td>" . $data['qty'] . "</td>";
                                echo "<td>" . $data['status'] . "</td>";
                                echo "<td>" . "<a href='acc.php?no=" . $data['id_tiket'] . "'>" . "<button type='button' class='btn btn-primary btn-sm' onClick='return confirm()'>ACC</button> </a>" . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Pelayanan Hari Berikutnya-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Pelayanan Tiket Hari Berikutnya</h1>
                <p class="lead fw-normal text-muted mb-0">Berikut pelayanan tiket hari-hari berikutnya</p>
            </div>
            <div class="row gx-2 justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No Tiket</th>
                                <th scope="col">Atas Nama</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Jumlah Orang</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query2 = "SELECT * FROM tiket WHERE NOT tgl_pesan = '$date' AND status = 'Belum Lunas' ORDER BY tgl_pesan";
                            $result2 = mysqli_query($conn, $query2);


                            while ($data2 = mysqli_fetch_assoc($result2)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $data2['id_tiket'] . "</th>";
                                echo "<td>" . $data2['nama'] . "</td>";
                                echo "<td>" . $data2['tgl_pesan'] . "</td>";
                                echo "<td>" . $data2['jenis'] . "</td>";
                                echo "<td>" . $data2['qty'] . "</td>";
                                echo "<td>" . $data2['status'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </main>
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2021</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>