<?php
$row = $db->get_row("SELECT * FROM tb_admin WHERE id_admin='$_GET[ID]'");
?>
<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data User</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=user_ubah&ID=<?= $_GET['ID'] ?>" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama User <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_admin" value="<?= $row->nama_admin ?>" />
                    </div>
                    <div class="form-group">
                        <label>User <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= $row->user ?>" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="pass" />
                        <p>Kosongkan jika tidak ingin mengubah password.</p>
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nohp" value="<?= $row->nohp ?>" />
                    </div>

                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span></label>
                        <select name="level" class="form-control" id="">
                            <option value="">--Pilih Level--</option>
                            <?= get_level_option($row->level) ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" id="">
                            <option value="">--Pilih Status--</option>
                            <?= get_status_option($row->status) ?>
                        </select>
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