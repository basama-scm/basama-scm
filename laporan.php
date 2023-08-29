<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Laporan</h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><span class="hidden-xs">Laporan Produk</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"> <span class="hidden-xs">Laporan Pembelian Produk</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><span class="hidden-xs">Laporan Penjualan Produk</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div class="tab-pane active" id="profile">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <?php
                                $rows = $db->get_results("SELECT b.*, k.nama_kategori FROM tb_produk b INNER JOIN tb_kategori k ON k.id_kategori=b.id_kategori ORDER BY id_produk ");
                                $no = $posisi;
                                foreach ($rows as $row) : ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $row->nama_produk ?></td>
                                        <td><?= $row->nama_kategori ?></td>
                                        <td align="right"><?= rupiah1($row->harga) ?></td>
                                    </tr>
                                <?php endforeach;
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="table-responsive">
                            <table id="examplee" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Banyak</th>
                                        <th>Harga Per Unit</th>
                                        <th>Total</th>
                                        <th>Tanggal Beli</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $a = "INNER JOIN tb_produk ON tb_beli.id_produk=tb_produk.id_produk";
                                    $query = $db->get_results("SELECT * FROM tb_beli $a ORDER BY tgl_beli ASC");
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?= $no ?></center>
                                            </td>
                                            <td><?= $row->nama_produk ?></td>
                                            <td>
                                                <center><?= $row->banyak ?> Unit</center>
                                            </td>
                                            <td>
                                                <center><?= rupiah1($row->harga) ?></center>
                                            </td>
                                            <td>
                                                <center><?= rupiah1(kali($row->harga, $row->banyak)) ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row->tgl_beli ?></center>
                                            </td>
                                        <?php $no++;
                                    }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="edit">
                        <div class="table-responsive">
                            <table id="exampleee" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Identitas</th>
                                        <th>Detail Pembelian</th>
                                        <th>Total</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $rows = $db->get_results("SELECT * FROM tb_penjualan order by tanggal_beli asc");
                                    $no = $posisi;
                                    foreach ($rows as $row) {
                                        $rowss = $db->get_results("SELECT * FROM tb_orderdetail INNER JOIN tb_produk ON tb_orderdetail.id_produk=tb_produk.id_produk WHERE id_penjualan='$row->id_penjualan'");
                                    ?>
                                        <tr>
                                            <td><?= ++$no ?></td>
                                            <td>
                                                <li><?= $row->nama_beli ?></li>
                                                <li><?= $row->alamat ?></li>
                                                <li><?= $row->nohp ?></li>
                                            </td>
                                            <td>
                                                <?php foreach ($rowss as $key) {
                                                    echo "<li>" . $key->nama_produk . " = " . $key->banyak . " * " . rupiah1($key->harga) . "</li>";
                                                } ?>
                                            </td>
                                            <td align="right">
                                                <?php foreach ($rowss as $key) {
                                                    echo "<li>" . rupiah1(kali($key->banyak, $key->harga)) . "</li>";
                                                } ?>
                                            </td>
                                            <td align="right">
                                                <?= $row->total ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>