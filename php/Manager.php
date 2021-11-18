<?php

class Manager{

    private $_db;

    public function __construct($db){
        $this->setDb($db);
    }

    public function setDb($db){
        $this->_db = $db;
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    public function estCompte($tel, $pwd){
        //on tranforme le numéro de téléphone en numbre
        $tel = (int) $tel;
        //on encode le mot de passe pour la comparaison en bd
        $pwd = sha1($pwd);
        //on execute la requete pour verifier si l'utilisateur existe
        $q = $this->_db->query('SELECT id, state FROM client WHERE tel = '.$tel.' AND pwd = \''.$pwd. '\'');
        $donnees = $q->fetch();
        if(is_array($donnees) && count($donnees) > 0){
            return [$donnees['id'], $donnees['state']];
        }else{
            return [-1, -1];
        }
    }

    public function listeClient(){
        $q = $this->_db->query('SELECT * FROM client');
        $list = [];
        while($donnees = $q->fetch())$list[] = $donnees; 
        return $list;
    }

    public function listeAdmin(){
        $q = $this->_db->query('SELECT * FROM client WHERE state = 1');
        $list = [];
        while($donnees = $q->fetch())$list[] = $donnees; 
        return $list;
    }

    public function Client($id){
        $q = $this->_db->query('SELECT * FROM client WHERE `id` = '.$id);
        $list = [];
        while($donnees = $q->fetch())$list = $donnees; 
        return $list;
    }

    public function produit($id){
        $q = $this->_db->query('SELECT * FROM produit WHERE `state` = 0 AND `id` = '.$id);
        $list = [];
        while($donnees = $q->fetch())$list = $donnees; 
        return $list;
    }

    public function listeTcom(){
        $q = $this->_db->query('SELECT * FROM commandes ORDER BY date DESC');
        $list = [];
        while($donnees = $q->fetch())$list[] = $donnees; 
        return $list;
    }

    public function listeTVcom(){
        $q = $this->_db->query('SELECT * FROM commandes WHERE valid = 0 ORDER BY date DESC');
        $list = [];
        while($donnees = $q->fetch())$list[] = $donnees; 
        return $list;
    }

    public function ajoutClient($tel, $nom, $pwd){
        $tel = (int)$tel;
        $pwd = sha1($pwd);

        $q = $this->_db->query('SELECT id FROM client WHERE nom = \''.$nom.'\'');
        $donnees = $q->fetch();
        if(is_array($donnees) && count($donnees) > 0){
            return -1;
        }else{
            $q = $this->_db->prepare('INSERT INTO `client` (`id`, `nom`, `tel`, `pwd`, `state`) VALUES (NULL, :nom, :tel, :pwd, 0)');
            $q->bindValue(':nom', $nom);
            $q->bindValue(':tel', $tel);
            $q->bindValue(':pwd', $pwd);
            $q->execute();
            return 1;
        }

    }

    public function ajoutAdmin($tel, $nom, $pwd){
        $tel = (int)$tel;
        $pwd = sha1($pwd);

        $q = $this->_db->query('SELECT id FROM client WHERE nom = \''.$nom.'\'');
        $donnees = $q->fetch();
        if(is_array($donnees) && count($donnees) > 0){
            return -1;
        }else{
            $q = $this->_db->prepare('INSERT INTO `client` (`id`, `nom`, `tel`, `pwd`, `state`) VALUES (NULL, :nom, :tel, :pwd, 1)');
            $q->bindValue(':nom', $nom);
            $q->bindValue(':tel', $tel);
            $q->bindValue(':pwd', $pwd);
            $q->execute();
            return 1;
        }

    }



    public function valideCom($id){
        $q = $this->_db->prepare('UPDATE commandes SET valid = 1 WHERE id = :id');
        $q->bindValue(':id', $id);
        return $q->execute();
    }

    public function suppProd($id){
        $q = $this->_db->prepare('UPDATE produit set state = 1 WHERE id = :id');
        $q->bindValue(':id', $id);
        return $q->execute();
    }
    
    public function ajoutCommande($idclient,$intitule, $qte, $mode){
        $idclient = (int)$idclient;
        $q = $this->_db->prepare('INSERT INTO `commandes` (`id`, `idclient`, `intitule`, `date`, `valid`, `qte`, `mode`) VALUES (NULL, :idclient, :intitule, NULL, 0, :qte, :mode)');
        $q->bindValue(':idclient', $idclient);
        $q->bindValue(':intitule', $intitule);
        $q->bindValue(':qte', $qte);
        $q->bindValue(':mode', $mode);
        return $q->execute();
    }

    public function ajouteProduit($nom, $prix, $qte, $desc, $image){
        $q = $this->_db->prepare('INSERT INTO `produit` (`id`, `nom`, `prix`, `qte`, `description`, `image`) VALUES (NULL, :nom, :prix, :qte, :description, :image)');
        $q->bindValue(':nom', $nom);
        $q->bindValue(':prix', $prix);
        $q->bindValue(':qte', $qte);
        $q->bindValue(':description', $desc);
        $q->bindValue(':image', $image);
        return $q->execute();
    }


}





?>