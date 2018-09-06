<?php

require_once('../modeles/classes/5-Donnateurs_class.php');
require_once('../modeles/config/DonnateurDAO_class.php');
require_once('../modeles/config/Format.php');

// verification si la methode d'envoi est faite par le formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // recuperation des donnees envoyees
    $format = new Format();
    $nom        = $format->validation($_POST['nomPrenom']);
    $courriel   = $format->validation($_POST['courriel']);
    $mdp        = $format->validation($_POST['mdp']);
    $tel        = $format->validation($_POST['tel']);
    $adresse    = $format->validation($_POST['adresse']);
    // l'encodage du mot de passe
    $hashedPass = sha1($mdp);
    
    //verification si l'email envoye existe deja dans la BDD   
    $dao = new DonnateurDAO();
    $nbExist = $dao->findEmail($courriel);
    if($nbExist == 0)
    {
        $dao->createDonnateur($nom,$courriel,$adresse,$tel,$hashedPass);
        //envoyer un message de reussite d'insertion     
        header('Location: ');
        exit();
    }
    else
    {
        echo "l'email utilisé existe deja dans la BDD.<br>
              Veuillez choisir un autre, S.V.P.";
        header('Location: ');
        exit();
    }  
}
else
{
    // la methode d'envoi n'est pas POST,
    // lui retourner la page Accueil ou la page de connection( choisir ).
    header('Location: ');
    exit();
}

?>