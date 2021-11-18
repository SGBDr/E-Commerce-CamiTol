<?php

if(!empty($_POST['id'])){

    $id = $_POST['id'];
    require('Manager.php');
    $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
    //$manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
    $bol = $manager->SuppProd($id);
    if($bol)echo "OK";
    else echo "NO";

}

?>