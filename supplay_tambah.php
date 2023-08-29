<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data Supplier</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=supplay_tambah" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_supplier" value="<?= $_POST['nama_supplier'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nohp_supplier" value="<?= $_POST['nohp_supplier'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat_supplier" value="<?= $_POST['alamat_supplier'] ?>" />
                    </div>

                    <div align='center'>
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=user"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>