<?php
if (!ISSET($_SESSION)) 
     session_start();  

require_once('../modeles/config/Format.php');

$pageTitle = "";
include('../vues/header.php');  
?>
<style>
    body{
        
        background:url(../images/marbre.jpg) no-repeat center center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;  
        }
</style>
<?php
include('../vues/navBar.php');

   // recuperation des donnees envoyees
    $format   = new Format();
    $id       = $format->validation($_POST['idDon']);
    $courriel = $format->validation($_POST['email']);

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['rechercher']))
      {     
         header("Location: ../vues/modifierDon.php?id=".$id."&email=".$courriel);
      }
    if(isset($_POST['afficher']))
      {    
         header("Location: ../vues/TousLesDons.php?email=".$courriel);
      }
}
else
{
    // si la methode d'envoi n'est pas POST
    $message = "Veuillez vous connectez par le formulaire.";
    $class   = "danger";
    $url     = "../vues/RechercheDon.php";
    $nomPage = "la page de connection";   
    $format->redirect($message, $class, $url, $nomPage);
}


?>