<?php
if (!ISSET($_SESSION)) 
    session_start();
require_once('../modeles/classes/6-LesDons_class.php');
require_once('../modeles/config/DonsDAO_class.php');
require_once('../modeles/config/Format.php');

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format = new Format();
    
    $Don_ID     = substr(md5(time()), 0, 10);
    $nom        = $format->validation($_POST['nomPDon']);
    $catDon     = $format->validation($_POST['catDon']);
    $DescDon    = $format->validation($_POST['DescDon']);
    $ModeLivr   = $format->validation($_POST['ModeLivr']);
    $montantDon = $format->validation($_POST['montantDon']);
    $dtPrm      = $format->validation($_POST['dateDon']);
    $img        = $_FILES['img']['name'];
    if(!isset($_SESSION['userId']))  $idDonnateur = 0000;
    if(empty($montantDon))           $montantDon  = "null";
    if(empty($dtPrm))                $dtPrm       =  null;
    if(empty($img))                  $img         = "aucune image fournie."; 
    $dao = new Dons_DAO();
    $dao->createDon($Don_ID,$idDonnateur,$catDon,$nom,$DescDon,$ModeLivr,$montantDon,$dtPrm,$img);
    header('Location: ../vues/CreateDon.php');
    exit();
}
else
{
    // la methode d'envoi n'est pas POST,
    // lui retourner la page Accueil ou la page de connection( choisir ).
    header('Location: ../vues/CreateDon.php');
    exit();
}

?>