<?php
session_start();
if(!empty($_SESSION['id']))$id = $_SESSION['id'];
else $id = -1;

if(!empty($_SESSION['state']))$state = $_SESSION['state'];
else $state = -1;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site de E-Commerce">
    <meta name="author" content="Mazifa Mba Marcelle Chantal">
    <link rel="shortcut icon" href="../images/fav.jpg"/>
    <title>MyTol-Camitoles</title>
    
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- chargement des fichiers en référence avec le jquery-->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
    #myCarousel{
      padding-bottom: 20%;
    }

    .imm{
      height: 100px;
      width: auto;
    }
    .im_age{
    padding: 2px;
    border: 5px solid gray;
  }
  main{
    background-color: whitesmoke;
  }
  .ffg{
    background-color: gray;
  }
    </style>
    <!-- chargement du css -->
    <link href="../css/accueil.css" rel="stylesheet">

  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark ffg fixed-top">
  <input type="hidden" id="hidden" value="<?php echo $id; ?>">
  <button data-toggle="modal" class="fade" id="modd" data-target="#addd"></button>
    <div class="container-fluid">
      <p class="navbar-brand" title="CamiTol entreprise d'équipement en construction">MyTol</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
      <style>
          #rech{
            width: 300px;
            background-color: whitesmoke;
            margin-right: 400px;
          }
          #rech:focus{
            background-color: white;
          }
        </style>
        <input type="text" name="" class="form-control" placeholder="Recherche Produit" id="rech">
        <script>
          document.getElementById('rech').addEventListener('input', (e) => {
            console.log('jh')
            let nom = $('#rech').val()

            let pp = "<div class=\"row liste\">"

            for(let i = 1 ; i < listP.length ; i++){
              pr = listP[i]
              try{
                if(pr[1].toLowerCase().indexOf(nom.toLowerCase()) >= 0){
                pp += '<div class="d-flex music col-sm-6 text-muted pt-3">'+
                      '<img class="me-3 im_age" src="../images/marchandises/' + pr[4] + '" alt="" width="140">'+
                      '<p class="pb-3 mb-0 me-3 small lh-sm border-bottom">'+
                        '<strong class="d-block text-gray-dark" value="' + pr[1] + '">' + pr[1] + '</strong>'+
                         pr[3] +
                        '<strong class="d-block" style="color:black;">' + pr[5] + ' XAF</strong>'+
                      '</p>'+
                      '<input type="hidden" name="" class="hidden" value="' + pr[0] + '">'+
                  '</div>'
                }
              }catch($erro){
                console.log($error)
              }
            }
            
            pp += "</div>"

            $('.liste').replaceWith(pp)

          })
        </script>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" id="accueil" href="#liste"><button type="button" class="btn btn-sm btn-secondary">Accueil</button></a>
          </li>
          <?php if($state == 1){ ?>
          <li class="nav-item active">
            <a class="nav-link" id="admin" href="administration.php"><button type="button" class="btn btn-sm btn-secondary">Admin</button></a>
          </li>
          <?php } ?>
          <?php if($id != -1){ ?>
          <li class="nav-item active">
            <a class="nav-link" href="deconnexion.php" tabindex="-1" aria-disabled="true"><button type="button" class="btn btn-sm btn-secondary">Déconnexion</button></a>
          </li>
          <?php } ?>
          <li class="nav-item active">
            <button id="btn_panier" class="btn btn-sm btn-secondary">
              Panier <span class="badge badge-dark" id="panier">0</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>

  <style>
    .c{
      width: 100%;
      padding-left: 0px;
      padding-right: 0px;
      margin: 0px;
      height: 300px;
    }

    .c1{
      height: 100%;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
    }

    .c2{
      height: 100%;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
    }

    .dd{
      display: none;
      transition-duration: 2s;
    }    

    .sup{
      position: absolute;
      top: 100px;
      left: 100px;
    }

    .c_item{
      width: 100%;
      height: 100%;
    }


  </style>


  <div class="c">
    <div class="c_item oo a1 dd">
      <img src="../images/couvert.jpg" class="c1" alt="">
    <div class="sup">
      <h1>Numéro 1 dans le domaine</h1>
      <p>Depuis nos début en 2018</p>  
    <?php if($id === -1){ ?><p><a class="btn btn-lg btn-primary" href="../index.php" role="button">Connectez-Vous</a></p><?php } ?></div>
    </div>
    <div class="c_item  a2">
    <img src="../images/index_bg.jpg" class="c2" alt="">
    <div class="sup">
      <h1>Passez des commandes</h1>
      <p>Nous vous revenons dés que possible pour la suite</p>
      <?php if($id === -1){ ?><p><a class="btn btn-lg btn-primary" href="../index.php" role="button">Connectez-Vous</a></p><?php } ?></div>
    </div>
  </div>


  <div class="container-fluid marketing">


  <div class="my-2 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom t_h pb-2 mb-0"></h6>
    <div class="row liste">
      <div class="" id="">
          <div class="spinner-border text-danger" role="status">
              <span class="sr-only"></span>
          </div>
      </div>
    </div>
  </div>

  </div>


  <!-- FOOTER -->
  <footer class="container row text-center">
    <p class="float-end col-3 text-center"><a href="#">Remonter</a></p>
    <p class="col-5 text-center">&copy CamiToles - Depuis 2018 <br> <img class="me-3" align="center" src="../images/logo.jpg" alt="" width="60" height="50"></p>
    <div class="col-4 text-center">
          <h2>Contact :</h2>
          <h5>6 98 90 64 75</h5>
    </div>
  </footer>
</main>


      
    <!--chargement des fichiers de jQuery min pour utiliser Ajax-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- chargement du javascript -->
    <script src="../js/initialisation.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/accueil.js"></script>
  </body>
</html>
