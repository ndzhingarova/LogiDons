<?php

//TABLEAU IMAGE ALEATOIRE EMAIL
$descEmail='  ';
$imagesEmail = array(
array('file' => 'modifier-definition','caption' => $descEmail)
/*array('file' => 'email2','caption' => $descEmail),
array('file' => 'email3','caption' => $descEmail),
array('file' => 'email4','caption' => $descEmail)*/

);

$iEmail = rand(0, count( $imagesEmail)-1);
$selectedImageEmail = "PageAccueilSiteDon/images/imagesEmail/{$imagesEmail[$iEmail ]['file']}.jpg";
$caption = $imagesEmail[$iEmail]['caption']; 

if (file_exists($selectedImageEmail) && is_readable($selectedImageEmail)) {
$imageSize = getimagesize($selectedImageEmail);
} 