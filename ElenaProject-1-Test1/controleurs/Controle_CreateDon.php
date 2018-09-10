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
    // il se peut que le donateur est une entrprise, mais il a oublié
    // d'écrire son nom (ou il l'avait effacé volentairement)
    if( ISSET($_POST['checkCompagnie']) && empty($_POST['nomCompagnie']))
        { 
            // lui envoyer un message que le nom de l'entreprise est obligatoire
            header('Location: ../vues/CreateDon.php');
            exit();
        }    
    // recuperation des donnees envoyees
    $format = new Format();
   
    $nom         = $format->validation($_POST['nomDon']);     // nom du don
    $qtt         = $format->validation($_POST['qttDon']);     // quantite donnee
    $catDon      = $format->validation($_POST['catDon']);     // categorie du don
    $DescDon     = $format->validation($_POST['DescDon']);    // description du don
    $modeLivr    = $format->validation($_POST['ModeLivr']);   // mode de livraison du don
    $montantDon  = $format->validation($_POST['montantDon']); // montant du don
    $dtPrm       = $format->validation($_POST['dateDon']);    // date promise de la livraison
    $img         = $_FILES['img']['name'];                    // nom de l'image envoyée
    
    // verifier si le donateur est une entreprise ou une personne    
    if( ISSET($_POST['checkCompagnie']) )                     // nom de la compagnie(si c'est le cas)
       $nomComp  = $format->validation($_POST['nomCompagnie']);
    $nomDntr     = $format->validation($_POST['nomDontr']);   // nom du donnateur
    $courriel    = $format->validation($_POST['courriel']);   // courriel du donnateur
    $tel         = $format->validation($_POST['tel']);        // telephone du donnateur

    $numCivic    = $format->validation($_POST['numCivic']);
    $nomRue      = $format->validation($_POST['nomRue']);
    $ville       = $format->validation($_POST['ville']);
    $codePostale = $format->validation($_POST['codePostale']);
    $province    = $format->validation($_POST['province']);
    $adresse     = $numCivic.', '.$nomRue.', '.$ville.        // adresse du donnateur
                   ', '.$codePostale ;
                   
   //echo $nomComp."<br>";
   echo $nomDntr."<br>";echo $courriel."<br>";echo $tel."<br>";
   echo $modeLivr."<br>";
   echo $adresse."<br>";
   echo $province."<br>";echo $nom."<br>";echo $qtt."<br>";echo $catDon."<br>";
   echo $DescDon."<br>";echo $montantDon."<br>";echo $dtPrm."<br>";echo $img."<br>";
   
    // vérifier si le donateur existe déja dans la BDD
    $membreDao = new MembreDAO();   
    $donateur = $membreDao->findMembreByEmail($courriel);
/*    
    if($donateur)  // si le donateur existe deja
      {
          // on recupere son ID et on insere seulement son don
          $dao = new DonnateurDAO();
          $myDonateur = $dao->findDonateurByEmail($courriel);
          $secondDao = new DonsDAO();
          $emp_id = $secondDao->AttibuerEmploye();
          $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
          
           // OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());
           header('Location: ../vues/merci.php');
           exit();
      }
    else           
      {
          //echo "le donateur n'existe pas dans la BDD.";
          $dao = new DonnateurDAO();
         
          if($dao->createDonateurSansReg($nomDntr,$courriel,$tel,$adresse)){
              $myDonateur = $dao->findDonateurByEmail($courriel);
              $secondDao = new DonsDAO();
              $emp_id = $secondDao->AttibuerEmploye();
              $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
            //  if($secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img))
             //     OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());
          } else {
              echo "Erruer";
          }
          
    header('Location: ../vues/merci.php');
   exit(); 
 */   
}


?>