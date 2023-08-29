<!DOCTYPE html>
<html lang="en">
<?php include 'config.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">
</head>

<body class="layout-4">

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card bg-primary ">
                            <div class="card-header">
                                <h4>Silahkan Registrasi</h4>
                            </div>
                            <div class="card-body">
                                <form action="?act=register" method="post" class="needs-validation" novalidate="">
                                    <?php

                                    if ($_POST) {
                                        $nama_admin = $_POST['nama_admin'];
                                        $user = $_POST['user'];
                                        $password = $_POST['pass'];
                                        $level = $_POST['level'];
                                        $nohp = $_POST['nohp'];
                                        $status = $_POST['status'];

                                        $pass = md5($password);
                                        $user_exist = $db->get_var("SELECT * FROM tb_admin WHERE user='$user'");

                                        if ($nama_admin == '' || $user == '' || $pass == '' || $level == '' || $nohp == '') {
                                            print_msg("Field bertanda * harus diisi");
                                        } elseif ($user_exist) {
                                            print_msg("User sudah terdaftar.");
                                        } else {
                                            $db->query("INSERT INTO tb_admin (nama_admin, user, pass, nohp, status,level)
                                                        VALUES('$nama_admin', '$user', '$pass', '$nohp', '$status', '$level')");
                                            redirect_js('login.php');
                                        }
                                    } ?>
                                    <div class="form-group">
                                        <label for="email" class="text-light">Username</label>
                                        <input id="email" type="text" class="form-control" name="user" tabindex="1" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label text-light">Password</label>
                                        <input id="password" type="password" class="form-control" name="pass" tabindex="2" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label text-light">Nama</label>
                                        <input id="password" type="text" class="form-control" name="nama_admin" tabindex="2" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label text-light">Nomor Hp</label>
                                        <input id="password" type="text" class="form-control" name="nohp" tabindex="2" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label text-light">Level</label>
                                        <select name="level" class="form-control" id="">
                                            <option value="">--Pilih Level--</option>
                                            <?= get_level_option($_POST['level']) ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                        <br>
                                        <center>
                                            <a href="login.php"><b>Kembali</b></a>
                                        </center>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>