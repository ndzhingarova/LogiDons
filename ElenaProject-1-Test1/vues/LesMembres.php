<?php

require_once('../modeles/config/MembreDAO.class.php');
  
    $pageTitle = "Les employés";
   // $navUser = "Administrateur";
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
<h1 class="text-center">Liste des Employés</h1>
<div class="container">
   <div class="table-responsive">
      <table class=" membres-table text-center table table-bordered">
          <tr>
              <td>EMPLOYÉ-ID</td>
              <td>NOM</td>    
              <td>COURRIEL</td>          
              <td>ADRESSE</td>
              <td>TELEPHONE</td>
              <td>GROUPE ID</td>
              <td>ETAT</td>
              <td>DATE DE CREATION</td>
              <td>CONTROLE</td>
          </tr>
<?php
          $dao = new MembreDAO();        
          $tab_emp = $dao->findAll_Membres();
           foreach($tab_emp as $ligne)
             {
                echo "<tr>";
                   echo "<td>".$ligne['ID']."</td>";
                   echo "<td>".$ligne['NOM']."</td>";
                   echo "<td>".$ligne['COURRIEL']."</td>";
                   echo "<td>".$ligne['ADRESSE']."</td>";
                   echo "<td>".$ligne['TELEPHONE']."</td>";
                   echo "<td>".$ligne['GROUP_ID']."</td>";
                   echo "<td>".$ligne['ACTIF']."</td>";                  
                   echo "<td>".$ligne['DATE_CREATION']."</td>";
                   echo "<td>
                            <a href='EditMembre.php?do=Edit&membreid=".$ligne['ID']."'". "class='btn btn-success'>details</a>
                            <a href='../controleurs/Controle_DeleteMembre.php?membreid=".$ligne['ID']."'"."class='btn btn-danger confirm'>Supprimmer</a>
                         </td>";
              echo "<tr>";
             }
?>
      </table>
   </div>
</div>
<?php include('footer.php') ?>