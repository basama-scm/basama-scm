<center>
    <h1>Laporan Data Stok Barang</h1>
</center>
<hr>
<table width="100%" border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Keterangan</th>
            <th>Harga Jual</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('functions_c45.php');
        include('tampilan/helper.php');
        $rows = $db->get_results("SELECT b.*, k.nama_kategori FROM tb_produk b INNER JOIN tb_kategori k ON k.id_kategori=b.id_kategori ORDER BY id_produk ");
        $no = $posisi;
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->nama_produk ?></td>
                <td><?= $row->nama_kategori ?></td>
                <td align="right"><?= rupiah1($row->harga_jual) ?></td>
                <td align="center"><?= $row->stock ?> Unit</td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>

<script>
    window.print();
</script>