
<?php 
if (!ISSET($_SESSION)) 
     session_start();
//if(!isset$_SESSION['courriel'])
//{
    $pageTitle = 'CreateUser';
    include('header.php');
    include('navBar.php');
//}
    ?>       
        <div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
            <div class="panel panel-default">
                <div class="panel-heading">Informations Personnelles (creation de nouveaux membres)</div>
                    <div class="panel-body">
                        <form method="post" action="../controleurs/Controle_CreateMembre.php">

                            <div class="form-group">
                                <label class="control-label">Nom et Prenom</label>
                                <input type="text" name="nomPrenom" class="form-control" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="courriel" class="form-control" autocomplete="off" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Mot de passe</label>
                                <input type="password" name="mdp" class="form-control" autocomplete="new-password" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <input type="number" name="tel" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Adresse</label>
                                <textarea class="form-control" name="adresse" rows="2" autocomplete="off" required></textarea>
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


