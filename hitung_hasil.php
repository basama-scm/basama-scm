<div class="card">
    <div class="card-header">
        <h3 class="panel-title">
            <a href="#c1" data-toggle="collapse">Perhitungan</a>
        </h3>
    </div>
    <div class="card-body bg-white collapse" id="c1">
        <pre>
        <?php
        //mengambil dataset dari database
        $rows_dataset = $db->get_results("SELECT * FROM tb_dataset d INNER JOIN tb_nilai n ON n.id_nilai=d.id_nilai INNER JOIN tb_atribut a ON a.id_atribut=d.id_atribut ORDER BY nomor, d.id_atribut");

        //menyimpan dataset ke dalam array 2 dimensi
        $data = array();
        foreach ($rows_dataset as $row) {
            $data[$row->nomor][$row->nama_atribut] = $row->nama_nilai;
        }
        //mengatur indeks array dari 0
        $data = array_values($data);

        //memanggil get_atribut (functions.php)
        $atribut = get_atribut();
        //menyimpan nama atribut target (label)
        $target = $ATRIBUT[$TARGET];
        //memanggil class c45 (c45.php)
        $c45 = new c45($data, $atribut, $target, true);
        ?>
        </pre>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="panel-title">
            <a href="#c2" data-toggle="collapse">Tree</a>
        </h3>
    </div>
    <div class="card-body collapse" id="c2">
        <pre>
        <?php
        //menampilkan tree
        $c45->display();
        ?>
        </pre>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="panel-title">Hasil</h3>
    </div>
    <div class="card-body">
        <?php
        //menyimpan inputan user
        $arr = array();
        foreach ($_POST['selected'] as $key => $val) {
            $arr[$ATRIBUT[$key]] = $NILAI[$val]['nama_nilai'];
        }
        //menampilkan inputan user
        $arr2 = array();
        foreach ($arr as $key => $val) {
            $arr2[] = "$key = $val";
        }
        echo "Hasil Prediksi atas Nama : <b>" . $_POST['nama'] . "</b>";
        echo ' Jika ' . implode(' dan ', $arr2);
        //melakukan prediksi berdasarkan inputan user
        echo ' maka <code>' . $target . '</code> = <code>' . $c45->predict($arr) . '</code>';
        ?>

        <br>
    </div>
</div>



<style type="text/css">
    .c45_tree {
        margin: 0;
        padding: 0;
    }

    .c45_tree li {
        list-style: none;
    }

    .c45_tree ul li {
        margin: 10px;
        position: relative;
    }

    .c45_tree li:before {
        content: "";
        position: absolute;
        top: -10px;
        left: -20px;
        border-left: 2px solid black;
        border-bottom: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 20px;
    }

    .c45_tree li::after {
        position: absolute;
        content: "";
        top: 8px;
        left: -20px;
        border-left: 2px solid black;
        border-top: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 100%;
    }

    .c45_tree a {
        min-width: 80px;
    }

    .c45_tree li:last-child::after {
        display: none
    }

    .c45_tree li:last-child:before {
        border-radius: 0 0 0 5px
    }

    ul.c45_tree>li:first-child::before {
        display: none
    }
</style>

