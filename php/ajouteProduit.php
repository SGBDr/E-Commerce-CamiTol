<?php

    if(isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']) AND isset($_FILES['image']) AND isset($_POST['qte'])){

      $prix = htmlspecialchars($_POST['prix']);
      $desc = htmlspecialchars($_POST['desc']);
      $nom = htmlspecialchars($_POST['nom']);
      $qte = htmlspecialchars($_POST['qte']);
      $fil = $_FILES['image'];
      
      $extend = array('jpg','gif','png','jpeg','webp','jfif');
      $upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($upload, $extend) AND $fil['size'] < 250000){
        $chemin = "../images/marchandises/".$fil['name'];
        $result = move_uploaded_file($fil['tmp_name'], $chemin);
        if($result){
            require('Manager.php');
            $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
            //$manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
            $rps = $manager->ajouteProduit($nom, $prix, $qte, $desc, $fil['name']);
            if($rps)echo "Le produit est Ajouté !";
            else echo "Un problème inconnue est survenu !";
        }else{
          echo 'Nous n\'avons pas reussi a accéder au fichier';
        }
      }else{
        echo 'La taille ou alors le type de votre image pose problème';
      }

    }

?>