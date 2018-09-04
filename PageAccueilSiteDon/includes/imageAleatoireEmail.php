<?php

//TABLEAU IMAGE ALEATOIRE EMAIL
$descEmail='Un Email pour sauver des vies  ';
$imagesEmail = array(
array('file' => 'email1','caption' => $descEmail),
array('file' => 'email2','caption' => $descEmail),
array('file' => 'email3','caption' => $descEmail),
array('file' => 'email4','caption' => $descEmail),
array('file' => 'email5','caption' => $descEmail),
array('file' => 'email6','caption' => $descEmail),
array('file' => 'email7','caption' => $descEmail)
);

$iEmail = rand(0, count( $imagesEmail)-1);
$selectedImageEmail = "images/imagesEmail/{$imagesEmail[$iEmail ]['file']}.jpg";
$caption = $imagesEmail[$iEmail]['caption']; 

if (file_exists($selectedImageEmail) && is_readable($selectedImageEmail)) {
$imageSize = getimagesize($selectedImageEmail);
} 