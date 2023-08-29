<div class="row mt-3">
    <div class="col-lg-12">
        <h3>Data User</h3>
        <hr>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <?php
                $error = false;

                if ($_POST) {
                    foreach ($_POST['selected'] as $key => $val) {
                        if ($val == '')
                            $error = true;
                    }
                }
                get_atribut();
                get_nilai();
                ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">Data yang diketahui</div>
                    <div class="panel-body">
                        <?php
                        if ($error) print_msg('Isikan semua atribut');
                        ?>
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama </label>

                                <select class="form-control" name="nama">
                                    <option value=""></option>
                                    <?php
                                    $rows = $db->get_results("SELECT * FROM tb_produk order by id_produk asc");
                                    foreach ($rows as $data) {
                                    ?>
                                        <option value="<?= $data->nama_produk ?>"><?= $data->nama_produk ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <?php
                            $x = $ATRIBUT;
                            array_pop($x);
                            foreach ($x as $key => $val) : ?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?= $val ?></label>

                                    <select class="form-control" name="selected[<?= $key ?>]">
                                        <option value=""></option>
                                        <?= get_nilai_atribut_option($key, $_POST['selected'][$key]) ?>
                                    </select>

                                </div>
                            <?php endforeach ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <button class="btn btn-primary"><span class="glyphicon glyphicon-signal"></span> Hitung</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($_POST && !$error) include 'hitung_hasil.php';
        ?>

    </div>
</div>