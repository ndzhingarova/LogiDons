<?php
if (!ISSET($_SESSION)) 
session_start(); 
if($_SESSION['courriel'] != "admin@admin.ca")    
   {
      header('Location: connexion.php');
      exit();
   }
require_once('../modeles/config/CategoryDAO_class.php');
require_once('../modeles/config/Format.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $format = new Format();
            $id   = $format->validation($_POST['categoryID']);
            $nm   = $format->validation($_POST['nomCat']);  
            $desc = $format->validation($_POST['desCat']);   
            echo $id;echo $nm;echo $desc;
            $dao = new CategorieDAO();  
           
            $dao->catUpdate($nm, $desc, $id);
            header('Location: ../vues/LesCategories.php');      
        }       
 
?>