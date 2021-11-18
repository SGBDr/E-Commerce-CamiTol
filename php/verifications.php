<?php
session_start();

if(!empty($_POST["tel"]) && !empty($_POST["pwd"])){

    $tel = htmlspecialchars($_POST['tel']);
    $pwd = htmlspecialchars($_POST['pwd']);

    require("Manager.php");
    $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
    //$manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
    $rps = $manager->estCompte($tel, $pwd);
    if($rps[0] != -1){
        $_SESSION['id'] = $rps[0];
        $_SESSION['state'] = $rps[1];
        echo "OK";
    }else{
        echo "NO";
    }


}



?>