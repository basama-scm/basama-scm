<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data User</h3>
        <hr>
    </div>
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="post" action="?m=user_tambah" enctype="multipart/form-data">
                    <?php if ($_POST) include 'aksi.php' ?>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_admin" value="<?= $_POST['nama_admin'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>User <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="user" value="<?= $_POST['user'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="pass" />
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nohp" />
                    </div>

                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span></label>
                        <select name="level" class="form-control" id="">
                            <option value="">--Pilih Level--</option>
                            <?= get_level_option($_POST['level']) ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" id="">
                            <option value="">--Pilih Status--</option>
                            <?= get_status_option($_POST['status']) ?>
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