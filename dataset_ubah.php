<?php
$rows = $db->get_results("SELECT d.id_dataset, d.nomor, d.id_nilai, a.id_atribut, a.nama_atribut,nama
    FROM tb_dataset d 
        INNER JOIN tb_atribut a ON a.id_atribut = d.id_atribut
        LEFT JOIN tb_nilai n ON n.id_nilai=d.id_nilai
    WHERE nomor='$_GET[ID]'
    ORDER BY a.id_atribut");
get_atribut();
$data = $db->get_row("SELECT * FROM tb_dataset WHERE nomor='$_GET[ID]'");

?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Tambah Data Produk</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <?php if ($_POST) include 'aksi.php' ?>
                <form method="post">
                    <div class="form-group">
                        <label>Nomor <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nomor" value="<?= $_GET['ID'] ?>" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama', $data->nama) ?>" />
                    </div>
                    <?php foreach ($rows as $row) : ?>
                        <div class="form-group">
                            <label><?= $row->nama_atribut ?> <span class="text-danger">*</span></label>
                            <select class="form-control" name="nilai[<?= $row->id_dataset ?>]">
                                <option></option>
                                <?= get_nilai_option($row->id_atribut, $row->id_nilai) ?>
                            </select>
                        </div>
                    <?php endforeach ?>
                    <div class="form-group">
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=dataset"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>