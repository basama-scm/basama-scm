<?php
$row = $db->get_row("SELECT * FROM tb_produk WHERE id_produk='$_GET[ID]'");
?>

<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Edit Data Produk</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=produk_ubah&ID=<?= $_GET['ID'] ?>" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <input class="form-control" type="hidden" name="id_produk" value="<?= $row->id_produk ?>" />
                    <div class="form-group">
                        <label>Nama Barang <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_produk" value="<?= $row->nama_produk ?>" />
                    </div>
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih kategori--</option>
                            <?= get_kategori_option($row->id_kategori) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input class="form-control" type="text" name="harga_beli" value="<?= $row->harga_beli ?>" />
                    </div>

                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input class="form-control" type="text" name="harga_jual" value="<?= $row->harga_jual ?>" />
                    </div>
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="?m=produk"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>