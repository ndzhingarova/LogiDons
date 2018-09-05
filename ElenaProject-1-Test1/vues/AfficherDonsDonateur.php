<?php

echo 'Yoyoyo';
require_once('../modeles/config/DonsDAO.class.php');

if(ISSET($_GET['donateur'])){

    $dao = new DonsDAO();
    $listeDons = $dao->trouverDonsDonateur($_GET['donateur']);
    echo '<ul>';
    foreach($listeDons as $don){
        echo '<li>';
        $don->getNomDon();
        echo '</il>';
    }

    echo '</ul>';
} else {
    header('Location: ../vues/CreateDon.php');
    exit();
}
