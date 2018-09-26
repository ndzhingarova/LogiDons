<?php
 if (!ISSET($_SESSION)) 
      session_start(); 
 if(!ISSET($_SESSION['admin']))    
    {
       header('Location: connexion.php');
       exit();
    }
require_once('../modeles/config/MembreDAO.class.php');

// verifier si c'est pour activer ou pour desactiver
if(isset($_GET['action']) && isset($_GET['idMembre']) && is_numeric($_GET['idMembre']))
  {
    $id = intval($_GET['idMembre']);
    $dao = new MembreDAO();
    if($_GET['action'] == 'activer')
        {
            $dao->changerActivation(1, $id); 
            header('Location: ../vues/PageAdmin.php');
            exit();
        }
    else
        {
            $dao->changerActivation(0, $id); 
            header('Location: ../vues/PageAdmin.php');
            exit();
        }    
  }


?>