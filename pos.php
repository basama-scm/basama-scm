<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Penambahan Stok</h3>
        <hr>
        <a href="?m=pos_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        =
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
                                <th>Identitas</th>
                                <th>Detail Pembelian</th>
                                <th>Total</th>
                                <th>Total Harga</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $rows = $db->get_results("SELECT * FROM tb_pembelian order by tanggal_beli asc");
                            $no = $posisi;
                            foreach ($rows as $row) {
                                $rowss = $db->get_results("SELECT * FROM tb_orderdetail INNER JOIN tb_produk ON tb_orderdetail.id_produk=tb_produk.id_produk WHERE id_pembelian='$row->id_pembelian'");
                                if ($row->ket == "Pending") {
                                    $ket = "bg-danger text-white";
                                } else {
                                    $ket = "bg-success text-white";
                                }
                            ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td>
                                        <li><?= $row->nama ?></li>
                                        <li><?= $row->alamat ?></li>
                                        <li><?= $row->nohp ?></li>
                                    </td>
                                    <td>
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . $key->nama_produk . " = " . $key->banyak . " * " . rupiah1($key->harga_beli) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . rupiah1(kali($key->banyak, $key->harga_beli)) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?= $row->total ?>
                                    </td>
                                    <td align="center">
                                        <span class="badge <?= $ket ?>"><?= $row->ket ?></span>
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