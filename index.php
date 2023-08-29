<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL & ~E_DEPRECATED);
include('functions_c45.php');
include('tampilan/helper.php');
if (empty($_SESSION['adm_username']))
    header('location:login.php');
?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>CodiePie</title>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

</head>

<body class="layout-4">

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <?php include "tampilan/nav.php" ?>
            <?php include "tampilan/side.php" ?>
            <div class="main-content">
                <section class="section">
                    <?php
                    if (file_exists($mod . '.php'))
                        include $mod . '.php';
                    else
                        include 'home.php';
                    ?>
                </section>
            </div>

            <!-- Start app Footer part -->
            <?php include"tampilan/footer.php";?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/CodiePie.js"></script>
    <script src="assets/modules/apexcharts/apexcharts.min.js"></script>
    <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="js/page/index-0.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>

    <script src="assets/modules/datatables/datatables.min.js"></script>
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="js/page/modules-datatables.js"></script>

</body>

<!-- index-0.html  Tue, 07 Jan 2020 03:35:42 GMT -->

</html>