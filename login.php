<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $level = $row['level'];
        if ($level == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: pemesanan.php");
        }
    } else {
        echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<?php include 'header.html'; ?>
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Login</h1>
                <p class="lead fw-normal text-muted mb-0">Masuk untuk dapat memesan tiket</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form id="login" action="" method="POST">
                        <!-- Username-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" name="username" placeholder="widdanbaehaqi" required />
                            <label for="username">Username</label>
                        </div>
                        <!-- Password-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" placeholder="***" required />
                            <label for="password">Password</label>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="login" name="login" type="submit">Login</button></div>
                    </form>
                    <div class="text-center mt-2">
                        <p class="lead fw-normal text-muted mb-0">Belum punya akun? <a href="daftar.php">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.html'; ?>