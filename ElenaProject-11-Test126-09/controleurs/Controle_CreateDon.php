<?php
if (!ISSET($_SESSION)) 
    session_start();

require_once('../modeles/config/DonnateurDAO.class.php');
require_once('../modeles/config/DonsDAO.class.php');
require_once('../modeles/config/Format.php');
require_once("../modeles/config/MembreDAO.class.php");
require_once("../modeles/classes/OutilCourriel.php");

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

$donateurDao = new DonnateurDAO();
$donDao      = new DonsDAO();

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format = new Format();
/* -------------------------------------------------------------------------------------------------------------------------------
----------------------                           Recuperation des donnees                             ----------------------------
--------------------------------------------------------------------------------------------------------------------------------*/
    $nomImage = "";
    $nom         = $format->validation($_POST['nomDon']);        // nom du don
    $qtt         = $format->validation($_POST['qttDon']);        // quantite donnee
    $catDon      = $format->validation($_POST['catDon']);        // categorie du don
    $DescDon     = $format->validation($_POST['DescDon']);       // description du don
    $modeLivr    = $format->validation($_POST['ModeLivraison']); // mode de livraison du don
    $montantDon  = $format->validation($_POST['montantDon']);    // montant du don
    $dtPrm       = $format->validation($_POST['dateDon']);       // date promise de la livraison
    if($_FILES['img']['name'] != "")
       {
           $nomInputPhoto = 'img';
           $nomImage = $donDao->traiterImage($nomInputPhoto, $_FILES, $chemin);          
       }     
    else  
       {
           $nomImage = "aucune photo fournie";
       }    

    $nomComp = null;  
    $nomDntr     = $format->validation($_POST['nomDontr']);   // nom du donnateur
    $courriel    = $format->validation($_POST['courriel']);   // courriel du donnateur
    $tel         = $format->validation($_POST['tel']);        // telephone du donnateur
    $adresse     = $format->validation($_POST['adresse']);    // adresse
    $ville       = $format->validation($_POST['ville']);      // nom de la ville
    $codePostale = $format->validation($_POST['codePostale']);// code postale
    $province    = $format->validation($_POST['province']);   // province

/* -------------------------------------------------------------------------------------------------------------------------------
----------------------         Fin de la  Recuperation des donnees               ----------------------------
--------------------------------------------------------------------------------------------------------------------------------*/      
/* -------------------------------------------------------------------------------------------------------------------------------
----------------------            Debut : si le Donateur est une Entreprise          --------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------*/

    // vérifier si le Donateur est une entreprise ou une personne
    if( ISSET($_POST['checkCompagnie']) ) // si le donateur est une Entreprise
    {    
        // recuperer le nom de la compagnie
        $nomComp = $format->validation($_POST['nomCompagnie']); 

        // il se peut que le donateur est une entreprise, mais il a oublié
        // d'écrire son nom (ou il l'avait effacé volentairement)
        if(empty($nomComp))
           { 
                // lui envoyer un message que le nom de l'entreprise est obligatoire           
                $message = "Le nom de l'entreprise est obligatoire pour inserer le don.<br>
                            Veuillez-en fournir un S.V.P.";
                $class   = "danger";
                $url     = "../vues/CreateDon.php";
                $nomPage = "la page precedante";   
                $format->redirect($message, $class, $url, $nomPage,5);
           } 
       
        // verifier si la compagnie existe deja dans la BDD ou pas
        $compagnie = $donateurDao->findCompByName($nomComp);
        if( $compagnie )  // si la compagnie existe deja dans la BDD
           {               
                // on recupere son ID               
                $idCompagnie = $compagnie->getID();
                // on recupere l'ID du prochain Employe qui va traiter le Don
                $empId = $donDao->AttibuerEmploye();
                // on verifie si le nom du Contact existe deja dans la BDD ou pas
                $donateur = $donateurDao->findDonateurByNameByCourriel($nomDntr, $courriel);
                if($donateur)  // si le Contact de la Compagnie existe déja dans la BDD
                    {
                        // on recupere son ID
                        $idContact = $donateur->getid();                   
                        //on insere le Don
                        $nomImage = $donDao->traiterImage('img');
                        $donDao->createDon1($idContact,$empId,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$nomImage,$idCompagnie);                                        
                        $message = "L'enregistrement de votre est effectué avec succes<br> .";
                        $class   = "success";
                        $url     = "../index.php";
                        $nomPage = "la page Accueil";   
                        $format->redirect($message, $class, $url, $nomPage);
                    }
                else // si le Contact de la Compagnie n'existe pas dans la BDD
                    {
                        // on insere le nouveau Contact de la Compagnie dans la BDD
                        $donateurDao-> createDonateurSansReg($nomDntr,$courriel,$adresse,$ville,$codePostale,$province,$tel);
                        // on recupere son ID 
                        $contact = $donateurDao->findDonateurByEmail($courriel);
                        $idContact = $contact->getid();
                        //on insere le Don
                        $nomImage = $donDao->traiterImage('img');
                        $donDao->createDon1($idContact,$empId,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$nomImage,$idCompagnie);
                        $message = "L'enregistrement de votre est effectué avec succes<br> .";
                        $class   = "success";
                        $url     = "../index.php";
                        $nomPage = "la page Accueil";   
                        $format->redirect($message, $class, $url, $nomPage);
                    }
           }
         else // si la compagnie n'existe pas dans la BDD
           {   
                // on insere la Compagnie dans la BDD
                $donateurDao->insererNouvelleEntreprise($nomComp);
                // on recupere son ID
                $compagnie = $donateurDao->findCompByName($nomComp);
                $idCompagnie = $compagnie->getID();
                // on insere le Contact de la Compagnie              
                $donateurDao = new DonnateurDAO();
                $donateurDao->createDonateurSansReg($nomDntr,$courriel,$adresse,$ville,$codePostale,$province,$tel);                        
                // on recupere son ID
                $contact = $donateurDao->findDonateurByEmail($courriel);
                $idContact = $contact->getid();
                // on recupere l'ID du prochain Employe qui va traiter le Don   
                $empId = $donDao->AttibuerEmploye();
                $nomImage = $donDao->traiterImage('img');
                //on insere le Don
                $donDao->createDon1($idContact,$empId,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$nomImage,$idCompagnie);
                $message = "L'enregistrement de votre est effectué avec succes<br> .";
                $class   = "success";
                $url     = "../index.php";
                $nomPage = "la page Accueil";   
                $format->redirect($message, $class, $url, $nomPage);              
            }
    }
