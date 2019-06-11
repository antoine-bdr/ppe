<?php
session_start();
if ($_SESSION['idConnexion']!=0){
//Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //connection à la bdd
  // requete qui permet de selectionner les attributs de la table connexion et employe
  $getid = intval ($_GET['id']);
  $req = $bdd -> prepare ('SELECT * FROM connexion, employe
                            WHERE connexion.matricule = employe.matricule
                            AND connexion.matricule = ?');
  $req ->execute(array($getid));
  $user = $req -> fetch(PDO::FETCH_ASSOC);
?>

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
    <!--<a class="retour" href="javascript:history.go(-1)"><img src="images/retour.png"></a>-->
    <!-- formulaire qui permet de visualiser les infos personnelles du profil connecté -->
    <form method="POST" action="#">
      <section>
        <center>
          <h1 style="color:darkgreen">Informations personnelles de <?php echo $user['login']; ?></h1>
        </center>
        <br>

        <div class="infoProfil">
          <b>Nom :</b> <?php echo $user['nomEmploye']; ?><br>
          <b>Prenom :</b> <?php echo $user['prenomEmploye']; ?><br>
          <b>Adresse :</b> <?php echo $user['adresseEmploye']; ?><br>
          <b>Date d'embauche :</b> <?php echo $user['dateEmbauche']; ?><br>
          <b>Login :</b> <?php echo $user['login']; ?><br>
          <b>Mot de passe :</b> 
          <?php 
		  $etoile='';
          for($i=0; $i<strlen($user['mdp']); $i++)
          {
            $etoile=$etoile ."•";
          }
          echo $etoile; ?>
          <br>

          <?php
            if(isset($_SESSION['idConnexion']) AND $user['idConnexion'] == $_SESSION['idConnexion'])
            {
          ?>
            
            <br>
            <a href="pageModification.php?id=<?php echo $_SESSION['matricule']; ?>" class="btn-default2">Editer mon profil </a><br>

          <?php
            }
          ?>
        </div>

    </section>    
  </form>
  </body>
</html>
<?php

}else{
  header("Location: index.php");
    //Sinon il est redirigé par l'index
}
?>
