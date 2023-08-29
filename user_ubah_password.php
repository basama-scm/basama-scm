<?php
    $row = $db->get_row("SELECT * FROM tb_admin WHERE id_admin='$_SESSION[adm_id]'");
?>
<h1>Ubah Password</h1>
<form method="post" action="?m=admin_ubah_password" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <?php if($_POST) include'aksi.php'?>    
            <div class="form-group">
                <label>User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" disabled="" value="<?=$row->user?>"/>
            </div> 
            <div class="form-group">
                <label>Password Lama<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass1"/>
            </div>  
            <div class="form-group">
                <label>Password Baru<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass2"/>
            </div> 
            <div class="form-group">
                <label>Konfirmasi Password Baru<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass3"/>
            </div> 
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Ubah Password</button>
            <a class="btn btn-danger" href="?m=admin"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </div>
    </div>
</form>