

<?php 
if (!isset($_SESSION))
    session_start();
    require_once('../controleurs/Controle_traitementrecherche.php');
    require_once('../modeles/config/CategoryDAO.class.php');
    require_once('../modeles/config/Format.php');
    $pageTitle = "Modifier Don";
   
    include('header.php');
?>
<style>
        body{
            
            background:url(../images/marbre.jpg) no-repeat center center fixed;
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;  
            }
</style>
<?php
    include('navBar.php');

    $r = new Controle_Chercher_Don();
    $c = new CategorieDAO();
    $format = new Format();

    // verifier si l'ID et l'email donnees correspondent a une donnees dans la BDD
    $tab_Don = $r->getDon();
    if($tab_Don == null) // pas de correspondance
      {
        $message = "Y'a pas de correspondance dans la BDD.<br>
                    S.V.P., Veuillez vérifier, l'ID du don qui vous a été envoyé. ";
        $class   = "danger";
        $url     = "../vues/RechercheDon.php";
        $nomPage = "la page de connection";   
        $format->redirect($message, $class, $url, $nomPage, 5);
      }      
?>
          
        <div class="container  col-md-8  col-md-offset-2" style="top:10px">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Modifier le don</div>
                    <div class="panel-body">
                        <form method="post" action="../controleurs/Controle_UpdateDon.php" enctype="multipart/form-data">
                           <div class="row">
<!-- --------------------------------------------------------------------------------------------------------------------
        
------ --------------------------------------------------------------------------------------------------------------- -->                          
                              <div class='col-md-6'>
                                  <div class='panel panel-info'>                                                                    
                                      <div class='panel-body'>
                                            <div class='col-md-8 col-md-offset-2' style="border:1px solid #e5e6e6;height:250px;margin-bottom:20px;">
                                            <?php
                                                if($tab_Don['PHOTO'] == "aucune photo fournie")
                                                    echo "<img src='../uploads/imageVide.png' style='max-width:100%;max-height:100%;' />";
                                                else
                                                    echo "<img src='../uploads/".$tab_Don['PHOTO']."' style='max-width: 100%;max-height: 100%;'/>";    
                                            ?>                                         
                                            </div> 
                <!-- --------------------------------------------------------------------------- -->                             
                            <div class="form-group">
                                <label class="control-label">Changer la photo</label>                     
                                <input type="file" name="imgNew" class="form-control" >                      
                            </div> 
                  
                 <!-- --------------------------------------------------------------------------- -->                               
                 <input type="hidden" name="imgOld" value="<?php echo $tab_Don['PHOTO']; ?>" >                           
                <!-- --------------------------------------------------------------------------- -->                                             
                            <div class="form-group">
                                <label class="control-label">Date Promise</label>                     
                                <input type="date" name="datePrm" class="form-control" value="<?php echo $tab_Don['DATE_PROMISE']; ?>" required >                           
                            </div>
                <!-- --------------------------------------------------------------------------- -->               
                <div class="form-group form-group-lg">
                                <label class="control-label">Mode de livraison</label>
                                <div style="border:1.5px solid #e6e6e6;border-radius:5px; padding-top:5px;padding-left:30px;">

                                    <div>
                                        <input id="id1" type="radio" name="ModeLivr" value="0" <?php if ( $tab_Don['MODE_LIVRAISON'] == 0) {echo 'checked';}?>/>
                                        <label for="id1">je vais deposer au centre</label>
                                    </div>

                                    <div>
                                        <input id="id2" type="radio" name="ModeLivr" value="1" <?php if ( $tab_Don['MODE_LIVRAISON'] == 1) {echo 'checked';}?>/>
                                        <label for="id2">vous devez passer chez moi</label>
                                    </div>

                                </div>
                            </div>
                <!-- --------------------------------------------------------------------------- -->   
                            <div>
                                <button class="btn btn-info" type="submit">Sauvegarder</button>
                            </div>                                                               
                                      </div>
                                  </div>
                              </div> <!-- autocomplete="off" required -->
<!-- --------------------------------------------------------------------------------------------------------------------
        
------ --------------------------------------------------------------------------------------------------------------- -->                                                          
                              <div class='col-md-6'>
                                  <div class='panel panel-info'>                                    
                                      <div class='panel-body'>
                                            <!-- --------------------------------------------------------------------------- -->
                     <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Votre Courriel</label>
                                <input type="text" name="email" value="<?php echo $tab_Don['courriel']; ?>" class="form-control" readonly >
                            </div>                         
                <!-- --------------------------------------------------------------------------- -->                              
                            <input type="hidden" name="IdDon" value="<?php echo $tab_Don['ID']; ?>" >                                              
                <!-- --------------------------------------------------------------------------- -->            
                            <div class="form-group">
                                <label class="control-label">Nom du Don</label>
                                <input type="text" name="nomDon" class="form-control" value="<?php echo $tab_Don['NOM']; ?>" required>
                            </div>
                <!-- --------------------------------------------------------------------------- -->            
                            <div class="form-group">
                                <label class="control-label">Quantite</label>
                                <input type="number" name="qttDon" class="form-control" value="<?php echo $tab_Don['QUANTITE']; ?>" required >
                            </div>
                <!-- --------------------------------------------------------------------------- -->
                <div class="form-group">
                                <label class="control-label">Categorie du Don</label>                          
                                <select name="catDon" class="form-control" required>
                                    <option><?php
                                                if($tab_Don['CATEGORIE_ID'] == 1) {echo "ameublement";}
                                                else if($tab_Don['CATEGORIE_ID'] == 1) {echo "monnaie";}
                                                else if($tab_Don['CATEGORIE_ID'] == 1) {echo "electroniques";}
                                                else  {echo "electromenagers";}                                      
                                            ?></option>
                                        <?php
                                            $c = new CategorieDAO();
                                            $tab_Cat = $c->findAllCat();
                                            foreach ($tab_Cat as $ligne) {
                                                echo "<option value='" . $ligne['ID'] . "'>" . $ligne['NOM'] . "</option>";
                                            } //autocomplete="off"
                                        ?>   
                                </select>                  
                            </div>
                <!-- --------------------------------------------------------------------------- -->            
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="DescDon" rows="3" required><?php echo $tab_Don['DESCRIPTION']; ?></textarea>
                            </div>
                <!-- --------------------------------------------------------------------------- --> 
                           
                            <div class="form-group">
                                <label class="control-label">Montant du Don</label>
                                <input type="number" name="montantDon" class="form-control" value="<?php echo $tab_Don['MONTANT']; ?>" required>
                            </div>
                <!-- --------------------------------------------------------------------------- -->         
                                      </div>
                                  </div>
                              </div>
<!-- --------------------------------------------------------------------------------------------------------------------
        Fin de la saisie des donnees sur le Don
------ --------------------------------------------------------------------------------------------------------------- -->                                                   
                            </div><!--end div row -->   
                                                                             
                        </form>
                    </div>
                </div><!--end div panel heading -->
            </div><!--end div panel default -->
        </div><!--end div container -->

    <?php include('footer.php'); ?>
