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
//require la class permettant de créer le tableau
require('classPDF.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Titre
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Fiche intervention',0,1,'C');
    $this->Ln(10);
    // Imprime l'en-tête du tableau si nécessaire
    parent::Header();
}
}

// Connexion à la base
$link = mysqli_connect('localhost','root','','e4');

$pdf = new PDF();
$pdf->AddPage();
 //prend toutes les colonnes de la requête
$pdf->Table($link,'SELECT * FROM intervention WHERE NumIntervention="'.$_SESSION['NumIntervention'].'"');

$pdf->Output();
?>

