<?php
    include'../konfigurasi.php';
    
    if($_GET[jenis]=='tanaman'){
        if(empty($_GET[id_kategori])){
            $qtan = mysql_query("select * from tanaman, kategori where tanaman.id_kategori=kategori.id_kategori order by id_tanaman");
        }else{
            $qtan = mysql_query("select * from tanaman, kategori where tanaman.id_kategori=kategori.id_kategori and tanaman.id_kategori='$_GET[id_kategori]' order by id_tanaman");
        }
        echo"
        <h1>Laporan Data Tanaman</h1>
        <table border='1' cellspacing='0' >
            <tr class='header'>
                <td>No</td>
                <td>ID</td>
                <td>Nama</td>
                <td>Kategori</td>
                <td>Harga</td>
                <td>Stok</td>
            </tr>";
        $no=1;
        while($rtan = mysql_fetch_array($qtan)){
            echo "
            <tr>
                <td>$no</td>
                <td>$rtan[id_tanaman]</td>
                <td>$rtan[nama_tanaman]</td>
                <td>$rtan[nama_kategori]</td>
                <td nowrap='nowrap'>Rp ".number_format($rtan[harga],0,"",".")."</td>
                <td>$rtan[stok]</td>
            </tr>";
            $no++;
        }
    }elseif($_GET[jenis]=='konsumen'){
        $qtan = mysql_query("select * from konsumen order by id_konsumen");
        echo"
        <h1>Laporan Data Konsumen</h1>
        <table border='1' cellspacing='0' >
            <tr class='header'>
                <td>No</td>
                <td>ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Alamat</td>
                <td>No Telp</td>
            </tr>";
        $no=1;
        while($rtan = mysql_fetch_array($qtan)){
            echo"
            <tr>
                <td>$no</td>
                <td>$rtan[id_konsumen]</td>
                <td>$rtan[nama_konsumen]</td>
                <td>$rtan[email]</td>
                <td>$rtan[alamat]</td>
                <td>$rtan[no_telp]</td>
            </tr>";
            $no++;
        }
    }elseif($_GET[jenis]=='pemesanan'){
        echo "
        <h1>Laporan Pemesanan $_GET[awal] sampai $_GET[akhir]</h1>
        <table border='1' cellspacing='0' >
            <tr class='header'>
                <td>No Pesan</td>
                <td>Konsumen</td>
                <td>Tgl Pesan</td>
                <td>Grantotal</td>
                <td>Tgl Bayar</td>
                <td>Status Bayar</td>
            </tr>";
            
        $sql = "SELECT *, (select sum(total_bayar) from detail where detail.id_pemesanan=pemesanan.id_pemesanan) as grantotal FROM pemesanan, konsumen
            WHERE pemesanan.id_konsumen=konsumen.id_konsumen
            and tgl_pesan>='$_GET[awal]' and tgl_pesan<='$_GET[akhir]'";
        
        if(!empty($_GET[id_konsumen])){
            $sql.=" and pemesanan.id_konsumen='$_GET[id_konsumen]'";
        }
        
        if(!empty($_GET[status_bayar])){
            $sql.=" and pemesanan.status_bayar='$_GET[status_bayar]'";
        }
        
        $sql.=" ORDER BY id_pemesanan DESC";

        $query = mysql_query($sql);
        
        while($row = mysql_fetch_array($query)){
            $tgl_bayar=($row[tgl_bayar]<>"0000-00-00")? $row[tgl_bayar]:"-";
            $aksi= "<a href=?mod=order&act=detail&id=$row[id_pemesanan]>Detail</a>";
            
            if($row[status_bayar]=="Baru"){
                $aksi.= "
                 | <a href='aksi.php?mod=order&act=lunas&id=$row[id_pemesanan]' onclick=\"return confirm('Tandai Lunas?');\">Tandai Lunas</a>
                 | <a href='aksi.php?mod=order&act=hapus&id=$row[id_pemesanan]' onclick=\"return confirm('Hapus?');\">Batalkan</a>
                ";
            }
            
            $bg=($row[status_bayar]=='Baru')?"#dad0d0":"";
            echo"
            <tr bgcolor='$bg'>
                <td align=center>$row[id_pemesanan]</td>
                <td>$row[id_konsumen] - $row[nama_konsumen]</td>
                <td>$row[tgl_pesan]</td>
                <td>Rp $row[grantotal]</td>
                <td>$tgl_bayar</td>
                <td>$row[status_bayar]</td>
            </tr>";
            $no++;
        }
        echo "</table>";
    }
?>
<style type="text/css">
    h1{
        font-family: Verdana;
        font-size: 16px;
        color: #38C590;
    }
    table{
        font-family: Verdana;
        font-size: 12px;
        border: 1px solid #38C590;
        border-collapse: collapse;
    }
    .header{
        background:#38C590;
        color:white;
        font-weight:bold;
    }
    td{
        padding: 5px;
    }
</style>