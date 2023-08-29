<center>
    <h1>Laporan Data Penjualan Barang</h1>
</center>
<hr>
<table width="100%" border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Identitas</th>
            <th>Detail Pembelian</th>
            <th>Total</th>
            <th>Total Harga</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('functions_c45.php');
        include('tampilan/helper.php');
        $no = 1;
                            $rows = $db->get_results("SELECT * FROM tb_pembelian order by tanggal_beli asc");
                            $no = $posisi;
                            foreach ($rows as $row) {
                                $masuk = $db->get_row("SELECT * FROM tb_masuk WHERE id_pembelian='$row->id_pembelian'");
                                $rowss = $db->get_results("SELECT * FROM tb_orderdetail INNER JOIN tb_produk ON tb_orderdetail.id_produk=tb_produk.id_produk WHERE id_pembelian='$row->id_pembelian'");
                                if ($row->ket == "Pending") {
                                    $ket = "bg-danger text-white";
                                } else {
                                    $ket = "bg-success text-white";
                                }
                            ?>
                                <tr>
                                    <td><?= ++$no ?></td>
                                    <td>
                                        <li><?= $row->nama ?></li>
                                        <li><?= $row->alamat ?></li>
                                        <li><?= $row->nohp ?></li>
                                    </td>
                                    <td>
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . $key->nama_produk . " = " . $key->banyak . " * " . rupiah1($key->harga_beli) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?php foreach ($rowss as $key) {
                                            echo "<li>" . rupiah1(kali($key->banyak, $key->harga_beli)) . "</li>";
                                        } ?>
                                    </td>
                                    <td align="right">
                                        <?= $row->total ?>
                                    </td>
                                    <td align="center">
                                        <span class="badge <?= $ket ?>"><?= $row->ket ?></span>
                                    </td>
                                    <td align="center">
                                        <?php if ($row->ket == "Pending") { ?>
                                        <a href="aksi.php?m=tambah_stok&id=<?=$row->id_pembelian?>" class="btn btn-success">Barang Masuk</a>
                                        <?php } else {
                                            echo $masuk->tgl_datang;
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
</table>

<script>
    window.print();
</script>