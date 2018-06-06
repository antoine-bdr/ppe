<?php
session_start(); //On ouvre la session
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); //Connexion à la BDD

  if(isset($_POST['connexion'])){ //Si l'utilisateur valide le formulaire
      //On récupère les variables du formulaire
      $login = htmlspecialchars(trim($_POST['login']));
      $mdp = htmlspecialchars(trim($_POST['mdp']));

      if($login&&$mdp)//Si l'utilisateur a entré tout les champs
       {

            $requser = $bdd->prepare("SELECT * FROM connexion,droits WHERE droits.id_droit= connexion.id_droit AND login = ? AND mdp = ? ");//On prépare la requête selectionnant la table connexion et droits
            $requser -> execute(array($login, $mdp));//On exécute la requête avec les valeurs entrés
            $userexist = $requser -> rowCount();//On vérifi si les valeurs sont contenus dans la BDD
            $userinfo = $requser -> fetch();
              if($userexist ==1)//SI l'utilisateur existe
              {
                //On enregistre toutes ces valeurs utile en session
              	$_SESSION['login']=$userinfo['login'];
                $_SESSION['idConnexion']=$userinfo['idConnexion'];
                $_SESSION['id_droit']=$userinfo['id_droit'];
                $_SESSION['matricule']=$userinfo['matricule'];
                //Redirection vers la page accueil.php
                header("Location: ../php/accueil.php");

              }
              else{
                header("Location: index.php?error=2");//Sinon retour vers la page d'index avec message d'erreur
              }

        } 

  }
  ?>
