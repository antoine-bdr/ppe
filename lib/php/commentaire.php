<?php
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //Connexion à la BDD
session_start (); //On ouvre la session

if (isset($_POST['boutoncom'])) { //Si l'utilisateur valide

          //On récupère les variables du formulaire
          $tempsPasse = htmlspecialchars(trim($_POST['tempsPasse']));
          $commentaire = htmlspecialchars(trim($_POST['commentaire']));
      
          //Insertion des données dans la table controler
          $req3 = $bdd->prepare('INSERT INTO controler(tempsPasse, commentaire) VALUES(:tempsPasse, :commentaire)');
          $req3->execute(array(
              'tempsPasse' => $tempsPasse,
              'commentaire' => $commentaire
               ));


        $getId = intval($_GET['id']); //On récupère l'id de l'intervention en GET
        $req = ("UPDATE intervention SET validation = 1 WHERE numIntervention = ".$getId.""); //On passe la validation de l'intervention de 0 à 1
        $bdd -> exec($req);

        header('Location: interventionsaff.php');//Redirection à la page initiale
        
} 
        if ($_SESSION['idConnexion']!=0 && $_SESSION["id_droit"]== 1 || $_SESSION["id_droit"]== 2) {
          //Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
?> 
<html>
    <head>
        <!-- En-tête de la page -->
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
    <body class="index">
    	<div class="banniere">
        <center><a href="accueil.php"><img src="images/logo.png" class="arrondi"></a></center>
    </div>

    <?php include("../menu/menu.php"); ?>

<form method="POST">
	<fieldset>
      <table>
          <h1>Informations</h1>
        <tr>
          <th><br><label for="tempsPasse">Temps passé : </label></th>
          <td><br><input type="text" name="tempsPasse"/></td>  
        </tr>

        <tr>
        	<th><br><label for="commentaire">Commentaire : </label></th>
        	<td><br><br><textarea name="commentaire" rows="10" cols="50" /></textarea></td>
        </tr>

        <tr>
         <td><button type="submit" name="boutoncom" style="background-color : darkolivegreen" class="btn btn-primary"><b>Ajouter</b></button></td>
       </tr>

    </table>
</fieldset>

<div border="solid" class="footer">
  <br>
  TEAM CR ©
    <br><br>
</div>

</body>
    <script src="../js/www/bootstrap/js/jquery.js"></script>
    <script src="../js/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/www/js/bootstrap.min.js"></script>
</html>
<?php }else header('Location: index.php');
      //Sinon il est redirigé par l'index ?>