<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Kategori</h3>
        <hr>
        <a href="?m=kategori_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped v_center" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Total Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $rows = $db->get_results("SELECT k.*, COUNT(b.id_produk) AS total FROM tb_kategori k LEFT JOIN tb_produk b ON b.id_kategori=k.id_kategori GROUP BY k.id_kategori ORDER BY id_kategori");
                    $no = $posisi;
                    foreach ($rows as $row) :
                        $nama = "kategori_hapus" . $row->id_kategori;
                        $alamat = "kategori_hapus";
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->nama_kategori ?></td>
                            <td><?= $row->ket ?></td>
                            <td align="center"><span class="badge badge-success"><?= $row->total ?></span></td>
                            <td align="center">
                                <a href="?m=kategori_ubah&ID=<?= $row->id_kategori ?>" class="btn btn-info btn-sm">
                                    Edit
                                </a>

                                <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" onclick="<?= $nama ?>()">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                        deleteFunction($nama, $row->nama_kategori, $row->id_kategori, $alamat);
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php foreach ($rows as $row) { ?>
    <div class=" modal fade" id="katdel<?= $row->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Announcement..</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    Are You Sure To Delete User Data "<?= $row->nama_kategori ?>"..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <a href="aksi.php?m=kategori_hapus&ID=<?= $row->id_kategori ?>" class="btn btn-primary">Yes...!</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>