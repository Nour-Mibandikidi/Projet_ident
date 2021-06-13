<?php
session_start();


    require_once 'config.php';

    if (isset($_SESSION['id']))
    {
      




?>


<!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Mes client</title>
        <link rel="stylesheet" href="style_gestion/stylegeneral.css">
        <link rel="stylesheet" href="style_gestion/styleclient.css">
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
                        <a class="nav-link" aria-current="page" href="profil.php">Mon profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="#l">Clients</a>
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
    <h2>liste des client</h2>
</div> 

<div class="menu">

<div class="search">
   
    <div class="container">
        <br/>
       
        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8">
                                <form class="card card-sm">
                                    <div class="card-body row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <i class="fas fa-search h4 text-body"></i>
                                        </div>
                                        <!--end of col-->
                                        <div class="col">
                                            <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                                        </div>
                                        <!--end of col-->
                                        <div class="col-auto">
                                            <button class="btn btn-lg btn-success" type="submit">Rechercher un client</button>
                                        </div>
                                        <!--end of col-->
                                    </div>
                                </form>
                            </div>
                            <!--end of col-->
                        </div>
                        
    </div>
    
</div>

</div>


</body>


</html>

<?php

}else{
    Header('Location:connexion.php');
}

?>