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
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form action="?act=login" method="post" class="needs-validation" novalidate="">
                  <?php

                  if ($_POST) {
                    $user = esc_field($_POST['user']);
                    $pass = esc_field($_POST['pass']);

                    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass=MD5('$pass')");
                    if ($row) {
                      $_SESSION['adm_id'] = $row->id_admin;
                      $_SESSION['adm_nama'] = $row->nama_admin;
                      $_SESSION['adm_username'] = $row->user;
                      $_SESSION['level'] = $row->level;
                      //echo $_SESSION[adm_username];
                      //die(print_r($row));
                      if ($row->status == "Aktif") {
                        redirect_js("index.php");
                      } else {
                        print_msg("Akun Anda di Non Aktifkan");
                      }
                    } else
                      print_msg("Salah kombinasi username dan password.");
                  } ?>
                  <div class="form-group">
                    <label for="email" class="text-light">Username</label>
                    <input id="email" type="text" class="form-control" name="user" tabindex="1" required autofocus>
                    <div class="invalid-feedback">

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label text-light">Password</label>
                    <input id="password" type="password" class="form-control" name="pass" tabindex="2" required>

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                    <br>
                    <center>
                      <a href="register.php"><b>Daftar</b></a>
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