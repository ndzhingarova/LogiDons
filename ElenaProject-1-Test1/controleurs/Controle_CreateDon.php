<?php
if (!ISSET($_SESSION)) 
    session_start();

require_once('../modeles/config/DonsDAO_class.php');
require_once('../modeles/config/Format.php');
require_once("../modeles/config/MembreDAO_class.php");

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format = new Format();
    
    $nom        = $format->validation($_POST['nomDon']);     // nom du don
    $qtt        = $format->validation($_POST['qttDon']);     // quantite donnee
    $catDon     = $format->validation($_POST['catDon']);     // categorie du don
    $DescDon    = $format->validation($_POST['DescDon']);    // description du don
    $modeLivr   = $format->validation($_POST['ModeLivr']);   // mode de livraison du don
    $montantDon = $format->validation($_POST['montantDon']); // montant du don
    $dtPrm      = $format->validation($_POST['dateDon']);    // date promise de la livraison
    $img        = $_FILES['img']['name'];                    // nom de l'image envoyée

    $nomDntr    = $format->validation($_POST['nomDontr']);   // nom du donnateur
    $courriel   = $format->validation($_POST['courriel']);   // courriel du donnateur
    $tel        = $format->validation($_POST['tel']);        // telephone du donnateur
    $adresse    = $format->validation($_POST['adresse']);    // adresse du donnateur

    if(empty($img))  $img = "aucune image fournie."; 

    // vérifier si le donateur existe déja dans la BDD
    $membreDao = new MembreDAO();   
    $donateur = $membreDao->findMembreByEmail($courriel);
  
    if($donateur)  // si le donateur existe deja
      {
          // on recupere son ID et on insere seulement son don
          $donateurID = $donateur->getid(); 
          $dao = new Dons_DAO();
          $dao->createDonAvecNouveauDonnateur($donateurID,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img);
      }
    else           // si le donnateur n'existe pas
      {
          echo "le donateur n'existe pas dans la BDD.";
          $dao = new Dons_DAO();
          $dao->createDonAvecIdDonnateur
          ($nomDntr,$courriel,$tel,$adresse,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img);
      }
}
else
{
    // la methode d'envoi n'est pas POST,
    // lui retourner la page Accueil ou la page de connection( choisir ).
    header('Location: ../vues/CreateDon.php');
    exit();
}

?>