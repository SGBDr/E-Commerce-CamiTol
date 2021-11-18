<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site de E-Commerce">
    <meta name="author" content="Mazifa Mba Marcelle Chantal">
    <link rel="shortcut icon" href="images/fav.jpg"/>
    <title>MyTol-Camitoles</title>
    <!-- chargement des fichiers en référence avec le jquery-->
    <script src="js/jquery.js"></script>

    

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <!-- chargement de la fueille de style css -->
    <link href="css/index.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <div>
    <h1 class="h3 mb-3 fw-normal">CamiToles</h1>
    <img class="mb-4" src="images/fav.jpg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Créez-vous un compte</h1>

    <label for="inputEmail" class="visually-hidden">Nom</label>
    <input type="nom" id="nom" class="form-control" placeholder="Nom" required autofocus>

    <label for="inputEmail" class="visually-hidden">Téléphone</label>
    <input type="number" id="tel" class="form-control" placeholder="Telephone" required autofocus>

    <label for="inputEmail" class="visually-hidden">Mot de Passe</label>
    <input type="password" id="pwd" class="form-control" placeholder="Mot de passe" required autofocus>

    <div class="fw-normal">
      <div class="charge" id="charge">
        <div class="spinner-border text-danger" role="status">
            <span class="sr-only"></span>
        </div>
      </div>
      <small id="error"></small><p></p>
      <small><a href="index.php">J'ai déjà mon compte, je me connecte</a></small>
    </div>
    <button class="w-100 btn btn-sm btn-primary" id="creer">Connexion</button>
    <p class="mt-5 mb-3 text-muted small">&copy CamiTol - Depuis 2018</p>
  </div>
</main>


    
  </body>
  <!-- chargement du javascript -->
  <script src="js/FonctionsUtiles.js"></script>
  <script src="js/index.js"></script>
  <!--chargement des fichiers de jQuery min pour utiliser Ajax-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</html>
