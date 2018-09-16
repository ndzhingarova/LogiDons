<?php
if (!ISSET($_SESSION)) 
    session_start();

require_once('../modeles/config/DonnateurDAO.class.php');
require_once('../modeles/config/DonsDAO.class.php');
require_once('../modeles/config/Format.php');
require_once("../modeles/config/MembreDAO.class.php");
require_once("../modeles/classes/OutilCourriel.php");

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
    $subject = "Vous allez doner";

    $nom         = $format->validation($_POST['nomDon']);     // nom du don
    $qtt         = $format->validation($_POST['qttDon']);     // quantite donnee
    $catDon      = $format->validation($_POST['catDon']);     // categorie du don
    $DescDon     = $format->validation($_POST['DescDon']);    // description du don
    $modeLivr    = $format->validation($_POST['ModeLivr']);   // mode de livraison du don
    $montantDon  = $format->validation($_POST['montantDon']); // montant du don
    $dtPrm       = $format->validation($_POST['dateDon']);    // date promise de la livraison
    if(ISSET($_FILES['img']))
       $img = $format->validation($_FILES['img']['name']);    // nom de l'image envoyée
    else  
       $img = "aucune image fournie";

    // verifier si le donateur est une entreprise ou une personne    
    if( ISSET($_POST['checkCompagnie']) )             // nom de la compagnie(si c'est le cas)
        $nomComp  = $format->validation($_POST['nomCompagnie']);
    $nomDntr     = $format->validation($_POST['nomDontr']);   // nom du donnateur
    $courriel    = $format->validation($_POST['courriel']);   // courriel du donnateur
    $tel         = $format->validation($_POST['tel']);        // telephone du donnateur
    $adresse     = $format->validation($_POST['adresse']);    // adresse
    $ville       = $format->validation($_POST['ville']);      // nom de la ville
    $codePostale = $format->validation($_POST['codePostale']);// code postale
    $province    = $format->validation($_POST['province']);   // province
        
/*                 
   echo $nomComp."<br>";
   echo $nomDntr."<br>";echo $courriel."<br>";echo $tel."<br>";
   echo $adresse."<br>";echo $ville."<br>";echo $codePostale."<br>";echo $province."<br>";  
   echo $nom."<br>";echo $qtt."<br>";echo $catDon."<br>";echo $modeLivr."<br>";
   echo $DescDon."<br>";echo $montantDon."<br>";echo $dtPrm."<br>";echo $img."<br>";
*/   
    //
    $membreDao = new MembreDAO();
    if( ISSET($_POST['checkCompagnie']) ) {
        //if()  si la compagnie existe deja dans la BDD
        //{

    // }
    // else() si la compagnie n'existe pas dans la BDD
    // {

    // }
    } else {
        // vérifier si le donateur existe déja dans la BDD  
        $dao = new DonnateurDAO();
        $myDonateur = $dao->findDonateurByEmail($courriel);
        if($myDonateur) { // si le donateur existe deja                             
            $secondDao = new DonsDAO();
            $emp_id = $secondDao->AttibuerEmploye();
            $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
            $message='Cher Donateur, Merci pour votre don. 
            Vous pouvez consulter vos dons toujour sur cette lien: 
            http://localhost:7710/projetD/ElenaProject-1-Test1/controleurs/AfficherDonsDonateur.php?donateur='.$myDonateur->getid();
            // OutilCourriel::envoyer($courriel,$nomDntr,$subject, $message);
            header('Location: ../vues/merci.php');
            exit();
            } else {
            //echo "le donateur n'existe pas dans la BDD.";            
            }   
    }
    
      
   
} else {
    
    $dao = new DonnateurDAO();
    
    if($dao->createDonateurSansReg($nomDntr,$courriel,$tel,$adresse))
    {
        $myDonateur = $dao->findDonateurByEmail($courriel);
        $secondDao = new DonsDAO();
        $emp_id = $secondDao->AttibuerEmploye();
        $secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img);
        $message='Cher Donateur, Merci pour votre don. 
            Vous pouvez consulter vos dons toujour sur cette lien: 
            http://localhost:7710/projetD/ElenaProject-1-Test1/controleurs/AfficherDonsDonateur.php?donateur='.$myDonateur->getid();
    //  if($secondDao->createDon($myDonateur->getid(), $emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $img))
        //     OutilCourriel::envoyer($courriel,$nomDntr,$subject, $message);
    } else {
        echo "Erruer";
    }           
    header('Location: ../vues/merci.php');
    exit(); 
 
}


?>