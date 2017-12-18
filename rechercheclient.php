<?php include('menu.php');
 
session_start ();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


/*if(isset($_POST['valideRechercheClient'])){
		$numClient = $_POST['numClient'];
		$chercherClient = $bdd->query("SELECT * FROM vol WHERE numClient=$numClient");
		$donnees = $chercherClient -> fetch();

		$raisonSociale = $donnees['raisonSociale'];
		$siren = $donnees['siren'];
		$codeApe = $donnees['codeApe'];
		$adresse = $donnees['adresse'];
		$telephoneClient = $donnees['telephoneClient'];
		$faxClient = $donnees['faxClient'];
		$email = $donnees['email'];
		$dureeDeplacement = $donnees['dureeDeplacement'];
		$distanceKm = $donnees['duistanceKm'];
		$numAgence = $donnees['numAgence'];
	}*/

?>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="index.css" />
        <link href="/www/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/demo.js"></script>
        <title>Projet PPE</title>
    </head>
<body>
<form>
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Chercher un client">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit" name="valideRechercheClient">
        <i class="glyphicon glyphicon-search"></i>
      </button>

    </div>
  </div>
</form>
		<center><h1 id='titreFicherClient' style="color:darkgreen">Fiche des clients </h1></center>
		<center><table border = 1 class="table table-hover">

	<?php
	 if(isset($_POST['valideRechercheClient'])){
      $ = $_POST['login']));
      
      if($login&&$mdp)
       {

            $requser = $bdd->prepare("SELECT * FROM connexion,droits WHERE droits.id_droit= connexion.id_droit AND login = ? AND mdp = ? ");
            $requser -> execute(array($login, $mdp));
            $userexist = $requser -> rowCount();
            $userinfo = $requser -> fetch();
              if($userexist ==1)
              {
              	$_SESSION['login']=$userinfo['login'];
                $_SESSION['idConnexion']=$userinfo['idConnexion'];
                $_SESSION['idDroit']=$userinfo['idDroit'];
                header("Location: test.php");

              }
	$chercherClient = $bdd->query("SELECT * FROM client ");
   
    ?>
    		<tr>
				<th>Numéro du client</th>
				<th>Raison Sociale</th>
				<th>Siren</th>
				<th>Code APE</th>
				<th>Adresse</th>
				<th>Telephone</th>
				<th>FAX</th>
				<th>Email</th>
				<th>Durée du déplacement</th>
				<th>Distance en KM</th>
				<th>Numéro de l'agence</th>
			</tr>
			<?php	while ($donnees = $chercherClient->fetch())
    { ?>
			<tr>
				<td><?php echo($donnees['numClient']) ?></td>
				<td><?php echo($donnees['raisonSociale']) ?></td>
				<td><?php echo($donnees['siren']) ?></td>
				<td><?php echo($donnees['codeApe']) ?></td>
				<td><?php echo($donnees['adresse']) ?></td>
				<td><?php echo($donnees['telephoneClient']) ?></td>
				<td><?php echo($donnees['faxClient']) ?></td>
				<td><?php echo($donnees['email']) ?></td>
				<td><?php echo($donnees['dureeDeplacement']) ?></td>
				<td><?php echo($donnees['distanceKm']) ?></td>
				<td><?php echo($donnees['numAgence']) ?></td>

			</tr>
			    <?php
    }  
    $chercherClient->closeCursor();
    ?>
			</table></center>                        

</body>
    <script src="/www/bootstrap/js/jquery.js"></script>
    <script src="/www/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/www/js/bootstrap.min.js"></script>
</html>


