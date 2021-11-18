
<?php

if(!empty($_POST['b'])){
    $bd = new PDO("mysql:host=mysql-mytol.alwaysdata.net;dbname=mytol_bd;charset=utf8", 'mytol', 'camitoles');
    //$bd = new PDO('mysql:host=localhost;dbname=camitol', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $q = $bd->query('SELECT * FROM produit');

?>
<div class="row listrpro">
<?php

    while($produit = $q->fetch()){
        
?>
<style>
    .bb{
        width: 100px;
        height: 50px;
        background-color: blue;
        border-radius: 10px;
        border: none;
    }
</style>

<div class="d-flex music col-sm-6 text-muted pt-3">
    <img class="me-3 im_age" src="../images/marchandises/<?php echo $produit['image']; ?>" alt="" width="100">
    <p class="pb-3 mb-0 me-3 small lh-sm border-bottom">
      <strong class="d-block text-gray-dark" value="<?php echo $produit['nom']; ?>"><?php echo $produit['nom']; ?></strong>
      <?php echo $produit['description']; ?>
      <strong class="d-block" style="color:black;"><?php echo $produit['prix']. " XAF"; ?></strong>
    </p>
    <button class="bb" name="" id="supp$<?php echo $produit['id']; ?>">Supprimer</button>
</div>

<?php
    }
?>
</div>
<?php

}
?>