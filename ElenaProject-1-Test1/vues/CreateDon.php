
<?php 
if (!ISSET($_SESSION)) 
    session_start();
    require_once("../modeles/config/CategoryDao.class.php");
    $pageTitle = 'CreateUser';
    include('header.php');
    include('navBar.php'); 
    ?>       
        <div class="container  col-md-10  col-md-offset-1" style="top:10px">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Donner un Don</div>
                    <div class="panel-body">
                        <form method="post" action="../controleurs/Controle_CreateDon.php" enctype="multipart/form-data">
                           <div class="row">
<!-- --------------------------------------------------------------------------------------------------------------------
        Debut de la saisie des donnees sur le Donnateur
------ --------------------------------------------------------------------------------------------------------------- -->                          
                              <div class='col-md-6'>
                                  <div class='panel panel-info'>
                                      <div class='panel-heading text-center'>infos du donnateur</div>
                                      <div class='panel-body'>
                                          <div class="form-group">
                                             <label class="control-label">Nom du Donnateur</label>
                                             <input type="text" name="nomDontr" class="form-control"  >                                             
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">Email</label>
                                             <input type="email" name="courriel" class="form-control"  >
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">Telephone</label>
                                             <input type="text" name="tel" class="form-control"  >
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">Adresse</label>
                                             <textarea class="form-control" name="adresse" rows="3"  ></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
<!-- --------------------------------------------------------------------------------------------------------------------
        Fin de la saisie des donnees sur le Donnateur
------ --------------------------------------------------------------------------------------------------------------- -->                             
<!-- --------------------------------------------------------------------------------------------------------------------
        Debut de la saisie des donnees sur le Don
------ --------------------------------------------------------------------------------------------------------------- -->                              
                              <div class='col-md-6'>
                                  <div class='panel panel-info'>
                                      <div class='panel-heading text-center'>infos du Don</div>
                                      <div class='panel-body'>
                                        <div class="form-group">
                                            <label class="control-label">Nom du Don</label>
                                            <input type="text" name="nomDon" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Quantite</label>
                                            <input type="number" name="qttDon" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Categorie du Don</label>                          
                                            <select name="catDon" class="form-control" >
                                            <option></option>
                                                    <?php
                                                        $catdao = new CategorieDAO();       
                                                        $tab_Cat = $catdao->findAllCat();
                                                        foreach($tab_Cat as $ligne)
                                                        {
                                                            echo "<option value='".$ligne['ID']."'>".$ligne['NOM']."</option>";
                                                        } //autocomplete="off"
                                                    ?>   
                                            </select>                  
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea class="form-control" name="DescDon" rows="3" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Mode de livraison</label>
                                            <input type="text" name="ModeLivr" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Montant du Don</label>
                                            <input type="number" name="montantDon" class="form-control"  >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Photo du Don(si disponible)</label>                     
                                            <input type="file" name="img" class="form-control" >                           
                                        </div>                                      
                                        <div class="form-group">
                                            <label class="control-label">Date Promise</label>                     
                                            <input type="date" name="dateDon" class="form-control"  >                           
                                        </div>
                                      </div>
                                  </div>
                              </div>
<!-- --------------------------------------------------------------------------------------------------------------------
        Fin de la saisie des donnees sur le Don
------ --------------------------------------------------------------------------------------------------------------- -->                         
                            </div><!--end div row -->   
                           <div>
                                <button class="btn btn-info" type="submit">Sauvegarder</button>
                            </div>                                                  
                        </form>
                    </div>
                </div><!--end div panel heading -->
            </div><!--end div panel default -->
        </div><!--end div container -->

    <?php include('footer.php') ?>


