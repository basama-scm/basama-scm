<?php
session_start();
require_once('config.php');
include('image.php');

/** ========== KATEGORI ========== */
if($mod=='kategori_tambah'){        
    $nama_kategori = $_POST['nama_kategori'];
    $ket = $_POST['ket'];
    
    if($nama_kategori==''){
        print_msg("Field bertanda * harus diisi");
    } else {   
        $db->query("INSERT INTO tb_kategori (nama_kategori, ket)
                    VALUES('$nama_kategori', '$ket')");
        redirect_js('index.php?m=kategori&alert=1');
    }           
}elseif($mod=='kategori_ubah'){
    $nama_kategori = $_POST['nama_kategori'];
    $ket = $_POST['ket'];
    
    if($nama_kategori==''){
        print_msg("Field bertanda * harus diisi");
    } else {   
        $db->query("UPDATE tb_kategori SET nama_kategori='$nama_kategori', ket='$ket' WHERE id_kategori='$_GET[ID]'");
        redirect_js('index.php?m=kategori&alert=2');
    } 
}elseif($mod=='kategori_hapus'){    
    $db->query("DELETE FROM tb_kategori WHERE id_kategori = '$_GET[ID]'");
    header('location:index.php?m=kategori&alert=3');
}

/** ========== supplier ========== */
if ($mod == 'supplay_tambah') {
    $nama_supplier = $_POST['nama_supplier'];
    $nohp_supplier = $_POST['nohp_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];


    if ($nama_supplier == '' || $nohp_supplier == '' || $alamat_supplier == '') {
        print_msg("Field bertanda * harus diisi");
    } else {
        $db->query("INSERT INTO tb_supplier (nama_supplier, nohp_supplier,alamat_supplier)
                    VALUES('$nama_supplier', '$nohp_supplier','$alamat_supplier')");
        redirect_js('index.php?m=supplay&alert=1');
    }
} elseif ($mod == 'supplay_ubah') {
    $nama_supplier = $_POST['nama_supplier'];
    $nohp_supplier = $_POST['nohp_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];

    if ($nama_supplier == '' || $nohp_supplier == '' || $alamat_supplier == '') {
        print_msg("Field bertanda * harus diisi");
    } else {
        $db->query("UPDATE tb_supplier SET nama_supplier='$nama_supplier', nohp_supplier='$nohp_supplier', alamat_supplier='$alamat_supplier' WHERE id_supplier='$_GET[ID]'");
        redirect_js('index.php?m=supplay&alert=2');
    }
} elseif ($mod == 'supplay_hapus') {
    $db->query("DELETE FROM tb_supplier WHERE id_supplier = '$_GET[ID]'");
    header('location:index.php?m=supplay&alert=3');
}

/** ========== BARANG ========== */ 
elseif($mod == 'produk_tambah'){
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];
    $id_admin = $_SESSION['adm_id'];
    
    if($nama_produk=='' || $id_kategori==''){
        print_msg("Field bertanda * harus diisi");
    } else {            
        $db->query("INSERT INTO tb_produk (nama_produk, id_kategori, id_admin, harga_beli, harga_jual)
                    VALUES('$nama_produk', '$id_kategori', '$id_admin', '$harga_beli', '$harga_jual')");
        redirect_js('index.php?m=produk&alert=1');
    }            
}elseif($mod=='produk_ubah'){
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $keterangan = $_POST['keterangan'];
    $id_admin = $_SESSION['adm_id'];
    
    if($nama_produk=='' || $id_kategori=='')
        print_msg("Field bertanda * harus diisi");
    else{
        $db->query("UPDATE tb_produk SET 
                    nama_produk='$nama_produk', 
                    id_kategori='$id_kategori',
                    harga_beli='$harga_beli',
                    harga_jual='$harga_jual'
                WHERE id_produk='$_GET[ID]'");
        redirect_js('index.php?m=produk&alert=2');
    }    
} elseif ($mod == 'hitung_hasil') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $db->query("UPDATE tb_produk SET 
                    harga='$harga',
                    stock='$stock'
                WHERE nama_produk='$nama'");
        header('location:index.php?m=hitung');
}elseif($mod=='produk_hapus'){
    $db->query("DELETE FROM tb_produk WHERE id_produk = '$_GET[ID]'");
    header('location:index.php?m=produk&alert=3');        
}



/** ========== ADMIN ========== */
elseif($mod=='user_tambah'){        
    $nama_admin = $_POST['nama_admin'];
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $level = $_POST['level'];
    $nohp = $_POST['nohp'];
    $status = $_POST['status'];

    $pass = md5($password);
    $user_exist = $db->get_var("SELECT * FROM tb_admin WHERE user='$user'");
    
    if($nama_admin=='' || $user=='' || $pass=='' || $level=='' || $nohp =='' || $status == ''){
        print_msg("Field bertanda * harus diisi");
    } elseif($user_exist){
        print_msg("User sudah terdaftar.");
    } else {    
        $db->query("INSERT INTO tb_admin (nama_admin, user, pass, nohp, status,level)
                    VALUES('$nama_admin', '$user', '$pass', '$nohp', '$status', '$level')");
        redirect_js('index.php?m=user&alert=1');
    }           
}elseif($mod=='user_ubah'){
    $nama_admin = $_POST['nama_admin'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];
    $nohp = $_POST['nohp'];
    $status = $_POST['status'];
    
    $user_exist = $db->get_var("SELECT * FROM tb_admin WHERE user='$user' AND id_admin<>'$_GET[ID]'");
    
    if($nama_admin=='' || $user==''|| $level == '' || $nohp == '' || $status == ''){
        print_msg("Field bertanda * harus diisi");
    } elseif($user_exist){
        print_msg("User sudah terdaftar.");
    } else {    
        if($pass!='')
            $pass = ($pass=='') ? '' : ", pass=MD5('$pass')";
            
        $db->query("UPDATE tb_admin SET nama_admin='$nama_admin', user='$user' $pass, nohp='$nohp', status='$status', level='$level' WHERE id_admin='$_GET[ID]'");
        redirect_js('index.php?m=user&alert=2');
    }        
}elseif($mod=='user_hapus'){
    
    $db->query("DELETE FROM tb_admin WHERE id_admin = '$_GET[ID]'");
    header('location:index.php?m=user&alert=3');
    
       
}elseif($mod=='beli_tambah'){
    $id_admin = $_SESSION['adm_id'];
    $id_supplier = $_POST['id_supplier'];
    $id_produk = $_POST['id_produk'];
    $banyak = $_POST['banyak'];
    
    if($id_produk=='' || $banyak=='' || $id_supplier == ''){
        print_msg("Field bertanda * harus diisi");
    } else {
        $db->query("INSERT INTO tb_beli (id_admin, id_supplier,id_produk, banyak, status,tgl_beli)
                    VALUES('$id_admin','$id_supplier','$id_produk', '$banyak', 'Pending',NOW())");
        redirect_js('index.php?m=beli&alert=1');
    }           
}elseif($mod=='kota_ubah'){
    $nama_kota = $_POST['nama_kota'];
    $ongkos_kirim = $_POST['ongkos_kirim'];
    
    if($nama_kota=='' || $ongkos_kirim==''){
        print_msg("Field bertanda * harus diisi");
    } else {            
        $db->query("UPDATE tb_kota SET nama_kota='$nama_kota', ongkos_kirim='$ongkos_kirim' WHERE ID='$_GET[ID]'");
        redirect_js('index.php?m=kota');
    }        
}elseif($mod=='kota_hapus'){
    
    $db->query("DELETE FROM tb_kota WHERE ID = '$_GET[ID]'");
    header('location:index.php?m=kota');
           
}elseif($mod=='admin_ubah_password'){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];
        
    $pass_correct = $db->get_var("SELECT * FROM tb_admin WHERE id_admin='$_SESSION[adm_id]' AND pass=MD5('$pass1')");
    
    if($pass1=='' || $pass2=='' || $pass3==''){
        print_msg("Field bertanda * harus diisi");
    } elseif(!$pass_correct){
        print_msg("Password lama yang anda masukkan salah.");
    } elseif($pass2!=$pass3){
        print_msg("Password baru dan konfirmasi password baru harus sama.");
    } else {                        
        $db->query("UPDATE tb_admin SET pass=MD5('$pass2') WHERE id_admin='$_SESSION[adm_id]'");
        print_msg("Password baru berhasil disimpan.", 'success');
    }        
}
/** ========== ORDER ========== */ 
elseif($act=='pesan_konfirmasi'){
    $db->query("UPDATE tb_pesan SET status='OK' WHERE id_pesan='$_GET[ID]'");
    $db->query("UPDATE tb_bayar SET status='OK' WHERE id_pesan='$_GET[ID]'");
    header("location:index.php?m=order_detail&ID=$_GET[ID]");
}


/** ========== PROFIL & CARAPESAN ========== */ 
elseif($mod=='profil'){
    update_options('profil', $_POST['profil']);
    print_msg('Data tersimpan.', 'success');
}
elseif($mod=='carapesan'){
    update_options('carapesan', $_POST['carapesan']);
    print_msg('Data tersimpan.', 'success');
}

/** ========== PROFIL & CARAPESAN ========== */ 
else if ($act=='logout'){
    unset($_SESSION['adm_id'], $_SESSION['adm_nama'], $_SESSION['adm_username']);
    header('location:index.php');
}

/** dataset */
elseif ($mod == 'dataset_tambah') {
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];

    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } elseif ($db->get_row("SELECT * FROM tb_dataset WHERE nomor='$nomor'")) {
        print_msg("Nomor sudah ada");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("INSERT INTO tb_dataset (nomor, id_atribut, id_nilai,nama) VALUES ('$nomor', '$key', '$val', '$nama')");
        }
        redirect_js("index.php?m=dataset");
    }
} else if ($mod == 'dataset_ubah') {
    $nama = $_POST['nama'];
    $error = false;
    foreach ($_POST['nilai'] as $key => $val) {
        if (!$val)
            $error = true;
    }

    if ($error) {
        print_msg("Field yang bertanda * tidak boleh kosong!");
    } else {
        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("UPDATE tb_dataset SET id_nilai='$val',nama='$nama' WHERE id_dataset='$key'");
        }
        redirect_js("index.php?m=dataset");
    }
} else if ($act == 'dataset_hapus') {
    $db->query("DELETE FROM tb_dataset WHERE nomor='$_GET[ID]'");
    header("location:index.php?m=dataset");
}

/** nilai atribut */
elseif ($mod == 'nilai_tambah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];

    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_nilai (id_atribut, nama_nilai) VALUES ('$id_atribut', '$nama_nilai')");
        redirect_js("index.php?m=nilai&alert=1");
    }
} else if ($mod == 'nilai_ubah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_nilai = $_POST['nama_nilai'];

    if (!$id_atribut || !$nama_nilai)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_nilai SET id_atribut='$id_atribut', nama_nilai='$nama_nilai' WHERE id_nilai='$_GET[ID]'");
        redirect_js("index.php?m=nilai&alert=2");
    }
} else if ($act == 'nilai_hapus') {
    $db->query("DELETE FROM tb_nilai WHERE id_nilai='$_GET[ID]'");
    header("location:index.php?m=nilai&alert=3");
}

