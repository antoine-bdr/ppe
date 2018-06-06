<?php
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0 && $_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
  //Si l'utilisateur c'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un assistant alors il peut accéder au site
    $connect = mysqli_connect("localhost", "root", "", "e4");
    $query = "SELECT * FROM intervention, agence, client, employe, technicien,controler WHERE intervention.numClient = client.numClient AND agence.numAgence = technicien.numAgence AND intervention.matricule = employe.matricule AND technicien.matricule = employe.matricule AND intervention.NumIntervention = controler.NumIntervention AND validation = 1 ORDER BY intervention.NumIntervention";
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



  <center><h2> Affichage des interventions Validées</h2></center>
<table class="display" id="example">

  <thead> 
  <tr>
    <th></th>
    <th>Nom du client</th>
    <th>Nom du technicien</th>
    <th>Date de la visite</th>
    <th>Heure de la visite</th>
    <th>Agence</th>
    <th>Commentaires des techniciens</th>
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
      <td><?php echo $row['nomEmploye']; ?></td>
      <td><?php echo $row['dateVisite']; ?></td>
      <td><?php echo $row['heureVisite']; ?></td>
      <td><?php echo $row['nomAgence']; ?></td>
      <td><?php echo $row['commentaire'];?></td>
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

<?php

}else{
  header("Location: index.php");
  //Sinon redirection vers l'index
}
?>

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
