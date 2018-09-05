<?php
if (!ISSET($_SESSION)) 
    session_start();

require_once('../modeles/config/DonnateurDAO.class.php');
require_once('../modeles/config/DonsDAO.class.php');
require_once('../modeles/config/Format.php');
require_once("../modeles/config/MembreDAO.class.php");
require_once("../modeles/classes/OutilCourriel.php");

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

    //if(empty($img))  
    //    $img = "aucune image fournie."; 

    // vérifier si le donateur existe déja dans la BDD
   $membreDao = new MembreDAO();   
    $donateur = $membreDao->findMembreByEmail($courriel);
    
    if($donateur)  // si le donateur existe deja
      {
          // on recupere son ID et on insere seulement son don
          //$donateurID = $donateur->getid(); 
         // $dao = new DonsDAO();
         
          //$dao->createDonAvecIdDonnateur($donateurID,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img);
          $dao = new DonnateurDAO();
          $myDonateur = $dao->findDonateurByEmail($courriel);
          $secondDao = new DonsDAO();
          $emp_id = $secondDao->AttibuerEmploye();
          $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
            //echo "yraaaa";
           // OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());
           header('Location: ../vues/merci.php');
           exit();
      }
    else           
      {
          //echo "le donateur n'existe pas dans la BDD.";
          $dao = new DonnateurDAO();
         
          if($dao->createDonateurSansReg($nomDntr,$courriel,$tel,$adresse)){
              //echo "yraaaa";
              $myDonateur = $dao->findDonateurByEmail($courriel);
              $secondDao = new DonsDAO();
              $emp_id = $secondDao->AttibuerEmploye();
              $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
            //  if($secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img))
                //echo "yraaaa";
               // OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());
          } else {
              echo "Erruer";
          }
          
  
    header('Location: ../vues/merci.php');
   exit();
}}

?>