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
            $ID= $format->validation($_POST['ID']);
            $ACTIF_NOM    = $format->validation($_POST['ACTIF']);
            $dao = new MembreDAO();  
            $dao->changerActivation($ACTIF_NOM, $ID);
            header('Location: ../vues/GestionBenevole.php');
               
        }       