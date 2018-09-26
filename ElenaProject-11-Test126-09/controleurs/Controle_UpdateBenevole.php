<?php
if (!ISSET($_SESSION)) 
session_start(); 
if(!ISSET($_SESSION['userCourriel']))    
   {
      header('Location: ../vues/connexion.php');
      exit();
   }

require_once('../modeles/config/MembreDAO.class.php');
require_once('../modeles/config/Format.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $format = new Format();
            $COURRIEL= $format->validation($_POST['COURRIEL']);
            $ADRESSE    = $format->validation($_POST['ADRESSE']);
            $VILLE    = $format->validation($_POST['VILLE']);
            $CODE_POSTALE  = $format->validation($_POST['CODE_POSTALE']);  
            $PROVINCE    = $format->validation($_POST['PROVINCE']);
            $TELEPHONE   = $format->validation($_POST['TELEPHONE']); 

            $dao = new MembreDAO();  
            $dao->updateBenevole($ADRESSE, $VILLE, $CODE_POSTALE, $PROVINCE, $TELEPHONE,$COURRIEL);
            header('Location: ../vues/GestionBenevole.php');      
        }       