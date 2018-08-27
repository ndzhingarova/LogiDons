<?php
if (!ISSET($_SESSION)) 
     session_start();

require_once('../modeles/classes/3-Membre_class.php');
require_once('../modeles/config/MembreDAO_class.php');

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $courriel   = $_POST['courriel'];
    $mdp        = $_POST['mdp'];
    $hashedPass = sha1($mdp);
    
    //verification de l'existance de l'utilisateur
    $dao = new MembreDAO();
    $user = $dao->findMembre($courriel, $hashedPass);

    //verification s'il nexiste pas ou a quel groupe il appartient
    if( $user )// c-a-d les donnees sont valides et le membre existe
        {
            $_SESSION['courriel'] = $courriel;
            $_SESSION['userName'] = $user->getNom();
            $_SESSION['userId']   = $user->getid();
            if($user->getGroupId() == 1) // admin
               {                                     
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
                    header('Location: ../vues/PageEmploye.php');
                    exit();
               }
            if($user->getGroupId() == 0) // un donnateur
               {                 
                    header('Location: ../vues/PageDonnateur.php');
                    exit();
               }      
        }      
    else // les donnees ne sont pas valides ou il n'existe pas
        {
            echo " infos erronnees.";
            // lui afficher encore le formulaire de login.
        }
        
}
else
{
    //  la methode d'envoi n'est POST ,
    //  lui retourner la page Accueil ou la page de connection.
}

?>









