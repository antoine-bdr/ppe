<?php
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0 && $_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
//Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
    $connect = mysqli_connect("localhost", "root", "", "e4");
    // requete qui permet de selectionner les attributs de la table client et agence
    $query = "SELECT * FROM client, agence WHERE client.numAgence = agence.numAgence ORDER BY numClient";
    $result = mysqli_query($connect, $query);
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
        <link rel="stylesheet" type="text/css" href="../js/datatables.css">
        <link rel="stylesheet" type="text/css" href="../js/DataTables-1.10.16/css/dataTables.bootstrap.min.js">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script type="text/javascript" charset="utf8" src="../js/datatables.js">
        </script>
        <script type="text/javascript" charset="utf8" src="../js/DataTables-1.10.16/js/dataTables.bootstrap.min.js">
        </script>
        <script type="text/javascript" charset="utf8" src="../js/DataTables-1.10.16/js/jquery.dataTables.min.js">
        </script>
        
        <title>Projet PPE</title>
    </head>
    
<body class="index">
    <div class="banniere">
        <center><a href="accueil.php"><img src="../images/logo.png" class="arrondi"></a></center>
    </div>

  <?php include('../menu/menu.php'); ?>



  <center><h2> Affichage des clients </h2></center>
</body>
<!-- tableau qui permet d'afficher les informations des clients -->
<table class="display" id="example">

  <thead> 
  <tr>
    <th></th>
    <th>Raison Sociale</th>
    <th>Siren</th>
    <th>Code APE</th>
    <th>Adresse</th>
    <th>Téléphone Client</th>
    <th>Fax du Client</th>
    <th>Email</th>
    <th>Durée de Déplacements</th>
    <th>Distance en kilomètres</th>
    <th>Agence</th>
    <th></th>
  </tr>
  </thead>
  
  <tbody>
  <?php 
  $i = 1;
    while($row = mysqli_fetch_array($result)){
  ?> 
    <tr class="gradeX"> 
      <td><?php echo $i; ?></td>
      <td><?php echo $row['raisonSociale']; ?></td>
      <td><?php echo $row['siren']; ?></td>
      <td><?php echo $row['codeApe']; ?></td>
      <td><?php echo $row['adresse']; ?></td>
      <td><?php echo $row['telephoneClient']; ?></td>
      <td><?php echo $row['faxClient']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['dureeDeplacement']; ?></td>
      <td><?php echo $row['distanceKm']; ?></td>
      <td><?php echo $row['nomAgence']; ?></td>
      <td><a href="modifierClient.php?id=<?php echo $row['numClient']; ?>">Modifier</a></td>
    </tr> 
  <?php $i++; } ?>
  </tbody>

</table>

<script type="text/javascript">
$(document).ready(function () {

    $('#example').DataTable({

        language: {

            url: "../js/French.json"

        }

    });

});
</script>

<div border="solid" class="footer">
  <br>
  TEAM CR ©
    <br><br>
</div>

</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>
<?php


}else{
  header("Location: index.php");
    //Sinon il est redirigé par l'index
}
?>

