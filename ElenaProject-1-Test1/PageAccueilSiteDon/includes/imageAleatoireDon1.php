<?php

//TABLEAU IMAGE ALEATOIRE DON1
$descDon1='Merci à tous nos donateurs grâce à vous nous procurons du sourire et sauvons des vies';
$imagesDon1 = array(
    array('file' => 'dons1', 'caption' => $descDon1),
    array('file' => 'dons2', 'caption' => $descDon1),
    array('file' => 'dons3', 'caption' => $descDon1),
    array('file' => 'dons4','caption' => $descDon1),
    array('file' => 'dons5','caption' => $descDon1),
    array('file' => 'dons6', 'caption' => $descDon1),
    array('file' => 'dons7', 'caption' => $descDon1),
    array('file' => 'dons8', 'caption' => $descDon1),
    array('file' => 'dons9','caption' => $descDon1),
    array('file' => 'dons10','caption' => $descDon1),
    array('file' => 'dons10','caption' => $descDon1)
    );
    
    $iDon1 = rand(0, count( $imagesDon1)-1);
    $selectedImageDon1 = "PageAccueilSiteDon/images/imagesDon1/{$imagesDon1[$iDon1 ]['file']}.jpg";
    $caption = $imagesDon1[$iDon1]['caption']; 
    
    if (file_exists($selectedImageDon1) && is_readable($selectedImageDon1)) {
    $imageSize = getimagesize($selectedImageDon1);
    } 
