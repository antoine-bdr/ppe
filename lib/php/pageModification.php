<?php
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0){
//Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //connection à la bdd
$getid = $_GET['id'];

$requser = $bdd -> prepare ('SELECT * FROM connexion, employe
                            WHERE connexion.matricule = employe.matricule
                            AND connexion.matricule = ?');
$requser -> execute(array($getid));
$user = $requser -> fetch();

if (isset($_POST['newboutonconnect'])) {
  include('modifProfil.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/index.css"/>
        <link rel="stylesheet" href="../css/menu.css">
        <link href="../js/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../js/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="../js/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <title>Projet PPE</title>
    </head>

  <body>
   <div class="banniere">
        <center><a href="accueil.php"><img src="../images/logo.png" class="arrondi"></a></center>
    </div>
    <?php
    include('../menu/menu.php');
    ?>
    <div class="formPosition">
      <!-- formulaire de modification des infos personnelles du profil connecté  -->
    <form action="#" method="POST" class="form-horizontal">

        <center>
          <h1>Modification(s) des informations personnelles de <?php echo $user['login']; ?></h1>
        </center>
        <br>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Nom :</b><input type="text" class="form-control" name="newnom" value="<?php echo $user['nomEmploye']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Prenom :</b><input type="text" class="form-control" name="newprenom" value="<?php echo $user['prenomEmploye']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Adresse :</b><input type="text" class="form-control" name="newadresse" value="<?php echo $user['adresseEmploye']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Login :</b><input type="text" class="form-control" name="newlogin" value="<?php echo $user['login']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Mot de passe :</b><input type="password" class="form-control" name="newMdp1" value="<?php echo $user['mdp']; ?>">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Confirmation de votre mot de passe :</b><input type="password" class="form-control" name="newMdp2" value="<?php echo $user['mdp']; ?>">
                </div>
        </div>
          <center>
            
            <br><button type="submit" name="newboutonconnect" class="btn btn-primary" style="background-color: darkolivegreen"><b>Modifier le profil</b></button>
            
           
                 <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                ?>
          </center>
    </form>
    </div>

    </body>
</html>
<?php

}else{
  header("Location: index.php");
    //Sinon il est redirigé par l'index
}
?>
