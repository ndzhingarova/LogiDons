

<!DOCTYPE html>
<html >
<head>
<?php



?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   <link rel="stylesheet" href="CSS/style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <title><?php echo 'title' ?></title> 
</head>
<body >  
<div class="container-fluid">
        <div class="row">
         <!-- ASIDE LEFT -->
            <div class="col-sm-2">
                <aside>         
                 <h4 class="text-success">Catégorie de dons</h4>
                    <table>
                    <th class="text-danger">Argent</th>
                    <tr>
                    <td> 
                        <div  class="view overlay">
                            <?php 
                            require_once('./includes/imageAleatoireArgent.php');
                            if (isset($imageSize)) { ?> 
                                <img src="<?php echo  $selectedImageArgent;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3];?>>
                                <a href="#"   data-toggle="modal" data-target=".modal-argent">Details...</a>
                                        <div class="modal fade modal-argent" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><?php echo $caption; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                            <?php } ?>  
                        </div>      
                    </td>
                    </tr>
                    </table>
                    <table >
                        <th class="text-danger">Vêtement</th>
                        <tr>
                            <td> 
                                <div class="view overlay">
                                    <?php 
                                    require_once('./includes/imageAleatoireVetement.php');
                                    if (isset($imageSize)) { ?> 
                                        <img src="<?php echo $selectedImageVet;?>" alt="image aléatoire" class="img-fluid "<?php echo $imageSize[3]; ?>>
                                        <a href="#"   data-toggle="modal" data-target=" .modal-vetement">Details...</a>
                                        <div class="modal fade modal-vetement" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><?php echo $caption; ?></p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php } ?> 
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <th class="text-danger">Agroalimentaire</th>
                        <tr>
                            <td> 
                                <div class="view overlay"> 
                                    <?php 
                                        require_once('./includes/imageAleatoireAgro.php');
                                        if (isset($imageSize)) { ?> 
                                            <img src="<?php echo $selectedImageAgro;  ?>"alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3];?>>
                                            <a href="#"   data-toggle="modal" data-target=" .modal-agro">Details...</a>
                                            <div class="modal fade modal-agro" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="alert alert-warning" role="alert">
                                                        <p id="caption" class="alert-link text-success"><?php echo $caption; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <th class="text-danger">Électromenager</th>
                        <tr>
                            <td> 
                                <div class="view overlay"> 
                                    <?php 
                                    require_once('./includes/imageAleatoireElectro.php');
                                    if (isset($imageSize)) { ?> 
                                        <img src="<?php echo  $selectedImageElectro ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3]; ?>>
                                        <a href="#"   data-toggle="modal" data-target=".modal-electro">Details...</a>
                                        <div class="modal fade modal-electro" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><?php echo $caption; ?></p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    <?php } ?> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </aside>
            </div>
             <!-- SECTION BODY -->
                <div class="col-sm-8" id="imageHeader" >
                    <header >
                        <h1 align="center" class="text-warning">FONDATION COEUR-ESPOIR</h1>
                        <img src="" alt="" srcset="">
                    </header>
                    <section>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="view overlay"> 
                                    <?php 
                                        require_once('./includes/imageAleatoireDon.php');
                                        if (isset($imageSize)) { ?> 
                                            <img src="<?php echo  $selectedImageDon ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3]; ?>>                                   
                                           
                                    <?php }?>                                 
                                </div>
                            </div>
                        </div> 
                    </section>
                    <section>
                        <div class="row">
                            <div class="col-sm-5" >
                                <div class="modal fade  modal-merci" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="alert alert-warning" role="alert">
                                                <span  class="alert-link text-info" > <p >
                                                    Un don  permet à des personnes de survivre et de s’épanouir. Nous travaillons avec des partenaires et les gouvernements dans 190 pays. Nous bâtissons des infrastructures, procurons des services essentiels et travaillons sans relâche afin que chaque enfant puisse survivre et s’épanouir.
                                                Nous ne pourrions pas accomplir notre travail sans le soutien de généreux donateurs et donatrices comme vous : nous sommes 100 % tributaires de contributions volontaires pour mettre en œuvre nos programmes et continuer notre travail.
                                                Votre don sera utilisé dès maintenant afin de faire du monde un endroit meilleur pour les enfants vulnérables. Nous vous remercions d’avoir choisi de donner à notre organisme.
                                                </p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-2" ></div>
                            <div class="col-sm-5" >
                                <div class="view overlay"> 
                                    <?php 
                                    require_once('./includes/imageAleatoireDon1.php');
                                    if (isset($imageSize)) { ?> 
                                        <img src="<?php echo  $selectedImageDon1 ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3]; ?>>
                                        <div class="alert alert-warning" role="alert">
                                             <span class="alert-link text-danger"><?php echo $caption; ?></span>
                                            </div> 
                                    <?php } ?> 
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".modal-merci">
                                        MERCI
                                    </button>                                   
                                </div>
                            </div>
                        </section>
                    </div>              
                  
            <!-- ASIDE RIGTH -->
            <div class="col-sm-2">
                <aside>
                    <div class="view overlay">
                        
                        <div class="mask flex-center rgba-green-slight">
                                <h4  class="text-success">Comment proposer un don </h4>
                                <ul class="text-info" >
                                    <li><strong>Entrer votre email</strong>
                                    <div class="view overlay"> 
                                        <?php 
                                        require_once('./includes/imageAleatoireEmail.php');
                                        if (isset($imageSize)) { ?> 
                                           <img src="<?php echo  $selectedImageEmail ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3]; ?>>
                                           <div class="mask flex-center rgba-green-light">
                                              <p id="caption" class="text-danger"><?php echo $caption; ?></p>
                                            </div> 
                                        <?php } ?>  
                                 </div>
                    </div></li>
                                    
                                    <li class="text-infos"><strong>Faire un dons</strong>
                                    <div class="view overlay"> 
                                    <?php 
                                    require_once('./includes/imageAleatoireFaire.php');
                                    if (isset($imageSize)) { ?> 
                                        <img src="<?php echo  $selectedImageFaire ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[3]; ?>>
                                        <div class="mask flex-center rgba-green-light">
                                        <p id="caption" class="text-danger"><?php echo $caption; ?></p>
                                        </div> 
                                    <?php } ?> 
                                </div>
                                   </li>
                                </ul>
                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/People/6-col/img%20(12).jpg" class="img-fluid " alt="">
                            </p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    




     <!-- jQuery CDN - Slim version (=without AJAX)-->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

</body>
</html>