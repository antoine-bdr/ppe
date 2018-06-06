<?php
session_start(); //On ouvre la session
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //Connexion à la BDD
if ($_SESSION['idConnexion']!=0 && $_SESSION['id_droit']==1 || $_SESSION['id_droit']==2){
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

  <?php include('../menu/menu.php'); //insertion du menu
  ?>
 <h1> Affichage des interventions</h1>
 <!-- table qui permet d'afficher le ou les interventions -->
    <table class="table table-striped">
<thead>
  <tr class="intervention">
  	<th></th>
    <th>date de visite </th>
    <th>Heure de visite </th>
    <th>Nom du client</th>
    <?php if ($_SESSION['id_droit'] == 1) {?><th>Nom du Technicien</th><?php }?>
    <th></th>
  </tr>
</thead>
<?php
$matricule = $_SESSION['matricule'];//On enregistre le matricule en session
if ($_SESSION['id_droit'] == 2) {
// requete qui permet de selectionner le matricule et le numero du client des tables interventions et clients
$req = $bdd->query("SELECT * FROM intervention,client WHERE matricule = ".$matricule." AND client.numClient = intervention.numClient AND validation = 0 ORDER BY distanceKm");
}else if($_SESSION['id_droit'] == 1) {
    $req = $bdd->query("SELECT * FROM intervention,client, employe WHERE employe.matricule = intervention.matricule ORDER BY distanceKm");
}
       $i=1;
      while ($intervention = $req->fetch()) { 
       //Tant qu'il y a d'élements correspondant à la requête dans la BDD
?>
  <tbody>
<tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $intervention['dateVisite']; ?></td>
  <td><?php echo $intervention['heureVisite']; ?></td>
  <td><?php echo $intervention['raisonSociale']; ?></td>
  <?php if ($_SESSION['id_droit'] == 1) { ?><td><?php echo $intervention['nomEmploye']; echo " </td>"; }?>
  <td><a href="commentaire.php?id=<?php echo $intervention['NumIntervention'];?>">Valider</a></td>
 </tr>
  </tbody>
<?php
$i++;
}
?>
</table>
<div class="footer">
  <br>
  TEAM CR © 
    <br><br>
</div>
</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>
<?php } else header("Location: index.php"); ?>