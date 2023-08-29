<h1>Data Konfirmasi Pembayaran</h1>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="bayar" />        
        <div class="form-group">
            <input class="form-control" type="text" name="q" value="<?=$_GET[q]?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
    </form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Bukti Bayar</th>
        <th>Atas Nama</th>
        <th>Tanggal Pesan</th>
        <th>Konsumen</th>
        <th>Kota</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$pg = new Paging;
$batas = 10;
$posisi = $pg->cari_posisi($batas,$_GET[page]);
$q = esc_field($_GET['q']);

$from = "FROM tb_pesan p 
    	INNER JOIN tb_konsumen k ON k.id_konsumen=p.id_konsumen 
    	INNER JOIN tb_kota kt ON kt.ID=p.kota_kirim
    	INNER JOIN tb_detail d ON d.id_pesan=p.id_pesan
        INNER JOIN tb_bayar b ON b.id_pesan=p.id_pesan";
     
$where.= " AND k.nama_konsumen LIKE '%$q%'";
$where.=" AND p.status='Pending'";
	
$rows = $db->get_results("SELECT b.gambar, b.nama, p.id_pesan, p.tanggal, k.nama_konsumen, kt.nama_kota, p.status, SUM(d.subtotal) AS total
    $from WHERE 1 $where GROUP BY p.id_pesan LIMIT $posisi, $batas");
$no=$posisi;
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><img class="thumbnail" src="../assets/images/bukti_bayar/<?=$row->gambar?>" width="100px" /></td>
    <td><?=$row->nama?></td>
    <td><?=tgl_indo($row->tanggal)?></td>
    <td><?=$row->nama_konsumen?></td>
    <td><?=$row->nama_kota?></td>
    <td>Rp <?=number_format($row->total)?></td>
    <td style="white-space: nowrap;">
        <a class="btn btn-xs btn-warning" href="?m=order_detail&ID=<?=$row->id_pesan?>"><span class="glyphicon glyphicon-edit"></span> Detail</a>        
    </td>
</tr>
<?php endforeach;
?>
</table>
<div class="panel-footer">
<?php
$jumrec = $db->get_var("SELECT COUNT(*) $from WHERE 1 $where");
$total_page= $pg->get_total_page($jumrec, $batas);
echo "<ul class='pagination'>".$pg->get_link("m=order&status=$_GET[status]&page=", $total_page, $_GET[page])."</ul>";
?>
</div>
</div>
