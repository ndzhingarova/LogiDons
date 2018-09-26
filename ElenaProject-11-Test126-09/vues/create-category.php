<?php
    if (!ISSET($_SESSION)) 
         session_start(); 
    if(!ISSET($_SESSION['admin']))    
    {
        header('Location: connexion.php');
        exit();
    } 
    $pageTitle = "Create Category";
    include('header.php');  
    include('navBar.php');
?>

<h1 class="text-center" style="color:#666;font-weight: bold;margin:40px 0;font-size:40px;">Ajouter une nouvelle Categorie</h1>
<div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:50px">
        <div class="panel panel-default">
            <div class="panel-heading">Ajouter une Categorie</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_CreateCategory.php">

                        <div class="form-group">
                            <label class="control-label">Nom :</label>
                            <input type="text" name="nomCat" class="form-control" placeholder="Nom de la categorie" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description :</label>
                            <textarea name="desCat" class="form-control" placeholder="Description de la categorie"  rows="5" required ></textarea>
                        </div>

                        <div>
                            <button class="btn btn-info" type="submit" style="margin-bottom:10px;margin-top:10px;">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div><!--end div panel heading -->
        </div><!--end div panel default -->
    </div><!--end div container -->


<?php include('footer.php') ?>