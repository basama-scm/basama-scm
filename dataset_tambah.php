<?php
$nomor = $db->get_var("SELECT nomor FROM tb_dataset ORDER BY nomor DESC LIMIT 1") * 1 + 1;

$rows = $db->get_results("SELECT id_atribut, nama_atribut FROM tb_atribut ORDER BY id_atribut")
?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Tambah Data Set</h3>
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
                        <input class="form-control" type="text" name="nomor" value="<?= set_value('nomor', $nomor) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>" />
                    </div>
                    <?php foreach ($rows as $row) : ?>
                        <div class="form-group">
                            <label><?= $row->nama_atribut ?> <span class="text-danger">*</span></label>
                            <select class="form-control" name="nilai[<?= $row->id_atribut ?>]">
                                <option></option>
                                <?= get_nilai_option($row->id_atribut, $_POST['nilai'][$row->id_atribut]) ?>
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