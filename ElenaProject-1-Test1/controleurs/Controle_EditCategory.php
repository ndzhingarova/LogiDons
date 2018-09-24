<?php

if (!ISSET($_SESSION)) 
session_start(); 
if(!ISSET($_SESSION['admin']))    
   {
      header('Location: connexion.php');
      exit();
   } 

require_once('../modeles/config/CategoryDAO.class.php');

class Controle_EditCategory
{
  public function getCat()
  {
      if( isset($_GET['catid']) && is_numeric($_GET['catid']) )
          {
              $id = intval($_GET['catid']);
              //verifier si ce userid existe dans la BDD
              $dao = new CategorieDAO();
              $cat = $dao->getCatById($id);
              return $cat;              
          }            
  }
}


?>
