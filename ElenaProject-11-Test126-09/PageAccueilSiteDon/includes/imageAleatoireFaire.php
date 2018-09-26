
 <?php
 //On utilise ici un tableau multi dimensionnele pour stocker l'image et sa legende
 //Pour pouvoir afficher l'image et la légende correspondante
 
//TABLEAU IMAGE ALEATOIRE FAIRE
$descFaire='Merci';
$imagesFaire = array(
array('file' => 'faire1','caption' => $descFaire),
array('file' => 'faire2','caption' => $descFaire),
array('file' => 'faire3','caption' => $descFaire),
array('file' => 'faire4','caption' => $descFaire),
array('file' => 'faire5','caption' => $descFaire)
);

$iFaire = rand(0, count( $imagesFaire)-1);
$selectedImageFaire = "PageAccueilSiteDon/images/imagesFaireDon/{$imagesFaire[$iFaire ]['file']}.jpg";
$caption = $imagesFaire[$iFaire]['caption']; 

if (file_exists($selectedImageFaire) && is_readable($selectedImageFaire)) {
$imageSize = getimagesize($selectedImageFaire);
} 


    
  
           

