<?php
session_start();

if(!empty($_POST["id"]) && !empty($_POST["com"])){

    $idclient = $_POST['id'];
    $intitule = $_POST['com'];
    $qte = $_POST['qte'];
    $mode = $_POST['mode'];

    require("Manager.php");
    $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
   // $manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
    $rps = $manager->ajoutCommande($idclient, $intitule, $qte, $mode);

    if($rps){
        echo "OK";
    }else{
        echo "NO";
    }


}

?>