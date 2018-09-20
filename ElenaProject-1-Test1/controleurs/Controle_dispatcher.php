<?php
if (!ISSET($_SESSION)) 
     session_start();  

require_once('../modeles/config/Format.php');

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format   = new Format();
    $id       = $format->validation($_POST['idDon']);
    $courriel = $format->validation($_POST['email']);
 
    $_SESSION['$courriel'] = $courriel;
    
    if(isset($_POST['sub1']))
      {
       
         header("Location: ../vues/modifierDon.php?id=".$id);
      }
    if(isset($_POST['sub2']))
      {
       
         header("Location: ../vues/TousLesDons.php?");
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