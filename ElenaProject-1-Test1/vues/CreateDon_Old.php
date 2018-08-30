
<?php 
if (!ISSET($_SESSION)) 
     session_start();
     require_once("../modeles/config/CategoryDao_class.php");
    $pageTitle = 'CreateUser';
    include('header.php');
    include('navBar.php');
    ?>       
        <div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
            <div class="panel panel-default">
                <div class="panel-heading">Donner un Don</div>
                    <div class="panel-body">
                        <form method="post" action="../controleurs/Controle_CreateDon.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="control-label">Nom du Don</label>
                                <input type="text" name="nomPDon" class="form-control" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Categorie du Don</label>                          
                                <select name="catDon" class="form-control" required>
                                   <option></option>
                                        <?php
                                            $catdao = new CategorieDAO();       
                                            $tab_Cat = $catdao->findAllCat();
                                            foreach($tab_Cat as $ligne)
                                            {
                                                echo "<option value='".$ligne['CATEGORY_ID']."'>".$ligne['CATEGORY_NAME']."</option>";
                                            }
                                        ?>   
                                </select>                  
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="DescDon" rows="3" autocomplete="off" required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Mode de livraison</label>
                                <input type="text" name="ModeLivr" class="form-control" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Montant du Don(si argent)</label>
                                <input type="text" name="montantDon" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Photo du Don(si disponible)</label>                     
                                <input type="file" name="img" class="form-control" >                           
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Date Promise</label>                     
                                <input type="date" name="dateDon" class="form-control" required>                           
                            </div>

                            <div>
                                <button class="btn btn-info" type="submit">Sauvegarder</button>
                            </div>                               
                        </form>
                    </div>
                </div><!--end div panel heading -->
            </div><!--end div panel default -->
        </div><!--end div container -->

    <?php include('footer.php') ?>


