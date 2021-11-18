<?php

    if(!empty($_POST['a'])){
        require('Manager.php');
        $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
       // $manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
        $commande = $manager->listeTcom();
?>
    <div class="row listco">
<?php
        for ($i=0; $i < count($commande); $i++) { 
            $com = $commande[$i];
            $client = $manager->client($com['idclient']);
            $produits = explode('$', $com['intitule']);
            $date = $com['date'];
            $qte = explode('$', $com['qte']);
            $valid = $com['valid'] == 1 ? "<p style=\"color:blue\" align=\"right\">Validée</p>" : "<p style=\"color:red\" align=\"right\">Pas Validée</p>"
            
?>

        <div class="bgcom music col-sm-6 text-muted pt-3">
            <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark"><?php echo $client['nom']; ?></strong>
            <?php echo $client['tel']; ?>
            </p>
            <div>
<?php
        for ($j=0; $j < count($produits); $j++) { 
            $produit = $manager->produit($produits[$j]);
?>

    <div class="d-flex music col-sm-6 text-muted pt-3">
        <img class="me-3 im_age" src="../images/marchandises/<?php echo $produit['image']; ?>" alt="" width="32" height="32">
        <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
          <strong class="d-block text-gray-dark" value="<?php echo $produit['nom']; ?>"><?php echo $produit['nom']; ?></strong>
          <?php echo $produit['description']; ?>
          <strong style="color:black;"><?php echo $produit['prix']. " XAF"; ?></strong>
          <strong style="color:black;">Quantité : <?php echo $qte[$j]. " Unité(s)"; ?></strong>
        </p>
        <input type="hidden" name="" class="hidden" value="<?php echo $produit['id']; ?>">
    </div>


<?php
        }
?>
            </div>
            <strong style="color:black;">Mode de Livraison : <?php echo $com['mode']; ?></strong><br>
            <?= $valid ?>
        </div>

<?php
        }
?>
</div>
<?php
    }
?>

<?php

    if(!empty($_POST['b'])){
        require('Manager.php');
        $manager = new Manager(new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles'));
       // $manager = new Manager(new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')));
        $commande = $manager->listeTVcom();
?>
    <div class="row listcom">
<?php
        for ($i=0; $i < count($commande); $i++) { 
            $com = $commande[$i];
            $client = $manager->client((int)$com['idclient']);
            $produits = explode('$', $com['intitule']);
            $qte = explode('$', $com['qte']);
            $date = $com['date'];
            $valid = $com['valid'] == 1 ? "<p style=\"color:blue\" align=\"right\">Validée</p>" : "<p style=\"color:red\" align=\"right\">Pas Validée</p>"
            
?>

        <div class="bgcom music col-sm-6 text-muted pt-3">
            <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark"><?php echo $client['nom']; ?></strong>
            <?php echo $client['tel']; ?>
            </p>
            <div>
<?php
        for ($j=0; $j < count($produits); $j++) { 
            $produit = $manager->produit($produits[$j]);
?>

    <div class="d-flex music col-sm-6 text-muted pt-3">
        <img class="me-3 im_age" src="../images/marchandises/<?php echo $produit['image']; ?>" alt="" width="32" height="32">
        <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
          <strong class="d-block text-gray-dark" value="<?php echo $produit['nom']; ?>"><?php echo $produit['nom']; ?></strong>
          <?php echo $produit['description']; ?>
          <strong style="color:black;"><?php echo $produit['prix']. " XAF"; ?></strong>
          <strong style="color:black;">Quantité : <?php echo $qte[$j]. " Unité(s)"; ?></strong>
        </p>
        <input type="hidden" name="" class="hidden" value="<?php echo $produit['id']; ?>">
    </div>


<?php
        }
?>
            </div>
            <strong style="color:black;">Mode de Livraison : <?php echo $com['mode']; ?></strong><br>
            <button class="btn btn-sm btn-secondary" id="valid$<?= $com['id'] ?>">Valider</button>
        </div>

<?php
        }
?>
</div>
<?php
    }
?>
    
    