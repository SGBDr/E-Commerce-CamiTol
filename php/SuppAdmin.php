<?php

    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $bd = new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles');
       // $bd = new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $q = $bd->prepare('DELETE FROM client WHERE id = :id');
        $q->bindValue(':id', $id);
        if($q->execute()) echo "OK";
        else echo "NO";
    }
            
?>