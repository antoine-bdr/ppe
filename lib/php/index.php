 <?php
// Page d'index du site.
session_start (); //On ouvre la session

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=code_de_la_route;charset=utf8', 'root', '');//Connexion à la BDD
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
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
<body>

<form action='connexion.php' method='POST' class="formulaire">
    <?php 
if (isset($_GET['error'])){
  ?><div>Mot de passe ou login incorrect !</div><?php
}
  ?>
  <div class="form-group">
    <label for="login">Login :</label>
    <input required = "required" type="text" class="form-control" name="login">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe :</label>
    <input required = "required" type="password" class="form-control" name="mdp">
  </div>
  
  <button type="submit" class="btn btn-primary" name="connexion" style="background-color : darkolivegreen" id="boutonConnexion"><b>Se connecter</b></button>
</form>
</body>
    <script src="../js/www/bootstrap/js/jquery.js"></script>
    <script src="../js/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/www/js/bootstrap.min.js"></script>

</html>
