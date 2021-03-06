<link rel="stylesheet" href="PageAccueilSiteDon/CSS/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>


<?php
if (!ISSET($_SESSION))
{		
   session_start();
   if(!isset( $_SESSION['courriel']))
   {
       $_SESSION['courriel'] = ''; 
       $_SESSION['userName'] = '';
   }        
}
    $pageTitle = "La page Index";    
    include('vues/header.php');
    include('vues/navBar.php');    
?>
 <div class="container-fluid  " >
        <div class="row">
         <!-- ASIDE LEFT -->
            <div class="col-sm-2">
                <aside>         
                 <h2 class="text-success">Catégorie de dons</h2>
                    <table>
                    <th class="text-info"><a href="" data-toggle="modal" data-target=".modal-argent"><h3> Argent: </h3> </a></th>  
                    <tr>
                    <td> 
                        <div  class="view overlay">
                            <?php 
                            require_once('./PageAccueilSiteDon/includes/imageAleatoireArgent.php');
                            if (isset($imageSize)) { ?> 
                            <a href="#"  data-toggle="modal" data-target=".modal-argent"><img src="<?php echo  $selectedImageArgent;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0];?>></a>                               
                                
                                        <div class="modal fade modal-argent" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><h2 class="text-success" ><?php echo $caption; ?></h2></p>
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
                    <th class="text-info"><a href="" data-toggle="modal" data-target=".modal-vetement"><h3> Vêtement: </h3> </a></th>
                                             
                        <tr>
                            <td> 
                                <div class="view overlay">
                                    <?php 
                                    require_once('./PageAccueilSiteDon/includes/imageAleatoireVetement.php');
                                    if (isset($imageSize)) { ?> 
                                    <a href="#" data-toggle="modal" data-target=" .modal-vetement"><img src="<?php echo $selectedImageVet;?>" alt="image aléatoire" class="img-fluid "<?php echo $imageSize[0]; ?>></a> 
                                        <div class="modal fade modal-vetement" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><h2 class="text-success"><?php echo $caption; ?></h2></p> 
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
                    <th class="text-info"><a href="" data-toggle="modal" data-target=".modal-agro"><h3> Agroalimentaire: </h3> </a></th>                    
                        <tr>
                            <td> 
                                <div class="view overlay"> 
                                    <?php 
                                        require_once('./PageAccueilSiteDon/includes/imageAleatoireAgro.php');
                                        if (isset($imageSize)) { ?> 
                                        <a href="#" data-toggle="modal" data-target=" .modal-agro"> <img src="<?php echo $selectedImageAgro;  ?>"alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0];?>>  </a>
                                                                 
                                            <div class="modal fade modal-agro" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="alert alert-warning" role="alert">
                                                        <p id="caption" class="alert-link text-success"><h2 class="text-success"><?php echo $caption; ?></h2></p>
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
                    <th class="text-info"><a href="" data-toggle="modal" data-target=".modal-electro"><h3> Électromenager: </h3> </a></th>                   
                        <tr>
                            <td> 
                                <div class="view overlay"> 
                                    <?php 
                                    require_once('./PageAccueilSiteDon/includes/imageAleatoireElectro.php');
                                    if (isset($imageSize)) { ?> 
                                    <a href="" data-toggle="modal" data-target=".modal-electro"> <img src="<?php echo  $selectedImageElectro ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0]; ?>></a>
                                                                              
                                        <div class="modal fade modal-electro" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="alert alert-warning" role="alert">
                                                      <p id="caption" class="alert-link text-success"><h2 class="text-success"><?php echo $caption; ?></h2> </p> 
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
                <div class="col-xs-8 col-xs-12 " id="imageHeader" >
                <div id="logo" class="row">
            <div  class="col-md-12">
                <header >
               <h1 align="center" class="text-warning" ><strong>FONDATION COEUR-ESPOIR</strong> </h1>            
                </header>
            </div>
        </div>
                    <section>
                        <div class="row">
                            <div class="col-xs-6 col-xs-12 col-md-offset-3">
                                <div class="view overlay"> 
                                    <?php 
                                        require_once('./PageAccueilSiteDon/includes/imageAleatoireDon.php');
                                        if (isset($imageSize)) { ?> 
                                        <marquee behavior="" direction="right"> <img src="<?php echo  $selectedImageDon ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0]; ?>>  </marquee>
                                                                            
                                           
                                    <?php }?>                                 
                                </div>
                            </div>
                        </div> 
                    </section>
                    <section>
                        <div class="row">
                            <div class="col-sm-5" >
                                <div class="modal fade  modal-merci" tabindex="-1"role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="alert alert-warning" role="alert">
                                                <span  class="alert-link " > <p ><h2 class="text-success">
                                                    Un don  permet à des personnes de survivre et de s’épanouir. Nous travaillons avec des partenaires et les gouvernements dans 190 pays. Nous bâtissons des infrastructures, procurons des services essentiels et travaillons sans relâche afin que chaque enfant puisse survivre et s’épanouir.
                                                Nous ne pourrions pas accomplir notre travail sans le soutien de généreux donateurs et donatrices comme vous : nous sommes 100 % tributaires de contributions volontaires pour mettre en œuvre nos programmes et continuer notre travail.
                                                Votre don sera utilisé dès maintenant afin de faire du monde un endroit meilleur pour les enfants vulnérables. Nous vous remercions d’avoir choisi de donner à notre organisme.
                                                </h2></p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-2" ></div>
                            <div class="col-xs-5 col-xs-12 col-md-offset-3" >
                                <div class="view overlay"> 
                                    <?php 
                                    require_once('./PageAccueilSiteDon/includes/imageAleatoireDon1.php');
                                    if (isset($imageSize)) { ?> 
                                    <a href="./vues/CreateDon.php"><img src="<?php echo  $selectedImageDon1 ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0]; ?>></a>
                                    <div class="mask flex-center rgba-green-light">
                                             <h2><?php echo $caption; ?></h2>
                                            </div> 
                                    <?php } ?> 
                                                                      
                                </div>
                            </div>
                        </div>
                    </section>         
                </div>   
            <!-- ASIDE RIGTH -->
                <div class="col-xs-2">
                    <aside>
                        <div class="view overlay">                
                            <div class="mask flex-center rgba-green-slight">
                               
                                        <div class="view overlay"> 
                                            <?php 
                                            require_once('./PageAccueilSiteDon/includes/imageAleatoireEmail.php');
                                            if (isset($imageSize)) { ?> 
                                            <a href="./vues/RechercheDon.php"><img src="<?php echo  $selectedImageEmail ;  ?>" alt="image aléatoire"  class="img-fluid "<?php echo $imageSize[0]; ?>></a>
                                            
                                            <div class="mask flex-center rgba-green-light">
                                                <p id="caption" class="text-danger"><?php echo $caption; ?></p>
                                            </div> 
                                            <?php } ?>  
                                        </div>
                            </div>
                        </div>
                       
                    </aside>
                </div>
        </div>
        <div class="row">
            <div class= "col-lg-12">
                <!-- Footer -->
<footer class="page-footer font-small blue pt-4 bg-dark" >
<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">
      <!-- Content -->
      <h5 class="text-uppercase text-warning">  <a href="" data-toggle="modal" data-target=".modal-merci"><strong>nos valeurs</strong> </a></h4>
    </div>
<!-- Copyright -->
<div class="footer-copyright text-center text-info py-3">© 2018 Copyright:
  
</div>
<!-- Copyright -->
</footer>
<!-- Footer -->
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


<script src="ficiers-js/jquery-1.12.1.min.js"></script> 
<script src="ficiers-js/bootstrap.min.js"></script>
<script src="ficiers-js/Page-admin-js.js"></script>
</body>
</html>