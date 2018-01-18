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
<<<<<<< HEAD
  <!-- Menu des pages-->
=======
  <!-- Menu de la page -->
>>>>>>> 216d1d4fc612ea17c71ee62e3850b5ebca913745
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cash Cash</a>
    </div>
      <ul class="nav navbar-nav">
<<<<<<< HEAD
       <?php
         if ($_SESSION['id_droit'] == 3 || $_SESSION['id_droit'] == 1) {
         ?>
=======
       
>>>>>>> 216d1d4fc612ea17c71ee62e3850b5ebca913745
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fiche client
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="rechercheclient.php">Rechercher une fiche client</a></li>
            <li><a href="listeclient.php">Liste des clients</a></li>
          </ul>
        </li>
        <li><a href="#">Liste des visites</a></li>
        <li><a href="#">Interventions</a></li>
        <li><a href="#">Statistiques</a></li>
      </ul>

<<<<<<< HEAD

        <ul class="nav navbar-nav">
       <?php
         if ($_SESSION['id_droit'] == 2 || $_SESSION['id_droit'] == 1) {
         ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Interventions affectées
          <span class="caret"></span></a>
        </li>
      </ul>

=======
>>>>>>> 216d1d4fc612ea17c71ee62e3850b5ebca913745
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profil
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profil.php">Votre profil</a></li>
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