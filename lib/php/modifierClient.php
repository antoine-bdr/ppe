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

      $getid = intval ($_GET['id']);
      $reqClient = $bdd ->prepare("SELECT * FROM client WHERE numClient = ?");
      $reqClient -> execute(array($getid));
      $client = $reqClient -> fetch();

      //Modification du nom du client
      if(isset($_POST['newNom'])AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['nomClient'])
      {
        $newNom = htmlspecialchars($_POST['newNom']);
        $insertNom = $bdd -> prepare("UPDATE client SET nomClient = ? WHERE numClient = ?");
        $insertNom -> execute(array($newNom, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newRaisonSociale'])AND !empty($_POST['newRaisonSociale']) AND $_POST['newRaisonSociale'] != $user['raisonSociale'])
      {
        $newRaisonSociale = htmlspecialchars($_POST['newRaisonSociale']);
        $insertRS = $bdd -> prepare("UPDATE client SET raisonSociale = ? WHERE numClient = ?");
        $insertRS -> execute(array($newRaisonSociale, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newSiren'])AND !empty($_POST['newSiren']) AND $_POST['newSiren'] != $user['siren'])
      {
        $newSiren = htmlspecialchars($_POST['newSiren']);
        $insertSiren = $bdd -> prepare("UPDATE client SET siren = ? WHERE numClient = ?");
        $insertSiren -> execute(array($newSiren, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newCodeApe'])AND !empty($_POST['newCodeApe']) AND $_POST['newCodeApe'] != $user['codeApe'])
      {
        $newCodeApe = htmlspecialchars($_POST['newCodeApe']);
        $insertCode = $bdd -> prepare("UPDATE client SET codeApe = ? WHERE numClient = ?");
        $insertCode -> execute(array($newCodeApe, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newAdresse'])AND !empty($_POST['newAdresse']) AND $_POST['newAdresse'] != $user['adresse'])
      {
        $newAdresse = htmlspecialchars($_POST['newAdresse']);
        $insertAdresse = $bdd -> prepare("UPDATE client SET adresse = ? WHERE numClient = ?");
        $insertAdresse -> execute(array($newAdresse, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newTel'])AND !empty($_POST['newTel']) AND $_POST['newTel'] != $user['telephoneClient'])
      {
        $newTel = htmlspecialchars($_POST['newTel']);
        $insertTel = $bdd -> prepare("UPDATE client SET telephoneClient = ? WHERE numClient = ?");
        $insertTel -> execute(array($newTel, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newFax'])AND !empty($_POST['newFax']) AND $_POST['newFax'] != $user['faxClient'])
      {
        $newFax = htmlspecialchars($_POST['newFax']);
        $insertFax = $bdd -> prepare("UPDATE client SET faxClient = ? WHERE numClient = ?");
        $insertFax -> execute(array($newFax, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newEmail'])AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $user['email'])
      {
        $newEmail = htmlspecialchars($_POST['newEmail']);
        $insertEmail = $bdd -> prepare("UPDATE client SET email = ? WHERE numClient = ?");
        $insertEmail -> execute(array($newEmail, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newDuree'])AND !empty($_POST['newDuree']) AND $_POST['newDuree'] != $user['dureeDeplacement'])
      {
        $newDuree = htmlspecialchars($_POST['newDuree']);
        $insertDuree = $bdd -> prepare("UPDATE client SET dureeDeplacement = ? WHERE numClient = ?");
        $insertDuree -> execute(array($newDuree, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newDistance'])AND !empty($_POST['newDistance']) AND $_POST['newDistance'] != $user['distanceKm'])
      {
        $newDistance = htmlspecialchars($_POST['newDistance']);
        $insertDistance = $bdd -> prepare("UPDATE client SET distanceKm = ? WHERE numClient = ?");
        $insertDistance -> execute(array($newDistance, $getid));
        header('Location: rechercheclient.php');
      }

      if(isset($_POST['newNumAgence'])AND !empty($_POST['newNumAgence']) AND $_POST['newNumAgence'] != $user['numAgence'])
      {
        $newNumAgence = htmlspecialchars($_POST['newNumAgence']);
        $insertAgence = $bdd -> prepare("UPDATE client SET numAgence = ? WHERE numClient = ?");
        $insertAgence -> execute(array($newNumAgence, $getid));
        header('Location: rechercheclient.php');
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
      <!-- Formulaire qui permet de modifier du client  -->
    <form action="#" method="POST" class="form-horizontal">

        <center>
          <h1 style="color:darkgreen">Modification(s) du client</h1>
        </center>
        <br>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Raison sociale :</b><input type="text" class="form-control" name="newRaisonSociale" value="<?php echo $client['raisonSociale']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Siren :</b><input type="text" class="form-control" name="newSiren" value="<?php echo $client['siren']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
              <div class="col-sm-4">
                  <b>Code APE :</b><input type="text" class="form-control" name="newCodeApe" value="<?php echo $client['codeApe']; ?>">
              </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Adresse :</b><input type="text" class="form-control" name="newAdresse" value="<?php echo $client['adresse']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Téléphone :</b><input type="text" class="form-control" name="newTel" value="<?php echo $client['telephoneClient']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Fax :</b><input type="text" class="form-control" name="newFax" value="<?php echo $client['faxClient']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Email :</b><input type="text" class="form-control" name="newEmail" value="<?php echo $client['email']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Durée déplacement :</b><input type="text" class="form-control" name="newDuree" value="<?php echo $client['dureeDeplacement']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Distance kilomètre :</b><input type="text" class="form-control" name="newDistance" value="<?php echo $client['distanceKm']; ?>">
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4"></label>
                <div class="col-sm-4"> 
                    <b>Agences :</b>
                      <SELECT value="newNumAgence" name="newNumAgence" type="text" size="1">
                                
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
