<?php
session_start();

if(!empty($_SESSION['id'])){
  if($_SESSION['state'] == 1){
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site de E-Commerce">
    <meta name="author" content="Mazifa Mba Marcelle Chantal">
    <link rel="shortcut icon" href="../images/fav.jpg"/>

    <title>MyTol-Admin-Camitoles</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- chargement des fichiers en référence avec le jquery-->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .nv{
        display: none;
      }

      .nvs{
        display: none;
      }

      .ss{
        background-color: gray;
        margin: 5px;
      }

      .im_age:hover, .im_:hover{
        position: absolute;
        z-index: 10;
        transition-duration: 1s;
        width: 200px;
        height: auto;
        border: 5px solid whitesmoke;
        border-radius: 5px;
      }

      img{
        cursor: pointer;
      }

      .bgcom{
        background-color: whitesmoke;
      }

      .bgcom:hover{
        transform: scale(0.8);
        transition-duration: 0.8s;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- chargement du css -->
    <link href="../css/administration.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">CamiToles</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="accueil.php">Client</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item ss">
            <a id="com" class="nav-link " aria-current="page" href="#">
              <span data-feather="home"></span>
              Commandes
            </a>
          </li>
          <li class="nav-item ">
            <a id="apro" class="nav-link " href="#">
              <span data-feather="file"></span>
              Ajouter Produit
            </a>
          </li>
          <li class="nav-item ">
            <a id="rpro" class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Retirer Produit
            </a>
          </li>
          <li class="nav-item ">
            <a id="cli" class="nav-link" href="#">
              <span data-feather="users"></span>
              Liste Client
            </a>
          </li>
          <li class="nav-item ">
            <a id="con" class="nav-link" href="#">
              <span data-feather="users"></span>
              Liste De Toutes Les Commandes
            </a>
          </li>
          <li class="nav-item ">
            <a id="adm" class="nav-link" href="#">
              <span data-feather="users"></span>
              Admin
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id="titre" class="h2"></h1>
      </div>

      <div>
        <div id="comk">
          <div class="row listco">
          </div>
        </div>

        <div id="aprok">
        </div>

        <div id="rprok">
          <div class="row listrpro">
          </div>
        </div>

        <div id="clik">
          <div class="row listClient">
          </div>
        </div>

        <div id="conk">
          <div class="row listcom">
          </div>
        </div>

        <div id="admk">
          <div class="row listadm">
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

   
  </body>
      <!--chargement des fichiers de jQuery min pour utiliser Ajax-->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

      <!-- chargement du javascript -->
      <script src="../js/initialisation.js"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/administration.js"></script>
</html>

<?php
    }else{header('Location: accueil.php'); }
  }else{header('Location : ../index.php');}
?>
