<?php

    //TABLEAU IMAGE ALEATOIRE DON
    $descDon='offrir sans contrepartie apparente un objet, un bien matériel ou immatériel, de l\'argent,';
    $imagesDon = array(

    array('file' => 'don33','caption' => $descDon),


    );
    
    $iDon = rand(0, count( $imagesDon)-1);
    $selectedImageDon = "PageAccueilSiteDon/images/imagesDon/{$imagesDon[$iDon ]['file']}.jpg";
    $caption = $imagesDon[$iDon]['caption']; 
    
    /*L'instruction if utilise deux fonctions, file_exists () et is_readable (), 
    pour s'assurer $selectedImage existe non seulement mais aussi qu'il est
    accessible (il peut être corrompu ou avoir les mauvaises permissions).
    Ces fonctions renvoient des valeurs booléennes (true ou false), de sorte
    qu'elles peuvent être utilisées  directement dans le cadre de l'instruction conditionnelle.*/
    if (file_exists($selectedImageDon) && is_readable($selectedImageDon)) {
    $imageSize = getimagesize($selectedImageDon);
    } 