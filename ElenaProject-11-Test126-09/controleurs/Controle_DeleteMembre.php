<?php
// if (!ISSET($_SESSION)) 
 //    session_start(); 
// if(!ISSET($_SESSION['admin']))    
//    {
 //      header('Location: connexion.php');
 //      exit();
 //   }

require_once('../modeles/config/MembreDAO.class.php');

if(isset($_GET['membreid']) && is_numeric($_GET['membreid']))
{
    $id = intval($_GET['membreid']);
    $dao = new MembreDAO();     
    $dao->deleteMembre($id);
    header('Location: ../vues/LesMembres.php');
}
?>

