<?php

require_once('../modeles/config/DonnateurDAO_class.php');
class Controle_EditMembre
{
  public function getMembre() // utile
  {
      if( isset($_GET['membreid']) && is_numeric($_GET['membreid']) )
          {
              $id = intval($_GET['membreid']);
              //verifier si ce userid existe dans la BDD
              $dao = new DonnateurDAO();
              $membre = $dao->getMembreById($id);
              return $membre;              
          }
      else
          {
            
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
