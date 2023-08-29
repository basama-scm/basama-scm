<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Stok Produk</h3>
        <hr>
        <a href="laporan_stok_cetak.php" target="_blank" class="btn btn-warning mb-3">
            Cetak
        </a>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped v_center" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Keterangan</th>
                                <th>Harga Jual</th>
                                <th>Stock</th>
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
                                <td align="right"><?= rupiah1($row->harga_jual) ?></td>
                                <td align="center"><?= $row->stock ?> Unit</td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>