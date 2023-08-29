<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Nilai</h3>
        <hr>
        <a href="?m=nilai_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped v_center" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Atribut</th>
                            <th>Nama Nilai Atribut</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $rows = $db->get_results("SELECT * FROM tb_nilai n INNER JOIN tb_atribut a ON a.id_atribut=n.id_atribut  ORDER BY n.id_atribut, n.nama_nilai");
                    $no = 1;
                    foreach ($rows as $row) :
                        $nama = "nilai_hapus" . $row->id_nilai;
                        $alamat = "nilai_hapus";
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->id_atribut ?></td>
                            <td><?= $row->nama_atribut ?></td>
                            <td><?= $row->nama_nilai ?></td>

                            <td align="center">
                                <a href="?m=nilai_ubah&ID=<?= $row->id_nilai ?>" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                                <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" onclick="nalai<?= $row->id_nilai ?>()">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($rows as $row) { ?>
    <script>
        function nalai<?= $row->id_nilai ?>() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-3',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda Serius?',
                text: "Mengahapus Data <?= $row->nama_atribut ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin...!',
                cancelButtonText: 'Tidak...!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'aksi.php?act=nilai_hapus&ID=<?= $row->id_nilai ?>';
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                }
            })
        }
    </script>
<?php } ?>