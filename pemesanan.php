<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$user = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$user'";

$result = mysqli_query($conn, $sql);
// Associative array
$row = mysqli_fetch_assoc($result);
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

        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Pesan Tiket</h1>
                    <p class="lead fw-normal text-muted mb-0">Pesan disini sekarang</p>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-8">
                        <!-- Input Data Pesanan-->
                        <h2 class="fw-bolder mb-3">Data Pesanan</h2>
                        <form id="pemesanan" action="aksi_pemesanan.php" method="POST">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nama" type="text" name="nama" placeholder="Widdan Baehaqi" required />
                                <label for="nama">Atas Nama</label>
                            </div>
                            <!-- tanggal input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="tanggal" type="date" name="tanggal" placeholder="2022-01-11" required />
                                <label for="tanggal">Tanggal Pesan</label>
                            </div>
                            <!-- Jenis input-->
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="jenis" aria-label="Floating label select example">
                                    <option value="Pribadi">Pribadi</option>
                                    <option value="Paket">Paket Wisata Sekolah</option>
                                </select>
                                <label for="floatingSelect">Pilih Jenis</label>
                            </div>
                            <!-- qty input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="qty" type="number" name="qty" placeholder="0" required />
                                <label for="qty">Jumlah Orang</label>
                            </div>
                            <!-- user input -->
                            <input type="hidden" name="user" value="<?php echo $row["id_user"]; ?>">
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg" id="pesan" name="pesan" type="submit">Pesan Sekarang</button></div>
                        </form>
                    </div>
                    <div class="col-xl-4">
                        <div class="card border-0 bg-light mt-xl-5">
                            <div class="card-body p-4 py-lg-5">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="h6 fw-bolder">Pertanyaan Seputar Pemesanan?</div>
                                        <p class="text-muted mb-4">
                                            Hubungi kami
                                            <br />
                                            <a href="#!">081-xxx-xxx</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Status-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Status Pesanan Tiket Anda</h1>
                <p class="lead fw-normal text-muted mb-0">Cetak tiket untuk ditunjukkan pada petugas</p>
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
                                <th scope="col">Cetak</th>
                                <th scope="col">Batal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $row["id_user"];
                            $query = "SELECT * FROM tiket WHERE id_user = $id AND status = 'Belum Lunas' ORDER BY tgl_pesan";
                            $result2 = mysqli_query($conn, $query);


                            while ($data = mysqli_fetch_assoc($result2)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $data['id_tiket'] . "</th>";
                                echo "<td>" . $data['nama'] . "</td>";
                                echo "<td>" . $data['tgl_pesan'] . "</td>";
                                echo "<td>" . $data['jenis'] . "</td>";
                                echo "<td>" . $data['qty'] . "</td>";
                                echo "<td>" . $data['status'] . "</td>";
                                echo "<td>" . "<a href='cetak.php?no=" . $data['id_tiket'] . "' target='_blank'>" . "<button type='button'" . "class='btn btn-primary btn-sm'>Cetak</button> </a>" . "</td>";
                                echo "<td>" . "<a href='batal.php?no=" . $data['id_tiket'] . "'>" . "<button type='button'" . "class='btn btn-danger btn-sm' onClick='return confirm()'>Batal</button> </a>" . "</td>";
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