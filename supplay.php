<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Supplier</h3>
        <hr>
        <a href="?m=supplay_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a> =
        <a href="supplay_cetak.php" target="_blank" class="btn btn-warning mb-3">
            Cetak
        </a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped v_center" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Nomor Hp Supplier</th>
                            <th>Alamat Supplier</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php

                    $rows = $db->get_results("SELECT * FROM tb_supplier");
                    $no = $posisi;
                    foreach ($rows as $row) {

                        $nama = "supplay_hapus" . $row->id_supplier;
                        $alamat = "supplay_hapus";
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->nama_supplier ?></td>
                            <td><?= $row->nohp_supplier ?></td>
                            <td><?= $row->alamat_supplier ?></td>
                            <td align="center">
                                <a href="?m=supplay_ubah&ID=<?= $row->id_supplier ?>" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                                <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" onclick="<?= $nama ?>()">
                                    Hapus
                                </a>
                            </td>
                            <?= deleteFunction($nama, $row->nama_supplier, $row->id_supplier, $alamat) ?>
                        <?php } ?>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>