<?php

$rows = $db->get_results("SELECT *
    FROM tb_dataset d 
        INNER JOIN tb_atribut a ON a.id_atribut=d.id_atribut                 
    
    ORDER BY d.nomor, a.id_atribut");

get_atribut();
get_nilai();
$NAMA = array();
$dataset = array();
foreach ($rows as $row) {
    if (!empty($NILAI[$row->id_nilai]['nama_nilai']))

        $dataset[$row->nomor][$row->id_atribut]['nama_nilai'] = $NILAI[$row->id_nilai]['nama_nilai'];

    $NAMA[$row->nomor] = $row->nama;
}

?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data User</h3>
        <hr>
        <a href="?m=dataset_tambah" class="btn btn-primary mb-3">
            Tambah Data
        </a>
        <a class="btn btn-success mb-3" href="?m=dataset_import">Import</a>
        <?= pesan($_GET['alert']) ?>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped v_center" id="table-1">
                    <thead>
                        <tr class="nw">
                            <th>Nomor</th>
                            <th>Nama</th>
                            <?php foreach ($ATRIBUT as $key => $val) : ?>
                                <th><?= $val ?></th>
                            <?php endforeach ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php

                    foreach ($dataset as $key => $val) : ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $NAMA[$key] ?></td>
                            <?php foreach ($val as $k => $v) : ?>
                                <td><?= $v['nama_nilai'] ?></td>
                            <?php endforeach ?>

                            <td align="center">
                                <a href="?m=dataset_ubah&ID=<?= $key ?>" class="btn btn-info btn-sm">
                                    Edit
                                </a>

                                <a href="#" class="btn btn-danger btn-sm"  onclick="setdel<?= $key ?>()" >
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($dataset as $key => $val) { ?>
    

    <script>
        function setdel<?= $key ?>() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-3',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Apakah Anda Serius?',
                text: "Mengahapus Data <?= $NAMA[$key] ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yakin...!',
                cancelButtonText: 'Tidak...!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'aksi.php?act=dataset_hapus&ID=<?= $key ?>';
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                }
            })
        }
    </script>
<?php } ?>