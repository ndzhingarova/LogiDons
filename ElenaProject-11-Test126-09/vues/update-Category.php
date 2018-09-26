<?php
    require_once('../modeles/classes/Categorie_class.php');
    require_once('../modeles/config/CategoryDAO_class.php');
    $pageTitle = "Update Category";
    include('header.php');  
    include('navBar.php');
    echo $_GET['catid'];
    $catDAO = new CategorieDAO();
    $catDAO->getCatById($_GET['catid']);
    echo $catDAO->getID();
    echo $catDAO->getNom();
    echo $catDAO->getDESC_CAT();
?>

<h1 class="text-center" style="color:#666;font-weight: bold;margin:40px 0;font-size:40px;">Modifier une Categorie</h1>
<div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:50px">
        <div class="panel panel-default">
            <div class="panel-heading">Modifier une Categorie</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_UpdateCategory.php">
                        <input type="hidden" name="idCat" value="">
                        <div class="form-group">
                            <label class="control-label">Nom:</label>
                            <input type="text" name="nomCat" class="form-control" value="" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Mot de passe:</label>
                            <textarea name="desCat" class="form-control" value=""  rows="5" required ></textarea>
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