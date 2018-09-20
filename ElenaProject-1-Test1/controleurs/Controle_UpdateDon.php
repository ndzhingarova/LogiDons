<?php

require_once('../modeles/config/DonsDAO.class.php');
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

    // verifier si la methode d'envoi est faite par le formulaire
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
        // recuperation des donnees envoyees par le formulaire
        $format     = new Format();
        $IdDon      = $format->validation($_POST['IdDon']);       // id du don
        $nomDon     = $format->validation($_POST['nomDon']);      // nom du don
        $DescDon    = $format->validation($_POST['DescDon']);     // description du don
        $qttDon     = $format->validation($_POST['qttDon']);      // la quantite du don
        $catDon     = $format->validation($_POST['catDon']);      //la categorie du don
        $ModeLivr   = $format->validation($_POST['ModeLivr']);    //le mode de livraison
        $montantDon = $format->validation($_POST['montantDon']);  //le montant du don
        $datePromise= $format->validation($_POST['datePrm']);     //la date promise
        //verifier est-ce qu'il a change la photo ou pas
        $img = "";
        if($_FILES['imgNew']['name'] == '')
        {
            // juste garder l'ancien nom de la photo
            $img = $format->validation($_POST['imgOld']);
        }
        else
        {
            $img = $format->validation($_FILES['imgNew']['name']);    // nom de l'image envoyée
            // supprimmer l'ancienne photo et envoyer la nouvelle photo dans le dossier Upload
        }


        if ($catDon == "ameublement")
        {
            $catDon = 1;
        }elseif ($catDon == "monnaie")
        {
            $catDon = 2;
        }elseif ($catDon == "electroniques")
        {
            $catDon = 3;
        }else
        {
            $catDon = 4;
        }
            
/*       
        echo "id du don : ".$IdDon.'<br>';
        echo "nom du don : ".$nomDon.'<br>';
        echo "description du don : ".$DescDon.'<br>';
        echo "la quantite du don ".$qttDon.'<br>';
        echo "la categorie du don : ".$catDon.'<br>';
        echo "le mode de livraison : ".$ModeLivr.'<br>';
        echo "le montant : ".$montantDon.'<br>';
        echo "la date promise : ".$datePrm.'<br>';
        echo "l'ancien nom de l'image : ".$_POST['imgOld'].'<br>';
        echo "le nouveau nom de l'image : ".$img.'<br>';  
*/
        $donDao = new DonsDAO();            
        $donDao->updateDon($nomDon,$DescDon,$qttDon,$catDon,$ModeLivr,$montantDon,$datePromise,$img,$IdDon);

        $message = "Les modifications ont étés effectuées avec succes.";
        $class   = "success";
        $url     = "../vues/TousLesDons.php?email=".$_POST['email'];
        $nomPage = "la page de vos dons";   
        $format->redirect($message, $class, $url, $nomPage);  
    }
    else // si la methode d'envoi n'est pas POST
    {
        $message = "Veuillez vous connectez par le formulaire.";
        $class   = "danger";
        $url     = "../index.php";
        $nomPage = "la page d'Accueil";   
        $format->redirect($message, $class, $url, $nomPage); 
    }       
 
?>
