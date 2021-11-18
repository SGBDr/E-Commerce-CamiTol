<?php

    if(!empty($_POST['a'])){
        
        require('Manager.php');
        $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
        //$manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
        $listeClient = $manager->listeClient();
?>
    <div class="row listClient">
<?php
        for ($i=0; $i < count($listeClient); $i++) { 
            $client = $listeClient[$i];
?>
        
        <div class="d-flex bgcom music col-sm-6 text-muted pt-3">
            <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark"><?php echo $client['nom']; ?></strong>
            <?php echo $client['tel']; ?>
            </p>
            <input type="hidden" name="" class="hidden" value="<?php echo $client['id']; ?>">
        </div>
        
<?php
        }
    }  
?>
    </div>