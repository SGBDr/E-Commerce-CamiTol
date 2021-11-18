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
  <body class="text-center bg-light" >
    
<main class="form-signin ss">
  <div>
    <h1 class="h3 mb-3 fw-normal">CamiToles Sarl</h1>
    <img class="mb-4" src="images/logo.jpg" alt="" width="72">
    
    <h2 class="h4 mb-3 fw-normal"> <u>Se connecter</u></h2>

    <label for="inputEmail" class="visually-hidden">Téléphone</label>
    <input type="phone" id="phone" class="form-control" placeholder="Telephone" required autofocus>

    <label for="inputPassword" class="visually-hidden">Mot de passe</label>
    <input type="password" id="pwd" class="form-control" placeholder="Mot de passe" required>
    
    <div class="fw-normal">
      <div class="charge" id="charge">
        <div class="spinner-border text-danger" role="status">
            <span class="sr-only"></span>
        </div>
      </div>
      <small id="error"></small><p></p>
      <small><a href="indexN.php">Créer un compte maintenant?</a></small>
    </div>
    <button class="w-100 btn btn-sm btn-primary" id="connexion">Connexion</button><br><br>
    <button class="w-100 btn btn-sm btn-primary" id="visite">Visiter</button>
    <p class="mt-5 mb-3 text-muted small">&copy CamiToles - Depuis 2018</p>
  </div>
</main>
    
  </body>
  <!-- chargement du javascript -->
  <script src="js/FonctionsUtiles.js"></script>
  <script src="js/index.js"></script>
  <!--chargement des fichiers de jQuery min pour utiliser Ajax-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</html>