/** atribut */
if ($mod == 'atribut_tambah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];

    if (!$id_atribut || !$nama_atribut)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_atribut WHERE id_atribut='$id_atribut'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_atribut (id_atribut, nama_atribut) 
            VALUES ('$id_atribut', '$nama_atribut')");
        $db->query("INSERT INTO tb_dataset (nomor, id_atribut) SELECT nomor, '$id_atribut' FROM tb_dataset GROUP BY nomor");
        redirect_js("index.php?m=atribut&alert=1");
    }
} else if ($mod == 'atribut_ubah') {
    $id_atribut = $_POST['id_atribut'];
    $nama_atribut = $_POST['nama_atribut'];

    if (!$id_atribut || !$nama_atribut)
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_atribut SET nama_atribut='$nama_atribut' WHERE id_atribut='$_GET[ID]'");
        redirect_js("index.php?m=atribut&alert=2");
    }
} else if ($act == 'atribut_hapus') {
    $db->query("DELETE FROM tb_atribut WHERE id_atribut='$_GET[ID]'");
    $db->query("DELETE FROM tb_nilai WHERE id_atribut='$_GET[ID]'");
    $db->query("DELETE FROM tb_dataset WHERE id_atribut='$_GET[ID]'");
    header("location:index.php?m=atribut&alert=3");
}

