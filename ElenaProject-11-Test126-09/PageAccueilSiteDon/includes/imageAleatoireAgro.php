<?php

 //TABLEAU IMAGE ALEATOIRE AGROALIMENTAIRE
 $descAgro='aliments issus de l\'agriculture ou de la pêche et transformés en  aliments industriels destinés essentiellement à la consommation humaine';
 $imagesAgroalimentaire = array(
array('file' => 'agro1','caption' => $descAgro),
array('file' => 'agro2','caption' => $descAgro),
array('file' => 'agro3','caption' => $descAgro),
array('file' => 'agro4','caption' => $descAgro),
array('file' => 'agro5','caption' => $descAgro),
array('file' => 'agro6','caption' => $descAgro)
);

    $iAgro = rand(0, count( $imagesAgroalimentaire)-1);
 $selectedImageAgro = "PageAccueilSiteDon/images/imagesAgroalimentaire/{$imagesAgroalimentaire[$iAgro]['file']}.jpg";
 $caption = $imagesAgroalimentaire[$iAgro]['caption']; 
 if (file_exists($selectedImageAgro) && is_readable($selectedImageAgro)) {
    $imageSize = getimagesize($selectedImageAgro);
    } 