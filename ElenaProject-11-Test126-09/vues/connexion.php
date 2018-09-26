<?php
 if (!ISSET($_SESSION))
 {		
	session_start();    
 }
     $pageTitle = 'connection';
     require_once("header.php"); 
     require_once("navBar.php");
?>
    
    <div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
        <div class="panel panel-default">
            <div class="panel-heading">Connexion</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_Login.php">

                        <div class="form-group">
                            <label class="control-label">Courriel:</label>
                            <input type="email" name="courriel" class="form-control" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Mot de passe:</label>
                            <input type="password" name="mdp" class="form-control" autocomplete="new-password" required>
                        </div>

                        <div>
                            <button class="btn btn-info" type="submit" style="margin-bottom:10px;margin-top:10px;">Connexion</button>
                        </div>
                        <p><a href="login.php" style="color:blue;">Crée un compte</a></p>
                    </form>
                </div>
            </div><!--end div panel heading -->
        </div><!--end div panel default -->
    </div><!--end div container -->

<?php include('footer.php') ?>


