 <?php
// Page d'index du site.
session_start ();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', '');
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
        <link rel="stylesheet" href="index.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
  <button type="submit" class="btn btn-md" name="connexion"> Se connecter</button>
</form>
</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>

</html>
