<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Produk Masuk</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="?m=masuk_tambah" method="POST">
                    <?php if ($_POST) include 'aksi.php' ?>

                    <div class="form-group">
                        <label>Pilih Barang <span class="text-danger">*</span></label>
                        <select name="idb" class="form-control">
                            <option value="">--Pilih Beli--</option>
                            <?= get_beli_option($_POST['idb']) ?>
                        </select>
                    </div>

                    <br>
                    <center>
                        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Konfirmasi Barang Masuk</button>
                        <a class="btn btn-danger" href="?m=kota"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>