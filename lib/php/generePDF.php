<?php
session_start();

 try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=e4', 'root', '');
     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

//Si le bouton Générer le PDF est enclenché
if(isset($_POST['generer'])){

	$_SESSION['NumIntervention']=$_POST['NumIntervention'];
  //va à la page generePDF2.php
	header('location: generePDF2.php');

}
?>
 <html>
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

    
    <form  method='POST'>
        <fieldset>
        <table>
        <h2>Veuillez sélectionner le numéro de l'intervention : </h2>
        <div class="form-group">
                            <tr>
                                <th></th>
                            <td><SELECT name="NumIntervention"  data-live-search="true"  class="selectpicker" data-width="75%"> 
                            <!-- Utilise la class selectpicker dans bootstrap -->
                            <?php
                            //prend tout dans intervention
                            $reponse = $bdd->query('SELECT * FROM intervention');
                            ?>
                            <option value=""></option>
                            <?php
                            while ($donnees = $reponse->fetch())
                            {
                              //affiche tous les numéros des interventions tant qu'il y en a 
                            ?>
                                       <option  value="<?php echo $donnees['NumIntervention']; ?>"> <?php echo $donnees['NumIntervention']?></option>
                            <?php
                            }
                            //ferme le curseur reponse
                            $reponse->closeCursor();
                            ?>
                            </SELECT></td></tr></div>
                <tr>
                    <th></th>
                <td><br><button type="submit" name="generer" class="btn btn-primary"  target="_blank" style="background-color : darkolivegreen"><a href="generePDF2.php" onclick="window.open(this.href); return false;"></a><b>Générer un PDF</b></button></td></tr>
                            </table>
                            </fieldset>
                           </form>
    </body>
        <script src="/www/bootstrap/js/jquery.js"></script>
        <script src="/www/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="/www/js/bootstrap.min.js"></script>

    </html>