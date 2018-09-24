<?php
     if (!ISSET($_SESSION)) 
     session_start(); 
     if(!ISSET($_SESSION['admin']))    
        {
           header('Location: connexion.php');
           exit();
        }
    require_once('../controleurs/Controle_EditMembre.php');
    $pageTitle = "Edit Membre";
    include('header.php');  
    include('navBar.php');

    $mbrdao = new Controle_EditMembre();
    $membre = $mbrdao->getMembre();
?>

<h1 class="text-center" style="color:#666;font-weight: bold;margin:40px 0;font-size:40px;">Modifier un Membre</h1>
<div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:50px">
        <div class="panel panel-default">
            <div class="panel-heading">Modifier une Categorie</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_UpdateMembre.php">
                        
                        <div class="form-group">
                            <label class="control-label">ID :</label>
                            <input type="text" name="membreID" value="<?php echo $_GET['membreid']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nom :</label>
                            <input type="text" name="nomMemb" value="<?php echo $membre->getNom(); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email :</label>
                            <input type="text" name="emailMemb" value="<?php echo $membre->getCourriel(); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Telelphone :</label>
                            <input type="text" name="telMemb" value="<?php echo $membre->getTel(); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Adresse :</label>
                            <textarea name="adresse" class="form-control" rows="2" required ><?php echo $membre->getAdresse(); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Activation :</label>
                            <input type="text" name="etatMemb" value="<?php echo $membre->getEtat()==1 ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Statut :</label>
                            <input type="text" name="statMemb" value="<?php echo 'employe' ?>" class="form-control" required>
                        </div>

                        <div>
                            <button class="btn btn-info" type="submit" style="margin-bottom:10px;margin-top:10px;">Sauvegarder</button>
                        </div>
                    </form>               
            </div><!--end div panel-body -->
        </div><!--end div panel default -->
    </div><!--end div container -->


<?php include('footer.php') ?>