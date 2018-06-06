<?php
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0 && $_SESSION['id_droit'] == 1 || $_SESSION['id_droit'] == 3){
//Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', '');
// requete qui permet de selectionner les attributs de la table technicien et employe
$req = 'SELECT * FROM technicien, employe WHERE technicien.matricule = employe.matricule';
$technicien = $bdd->prepare($req);
$technicien->execute();
$donneesTechnicien = $technicien->fetchAll(PDO::FETCH_ASSOC);

?>

<html class="inscription">
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
        <title>Projet PPE</title>
    </head>

<body class="index">
    <div class="banniere">
        <center><a href="accueil.php"><img src="../images/logo.png" class="arrondi"></a></center>
    </div>
        
  <?php include('../menu/menu.php'); ?> 

        <!-- formulaire qui permet de choisir un technicien  -->
        <form action="#" method="POST">
          <fieldset>
          <table>
              <legend style="color : darkgreen">Choisir un technicien</legend>

              <div class="form-group"> 
            <tr>
                <th><label for="matricule">Techniciens : </label></th>
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
                <th>Mois/Année</th>
                <td><SELECT value="mois" name="mois" type="text" size="1">
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </SELECT> 

                    <SELECT value="annee" name="annee" type="text" size="1">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </SELECT> 

                </td>
            </tr>

            </div>
            <tr>
              <th></th>
              <td><br><button type="submit" name="bouton" class="btn btn-primary" style="background-color: darkolivegreen"><b>Choisir</b></button></td>
            </tr>
          </table>
        </fieldset>
      </form>

    <?php
        if (isset($_POST["bouton"])) {
            $matricule = $_POST["matricule"];
            $mois = $_POST["mois"];
            $annee = $_POST["annee"];
            $dateForm = $annee."-".$mois;
            //echo $dateForm;
            // requete qui permet de joindre les tables intervention client technicien et employe pour afficher les informations suivantes
        $req = $bdd ->query("SELECT * FROM intervention, client, technicien, employe
                            WHERE intervention.numClient = client.numClient 
                            AND intervention.matricule = employe.matricule
                            AND technicien.matricule = employe.matricule
                            AND intervention.matricule = ".$matricule."");
        $i =1;
        $nbrIntervention = 0;
        $nbrKm = 0;
        $heureVisite = 0;
        while ($inter = $req -> fetch()) {
              $dateInter = $inter["dateVisite"];
              $dateInter = substr($dateInter, 0,7);
              //echo " ".$dateInter;

              if ($dateForm == $dateInter) {
                  $nbrIntervention = $nbrIntervention + $i;
                  $nbrKm = $nbrKm + $inter["distanceKm"];
                  $heureVisite = $heureVisite+$inter["heureVisite"];
                  $i++;
              }
        }
    if ($nbrKm>0) {

    ?>
    <h2>Statistiques du technicien <?php echo $inter["nomEmploye"]." le ".$dateForm; ?> </h2>
        <table class="table">
            <tr>
                <th>Nombre d'interventions</th>
                <th>Nombre total de kilomètres parcourus</th>
                <th>Nombre total d'heures de visites</th>
            </tr>
            <tr>
                <td><?php echo $nbrIntervention; ?></td>
                <td><?php echo $nbrKm; ?></td>
                <td><?php echo $heureVisite; ?></td>
            </tr>
        </table>

    <?php }else{ ?>
      <h2>Aucunes interventions affectées à ce technicien à cette date </h2>
<?php
    }
        }
        ?>
    </body>

</html>
<?php

}else{
  header("Location: index.php");
    //Sinon il est redirigé par l'index
}
?>
