<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data User</h3>
        <hr>
        <a href="?m=user_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped v_center" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>User</th>
                            <th>Nomor Hp</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php

                    $rows = $db->get_results("SELECT * FROM tb_admin");
                    $no = $posisi;
                    foreach ($rows as $row) {
                        if ($row->status == 'Aktif') {
                            $war = "badge badge-success";
                        } else {
                            $war = "badge badge-danger";
                        }

                        $nama = "user_hapus" . $row->id_admin;
                        $alamat = "user_hapus";
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->nama_admin ?></td>
                            <td><?= $row->user ?></td>
                            <td><?= $row->nohp ?></td>
                            <td><?= $row->level ?></td>
                            <td align="center"><span class="<?= $war ?>"><?= $row->status ?></span></td>
                            <td align="center">
                                <a href="?m=user_ubah&ID=<?= $row->id_admin ?>" class="btn btn-info btn-sm">
                                    Edit
                                </a>

                                <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" onclick="<?= $nama ?>()">
                                    Hapus
                                </a>
                            </td>
                            <?= deleteFunction($nama, $row->nama_admin, $row->id_admin, $alamat) ?>
                        <?php } ?>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>