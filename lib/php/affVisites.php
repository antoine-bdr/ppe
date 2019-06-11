<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); 
// requete qui permet de selectionner les attributs de la table agence 

$req = 'SELECT * FROM agence';
$agence = $bdd->prepare($req);
$agence->execute();
$donneesAgence = $agence->fetchAll(PDO::FETCH_ASSOC);

// condition qui lorsque le bouton affecter est declenché va permettre a l'assistant d'affecter une visite aux techniciens
if (isset($_POST['affecter'])) {
  $req = $bdd -> prepare ('SELECT telMobile FROM technicien WHERE matricule = ?');
  $req ->execute(array($_POST['matricule']));
  $user = $req -> fetch(PDO::FETCH_ASSOC);

  $numClient = $_POST['numClient'];
  $matricule = $_POST['matricule'];
  $date = $_POST['date'];
  $heure = $_POST['heure'];
  $tel = $user["telMobile"];
  header('Location: generePDF.php');
// requete qui permet d'inserer les attributs de la table intervention
  $req = $bdd->prepare('INSERT INTO intervention(dateVisite, heureVisite, numClient, telMobile, matricule) VALUES(:dateVisite, :heureVisite, :numClient, :telMobile, :matricule)');
        
  $req->execute(array(
  ':dateVisite' => $date,
  ':heureVisite' => $heure,
  ':numClient' => $numClient,
  ':telMobile' => $tel,
  ':matricule' => $matricule,
   ));
}

if ($_SESSION['idConnexion']!=0 AND $_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3 ){

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

<h2>Affecter une visite</h2>


    <!-- formulaire qui permet de choisir une agence -->
      <form action="#" method="POST">
          <fieldset>
          <table>
              <legend style="color : darkgreen">Choisir une agence</legend>

              <div class="form-group"> 
            <tr>
                <th><label for="numAgence">Agences : </label></th>
                <td><SELECT value="numAgence" name="numAgence" type="text" size="1">    
                  <?php
                  foreach ($donneesAgence AS $donneeAgence)
                  {
                    ?>

                  <option value="<?php echo $donneeAgence['numAgence'];?>"<?php if (isset($_SESSION["numAgence"])) {
                    if ($_SESSION["numAgence"]==$donneeAgence['numAgence']) {echo "selected";} }?>>
                    <?php echo $donneeAgence['nomAgence']; ?> </option>

                  <?php
                  }
                  ?>
                </SELECT></td>
            </tr>

            </div>
            <tr>
              <th></th>
              <td><br><button type="submit" name="bouton" class="btn btn-primary" style="background-color: darkolivegreen"><b>Choisir</b></button></td>
            </tr>
          </table>
        </fieldset>
      </form>
<!-- condition qui, lorsque le bouton est declenché va permettre de choisir le client et technicien concerné par la visite   -->
  <?php 
  	if (isset($_POST['bouton'])) {

      $req = "SELECT * FROM technicien, employe WHERE technicien.matricule = employe.matricule AND numAgence =".$_POST['numAgence']."";
      $technicien = $bdd->prepare($req);
      $technicien->execute();
      $donneesTechnicien = $technicien->fetchAll(PDO::FETCH_ASSOC);

      
      // requete qui permet de selectionner les attributs de la table client par rapport au numero d'agence renseignée
      $req = "SELECT * FROM client WHERE numAgence =".$_POST['numAgence']."";
      $client = $bdd->prepare($req);
      $client->execute();
      $donneesClient = $client->fetchAll(PDO::FETCH_ASSOC);
  		?>
            <!-- formulaire sous forme de tableur qui permet de selectionner le client , le technicien , la date d'intervention et l'heure concerné -->
  		      <form action="#" method="POST">
          <fieldset>
          <table>

              <div class="form-group"> 
            <tr>
                <th><label for="numClient">Client : </label></th>
                <td><SELECT value="numClient" name="numClient" type="text" size="1">    
                  <?php
                  foreach ($donneesClient AS $donneeClient)
                  {
                    ?>

                  <option value="<?php echo $donneeClient['numClient'];?>"<?php if (isset($_SESSION["numClient"])) {
                    if ($_SESSION["numClient"]==$donneeClient['numClient']) {echo "selected";} }?>>
                    <?php echo $donneeClient['raisonSociale']; ?> </option>

                  <?php
                  }
                  ?>
                </SELECT></td>

            </tr>

            <tr>
                <th><label for="matricule">Technicien: </label></th>
                <td><SELECT value="matricule" name="matricule" type="text" size="1">    
                  <?php
                  foreach ($donneesTechnicien AS $donneeTechnicien)
                  {
                    ?>

                  <option value="<?php echo $donneeTechnicien['matricule'];?>"<?php if (isset($_SESSION["matricule"])) {
                    if ($_SESSION["matricule"]==$donneeTechnicien['matricule']) {echo "selected";} }?>>
                    <?php echo $donneeTechnicien['nomEmploye']; ?> </option>

                  <?php
                  }
                  ?>
                </SELECT></td>

            </tr>

            <tr>
              <th><label for="matricule">Date d'intervention: </label></th>
              <td><input type="date" name="date" /></td>
            </tr>

            <tr>
              <th><label for="matricule">Heure:  </label></th>
              <td><input type="texte" name="heure" placeholder="ex:10:30" /></td>
            </tr>

            </div>
            <tr>
              <th></th>
              <td><br><button type="submit" name="affecter" class="btn btn-primary" style="background-color: darkolivegreen"><b>Affecter</b></a></button></td>
            </tr> 
          </table>
    </fieldset>
  </form>

  		<?php
  	}
  ?>



<div border="solid" class="footer">
  <br>
  TEAM CR ©
    <br><br>
</div>

<script>
$('#visite').datetimepicker({
inline:true,
lang:'fr',

})
</script>

</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>
<?php

}else{
  header("Location: index.php");
}
?>
