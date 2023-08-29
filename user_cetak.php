<h1>Laporan Data Admin</h1>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Nama Admin</th>
        <th>User</th>
        <th>Level</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);	
$rows = $db->get_results("SELECT k.*, COUNT(b.id_produk) AS total FROM tb_admin k LEFT JOIN tb_produk b ON b.id_admin=k.id_admin WHERE nama_admin LIKE '%$q%' GROUP BY k.id_admin ORDER BY nama_admin");
$no=$posisi;
foreach($rows as $row):?>
<tr>
    <td><?php echo ++$no ?></td>
    <td><?php echo $row->nama_admin?></td>
    <td><?php echo $row->user?></td>
    <td><?php echo $row->level?></td>
</tr>
<?php endforeach;
?>
</table>
