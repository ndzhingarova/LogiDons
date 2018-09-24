<?php

//TABLEAU IMAGE ALEATOIRE VETEMENT
$descVet='Article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais <br> les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles';
$imagesVetement = array(
array('file' => 'vetement1','caption' => $descVet),
array('file' => 'vetement2','caption' => $descVet),
array('file' => 'vetement3','caption' => $descVet),
array('file' => 'vetement4','caption' => $descVet),
array('file' => 'vetement5','caption' => $descVet),
array('file' => 'vetement6','caption' => $descVet)
);

$iVet = rand(0, count( $imagesVetement)-1);
$selectedImageVet = "PageAccueilSiteDon/images/imagesVetement/{$imagesVetement[$iVet]['file']}.jpg";
$caption = $imagesVetement[$iVet]['caption']; 

if (file_exists($selectedImageVet ) && is_readable($selectedImageVet )) {
    $imageSize = getimagesize($selectedImageVet );
    } 

