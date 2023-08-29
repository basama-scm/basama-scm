<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Tambah Data Atribut</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <?php if ($_POST) include 'aksi.php' ?>
                <form method="post">
                    <div class="form-group">
                        <label>ID Atribut <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="id_atribut" value="" />
                    </div>
                    <div class="form-group">
                        <label>Nama Atribut <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_atribut" value="<?= set_value('nama_atribut') ?>" />
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