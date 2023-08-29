<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Laporan Data penjualan</h3>
        <hr>
        <a href="pos_cetak.php" target="_blank" class="btn btn-warning mb-3">
            Cetak
        </a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped v_center" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Detail Pembelian</th>
                                <th>Total</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $rows = $db->get_results("SELECT * FROM tb_jual order by tanggal_jual asc");
                            $no = $posisi;
                            foreach ($rows as $row) {
                                $rowss = $db->get_results("SELECT * FROM tb_jualdetail INNER JOIN tb_produk ON tb_jualdetail.id_produk=tb_produk.id_produk WHERE id_jual='$row->id_jual'");
                            ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td>
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . $key->nama_produk . " = " . $key->banyak . " * " . rupiah1($key->harga_jual) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . rupiah1(kali($key->banyak, $key->harga_jual)) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?= $row->total ?>
                                    </td>
                                    <td><?= $row->tanggal_jual ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>