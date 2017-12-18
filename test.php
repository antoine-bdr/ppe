<?php
session_start();
if ($_SESSION['idConnexion']!=0){
  include('menu.php');

}else{
  header("Location: index.php");
}
?>