elseif ($mod == 'keranjang') {
    $id_produk = $_POST['id_produk'];
    $banyak = $_POST['banyak'];
        $db->query("INSERT INTO tb_keranjang (id_produk, banyak)
                    VALUES('$id_produk', '$banyak')");
        redirect_js('index.php?m=pos_tambah&alert=1');

} elseif ($mod == 'pos_del') {
    $db->query("DELETE FROM tb_keranjang WHERE id = '$_GET[ID]'");
    header('location:index.php?m=pos_tambah&alert=3');
} elseif ($mod == 'belanja') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $total = $_POST['total'];
    $id_admin = $_SESSION['adm_id'];

    // insert data ke tabel tb_penjualan
    $db->query("INSERT INTO tb_pembelian (id_admin, nama, alamat, nohp, total, ket,tanggal_beli) 
            VALUES('$id_admin', '$nama', '$alamat', '$nohp', '$total','Pending', NOW())");

    // mendapatkan nilai id_pembelian
    $id_pembelian = $db->insert_id;

    // insert data ke tabel tb_orderdetail
    $rows = $db->get_results("SELECT * FROM tb_keranjang");
    foreach ($rows as $row) {
        $id_produk = $row->id_produk;
        $banyak = $row->banyak;
        $db->query("INSERT INTO tb_orderdetail (id_pembelian, id_produk, banyak) 
                VALUES ('$id_pembelian', '$id_produk', '$banyak')");

        //$pro = $db->get_row("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
        //$sisa = $pro->stock - $banyak;
        //$db->query("UPDATE tb_produk SET stock='$sisa' WHERE id_produk='$id_produk'");
    }

    $db->query("DELETE FROM  tb_keranjang");
    redirect_js('index.php?m=pos&alert=1');
}

/** ========== BARANG ========== */
elseif ($mod == 'masuk_tambah') {
    $idb = $_POST['idb'];
    $id_admin = $_SESSION['adm_id'];
    if ($idb== '') {
        print_msg("Field bertanda * harus diisi");
    } else {

        $beli = $db->get_row("SELECT * FROM tb_beli WHERE idb='$idb'");
        $produk = $db->get_row("SELECT * FROM tb_produk WHERE id_produk='$beli->id_produk'");
        $stock = $produk->stock + $beli->banyak;

        $db->query("UPDATE tb_produk SET stock='$stock' WHERE id_produk='$produk->id_produk'");
        $db->query("UPDATE tb_beli SET status='Masuk' WHERE idb='$idb'");

        $db->query("INSERT INTO tb_masuk (id_admin, idb, tgl_datang) 
                VALUES ('$id_admin', '$idb', NOW())");
        redirect_js('index.php?m=masuk&alert=1');
    }
}


////////
////////
////////
elseif ($mod == 'jual_produk') {
    $id_produk = $_POST['id_produk'];
    $banyak = $_POST['banyak'];

    $row = $db->get_row("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
    if ($banyak > $row->stock) {
        redirect_js('index.php?m=jual_tambah&alert=4');
    } else {
        $db->query("INSERT INTO tb_cart (id_produk, banyak)
                    VALUES('$id_produk', '$banyak')");
        redirect_js('index.php?m=jual_tambah&alert=1');
    }
} elseif ($mod == 'jual_del') {
    $db->query("DELETE FROM tb_cart WHERE id = '$_GET[ID]'");
    header('location:index.php?m=jual_tambah&alert=3');
} elseif ($mod == 'penjualan') {
    $nama = $_POST['nama'];
    $total = $_POST['total'];
    $id_admin = $_SESSION['adm_id'];

    // insert data ke tabel tb_penjualan
    $db->query("INSERT INTO tb_jual (id_admin, nama, total, tanggal_jual) 
            VALUES('$id_admin', '$nama', '$total', NOW())");

    // mendapatkan nilai id_penjualan
    $id_jual = $db->insert_id;

    // insert data ke tabel tb_orderdetail
    $rows = $db->get_results("SELECT * FROM tb_cart");
    foreach ($rows as $row) {
        $id_produk = $row->id_produk;
        $banyak = $row->banyak;
        $db->query("INSERT INTO tb_jualdetail (id_jual, id_produk, banyak) 
                VALUES ('$id_jual', '$id_produk', '$banyak')");

        $pro = $db->get_row("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
        $sisa = $pro->stock - $banyak;

        $db->query("UPDATE tb_produk SET 
                    stock='$sisa'
                WHERE id_produk='$id_produk'");
    }

    $db->query("DELETE FROM  tb_cart");
    redirect_js('index.php?m=jual&alert=1');
}


if ($mod == 'tambah_stok') {
    $id_admin = $_SESSION['adm_id'];
    $rowss = $db->get_results("SELECT * FROM tb_orderdetail INNER JOIN tb_produk ON tb_orderdetail.id_produk=tb_produk.id_produk WHERE id_pembelian='$_GET[id]'");
    foreach ($rowss as $key) {
    $sisa =  $key->stock + $key->banyak ;
        $db->query("UPDATE tb_produk SET stock='$sisa'WHERE id_produk='$key->id_produk'");
    }
        $db->query("UPDATE tb_pembelian SET ket='Telah Datang'WHERE id_pembelian='$_GET[id]'");
        $db->query("INSERT INTO tb_masuk (id_admin, id_pembelian, tgl_datang) VALUES('$id_admin','$_GET[id]', NOW())");
        redirect_js('index.php?m=masuk&alert=1');
}