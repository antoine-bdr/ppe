<?php 
session_start();//On ouvre la session

if ($_SESSION['idConnexion']!=0 && $_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
  //Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //connexsion à la bdd
      
      // requete qui permet de selectionner les attributs de la table agence
      $req = 'SELECT * FROM agence';
      $agence = $bdd->prepare($req);
      $agence->execute();
      $donneesAgence = $agence->fetchAll(PDO::FETCH_ASSOC);

      $req = 'SELECT * FROM client';
      $client = $bdd->prepare($req);
      $client->execute();
      $donneesClient = $client->fetchAll(PDO::FETCH_ASSOC);

      $req = 'SELECT * FROM technicien, employe WHERE technicien.matricule = employe.matricule';
      $technicien = $bdd->prepare($req);
      $technicien->execute();
      $donneesTech = $technicien->fetchAll(PDO::FETCH_ASSOC);

       $getid = intval ($_GET['id']);
    $reqIntervention = $bdd ->prepare("SELECT * FROM intervention,client,employe, agence WHERE numIntervention = ? AND client.numClient = intervention.numClient AND intervention.matricule = employe.matricule AND agence.numAgence = intervention.idAgence");
      $reqIntervention -> execute(array($getid));
      $intervention = $reqIntervention -> fetch();


      if(isset($_POST['newClient'])AND !empty($_POST['newClient']) AND $_POST['newClient'] != $intervention['numClient'])
      {
        $newClient = htmlspecialchars($_POST['newClient']);
        $insertClient = $bdd -> prepare("UPDATE intervention SET numClient = ? WHERE NumIntervention = ?");
        $insertClient -> execute(array($newClient, $getid));
        header('Location: consultInterv.php');
      }

      if(isset($_POST['newTechnicien'])AND !empty($_POST['newTechnicien']) AND $_POST['newTechnicien'] != $intervention['telMobile'])
      {
        $newTechnicien = htmlspecialchars($_POST['newTechnicien']);
        $insertTechnicien = $bdd -> prepare("UPDATE intervention SET telMobile = ? WHERE NumIntervention = ?");
        $insertTechnicien -> execute(array($newTechnicien, $getid));
        header('Location: consultInterv.php');
      }

      if(isset($_POST['newDateVisite'])AND !empty($_POST['newDateVisite']) AND $_POST['newDateVisite'] != $intervention['dateVisite'])
      {
        $newDateVisite = htmlspecialchars($_POST['newDateVisite']);
        $insertDateVisite = $bdd -> prepare("UPDATE intervention SET dateVisite = ? WHERE numIntervention = ?");
        $insertDateVisite -> execute(array($newDateVisite, $getid));
        header('Location: consultInterv.php');
      }

      if(isset($_POST['newHeureVisite'])AND !empty($_POST['newHeureVisite']) AND $_POST['newHeureVisite'] != $intervention['heureVisite'])
      {
        $newHeureVisite = htmlspecialchars($_POST['newHeureVisite']);
        $insertHeureVisite = $bdd -> prepare("UPDATE intervention SET heureVisite = ? WHERE numIntervention = ?");
        $insertHeureVisite -> execute(array($newHeureVisite, $getid));
        header('Location: consultInterv.php');
      }
      
      if(isset($_POST['newAgence'])AND !empty($_POST['newAgence']) AND $_POST['newAgence'] != $intervention['idAgence'])
      {
        $newAgence = htmlspecialchars($_POST['newAgence']);
        $insertAgence = $bdd -> prepare("UPDATE intervention SET idAgence = ? WHERE NumIntervention = ?");
        $insertAgence -> execute(array($newAgence, $getid));
        header('Location: consultInterv.php');
      }


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
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/demo.js"></script>
        <title>Projet PPE</title>
    </head>
<body class="index">
    <div class="banniere">
        <center><a href="accueil.php"><img src="../images/logo.png" class="arrondi"></a></center>
    </div>
        
  <?php include('../menu/menu.php'); ?> 
    <div class="formPosition">

    <form action="#" method="POST" class="form-horizontal">

        <center>
          <h1 style="color:darkgreen">Modification(s) de l'intervention</h1>
        </center>
        <br>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Client :</b>
                      <SELECT value="newClient" name="newClient" type="text" size="1">
                                
                          <?php
                              foreach ($donneesClient AS $donneeClient)
                              {
                          ?>
                                
                              <option value="<?php echo $donneeClient['numClient']; ?>"> <?php echo $donneeClient['raisonSociale'];?> </option>
              
                              <?php
                              }
                              ?>
                          </SELECT>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Technicien :</b>
                      <SELECT value="newTechnicien" name="newTechnicien" type="text" size="1">
                                
                          <?php
                              foreach ($donneesTech AS $donneeTech)
                              {
                          ?>
                                
                              <option value="<?php echo $donneeTech['telMobile']; ?>"> <?php echo $donneeTech['nomEmploye'];?> </option>
              
                              <?php
                              }
                              ?>
                          </SELECT>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Date de la visite :</b><input type="date" class="form-control" name="newDateVisite" value="<?php echo $intervention['dateVisite']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4"> 
                   <b>Heure de la visite :</b><input type="text" class="form-control" name="newHeureVisite" value="<?php echo $intervention['heureVisite']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Agences :</b>
                      <SELECT value="newAgence" name="newAgence" type="text" size="1">
                                
                          <?php
                              foreach ($donneesAgence AS $donneeAgence)
                              {
                          ?>
                                
                              <option value="<?php echo $donneeAgence['numAgence']; ?>"> <?php echo $donneeAgence['nomAgence'];?> </option>
              
                              <?php
                              }
                              ?>
                          </SELECT>
                </div>
        </div>
              
            
              <center>
             <td><br><button type="submit" name="affecter" class="btn btn-primary" style="background-color: darkolivegreen"><b>Modifier</b></a></button></td> 
            <br>
          </center>
            
    
    </form>
    </div>

    </body>
</html>
   </div>
</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>
<?php

}else{
  header("Location: index.php");
  //Sinon il est redirigé par l'index
}
?>

