<?php
session_start();
include 'config.php';
include 'c45.php';

function input_get($key)
{
    if (isset($_GET[$key]))
        return $_GET[$key];
}

function input_post($key)
{
    if (isset($_POST[$key]))
        return $_POST[$key];
}


$ATRIBUT = array();
$TARGET = '';
$NILAI = array();
$DATASET = array();

/** =============== */
$rows = $db->get_results("SELECT * FROM tb_atribut");

function get_atribut($refresh = false)
{
    global $ATRIBUT, $db, $TARGET, $DICARI;
    if (!$ATRIBUT || $refresh) {
        $rows = $db->get_results("SELECT * FROM tb_atribut ORDER BY id_atribut");
        foreach ($rows as $row) {
            $ATRIBUT[$row->id_atribut] = $row->nama_atribut;
        }

        end($ATRIBUT);
        $TARGET = key($ATRIBUT);
        reset($ATRIBUT);

        $DICARI = $ATRIBUT;
        unset($DICARI[$TARGET]);
    }
    return $ATRIBUT;
}

function get_nilai($refresh = false)
{
    global $NILAI, $db;
    if (!$NILAI || $refresh) {
        $rows = $db->get_results("SELECT id_atribut, id_nilai, nama_nilai FROM tb_nilai ORDER BY id_nilai");
        foreach ($rows as $row) {
            $NILAI[$row->id_nilai] = array(
                'id_atribut' => $row->id_atribut,
                'nama_nilai' => $row->nama_nilai,
            );
        }
    }
    return $NILAI;
}

function get_dataset($refresh = false)
{
    global $DATASET, $db;
    if (!$DATASET || $refresh) {
        $rows = $db->get_results("SELECT d.nomor, d.id_nilai, n.id_atribut,d.nama FROM tb_dataset d INNER JOIN tb_nilai n ON n.id_nilai=d.id_nilai ORDER BY nomor");
        foreach ($rows as $row) {
            $DATASET[$row->nomor][$row->id_atribut] = $row->id_nilai;
        }
    }
    return $DATASET;
}

function get_atribut_option($selected = '')
{
    $rows = get_atribut();
    $a = '';
    foreach ($rows as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>[$key] $val</option>";
        else
            $a .= "<option value='$key'>[$key] $val</option>";
    }
    return $a;
}

function get_jenis_option($selected = '')
{
    $arr = array(
        'Acak' => 'Acak',
        'Dari Awal' => 'Dari Awal',
        'Dari Akhir' => 'Dari Akhir',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function get_nilai_option($id_atribut, $selected = '')
{
    $atribut = get_atribut();
    $nilai = get_nilai();
    $a = '';
    foreach ($nilai as $key => $val) {
        if ($val['id_atribut'] == $id_atribut) {
            if ($selected == $key)
                $a .= "<option value='$key' selected>$val[nama_nilai]</option>";
            else
                $a .= "<option value='$key'>$val[nama_nilai]</option>";
        }
    }
    return $a;
}

function get_nilai_atribut_option($id_atribut,  $selected = '')
{
    $nilai = get_nilai();
    $a = '';
    foreach ($nilai as $key => $val) {
        if ($val['id_atribut'] == $id_atribut) {
            if ($selected == $key)
                $a .= "<option value='$key' selected>$val[nama_nilai]</option>";
            else
                $a .= "<option value='$key'>$val[nama_nilai]</option>";
        }
    }
    return $a;
}
function get_words($str, $numb = 10, $suffix = '...')
{
    $str = strip_tags($str);
    $arr_str = explode(' ', $str, $numb + 1);
    if (count($arr_str) <= $numb) {
        return $str;
    } else {
        array_pop($arr_str);
        return implode(' ', $arr_str) . $suffix;
    }
}



function get_option($option_name)
{
    global $db;
    return $db->get_var("SELECT option_value FROM tb_options WHERE option_name='$option_name'");
}

function update_option($option_name, $option_value)
{
    global $db;
    return $db->query("UPDATE tb_options SET option_value='$option_value' WHERE option_name='$option_name'");
}



function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}
