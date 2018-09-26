
<?php
if (!ISSET($_SESSION)) 
     session_start();

require_once('../modeles/classes/3-Membre.class.php');
require_once('../modeles/config/MembreDAO.class.php');
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
            $_SESSION['userCourriel'] = $user->getCourriel();
            
            if($user->getGroupId() == 1) // admin
               {    
                    $_SESSION['admin'] = "admin";                                                 
                    $message = "Connection réussi.";
                    $class   = "success";
                    $url     = "../vues/PageAdmin.php";
                    $nomPage = "la page Administrateur";   
                    $format->redirect($message, $class, $url, $nomPage);                  
               }         
            if($user->getGroupId() == 3) // employee (permanent ou volentaire)
               {                  
                    header('Location: ../vues/PageEmploye.php');
                    exit();
               }  
             if($user->getGroupId() == 4 && $user->getEtat()==1) // employee (permanent ou volentaire)
               {                  
                    header('Location: ../vues/GestionBenevole.php');
                    exit();
               }else
               {
                $message = "Vous n'êtes plus actif.<br>Veuiller activer votre compte";
                $class   = "danger";
                $url     = "../vues/connexion.php";
                $nomPage = "la page de connection";   
                $format->redirect($message, $class, $url, $nomPage);
               }                  

        }      
    else // les donnees ne sont pas valides ou il n'existe pas
        {
            $message = "Les données ne sont pas valides.<br>Vérifier la syntaxe de vos identifiants";
            $class   = "danger";
            $url     = "../vues/connexion.php";
            $nomPage = "la page de connection";   
            $format->redirect($message, $class, $url, $nomPage); 
        }            
}
else // si la methode d'envoi n'est POST
{
    $message = "Veuillez vous connectez par le formulaire.";
    $class   = "danger";
    $url     = "../vues/connexion.php";
    $nomPage = "la page de connection";   
    $format->redirect($message, $class, $url, $nomPage); 
}

?>









