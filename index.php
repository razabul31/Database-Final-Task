<!DOCTYPE html>
<html lang="en">

<head>
    <title>AHM | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
    <link href="assets/dist/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/images/ahm.png" alt="logo" width="200" class="mb-1">
                                        <p class="h4 text-dark">Sistem Penjualan Sepeda Motor <br> AHM</p>
                                    </div>

                                    <?php if (isset($_GET['msg'])) {
                                        $msg = $_GET['msg'];
                                        if ($msg == 1) {
                                    ?>
                                            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Autentikasi Gagal!</div>
                                        <?php
                                        } else if ($msg == 2) {
                                        ?>
                                            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Error Database!</div>
                                        <?php
                                        } else if ($msg == 3) {
                                        ?>
                                            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Username tidak ditemukan!</div>
                                        <?php
                                        } else if ($msg == 4) {
                                        ?>
                                            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Password salah!</div>
                                        <?php
                                        } else if ($msg == 5) {
                                        ?>
                                            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Anda berhasil logout!</div>
                                        <?php
                                        } else if ($msg == 6) {
                                        ?>
                                            <div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-circle"></i> Silahkan login terlebih dahulu!</div>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <hr>
                                    <form class="user" method="post" action="login.php">
                                        <div class="form-group">
                                            <i class="fas fa-user pl-3"> Username</i>
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-key pl-3"> Password</i>
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password">
                                                <div class="input-group-append">
                                                    <span id="eye-button" onclick="change()" class="input-group-text">
                                                        <i class="fas fa-fw fa-eye" title="tampilkan password"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="btn_login">
                                            <strong>Login</strong>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Password -->
    <script type="text/javascript">
        function change() {
            var x = document.getElementById('password').type;
            if (x == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('eye-button').innerHTML = `<i class="fas fa-fw fa-eye-slash" title="sembunyikan password"></i>`;
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('eye-button').innerHTML = `<i class="fas fa-fw fa-eye" title="tampilkan password"></i>`;
            }
        }
    </script>

</body>

</html>