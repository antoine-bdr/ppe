<?php
session_start();
if ($_SESSION['idConnexion']!=0){

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
  <!-- Menu de la page -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cash	Cash</a>
    </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Accueil</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <!-- Menu déroulant -->
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profil.php?id=<?php echo $_SESSION['id_connexion']; ?>">Votre profil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
  </div>
</nav>
</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>
<?php
=======
  include('menu.php');

>>>>>>> ee1e6544d4d526e2cfda6e74879e1a87f50f072a
}else{
  header("Location: index.php");
}
?>
