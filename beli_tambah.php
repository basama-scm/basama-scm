<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Tambah Stok</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="?m=beli_tambah" method="POST">
                    <?php if ($_POST) include 'aksi.php' ?>

                    <div class="form-group">
                        <label>Pilih Supplier <span class="text-danger">*</span></label>
                        <select name="id_supplier" class="form-control">
                            <option value="">--Pilih supplier--</option>
                            <?= get_supplier_option($_POST['id_supplier']) ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Produk <span class="text-danger">*</span></label>
                        <select name="id_produk" class="form-control">
                            <option value="">--Pilih Produk--</option>
                            <?= get_produk_option($_POST['id_produk']) ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Banyak<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="banyak" value="<?= $_POST['banyak'] ?>" />
                    </div>

                    <br>
                    <center>
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                        <a class="btn btn-danger" href="?m=kota"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>