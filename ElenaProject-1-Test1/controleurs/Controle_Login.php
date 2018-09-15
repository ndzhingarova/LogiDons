<?php
if (!ISSET($_SESSION)) 
     session_start();

require_once('../modeles/classes/3-Membre.class.php');
require_once('../modeles/config/MembreDAO.class.php');
require_once('../modeles/config/Format.php');

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format = new Format();
    $courriel   = $format->validation($_POST['courriel']);
    $mdp        = $format->validation($_POST['mdp']);
    $hashedPass = sha1($mdp);
    
    //verification de l'existance de l'utilisateur
    $dao = new MembreDAO();
    $user = $dao->findMembre($courriel, $hashedPass);
    

    //verification s'il n'existe pas ou a quel groupe il appartient
    if( $user )// c-a-d les donnees sont valides et le membre existe
        {

            $_SESSION['connected'] = true;
            $_SESSION['userName'] = $user->getNom();
            $_SESSION['userId']   = $user->getid();
            
            if($user->getGroupId() == 1) // admin
               {       
                    $_SESSION['admin'] = "admin";                              
                    header('Location: ../vues/PageAdmin.php');
                    exit();
               }
            if($user->getGroupId() == 2) // superviseur
               {                  
                    header('Location: ../vues/PageSuperviser.php');
                    exit();
               }
            if($user->getGroupId() == 3) // employee (permanent ou volentaire)
               {    
                    $_SESSION['employe'] = "employe";              
                    header('Location: ../vues/AfficherDonsEmploye.php');
                    exit();
               }             
        }      
    else // les donnees ne sont pas valides ou il n'existe pas
        {
            echo " infos erronnees.";
            header('Location: ../vues/connexion.php');
            exit();
        }     
}
else
{
    //  la methode d'envoi n'est POST ,
    header('Location: ../vues/connexion.php');
    exit();
}
?>