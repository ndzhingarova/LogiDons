<?php

require_once('../modeles/config/MembreDAO.class.php');

class Controle_EditMembre
{
  public function getMembre() // utile
  {
      if( isset($_GET['membreid']) && is_numeric($_GET['membreid']) )
          {
              $id = intval($_GET['membreid']);
              //verifier si ce userid existe dans la BDD
              $dao = new MembreDAO();
              $membre = $dao->getMembreById($id);
              return $membre;              
          }
      else
          {
              header('Location: ../vues/connexion.php');
              exit();
          }        
  } 
}


?>
