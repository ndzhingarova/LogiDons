<?php
  if (!ISSET($_SESSION)) 
  session_start(); 
  if($_SESSION['courriel'] != "admin@admin.ca")    
     {
        header('Location: connexion.php');
        exit();
     } 
  require_once('../modeles/config/CategoryDAO_class.php');
  require_once('../modeles/config/Format.php');
  $pageTitle = "Les membres";
  include('header.php');  
  include('navBar.php');
?>
<h1 class="text-center">Liste des Categories</h1>
<div class="container">
   <div class="table-responsive">
      <table class=" membres-table text-center table table-bordered">
          <tr>
              <td>CATEGORIE-ID</td>
              <td>NOM</td>
              <td>DECRIPTION</td>             
              <td>CONTROLE</td>
          </tr>
<?php
          $format = new Format();
          $catdao = new CategorieDAO();       
          $tab_Cat = $catdao->findAllCat();
           foreach($tab_Cat as $ligne)
             {
                echo "<tr>";
                   echo "<td>".$ligne['CATEGORY_ID']."</td>";                  
                   echo "<td>".$ligne['CATEGORY_NAME']."</td>";
                   echo "<td>".$format->textShorten($ligne['CATEGORY_DESC'], 50)."</td>";               
                   echo "<td>
                            <a href='EditCatpage.php?catid=".$ligne['CATEGORY_ID']."' class='btn btn-success'>Edit</a>
                            <a href='../controleurs/Controle_DeleteCategory.php?catid=".$ligne['CATEGORY_ID']."' class='btn btn-danger confirm'>Supprimmer</a>
                         </td>";
                echo "<tr>";
             }
?>
      </table>
   </div>
   <a href="create-category.php" class="btn btn-primary">Ajouter une nouvelle categorie</a>
</div>
<?php include('footer.php') ?>
