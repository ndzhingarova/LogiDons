<?php

$descArg='matérialisé sous la forme de billets et de pièces de monnaie, qui est accepté par une société pour payer des biens, des services et toute sorte d’obligations.';
//TABLEAU IMAGE ALEATOIRE ARGENT
$imagesArgent = array(
array('file'    => 'argent1','caption' => $descArg),
array('file'    => 'argent2','caption' => $descArg),
array('file'    => 'argent3','caption' => $descArg),
array('file'    => 'argent4','caption' => $descArg),
array('file'    => 'argent5','caption' => $descArg),
array('file'    => 'argent6','caption' => $descArg),
array('file'    => 'argent7','caption' => $descArg)
);

$iArg = rand(0, count( $imagesArgent)-1);
$selectedImageArgent = "PageAccueilSiteDon/images/imagesArgent/{$imagesArgent[$iArg]['file']}.jpg";
$caption = $imagesArgent[$iArg]['caption']; 

if (file_exists($selectedImageArgent) && is_readable($selectedImageArgent)) {
   $imageSize = getimagesize($selectedImageArgent);
   } 

