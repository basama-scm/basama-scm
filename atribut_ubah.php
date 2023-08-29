<?php
$row = $db->get_row("SELECT * FROM tb_atribut WHERE id_atribut='$_GET[ID]'");
?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Ubah Data Atribut</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <?php if ($_POST) include 'aksi.php' ?>
                <form method="post">
                    <div class="form-group">
                        <label>Id Atribut <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="id_atribut" readonly="readonly" value="<?= $row->id_atribut ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama Atribut <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_atribut" value="<?= set_value('nama_atribut', $row->nama_atribut) ?>" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=atribut"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>