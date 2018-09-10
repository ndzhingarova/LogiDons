<?php
  if (!ISSET($_SESSION)) 
  session_start(); 
  if(!ISSET($_SESSION['admin']))    
     {
        header('Location: connexion.php');
        exit();
     } 
  require_once('../modeles/config/CategoryDAO.class.php');
  require_once('../modeles/config/Format.php');
  $pageTitle = "Les membres";
  include('header.php');  
?>
    <style>
      body{

        background:url(../images/marbre.jpg) no-repeat center center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size:cover;  
      }
    </style>
<?php
  

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
                   echo "<td>".$ligne['ID']."</td>";                  
                   echo "<td>".$ligne['NOM']."</td>";
                   echo "<td>".$format->textShorten($ligne['DESCRIPTION'], 50)."</td>";               
                   echo "<td>
                            <a href='EditCatpage.php?catid=".$ligne['ID']."' class='btn btn-success'>Edit</a>
                            <a href='../controleurs/Controle_DeleteCategory.php?catid=".$ligne['ID']."' class='btn btn-danger confirm'>Supprimmer</a>
                         </td>";
                echo "<tr>";
             }
?>
      </table>
   </div>
   <a href="create-category.php" class="btn btn-primary">Ajouter une nouvelle categorie</a>
</div>
<?php include('footer.php') ?>
