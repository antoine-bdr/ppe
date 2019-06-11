<<<<<<< HEAD
<nav class="navbar navbar-default">
            <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="color : #406F3E">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                    <a class="navbar-brand" href="accueil.php" style="color:green">Bienvenue sur CashCash</a>
                </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                    <?php                    
                        if($_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
                        ?>
                       <li style="text-align: center" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Recherche de fiche client</a>
                                <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                                <li><a href="rechercheClient.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Fiche Client</a></li>
                                </ul>

                    <?php
                    }
                    if ($_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3) {
                    ?>
                        <li style="text-align: center" class= "dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Visites</a>
                                    <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                            <li><a href="affVisites.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Affecter Visites </a></li>       
                                    </ul>

                    <?php
                    }
            ?>

                        <li style="text-align: center">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Interventions</a>
                            <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 2){ ?><li><a href="interventionsAff.php" style="background: -webkit-linear-gradient(right, darkolivegreen,white, paleturquoise">Interventions affectées</a></li><?php }?>
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 3){ ?><li><a href="consultInterv.php" style="background: -webkit-linear-gradient(right,darkolivegreen,white,paleturquoise">Consultation Interventions</a></li><?php }?>
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 3){ ?><li><a href="consultIntervValider.php" style="background: -webkit-linear-gradient(right,darkolivegreen,white,paleturquoise">Consultation Interventions Validées</a></li><?php }?>
                            </ul>

                    <?php
                

                    if ($_SESSION['id_droit'] == 3 || $_SESSION['id_droit'] == 1){
                    ?>
                    <li style="text-align: center">
                       <a class="dropdown-toggle" data-toggle="dropdown" href="#">Statistiques</a>
                                    <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                    <li><a href="outils.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Outils Statistiques</a></li>
                                    </ul> 
                    <?php
                    }
                    ?>
                   

                    <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-align: center color: darkseagreen"><span class="glyphicon glyphicon-log-in"></span> Profil de <?php echo $_SESSION['login']; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white,paleturquoise)">

                        <li style="text-align: center"><a href="profil.php?id=<?php echo $_SESSION['matricule']; ?>" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Mon profil</a></li>

                        <li style="text-align: center"><a href="deconnexion.php" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Déconnexion</a></li> 
                    </ul>
                </ul>
            </div>
=======
<nav class="navbar navbar-default">
            <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="color : #406F3E">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                    <a class="navbar-brand" href="accueil.php" style="color:green">Bienvenue sur CashCash</a>
                </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                    <?php                    
                        if($_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
                        ?>
                       <li style="text-align: center" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Recherche de fiche client</a>
                                <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                                <li><a href="rechercheClient.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Fiche Client</a></li>
                                </ul>

                    <?php
                    }
                    if ($_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3) {
                    ?>
                        <li style="text-align: center" class= "dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Visites</a>
                                    <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                            <li><a href="affVisites.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Affecter Visites </a></li>       
                                    </ul>

                    <?php
                    }
            ?>

                        <li style="text-align: center">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Interventions</a>
                            <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 2){ ?><li><a href="interventionsAff.php" style="background: -webkit-linear-gradient(right, darkolivegreen,white, paleturquoise">Interventions affectées</a></li><?php }?>
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 3){ ?><li><a href="consultInterv.php" style="background: -webkit-linear-gradient(right,darkolivegreen,white,paleturquoise">Consultation Interventions</a></li><?php }?>
                                <?php if ($_SESSION['id_droit'] == 1 || $_SESSION ['id_droit'] == 3){ ?><li><a href="consultIntervValider.php" style="background: -webkit-linear-gradient(right,darkolivegreen,white,paleturquoise">Consultation Interventions Validées</a></li><?php }?>
                            </ul>

                    <?php
                

                    if ($_SESSION['id_droit'] == 3 || $_SESSION['id_droit'] == 1){
                    ?>
                    <li style="text-align: center">
                       <a class="dropdown-toggle" data-toggle="dropdown" href="#">Statistiques</a>
                                    <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">
                    <li><a href="outils.php" style=  "background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Outils Statistiques</a></li>
                                    </ul> 
                    <?php
                    }
                    ?>
                   

                    <li style="text-align: center" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-align: center color: darkseagreen"><span class="glyphicon glyphicon-log-in"></span> Profil de <?php echo $_SESSION['login']; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu" style="background: -webkit-linear-gradient( right, darkolivegreen,white,paleturquoise)">

                        <li style="text-align: center"><a href="profil.php?id=<?php echo $_SESSION['matricule']; ?>" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Mon profil</a></li>

                        <li style="text-align: center"><a href="deconnexion.php" style="background: -webkit-linear-gradient( right, darkolivegreen,white, paleturquoise)">Déconnexion</a></li> 
                    </ul>
                </ul>
            </div>
>>>>>>> master
</nav>