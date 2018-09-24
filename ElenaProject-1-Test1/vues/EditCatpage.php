<?php
     if (!ISSET($_SESSION)) 
     session_start(); 
     if(!ISSET($_SESSION['admin']))    
        {
           header('Location: connexion.php');
           exit();
        }
    require_once('../controleurs/Controle_EditCategory.php');
    $pageTitle = "Edit Category";
    include('header.php');  
    include('navBar.php');

    $catdao = new Controle_EditCategory();
    $cat = $catdao->getCat();
?>

<h1 class="text-center" style="color:#666;font-weight: bold;margin:40px 0;font-size:40px;">Modifier une Categorie</h1>
<div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:50px">
        <div class="panel panel-default">
            <div class="panel-heading">Modifier une Categorie</div>
                <div class="panel-body">
                    <form method="post" action="../controleurs/Controle_UpdateCategory.php">
                        
                        <div class="form-group">
                            <label class="control-label">ID :</label>
                            <input type="text" name="categoryID" value="<?php echo $_GET['catid']; ?>" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nom :</label>
                            <input type="text" name="nomCat" value="<?php echo $cat->getNom(); ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description :</label>
                            <textarea name="desCat" class="form-control" rows="5" required ><?php echo $cat->getDESC_CAT(); ?></textarea>
                        </div>

                        <div>
                            <button class="btn btn-info" type="submit" style="margin-bottom:10px;margin-top:10px;">Sauvegarder</button>
                        </div>
                    </form>               
            </div><!--end div panel-body -->
        </div><!--end div panel default -->
    </div><!--end div container -->


<?php include('footer.php') ?>