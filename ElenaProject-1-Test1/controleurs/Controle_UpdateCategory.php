<?php
if (!ISSET($_SESSION)) 
session_start(); 
if(!ISSET($_SESSION['admin']))    
   {
      header('Location: ../vues/connexion.php');
      exit();
   }
require_once('../modeles/config/CategoryDAO.class.php');
require_once('../modeles/config/Format.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $format = new Format();
            $id   = $format->validation($_POST['categoryID']);
            $nm   = $format->validation($_POST['nomCat']);  
            $desc = $format->validation($_POST['desCat']);   
            
            $dao = new CategorieDAO();  
           
            $dao->catUpdate($nm, $desc, $id);
            header('Location: ../vues/LesCategories.php');      
        }       
 
?>
