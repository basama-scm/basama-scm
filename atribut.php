<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Atribut</h3>
        <hr>
        <a href="?m=atribut_tambah" class="btn btn-primary mb-3">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = $db->get_results("SELECT * FROM tb_atribut ORDER BY id_atribut ASC");
                        $no = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td><?= $row->id_atribut ?></td>
                                <td><?= $row->nama_atribut ?></td>

                                <td align="center">
                                    <a href="?m=atribut_ubah&ID=<?= $row->id_atribut ?>" class="btn btn-info btn-sm">
                                        Edit
                                    </a>
                                    <a href="#" data-toggle="modal" class="btn btn-danger btn-sm" onclick="atributdel<?= $row->id_atribut ?>()">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($rows as $row) { ?>


    <script>
        function atributdel<?= $row->id_atribut ?>() {
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
                    window.location.href = 'aksi.php?act=atribut_hapus&ID=<?= $row->id_atribut ?>';
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {}
            })
        }
    </script>
<?php } ?>