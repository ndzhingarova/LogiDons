<?php
 if (!ISSET($_SESSION)) 
 session_start(); 
 if(!ISSET($_SESSION['admin']))    
    {
       header('Location: connexion.php');
       exit();
    }
require_once('../modeles/config/CategoryDAO.class.php');

if(isset($_GET['catid']) && is_numeric($_GET['catid']))
{
    $id = intval($_GET['catid']);
    $dao = new CategorieDAO();     
    $dao->deleteCat($id);
    header('Location: ../vues/LesCategories.php');
}
?>