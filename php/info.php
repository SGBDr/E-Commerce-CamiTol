<?php

    if(!empty($_POST['id'])){
        $bd = new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles');
       // $bd = new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $q = $bd->query('SELECT * FROM produit WHERE id = ' .$_POST['id']);

        $d = $q->fetch();

        echo $d['image']. "&&" .$d['nom']. "&&" .$d['prix'];
    }
            
?>