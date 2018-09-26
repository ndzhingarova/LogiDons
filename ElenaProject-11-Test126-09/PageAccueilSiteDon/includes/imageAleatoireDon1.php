<?php

//TABLEAU IMAGE ALEATOIRE DON1

$descDon1='';
$imagesDon1 = array(
   /* array('file' => 'don11', 'caption' => $descDon1),
    array('file' => 'don22', 'caption' => $descDon1),
    array('file' => 'faire1', 'caption' => $descDon1),
    array('file' => 'faire2', 'caption' => $descDon1),*/
    array('file' => 'faire4', 'caption' => $descDon1)
   // array('file' => 'faire5', 'caption' => $descDon1)

    );
    
    $iDon1 = rand(0, count( $imagesDon1)-1);
    $selectedImageDon1 = "PageAccueilSiteDon/images/imagesDon1/{$imagesDon1[$iDon1 ]['file']}.jpg";
    $caption = $imagesDon1[$iDon1]['caption']; 
    
    if (file_exists($selectedImageDon1) && is_readable($selectedImageDon1)) {
    $imageSize = getimagesize($selectedImageDon1);
    } 
