<?php
session_start();

    require_once 'config.php';

    if(isset($_POST['valideform']))
    {
      
     $email = htmlspecialchars($_POST['email']);
     $password = sha1($_POST['password']);
      
     if(!empty($email) AND (!empty($password)))
     {

        $requser = $bdd->prepare("SELECT * FROM user WHERE emailUser = ? AND passwordUser = ?");
        $requser->execute(array($email, $password));
        $userexit = $requser->rowCount();
          if($userexit == 1)
          {
                
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id_user'];
            $_SESSION['nom'] = $userinfo['nomUser'];
            $_SESSION['prenom'] = $userinfo['prenomUser'];
            $_SESSION['datenaiss'] = $userinfo['birthUser'];
            $_SESSION['email'] = $userinfo['emailUser'];
            $_SESSION['password'] = $userinfo['passwordUser'];
            $_SESSION['fonction'] = $userinfo['fonction'];
            $_SESSION['dateCreeUser'] = $userinfo['dateCreeUser'];
            header('Location: profil.php?id='.$_SESSION['id'] );

          }else
          {
                  $erreur = "adresse mail  ou mot de passe incorect" ;
          }


     }else
     {
         $erreur = "Tout les champs doivent etre remplis ! " ;
     }

    }else{
        
    }

//inscrinption
if (isset($_POST['valideforme']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date']) AND !empty($_POST['fonction']) AND   !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']))
        {
           $nom = htmlspecialchars($_POST['nom']);
           $email = htmlspecialchars($_POST['email']);
           $email2 = htmlspecialchars($_POST['email2']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $date = htmlspecialchars($_POST['date']);
           $fonction = htmlspecialchars($_POST['fonction']);
           $password = sha1($_POST['password']);

            $reqemail = $bdd->prepare("SELECT * FROM user WHERE emailUser = ?");
            $reqemail->execute(array($email));
            $emailexist = $reqemail->rowCount();

            if($emailexist == 0)
            {
               if($email == $email2)
              {
                 $inseruser = $bdd->prepare( "INSERT INTO user(nomUser,prenomUser,birthUser,emailUser,passwordUser,fonction) VALUES(?, ?, ?, ?, ?, ?) ");
                 $inseruser->execute(array($nom , $prenom , $date , $email , $password , $fonction ,));
                 $erreur = "votre compte a eté crée";
              }else
              {
                  $erreur = "Vos adresse mail ne correspande pas !";
              } 
            }
            else
            {
                $erreur = "cette adresse mail es deja utilisé" ;
            }
              


        }else{
            $erreur = 'Tout les champs doivent etre complétés !';
        }
    }




?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="icon" type="image/png" href="../images/house.png">
        <link rel="stylesheet" href="style_gestion/styleCo.css">
    </head>
    <body>

   
    <h2>Bienvenue sur l'application de gestion de NJ.Travaux</h2>
    <?php
             if(isset($erreurs))
             {
                 echo '<font color="red">'.$erreur.'</font';
             }
            ?>
            <div class="container" id="container">
    <!----------------Creation de compte--------------------->
                <div class="form-container sign-up-container">
                    <form action="" method="POST">
                        <h1>Crée un compte</h1>
                    
                        <input type="text" name="nom" placeholder="votre nom"/>
                        <input type="text" name="prenom" placeholder="votre prenom"/>
                        <input type="date" name="date" placeholder="date de nassance"/>
                        <input type="email" name="email" placeholder="votre email"/>
                        <input type="email" name="email2" placeholder="Confirmez email"/>
                        <input type="text" name="fonction" placeholder="votre fonction"/>
                        <input type="password" name="password" placeholder="votre mot de passe"/>
                        <button name="valideforme" >s'inscrire</button>
                        
                    </form>
                </div>
    <!----------------connexion--------------------->
                <div class="form-container sign-in-container">
                    <form action="" method="POST">
                        <h1>Connexion</h1>
                    
                    
                        <input  type="email" name="email" placeholder="Entrez votre Email" />
                        <input type="password" name="password" placeholder="votre mot de passe"   />
                        <a href="#">mot de passe oublié?</a>
                        <button name="valideform" >Se connecter</button>
                        <!--affichage des erreur de connection--->
                        
                    </form>
                </div>
        <!----------------Hoverpage--------------------->
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Hey on se connait!</h1>
                            <p>veuillez vous connecter avec vos informations personnelles.</p>
                            <button class="ghost" id="signIn">Connexion</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Salut, l'amis!</h1>
                            <p>Entrez vos données personnelles</p>
                            <button class="ghost" id="signUp">inscription</button>
                        </div>
                    </div>
                </div>
            </div> <br>

            <?php
                            if(isset($erreur))
                            {
                                echo '<font size="10px" color="red">'.$erreur.'</font';
                            }
                        ?>
                             </form>
        <!----------------footer--------------------->
            <footer>
                <p> @copyright  Tout droit réservé  NJ.TRAVAUX</p>  
            </footer>


  <!----------------footer-------------------
         <div class="section">
             <h2>Connexion</h2>


             <form action="" method="POST">

                 <input type="email" name="email" placeholder="Entrez votre Email">
                 <input type="password" name="password" placeholder="votre mot de passe" >

                 <input id="btnConnexion" type="submit" value="Connexion" name="valideform">

               
             </form>
         </div>

   -->



          <script src="javascript/scriptCo.js"></script>   
    </body>
</html>