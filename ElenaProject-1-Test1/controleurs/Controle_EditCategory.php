<?php

require_once('../modeles/config/CategoryDAO_class.php');
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
      else
          {
            //return une String au controleur frontale pour afficher la page precedante.
          }        
  }
  public function mettreAjour()
  {   
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
      $id = $_POST['categoryID'];
      $nm = $_POST['nomCat'];  
      $desc =  $_POST['desCat'];   
      $dao = new CategorieDAO();
      $dao->catUpdate($nm, $desc, $id);
      header('Location: LesCategories.php');      
    }       
  }
}


?>
