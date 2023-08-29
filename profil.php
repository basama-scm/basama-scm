<h1>Profil</h1>
<div class="row">
<div class="col-md-6">
<?php if($_POST) include'aksi.php'?>
<form method="post">
<div class="form-group">
    <textarea class="form-control mce" name="profil"><?=get_options('profil')?></textarea>
</div>
<div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
</div>
</form>
</div>
</div>