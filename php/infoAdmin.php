<?php

    if(!empty($_POST['a'])){
        
        require('Manager.php');
        $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
       // $manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
        $listeClient = $manager->listeAdmin();
?>
    <div class="row listadm">
    <div class="col-6">
        <div>
<?php
        for ($i=0; $i < count($listeClient); $i++) { 
            $client = $listeClient[$i];
?>
        
        <div class="d-flex bgcom music col-sm-6 text-muted pt-3">
            <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark"><?php echo $client['nom']; ?></strong>
            <?php echo $client['tel']; ?>
            </p>
            <input type="hidden" name="" id="hidden" class="hidden" value="<?php echo $client['id']; ?>">
            <button class="btn btn-sm btn-danger" id="dele$<?php echo $client['id']; ?>">Supprimer</button>
        </div>
        
<?php
        }
    }  
?>  
            </div>
        </div>
        <div class="col-6">
            <div class="form-control text-center" align="center">
                <input type="text" name="" placeholder="Le nom" id="no_m"><br><br>
                <input type="number" name="" placeholder="00" id="t_el"><br><br>
                <input type="password" name="" placeholder="* * * *" id="p_wd"><br><br>
                <button class="btn btn-lg btn-secondary" id="add$ty">Ajouter</button>
            </div>
        </div>
    </div>