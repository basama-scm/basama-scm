<center>
    <h1>Laporan Data Supplier</h1>
</center>
<hr>
<table width="100%" border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Nomor Hp Supplier</th>
            <th>Alamat Supplier</th>
        </tr>
    </thead>
    <?php
    include('functions_c45.php');
    include('tampilan/helper.php');
    $rows = $db->get_results("SELECT * FROM tb_supplier");
    $no = $posisi;
    foreach ($rows as $row) {
    ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nama_supplier ?></td>
            <td><?= $row->nohp_supplier ?></td>
            <td><?= $row->alamat_supplier ?></td>
        <?php } ?>
        </tr>
        </tbody>
</table>

<script>
    window.print();
</script>