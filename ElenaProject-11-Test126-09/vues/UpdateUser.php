<?php
    require_once('../modeles/classes/2-Database_class.php');
    require_once('../controleurs/Controle_UpdateUser.php');
    $pageTitle = 'UpdateUser';
    include('header.php');  
    include('navBar.php'); 
    $ctrl = new Controle_UpdateUser();
    $utilisat = $ctrl->execute();
    $ctrl->mettreAjour();  
?>
    
    <div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
        <div class="panel panel-default">
            <div class="panel-heading">Informations Personnelles</div>
                <div class="panel-body">
                    <form method="post" action="">
                    <input type="hidden" name="u_id" value="<?php echo $utilisat->getid(); ?>" >
                        <div class="form-group">
                            <label class="control-label">Nom</label>
                            <input type="text" name="nom" value="<?php echo $utilisat->getNom(); ?>" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Prenom</label>
                            <input type="text" name="prenom" value="<?php echo $utilisat->getPrenom(); ?>" class="form-control" autocomplete="off" required>
                        </div>                

                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="courriel" value="<?php echo $utilisat->getCourriel(); ?>" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Mot de passe</label>
                            <input type="hidden" name="Old_mdp" value="<?php echo $utilisat->getMdp(); ?>">
                            <input type="password" name="New_mdp" class="form-control" autocomplete="new-password"">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Adresse</label>
                            <input type="text" name="adresse" value="<?php echo $utilisat->getAdresse(); ?>" class="form-control" autocomplete="off" required>
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


