<!DOCTYPE html>
<?php

    require_once('../modeles/config/DonsDAO.class.php');
    require_once('../modeles/config/Format.php');
    
    $pageTitle = "Tout Les Dons";
    include('header.php');  
    include('navBar.php');

    $dao = new DonsDAO();

    // récupérer l'email du donateur
    //$format   = new Format();
    //$courriel = $format->validation($_GET['email']);

    //rechercher les dons qui appartiennent à ce donateur            
    $tab_don = $dao->lesDonsDunDonateur($_SESSION['$courriel']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <style>
        body{
            
            background:url(../images/marbre.jpg) no-repeat center center fixed;
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;  
            }

        input.ng-invalid.ng-dirty{
            border:1px solid red;
            }
        #important{
            color: red;
            margin-left: 5px;
        }
    </style>


</head>
<body ng-app>

<h1 class="text-center">La liste de vos dons</h1>
<div class="container">
   <div class="table-responsive">
    <table class=" membres-table text-center table table-bordered">
        <tr>
            <td>NOM</td>
            <td>DESCRIPTION</td>    
            <td>QUANTITÉ</td>          
            <td>DATE PROMESSE</td>
            <td>DATE PROMISE</td>
            <td>CONTROLE</td>
        </tr>
<?php
    foreach($tab_don as $ligne)
    {
        echo "<tr>";
        echo "<td>".$ligne['NOM']."</td>";
        echo "<td>".$ligne['DESCRIPTION']."</td>";
        echo "<td>".$ligne['QUANTITE']."</td>";
        echo "<td>".$ligne['DATE_PROMESSE']."</td>";
        echo "<td>".$ligne['DATE_PROMISE']."</td>";
        echo "<td>
            <a href='modifierDon.php?id=".$ligne['ID']."' class='btn btn-success'>Modifier</a>
            <a href='../controleurs/Controle_DeleteDon.php?donID=".$ligne['ID']."'"."class='btn btn-danger confirm2'>Annuler ce don</a>
            </td>";
        echo "<tr>";
    }
    
?>
      </table>
   </div>
   
</div>

</body>
</html>

<?php include('footer.php') ?>

