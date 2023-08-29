<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Kelola Data Penjualan Produk</h3>
        <hr>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row     ">
                    <div class="col-8 border border-1">
                        <h4 class="mt-3">Tambah Data Produk</h4>
                        <hr>
                        <?= pesan($_GET['alert']) ?>
                        <form action="aksi.php?m=jual_produk" method="POST">
                            <?php if ($_POST) include 'aksi.php' ?>
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Pilih Produk</label>
                                    <select name="id_produk" class="form-control">
                                        <option value="">--Pilih Produk--</option>
                                        <?= get_produk_option($_POST['id_produk']) ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="">Banyak</label>
                                    <input type="text" name="banyak" class="form-control">
                                </div>
                                <div class="col-4 mt-2">
                                    <center><input type="submit" class="btn btn-primary mt-4" name="simpan" value="Simpan Data"></center>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered mt-3 mb-3">
                            <thead>
                                <tr>
                                    <th scope="col">N0</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Banyak</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = "INNER JOIN tb_produk ON tb_cart.id_produk=tb_produk.id_produk";
                                $rows = $db->get_results("SELECT * FROM tb_cart $a");
                                $no = 1;
                                foreach ($rows as $row) {

                                    $jumlah[] = kali($row->harga_jual, $row->banyak);
                                ?>
                                    <tr>
                                        <td>
                                            <center><?= $no++; ?></center>
                                        </td>
                                        <td><?= $row->nama_produk ?></td>
                                        <td>
                                            <center><?= $row->banyak ?></center>
                                        </td>
                                        <td align="right"><?= rupiah1($row->harga_jual) ?></td>
                                        <td align="right"><?= rupiah1(kali($row->harga_jual, $row->banyak)) ?></td>
                                        <td>
                                            <center>
                                                <a href="aksi.php?m=jual_del&ID=<?= $row->id ?>" class="btn btn-danger">Hapus</a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="4" align="center">Total</td>
                                    <td colspan="2" align="center"><?= rupiah1(array_sum($jumlah)) ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-4 border border-1">
                        <h4 class="mt-3">Input Data Pembeli</h4>
                        <hr>
                        <form action="aksi.php?m=penjualan" method="post">
                            <?php if ($_POST) include 'aksi.php' ?>
                            <label class="mb-2">Nama Pembeli</label>
                            <input type="text" class="form-control" name="nama">
                            <label class="mb-2 mt-2">Total</label>
                            <input type="text" class="form-control" name="total" value="<?= rupiah1(array_sum($jumlah)) ?>">
                            <center><input type="submit" class="btn btn-primary mt-4 mb-4" name="simpan" value="Simpan Data"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>