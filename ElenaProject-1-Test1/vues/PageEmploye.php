<?php

$pageTitle = "Page Admin";
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


        input.ng-invalid.ng-dirty{
            border:1px solid red;
            }
        #important{
            color: red;
            margin-left: 5px;
        }
 
</style>

<?php     
include('navBar.php');
?>
    <div id="content">
        <h2 class="text-center">Liste des dons a traiter</h2>
        <?php
        if (!ISSET($_SESSION)) 
            session_start();
        if(ISSET($_SESSION['userId'])){
            require_once('../modeles/config/DonsDAO.class.php');
            $dao = new DonsDAO();
            //$_SESSION["employe"] = 3; //gerer ca au login
            $liste = $dao->trouverDonsEmploye($_SESSION['userId']);// change to employe
            if (empty($liste)) {
                echo "Vous avez traiter toutes les dons attribues";
            } else {
                

                 
                echo "<div class='container'>",
                "<div class='table-responsive'>",
                "<table border=1 class='membres-table text-center table table-bordered'>",
                "<tr>",
                "<td>Date Promesse</td>",
                "<td>Nom</td>",
                "<td>Quantité</td>",
                "<td>Mode de Livraison</td>",
                "<td>Montant</td>",               
                "<td>Date promise</td>",
                "<td>Traiter</td>",
                "</tr>";
                foreach ($liste as $don){
                    if ($don!=null)
                    {
                        echo "<tr>
                        <td>".$don->getDtPromesse()."</td>
                        <td>".$don->getNomDon()."</td>
                        <td>".$don->getQuantite()."</td>
                        <td>".$don->getModeLivr()."</td>
                        <td>".$don->getMontantDon()."</td>
                        <td>".$don->getDtPromise()."</td>
                        <td><a href='traiterDon.php?donAconsulter=".$don->getID()."'>Traiter ce don</a></td>
                        </tr>";
                    }
                }
                echo "</table></div></div>  ";
            } 
       } else {
            header('Location: ../vues/connexion.php');
            exit();
        }

        ?>	
    </div>



<?php include('footer.php') ?>

