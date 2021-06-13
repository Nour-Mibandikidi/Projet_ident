<?php
session_start();

    require_once 'config.php';

    if (isset($_GET['id']))
    {
      
       $getid = intval($_GET['id']);
       $requser = $bdd->prepare("SELECT * FROM  user WHERE id_user =?");
       $requser->execute(array($getid));
       $userinfo = $requser->fetch();
    


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Profil</title>
        <link rel="stylesheet" href="style_gestion/stylegeneral.css">
        <link rel="stylesheet" href="style_gestion/styleprofil.css">
        <link rel="icon" type="image/png" href="../images/house.png">
    </head>
    <body>

<!--------------------------navbar----------------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="#">NJ.GESTION</a>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Mon profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="client.php">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rappelez-moi</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>

<!-------------------------------------Contenair---------------------------->

<div class="titrepage">
                  <h2>Bienvenue sur votre profil  <?php echo $userinfo['prenomUser'].' '.$userinfo['nomUser'] ?></h2>
</div>

      
<div class="container">
    <div class="main-body">


    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $userinfo['prenomUser'].' '.$userinfo['nomUser'] ?></h4>
                      <p class="text-secondary mb-1"><?php echo $userinfo['fonction'] ?> NJ.travaux</p>
                      <p class="text-muted font-size-sm"><?php echo $userinfo['emailUser'] ?></p>
                      <button class="btn btn-primary"><a style="color:white ;text-decoration: none" href="deconnexion.php"> Deconnexion</a></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@<?php echo $userinfo['nomUser'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary"><?php echo $userinfo['prenomUser'] ?>_Dev</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><?php echo $userinfo['prenomUser'].' '.$userinfo['nomUser'] ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $userinfo['nomUser'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prenom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $userinfo['prenomUser'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date de naissance</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $userinfo['birthUser'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $userinfo['emailUser'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mot de passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      *********************
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="#">Editer le profil</a>
                    </div>
                  </div>
                </div>
              </div>

              
              </div>



            </div>
          </div>

        </div>
    </div>

















    </body>

<?php
 }
 else {
     header('Location: connexion.php');
 }
?>
</html>