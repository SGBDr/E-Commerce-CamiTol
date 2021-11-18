<?php

if(!empty($_POST['a'])){
    $bd = new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles');
    //$bd = new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $q = $bd->query('SELECT * FROM produit where state = 0');
    $rps = "";

    while($dd = $q->fetch())$rps = $rps . "$$" . $dd['id'] . "||" . $dd['nom'] . "||" . $dd['qte'] . '||' . $dd['description'] . '||' . $dd['image'] . '||' . $dd['prix'];
    echo $rps;
    
}


?>