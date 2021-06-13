<?php
    require_once 'config.php';
    
    if (isset($_POST['valideform']))
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

    </body>
</html>