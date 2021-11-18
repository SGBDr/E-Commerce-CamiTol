<?php

if(!empty($_POST["tel"]) && !empty($_POST["pwd"]) && !empty($_POST["nom"])){

    $tel = htmlspecialchars($_POST['tel']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $nom = htmlspecialchars($_POST['nom']);

    require("Manager.php");
    $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
   // $manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
    $rps = $manager->ajoutClient($tel, $nom, $pwd);
    if($rps != -1){
        echo "OK";
    }else{
        echo "NO";
    }

}

?>