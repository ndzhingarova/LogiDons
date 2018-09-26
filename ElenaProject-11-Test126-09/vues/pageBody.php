

<!DOCTYPE html>
<html >
<head>
<?php
//if($pageTitle == "La page Index")
   //  $cheminCSS = 'styles-CSS/';
//else
$cheminCSS = '../styles-CSS/';
$cheminImg = '../images/';

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="<?php echo $cheminCSS?>imgpageAccueil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>

    <title><?php echo 'title' ?></title>
    
</head>
<body >  
<div class="container-fluid">
        <div class="row">

         <!-- ASIDE LEFT -->
            <div class="col-sm-2">
                <aside>         
                 <h4 class="text-info">Catégorie de dons</h4>
                    <table>
                    <th>Argent</th>
                    <tr>
                    <td> <div class="view overlay">
                                <img src="<?php echo $cheminImg; ?>don-dargent.jpg" class="img-fluid " alt="">
                                <div class="mask flex-center rgba-green-light">
                                <p class="text-success">matérialisé sous la forme de billets et de pièces de monnaie, qui est accepté par une société pour payer des biens, des services et toute sorte d’obligations.</p>
                                </div>
                            </div></td>
                    </tr>
                    </table>
                    <table>
                    <th>Vêtement</th>
                    <tr>
                    <td> <div class="view overlay">
                                <img src="<?php echo $cheminImg ?>Banque-des-vetement-723x1024-599x275.png" class="img-fluid " alt="">
                                <div class="mask flex-center rgba-green-light">
                                <p class="text-info">Article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais <br> les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles</p>
                                </div>
                            </div></td>
                    </tr>
                    </table>
                    <table>
                    <th>Agroalimentaire</th>
                    <tr>
                    <td> <div class="view overlay">
                                <img src="<?php echo $cheminImg ?>arton235.jpg" class="img-fluid " alt="">
                                <div class="mask flex-center rgba-green-light">
                                <p class="text-info">aliments issus de l'agriculture ou de la pêche et transformés en <br> aliments industriels destinés essentiellement à la consommation humaine</p>
                                </div>
                            </div></td>
                    </tr>
                    </table>
                    <table>
                    <th>Électromenager</th>
                    <tr>
                    <td> <div class="view overlay">
                                <img src="<?php echo $cheminImg ?>860_villers_brulin_quentin_1.jpg" class="img-fluid " alt="">
                                <div class="mask flex-center rgba-green-light">
                                <p class="text-info">caractérise tous les appareils et outils utilisant l'électricité ou non et destinés à assurer des besoins domestiques</p>
                                </div>
                            </div></td>
                    </tr>
                    </table>
                </aside>
            </div>
            <!-- SECTION BODY -->
            <div class="col-sm-8" id="imageHeader" >
                <header >
                    <h1 align="center"> COEUR ESPOIR</h1>
                     <img src="" alt="" srcset="">
                </header>
                <section>
                   <p class="text-warning">
                   La prise d'otages de Gladbeck (en allemand : Geiselnahme von Gladbeck) se déroule du 16 au 18 août 1988 en Allemagne de l'Ouest. 
                   Dieter Degowski et Hans-Jürgen Rösner attaquent une agence de la Deutsche Bank à Gladbeck et prennent en otage deux personnes.
                    Échappant pendant deux jours aux tentatives d'arrestation des policiers, ils s'emparent ensuite d'un bus d'une trentaine de passagers à Brême, avec l'aide de Marion Löblich, et prennent la fuite en direction des Pays-Bas.
                    Le 18 août 1988, cette cavale prend fin à la suite d'une opération de police sur l'autoroute A3.
                    Au cours de ce drame, Degowski tue Emanuele de Giorgi, un garçon de 14 ans, d'une balle dans la tête. À Brême, 
                    le policier Ingo Hagen, âgé de 31 ans, périt dans une collision avec un camion. Enfin, Silke Bischoff, une femme de 18 ans, meurt sur l'autoroute d'un tir provenant soit de l'arme de Rösner soit de la police. 
                    La surmédiatisation de l'événement est vivement critiquée par la suite, l'omniprésence des journalistes ayant notamment compliqué l'intervention des forces de l'ordre. Ces dernières ont également été pointées du doigt pour leur gestion controversée des opérations.
                    Lire la suite
                   </p>
                </section>
                <section >
                <p>     
                    <button type="button" class="btn btn-primary btn-lg"
                        data-toggle="modal"
                        data-target="#myModal">
                        lisez moi
                    </button>
                </p>
                <article >                       
                    <div id="myModal" class="modal fade  bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                    <button type="button" class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Titel</h4>
                                </div>
                            <div class="modal-body">                           
                            <div class="embed-responsive embed-responsive-16by9">
                               <iframe  class="embed-responsive-item"  src="<?php echo $cheminImg ?>ThanksDonation.jpg"></iframe>
                               <p>Un don  permet à des enfants de survivre et de s’épanouir. Nous travaillons avec des partenaires et les gouvernements dans 190 pays. 
                                Nous bâtissons des infrastructures, procurons des services essentiels et travaillons sans relâche afin que chaque enfant puisse survivre et s’épanouir.
                                Nous ne pourrions pas accomplir notre travail sans le soutien de généreux donateurs et donatrices comme vous : nous sommes 100 % tributaires de contributions volontaires pour mettre en œuvre nos programmes et continuer notre travail.
                                Votre don sera utilisé dès maintenant afin de faire du monde un endroit meilleur pour les enfants vulnérables. Nous vous remercions d’avoir choisi de donner à l’UNICEF.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </article>
                </section>
                <div class="row">
                    <div class="col-sm-5" >
                            <div class="embed-responsive embed-responsive-16by9">
                               <iframe  class="embed-responsive-item"  src="<?php echo $cheminImg ?>Donate-Girl-brim-tv.png"></iframe>
                               <p>
                                    Un don  permet à des enfants de survivre et de s’épanouir. Nous travaillons avec des partenaires et les gouvernements dans 190 pays. Nous bâtissons des infrastructures, procurons des services essentiels et travaillons sans relâche afin que chaque enfant puisse survivre et s’épanouir.
                                Nous ne pourrions pas accomplir notre travail sans le soutien de généreux donateurs et donatrices comme vous : nous sommes 100 % tributaires de contributions volontaires pour mettre en œuvre nos programmes et continuer notre travail.
                                Votre don sera utilisé dès maintenant afin de faire du monde un endroit meilleur pour les enfants vulnérables. Nous vous remercions d’avoir choisi de donner à l’UNICEF.
                              </p>
                            </div>
                    </div>
                    <div class="col-sm-2" ></div>
                    <div class="col-sm-5" >
                    <div class="embed-responsive embed-responsive-16by9">
                            
                            <iframe  class="embed-responsive-item"  src="<?php echo $cheminImg ?>ThanksDonation.jpg"></iframe>
                            <p>Un don  permet à des enfants de survivre et de s’épanouir. Nous travaillons avec des partenaires et les gouvernements dans 190 pays. 
                             Nous bâtissons des infrastructures, procurons des services essentiels et travaillons sans relâche afin que chaque enfant puisse survivre et s’épanouir.
                             Nous ne pourrions pas accomplir notre travail sans le soutien de généreux donateurs et donatrices comme vous : nous sommes 100 % tributaires de contributions volontaires pour mettre en œuvre nos programmes et continuer notre travail.
                             Votre don sera utilisé dès maintenant afin de faire du monde un endroit meilleur pour les enfants vulnérables. Nous vous remercions d’avoir choisi de donner à l’UNICEF.</p>
                         </div>
                    </div>
                </div>              
            </div>

            <!-- ASIDE RIGTH -->
            <div class="col-sm-2">
                <aside>
                    <div class="view overlay">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/People/6-col/img%20(9).jpg" class="img-fluid " alt="">
                        <div class="mask flex-center rgba-green-slight">
                            <p><h4  class="text-success">Comment proposer un don </h4>
                                <ul class="text-info" >
                                    <li><strong>Entrer votre email</strong>
                                    <div class="view overlay">
                        <img src="<?php echo $cheminImg ?>20849099-messages-sur-le-clavier-entrer-la-clé-pour-les-concepts-email.jpg" class="img-fluid " alt="">
                        <div class="mask flex-center rgba-green-light">
                        </div>
                    </div></li>
                                    <li><strong>Choisir la catégorie de dons</strong></li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="myImg">
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