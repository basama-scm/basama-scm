<div class="section-header">
        <h1>Dashboard</h1>
</div>
<?php 

$user = $db->get_results("SELECT * FROM tb_admin");
$numuser = count($user);

$kategori = $db->get_results("SELECT * FROM tb_kategori");
$numkategori = count($kategori);

$produk = $db->get_results("SELECT * FROM tb_produk");
$numproduk = count($produk);

$jual = $db->get_results("SELECT * FROM tb_jual");
$numjual = count($jual);
?>
<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                                <h2><i class="far fa-user mt-4 text-light"></i></h2>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header">
                                        <h4>Total User</h4>
                                </div>
                                <div class="card-body">
                                        <?=$numuser?>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                                <h2><i class="fas fa-box mt-4 text-light"></i></h2>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header">
                                        <h4>Total Kategori</h4>
                                </div>
                                <div class="card-body">
                                        <?=$numkategori?>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                                <h2><i class="fas fa-book mt-4 text-light"></i></h2>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header">
                                        <h4>Total Produk</h4>
                                </div>
                                <div class="card-body">
                                        <?=$numproduk?>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                                <h2><i class="fas fa-folder mt-4 text-light"></i></h2>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header">
                                        <h4>Penjualan</h4>
                                </div>
                                <div class="card-body">
                                        <?=$numjual?>
                                </div>
                        </div>
                </div>
        </div>
</div>

<div class="card card-body">
        Toko Sari Mulia Elektronik merupakan toko yang menyediakan berbagai macam alat elektronik yang berkualitas, beralamat di Jl. S. Parman No. 155, Kelurahan Ulak Karang Selatan, Kec. Padang Utara, Kota Padang. Namun, toko Sari Mulia Elektronik masih melakukan pengecekan persediaan barang bersifat manual, tidak adanya sistem yang dapat memberikan informasi serta memudahkan pekerjaan pegawai toko atau bagian gudang. Dengan adanya metode algoritma C4.5, dapat memudahkan pekerjaan pegawai toko Sari Mulia Elektronik dalam mengecek persediaan barang. Untuk itu, dibuatkan website yang dapat melakukan pekerjaan tersebut.
</div>

<div class="card card-body">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1690898756773!6m8!1m7!1sWPV7YX-RDbVYSYUjX9gKtA!2m2!1d-0.9142619657352058!2d100.3501016605631!3f250.35307917184733!4f-12.176620981133112!5f0.7820865974627469" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>