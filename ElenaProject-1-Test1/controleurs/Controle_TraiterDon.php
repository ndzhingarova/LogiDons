<?php
if (!ISSET($_SESSION)) 
    session_start();
    $pageTitle = 'CreateUser';
    include('../vues/header.php');
    require_once('../modeles/config/DonsDAO.class.php');
    require_once('../modeles/config/DonnateurDAO.class.php');
    require_once("../modeles/classes/OutilCourriel.php");
    include('../vues/navBar.php'); 
    if (ISSET($_REQUEST["traiter"])){
        switch($_REQUEST["traiter"]){
            case "accepter":
            $dao = new DonsDAO();
            $don = $_SESSION["don"];
            $don = $dao->accepterDon($don);
            $message = "Cher Donateur, Nous acceptons votre don.";
            OutilCourriel::envoyer($_SESSION["donateurCourriel"],$_SESSION["donateur"], $message);
            break;
            case "refuser":
            $dao = new DonsDAO();
            $don = $_SESSION["don"];
            $don = $dao->refuserDon($don);
            $message = "Cher Donateur, Nous voulons vous informes que nous ne pouvons pas accepter le don que vous avez proposer.";
            OutilCourriel::envoyer($_SESSION["donateurCourriel"],$_SESSION["donateur"], $message);
            break;
        }
    }
    //header('Location: ../vues/AfficherDonsEmploye.php');
    //exit();
    

?>