/* -------------------------------------------------------------------------------------------------------------------------------
----------------------                 Fin : si le Donateur est une Entreprise        --------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------*/
/* -------------------------------------------------------------------------------------------------------------------------------
----------------------              Debut : si le Donateur est une Personne           --------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------*/   
    else // si le donateur est une personne
    {
        // vérifier si le donateur existe déja dans la BDD         
        $myDonateur = $donateurDao->findDonateurByEmail($courriel);
        if($myDonateur)  // si le donateur existe deja
           {                   
                $secondDao = new DonsDAO();
                // on recupere l'ID du prochain Employe qui va traiter le Don
                $emp_id = $secondDao->AttibuerEmploye();

                $nomImage = $secondDao->traiterImage('img');
                $secondDao->createDon1($myDonateur->getid(),$emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $nomImage);  
   
                // OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());          
                $message = "L'enregistrement de votre est effectué avec succes<br> .";
                $class   = "success";
                $url     = "../index.php";
                $nomPage = "la page Accueil";   
                $format->redirect($message, $class, $url, $nomPage);
           }
        else  //si le donateur n'existe pas dans la BDD
           {
            // on l'insere d'abord dans la BDD      
            if( $donateurDao->createDonateurSansReg($nomDntr,$courriel,$adresse,$ville,$codePostale,$province,$tel) )
                {   // si l'isertion est reussi, on recupere son ID
                    $myDonateur = $donateurDao->findDonateurByEmail($courriel);
                    $secondDao = new DonsDAO();
                    $emp_id = $secondDao->AttibuerEmploye();
                    $nomImage = $secondDao->traiterImage('img');
                    if($secondDao->createDon1($myDonateur->getid(),$emp_id,$catDon,$nom,$DescDon,$qtt, $modeLivr,$montantDon, $dtPrm, $nomImage))                   
                        {
                            $secondDao->traiterImage('img');
                            $message = "L'enregistrement de votre est effectué avec succes<br> .";
                            $class   = "success";
                            $url     = "../index.php";
                            $nomPage = "la page Accueil";   
                            $format->redirect($message, $class, $url, $nomPage,10);
                            // OutilCourriel::envoyer($courriel,$nomDntr,$myDonateur->getid());
                        }
                }               
            else 
                {
                    $message = "Oups...!<br>Une erreur est survenue lors de votre enregistrement<br>.
                                Aucune donnee n'a ete enregistree<br>";
                    $class   = "danger";
                    $url     = "../vues/CreateDon.php";
                    $nomPage = "la page precedante.";   
                    $format->redirect($message, $class, $url, $nomPage,5);
                }             
            }                      
    } 
/* -------------------------------------------------------------------------------------------------------------------------------
----------------------            Fin : si le Donateur est une Personne               --------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------*/      
}
else
{
    // si la methode d'envoi n'est pas POST
    $message = "Veuillez vous connectez par le formulaire.";
    $class   = "danger";
    $url     = "../vues/CreateDon.php";
    $nomPage = "la page de connection";   
    $format->redirect($message, $class, $url, $nomPage);
}
?>

