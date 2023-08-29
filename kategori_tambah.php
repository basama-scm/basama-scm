<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Kelola Data Kategori</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=kategori_tambah" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama Kategori <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_kategori" value="<?= $_POST['nama_kategori'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control mce" name="ket"><?= $_POST['ket'] ?></textarea>
                    </div>
                    <div align='center'>
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=kategori"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>