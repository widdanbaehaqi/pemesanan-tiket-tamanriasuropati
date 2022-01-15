<?php include 'header.html'; ?>
<section class="py-5">
    <div class="container px-5">
        <!-- form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Daftar Akun</h1>
                <p class="lead fw-normal text-muted mb-0">Daftar terlebih dahulu untuk dapat memesan tiket</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form id="daftar" action="aksi_daftar.php" method="POST">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="nama" type="text" name="nama" placeholder="Widdan Baehaqi" required />
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <!-- Username-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" name="username" placeholder="widdanbaehaqi" required />
                            <label for="username">Username</label>
                        </div>
                        <!-- Email-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" required />
                            <label for="email">E-mail</label>
                        </div>
                        <!-- Password-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" placeholder="***" required />
                            <label for="password">Password</label>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="daftar" name="daftar" type="submit">Daftar Sekarang</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.html'; ?>