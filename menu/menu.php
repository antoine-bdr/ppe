<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CashCash</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Intervention affecté</a></li>
      <li><a href="#">Fiche client</a></li>
      <li><a href="#">Liste visite</a></li>
      <li><a href="#">Intervention</a></li>
      <li><a href="#">Statistique</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-align: center; color: darkseagreen"><span class="glyphicon glyphicon-log-in"></span> Profil de <?php echo $_SESSION['login']; ?> <span class="caret"></span></a>
    <ul class="dropdown-menu">
    <?php
    if ($_SESSION['id_droit'] == 2) {
    ?>
        <li style="text-align: center"><a href="profil.php?id=<?php echo $_SESSION['id_connexion']; ?>">Mon profil</a></li>
    <?php 
    }elseif ($_SESSION['id_droit'] == 3) {
    ?>
        <li style="text-align: center"><a href="profilClient.php?id=<?php echo $_SESSION['id_connexion']; ?>">Mon profil</a></li>
    <?php
    }
    ?>
    <li style="text-align: center"><a href="deconnexion.php">Déconnexion</a></li> 
    </ul>
    </li>
    </ul>

  </div>
</nav>