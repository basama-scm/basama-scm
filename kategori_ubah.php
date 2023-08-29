<?php
$row = $db->get_row("SELECT * FROM tb_kategori WHERE id_kategori='$_GET[ID]'");
?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Kelola Data Kategori</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=kategori_ubah&ID=<?= $_GET['ID'] ?>" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama kategori <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_kategori" value="<?= $row->nama_kategori ?>" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control mce" name="ket"><?= $row->ket ?></textarea>
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