
 <?php
 //On utilise ici un tableau multi dimensionnele pour stocker l'image et sa legende
 //Pour pouvoir afficher l'image et la légende correspondante
 $imagesArgent = array(
 array('file' => 'Don_argent',
 'caption' => '  Merci'),
 array('file' => 'don-dargent',
 'caption' => 'Merci'),
 array('file' => 'faire-un-don-d-argent',
 'caption' => 'Merci')
 );
 $i = rand(0, count($images)-1);
 $selectedImage = "images/imagesArgent/{$images[$i]['file']}.jpg";
 $caption = $imagesArgent[$i]['caption']; 
 /*L'instruction if utilise deux fonctions, file_exists () et is_readable (), 
 pour s'assurer $selectedImage existe non seulement mais aussi qu'il est
  accessible (il peut être corrompu ou avoir les mauvaises permissions).
 Ces fonctions renvoient des valeurs booléennes (true ou false), de sorte
qu'elles peuvent être utilisées  directement dans le cadre de l'instruction conditionnelle.*/
 if (file_exists($selectedImage) && is_readable($selectedImage)) {
    $imageSize = getimagesize($selectedImage);
    } 
 


    
    $imagesVetements = array(
        array('file' => 'facebookLogo',
        'caption' => '  logo facebook'),
        array('file' => 'instagramLogo',
        'caption' => 'instagram Logo'),
        array('file' => 'flickrLogoMini',
        'caption' => 'flickr Logo Mini'),
        array('file' => 'linkelinLogo',
        'caption' => 'linkelin Logo'),
        array('file' => 'twitterLogo',
        'caption' => 'twitter Logo'),
        array('file' => 'youTubeAccueil',
        'caption' => 'youTube Accueil')
        );
        $i = rand(0, count($images)-1);
        $selectedImage = "images/{$images[$i]['file']}.jpg";
        $caption = $images[$i]['caption']; 
        /*L'instruction if utilise deux fonctions, file_exists () et is_readable (), 
        pour s'assurer $selectedImage existe non seulement mais aussi qu'il est
         accessible (il peut être corrompu ou avoir les mauvaises permissions).
        Ces fonctions renvoient des valeurs booléennes (true ou false), de sorte
       qu'elles peuvent être utilisées  directement dans le cadre de l'instruction conditionnelle.*/
        if (file_exists($selectedImage) && is_readable($selectedImage)) {
           $imageSize = getimagesize($selectedImage);
           } 
        

