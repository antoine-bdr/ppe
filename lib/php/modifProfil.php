<?php 
session_start();//On ouvre la session
if ($_SESSION['idConnexion']!=0){
  //Si l'utilisateur s'est connecté et qu'il a un id equivalent à celui d'un administrateur ou d'un technicien alors il peut accéder au site
$getid = $_GET['id'];
      //Modification du nom 
      if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nomEmploye'])
      {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd -> prepare("UPDATE employe SET nomEmploye = ? WHERE matricule = ?");
        $insertnom -> execute(array($newnom, $getid));
        header('Location: profil.php?id='.$getid);
      }

      if(isset($_POST['newprenom'])AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenomEmploye'])
      {
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $insertprenom = $bdd -> prepare("UPDATE employe SET prenomEmploye = ? WHERE matricule = ?");
        $insertprenom -> execute(array($newprenom, $getid));
        header('Location: profil.php?id='.$getid);
      }

      if(isset($_POST['newAdresse'])AND !empty($_POST['newAdresse']) AND $_POST['newAdresse'] != $user['adresseEmploye'])
      {
        $newtel = htmlspecialchars($_POST['newtel']);
        $inserttel = $bdd -> prepare("UPDATE employe SET adresseEmploye = ? WHERE matricule = ?");
        $inserttel -> execute(array($newtel, $getid));
        header('Location: profil.php?id='.$getid);
      }

      if(isset($_POST['newlogin'])AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])
      {
        $newlogin = htmlspecialchars($_POST['newlogin']);
        $insertlogin = $bdd -> prepare("UPDATE connexion SET login = ? WHERE matricule = ?");
        $insertlogin -> execute(array($newlogin, $getid));
        header('Location: profil.php?id='.$getid);
      }
      
      //Modification du mot de passe du compte  
      if(isset($_POST['newMdp1'])AND !empty($_POST['newMdp1']) AND isset($_POST['newMdp2'])AND !empty($_POST['newMdp2']))
      {
        $newMdp1 = htmlspecialchars($_POST['newMdp1']);
        $newMdp2 = htmlspecialchars($_POST['newMdp2']);

        if($newMdp1 == $newMdp2)
        {
          $insertnewMdp1 = $bdd->prepare("UPDATE connexion SET mdp = ? WHERE id_connexion = ?");
          $insertnewMdp1 -> execute(array($newMdp1, $getid));
          $_SESSION['mdp'] = $user ['newMdp1'];
          header('Location: profil.php?id='.$getid);
        } else{
          header('pageModification.php');
          $msg = "Vos deux mots de passe ne sont pas identiques";
        } 
      }

}else{
  header("Location: index.php");
    //Sinon il est redirigé par l'index
}
?>
