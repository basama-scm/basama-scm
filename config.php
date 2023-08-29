<?php
    error_reporting(~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
    session_start();
    date_default_timezone_set('Etc/GMT-8');
    $config["server"]='localhost';
    $config["username"]='root';
    $config["password"]='';
    $config["database_name"]= 'scmc45';
    
    include'inclu/db.php';
    include'inclu/functions.php';
    include'inclu/template.php';
    include'inclu/paging.php';
        
    $mod = $_GET['m'];
    $act = $_GET['act'];        
    $sid = session_id();           
    
    //del_old_order();                              
?>