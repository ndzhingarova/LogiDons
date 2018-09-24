<?php
    session_start();
   // if()
    $pageTitle = "La page Login";
    include('header.php');   
    include('navBar.php');
?>
    
    <div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
        <div class="panel panel-default">
            <div class="panel-heading">Informations Personnelles</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_CreateMembre.php">

                        <div class="form-group">
                            <label class="control-label">Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Prenom</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>                

                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="courriel" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Mot de passe</label>
                            <input type="password" name="mdp" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Telephone</label>
                            <input type="text" name="tel" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Adresse</label>
                            <textarea class="form-control" name="adresse" rows="5" required></textarea>
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


