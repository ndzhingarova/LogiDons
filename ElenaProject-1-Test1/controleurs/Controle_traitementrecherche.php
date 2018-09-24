<?php
 
require_once('../modeles/config/DonsDAO.class.php');

class Controle_Chercher_Don
{
  public function getDon() // utile
  {
        // verification si la methode d'envoi est faite par le formulaire
   if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $id       = $_GET['id'];
            $courriel = $_GET['email'];
            // verifier si le donateur existe(on aura un tableau qui contient le detail du Don)
            // ou null (s'il n'existe pas)
            $dao = new DonsDAO();
            return $dao->trouverDonsDonateur($courriel, $id);          
        }
  }
}

?>