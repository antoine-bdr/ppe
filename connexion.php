<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=e4;charset=utf8', 'root', ''); 

  if(isset($_POST['connexion'])){
      $login = htmlspecialchars(trim($_POST['login']));
      $mdp = htmlspecialchars(trim($_POST['mdp']));

      if($login&&$mdp)
       {

            $requser = $bdd->prepare("SELECT * FROM connexion WHERE login = ? AND mdp = ? ");
            $requser -> execute(array($login, $mdp));
            $userexist = $requser -> rowCount();
            $userinfo = $requser -> fetch();
              if($userexist ==1)
              {
              	$_SESSION['login']=$userinfo['login'];
                $_SESSION['idConnexion']=$userinfo['idConnexion'];
                header("Location: test.php");

              }
              else{
                header("Location: index.php?error=2");
              }

        } 

  }
