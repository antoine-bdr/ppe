 <?php
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0){
  //Si l'utilisateur c'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un assistant alors il peut accéder au site
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
        <center><a href="accueil.php"><img src="../images/logo.png" class="arrondi"></a></center>
    </div>

  <?php include('../menu/menu.php'); ?>

  <div class="img">
  <center><a href="virer.php"><img src="../images/logo.png" class="arrondi1"></a></center>
</div>

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
<?php

}else{
  header("Location: index.php");
  //Sinon redirection vers l'index
}
?>
