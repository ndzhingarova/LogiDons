
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<?php 
require_once('../modeles/config/MembreDAO.class.php');

$pageTitle = "Les Bénévoles";
 include('header.php');
 include('navBar.php');
$membreDao = new MembreDAO();
$benevole = $_SESSION['userCourriel'];
$tab_Benevoles = $membreDao->findMembreByEmail($benevole);
 
 $ID=$tab_Benevoles->getid();
 $COURRIEL=$tab_Benevoles->getCourriel();
 $ADRESSE=$tab_Benevoles->getAdresse();
 $VILLE= $tab_Benevoles->getVille(); 
 $PROVINCE= $tab_Benevoles->getProvince();
 $CODE_POSTALE= $tab_Benevoles->getCodePostal();
 $TELEPHONE=$tab_Benevoles->getTel();
 $ACTIF =$tab_Benevoles->getEtat();
 $ACTIF_NON =0;
 ?>
  <!--============================================= BENEVOLE ACTIF ========================================================-->
  <!--=================================================================================================================-->
    <div class="container" ng-app>
        <div class="panel panel-primary">
            <div class="panel-heading">
            <marquee behavior="" direction="left"> <h2> BIENVENUE <span class="text-info"><?php echo $tab_Benevoles->getNom(); ?></span></h2></marquee>
               
            </div>
                 <!-- Table -->
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>NOM</th>
                        <th>COURRIEL</th>                       
                        <th>TELEPHONE </th>                        
                        <th>ACTIF</th>
                        <th>GROUP_ID</th>
                        <th>DATE_CREATION</th>
                    </thead>
                    <tbody>
                        <tr class="info">
                            <td><?php echo $tab_Benevoles->getNom() ?></td>
                            <td><?php echo $tab_Benevoles->getCourriel() ;?></td>                            
                            <td><?php echo $tab_Benevoles->getTel();?></td>                                                                                
                            <td><?php echo $tab_Benevoles->getEtat()  ;?></td>
                            <td><?php echo $tab_Benevoles->getGroupId();?></td>  
                            <td><?php echo $tab_Benevoles->getDt() ;?></td>                   
                        </tr>
                        <tr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>ADRESSE</th>
                                    <th>VILLE</th>
                                    <th>PROVINCE</th>
                                    <th>CODE_POSTALE</th>                                    
                                </thead>
                                <tbody>
                                    <tr class="warning">
                                        <td><?php echo $tab_Benevoles->getAdresse();?></td>
                                        <td><?php echo $tab_Benevoles->getVille(); ?></td>
                                        <td><?php echo $tab_Benevoles->getProvince();?></td> 
                                        <td><?php echo $tab_Benevoles->getCodePostal();?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-4 col-offset-4">
                                <button type="button" ng-show="showHide1" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalModification"> Cliquer ici pour modifier vos informations </button>           
                                </div>
                                <div class="col-sm-3">
                                <label for="action">Choisir l'action</label>
                                <input type="checkbox" name="" ng-Model="showHide1">
                                </div>
                                <div class="col-sm-4 col-offset-4">
                                <button type="button" ng-show="showHide1" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"> Cliquer ici pour vous désactiver </button>           
                                </div>
                            </div>
                        </tr>
                    </tbody>
                </table>  
            </div>    
        </div>
    </div>
</div>

<!--================================================== MODIFIER BENEVOLE==========================================================================================================================-->
<!--==============================================================================================================================================================================================-->
    <section>
    <div class="modal fade" role="dialog" id="modalModification" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="gridSystemModalLabel">MODIFICATION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1 class="panel-title">Modifier vos informations</h1>
                            </div>
                            <div class="panel-body">
                            <?php 
                            if($COURRIEL==null)
                            {
                                $message = "Vous courriel n'est pas.<br>Veuiller entrer un courriel valide";
                                $class   = "danger";
                                $url     = "../vues/connexion.php";
                                $nomPage = "la page de connection";   
                                $format->redirect($message, $class, $url, $nomPage);
                            
                            }
                            else
                            {
                            ?>
                                <form  action="../controleurs/Controle_UpdateBenevole.php"  role="form" class="form-horizontal" method="POST">
                                    <div class="form-group">
                                        <label for="adresse" class="col-sm-3 control-label">Adresse: </label>
                                        <div class="col-sm-9">
                                        <input type="hidden" class="form-control" name="COURRIEL" id="COURRIEL" value="<?php echo  $COURRIEL ;?>" placeholder="Enter email" >
                                        <input type="text" class="form-control" name="ADRESSE" id="adresse" value="<?php echo htmlentities( $ADRESSE , ENT_COMPAT, 'utf-8');?>" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ville" class="col-sm-3 control-label">Ville: </label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="VILLE" id="ville" value="<?php echo htmlentities($VILLE, ENT_COMPAT, 'utf-8' ); ?>" placeholder="ville" required>                                                   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="province" class="col-sm-3 control-label">Province:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="CODE_POSTALE" id="province" value="<?php echo htmlentities($PROVINCE, ENT_COMPAT, 'utf-8');?>"  placeholder="province" required>                                                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="code_postale" class="col-sm-3 control-label">Code Postale:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="PROVINCE" id="code_postale" value="<?php echo htmlentities($CODE_POSTALE, ENT_COMPAT, 'utf-8');?>"  placeholder="code_postale" required>                                                    
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone" class="col-sm-3 control-label">Téléphone:</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="TELEPHONE" id="telephone" value="<?php echo htmlentities($TELEPHONE, ENT_COMPAT, 'utf-8');?>" placeholder="Telephone" required>                                                    
                                        </div>
                                    </div>                                                      
                                    </div>
                                        <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"> Modifier</button>
                                    </div>                                                      
                                </form>
                                <?php 
                                  }
                                 ?>
                             </div>                                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--================================================ DESACTIVER BENEVOLE==============================================-->
<!--==================================================================================================================-->
        <section >
        <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ariahidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">DESACTIVATION BENEVOLE</h4>
                    </div>
                    <div class="modal-body" ng-init="isDisabled = true">
                    <?php 
                            if($COURRIEL==null)
                            {
                                $message = "Vous courriel n'est pas.<br>Veuiller entrer un courriel valide";
                                $class   = "danger";
                                $url     = "../vues/connexion.php";
                                $nomPage = "la page de connection";   
                                $format->redirect($message, $class, $url, $nomPage);
                            }
                            else
                            {
                            ?>
                                <form  action="../controleurs/Controle_desactiveBenevole.php"  role="form" class="form-horizontal" method="POST">
                                    <div class="form-group" >
                                        <label for="ville" class="col-sm-3 control-label"> </label>
                                        <div class="col-sm-9">
                                        <input type="hidden"   class="form-control" name="ID" id="ID" value="<?=$ID; ?>" placeholder="ACTIF" >                                                                                          
                                        </div>
                                    </div>
                                    <div>
                                    <p>
                                    <label for="actif"  > desactiver vous!: </label>
                                       <input type="checkbox"   name="ACTIF" id="ACTIF" value="<?=  $ACTIF_NON  ;?>">                                       
                                       </p>
                                    </div>
                                    </div>
                                        <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">                         
                                        <button type="submit" class="btn btn-success" ng-disabled={{isDisabled}}> Soumettre</button>
                                    </div>  
                               </form>
                                <?php 
                                  }
                                 ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                       
                    </div>
                </div>
            </div>
        </div>
        </section>
 <?php include('footer.php') ?>