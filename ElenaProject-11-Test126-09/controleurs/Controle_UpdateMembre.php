<?php
if (!ISSET($_SESSION)) 
session_start(); 
if(!ISSET($_SESSION['admin']))    
   {
      header('Location: ../vues/connexion.php');
      exit();
   }
require_once('../modeles/config/MembreDAO.class.php');
require_once('../modeles/config/Format.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $format = new Format();
            $id    = $format->validation($_POST['membreID']);
            $nom    = $format->validation($_POST['nomMemb']);
            $email  = $format->validation($_POST['emailMemb']);  
            $tel    = $format->validation($_POST['telMemb']);
            $adresse   = $format->validation($_POST['adresse']);
            $etat   = $format->validation($_POST['etatMemb']);
            $statut = $format->validation($_POST['statMemb']);
            echo $id."<br>";  
            echo $nom."<br>";echo $email."<br>";echo $tel."<br>";
            echo $adresse."<br>";echo $etat."<br>";echo $statut."<br>";
            $dao = new MembreDAO();  
           
            $dao->updateMembre($id, $nom, $email, $tel, $adresse, $etat, $statut);
            header('Location: ../vues/LesMembres.php');      
        }       
 
?>
