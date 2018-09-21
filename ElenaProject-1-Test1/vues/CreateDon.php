
<?php 
if (!ISSET($_SESSION)) 
    session_start();
    require_once("../modeles/config/CategoryDao.class.php");
    $pageTitle = 'CreateUser';
    include('header.php');?>

    <script src="../ficiers-js/jquery-1.12.1.min.js"></script>

    <?php
    include('navBar.php'); 
    ?>       
        <div class="container  col-md-10  col-md-offset-1" style="top:10px">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">Donner un Don</div>
                    <div class="panel-body">
                        <form method="post" action="../controleurs/Controle_CreateDon.php" enctype="multipart/form-data">
                           <div class="row">
<!-- --------------------------------------------------------------------------------------------------------------------
        Debut de la saisie des donnees sur le Donateur
------ --------------------------------------------------------------------------------------------------------------- -->                          
                              <div class='col-md-6'>
                                  <div class='panel panel-info'>                                
                                      <div class='panel-heading text-center'>infos du donnateur</div>
                                      <div class='panel-body'>
                        <!-- ----------- Le Checkbox -------------------------------------------- -->              
                                          <div class="divCheck form-group" id="checkIfCompagnie">                         
                                             <input id="checkCompagnie" type="checkbox" name="checkCompagnie">                              
                                          </div> 
                                          <label class="control-label">Je suis une entreprise</label>  
                        <!-- ---------- Debut Div Compagnie ------------------------------------- -->          
                                          <div id="divCompagnie" class="form-group"  >
                                             <label class="control-label">Nom de l'entreprise</label>
                                             <input type="text" name="nomCompagnie" class="form-control" autocomplete="off" >                                             
                                          </div>
                        <!-- ----------- Fin Div Compagnie --------------------------------------- -->                  
                                          <div class="form-group">
                                             <label class="control-label"><span id="nomContact">Nom du donateur</span></label>
                                             <input type="text" name="nomDontr" class="form-control" autocomplete="off" required >                                             
                                          </div>
                        <!-- ------------------------------------------------------------------- -->                  
                                          <div class="form-group">
                                             <label class="control-label">Email</label>
                                             <input type="email" name="courriel" class="form-control" autocomplete="off" required >
                                          </div>
                        <!-- ------------------------------------------------------------------- -->                  
                                          <div class="form-group">
                                             <label class="control-label">Telephone</label>
                                             <input type="text" name="tel" class="form-control" autocomplete="off" required >
                                          </div> 
                        <!-- ------------------------------------------------------------------- -->
                                          <div class="adresseDonateur form-group form-group-lg">
                                            <label class="control-label">Adresse</label>
                                            <div class="divAdresse">                                               
                                                <span>adresse      </span> <input type="text" name="adresse" autocomplete="off" required ><br>
                                                <span>ville        </span> <input type="text" name="ville" autocomplete="off" required ><br>
                                                <span>code postale </span> <input type="text" name="codePostale"autocomplete="off" required ><br>
                                                <span>province</span>
                                                <select name="province" required>
                                                    <option value="Alberta">Alberta</option><option value="Colombie-Britannique">Colombie-Britannique</option>
                                                    <option value="Île-du-Prince-Édouard">Ile-du-Prince-Edouard</option><option value=" Manitoba"> Manitoba</option>
                                                    <option value="Nouveau-Brunswick">Nouveau-Brunswick</option><option value="Nouvelle-Écosse">Nouvelle-Ecosse</option>
                                                    <option value="Ontario">Ontario</option><option value="Québec">Quebec</option>
                                                    <option value="Saskatchewan">Saskatchewan</option><option value="Terre-Neuve-et-Labrador">Terre-Neuve-et-Labrador</option>
                                                </select>
                                            </div>
                                          </div>
                        <!---------------------------------------------------------------- -->                                                                         
                                      </div>
                                  </div>
                              </div> <!-- autocomplete="off" required -->
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
                                            <input type="text" name="nomDon" class="form-control" autocomplete="off" required >
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                
                                        <div class="form-group">
                                            <label class="control-label">Quantite</label>
                                            <input type="number" name="qttDon" class="form-control" required >
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                
                                        <div class="form-group">
                                            <label class="control-label">Categorie du Don</label>                          
                                            <select name="catDon" class="form-control" required>
                                            <option></option>
                                                    <?php
                                                        $catdao = new CategorieDAO();       
                                                        $tab_Cat = $catdao->findAllCat();
                                                        foreach($tab_Cat as $ligne)
                                                        {
                                                            echo "<option value='".$ligne['ID']."'>".$ligne['NOM']."</option>";
                                                        } 
                                                    ?>   
                                            </select>                  
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea class="form-control" name="DescDon" rows="3" required ></textarea>
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                
                                        <div class="form-group form-group-lg">
                                            <label class="control-label">Mode de livraison</label>
                                            <div style="border:1.5px solid #e6e6e6;border-radius:5px; padding-top:5px;padding-left:30px;">
                                            <div>
                                                <input id="id1" type="radio" name="ModeLivraison" value="je vais deposer au centre">
                                                <label for="id1">je vais deposer au centre</label>
                                            </div>
                                            <div>
                                                <input id="id2" type="radio" name="ModeLivraison" value="vous devez passer chez moi">
                                                <label for="id2">vous devez passer chez moi</label>
                                            </div>
                                            </div>
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                    
                                        <div class="form-group">
                                            <label class="control-label">Montant du Don</label>
                                            <input type="number" name="montantDon" class="form-control" required >
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                    
                                        <div class="form-group">
                                            <label class="control-label">Photo du Don(si disponible)</label>                     
                                            <input type="file" name="img" class="form-control">                           
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                    
                                        <div class="form-group">
                                            <label class="control-label">Date Promise</label>                     
                                            <input type="date" name="dateDon" class="form-control" required >                           
                                        </div>
                        <!-- ------------------------------------------------------------------- -->                    
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
<script>
   $(document).ready(function()
    {
        $('#divCompagnie').hide();
        $('#checkIfCompagnie').on('click', function() 
            {
                $('#divCompagnie').toggle(500);
                if( $('input[name="checkCompagnie"]').is(':checked') ) 			     	
                    $('#nomContact').text('Nom du Contact');
                else               				   
                    $('#nomContact').text('Nom du donateur');
            });			  
    });
</script>
    <?php include('footer.php'); ?>
