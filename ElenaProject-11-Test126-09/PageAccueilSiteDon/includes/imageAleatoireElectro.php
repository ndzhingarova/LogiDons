<?php

   //TABLEAU IMAGE ALEATOIRE ELECTROMENAGER
   $descElec='caractérise tous les appareils et outils utilisant l\'électricité ou non et destinés à assurer des besoins domestiques';
   $imagesElectro = array(
   array('file' => 'electro1','caption' => $descElec),
   array('file' => 'electro2','caption' => $descElec),
   array('file' => 'electro3','caption' => $descElec),
   array('file' => 'electro4','caption' => $descElec),
   array('file' => 'electro5','caption' => $descElec),
   array('file' => 'electro6','caption' => $descElec),
   array('file' => 'electro7','caption' => $descElec),
   array('file' => 'electro8','caption' => $descElec)
   );
   $iElectro = rand(0, count( $imagesElectro )-1);
   $selectedImageElectro = "PageAccueilSiteDon/images/imagesElectro/{$imagesElectro[$iElectro]['file']}.jpg";
   $caption = $imagesElectro[$iElectro]['caption'];
   
   if (file_exists( $selectedImageElectro) && is_readable( $selectedImageElectro)) {
       $imageSize = getimagesize( $selectedImageElectro);
       }  

