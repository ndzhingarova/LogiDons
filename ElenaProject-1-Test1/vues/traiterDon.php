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
if (!ISSET($_SESSION)) 
    session_start();
    $pageTitle = 'CreateUser';
    include('header.php');
    require_once('../modeles/config/DonsDAO.class.php');
    require_once('../modeles/config/DonnateurDAO.class.php');
    ?>
    <script src="../ficiers-js/jquery-1.12.1.min.js"></script>
    <?php
    include('navBar.php'); 
    if (ISSET($_REQUEST["donAconsulter"])){
        $dao = new DonsDAO();
        $don = $dao->trouverDonParId($_REQUEST["donAconsulter"]);
        //  var_dump($don);
        if($don != null){
            $daoDonateur = new DonnateurDAO();
            $donateur = $daoDonateur->findDonateurByID($don->getMembreID());  
            $_SESSION["donateur"] = $donateur->getNom();
            $_SESSION["donateurCourriel"] = $donateur->getCourriel();
            $_SESSION["don"] = $don->getId();
?>    
<div class="container">
    <h1 class="text-center"> Traitement de don </h1>
    <h2>Donateur</h2>
    <label>Nom: <?=$donateur->getNom()?></label><br>
    <label>Adresse: <?=$donateur->getAdresse()?></label><br>
    <label>Téléphone: <?=$donateur->getTel()?></label><br>
    <label>Courriel: <?=$donateur->getCourriel()?></label><br>
    <h2>Don</h2>
    <label>Date du promesse: <?=$don->getDtPromesse()?></label><br>
    <label>Nom: <?=$don->getNomDon()?></label><br>
    <label>Quantité: <?=$don->getQuantite()?></label><br>
    <label>Description: <?=$don->getDESC_Don()?></label><br>
    <label>Mode de livraison: <?=$don->getModeLivr()?></label><br>
    <label>Montant: <?=$don->getMontantDon()?> CAD</label><br>
    <label>Date du promise: <?=$don->getDtPromise()?></label><br>

    <form action="../controleurs/Controle_TraiterDon.php">
        <fieldset>
            <legend>Traitement</legend>
            <label>Commenatire</label>
            <textarea class="form-control" name="motif" rows="5" ></textarea>

            <button type="submit" class=" btn btn-info btn-lg " name="traiter" value="accepter">Accepter Don </button>
            <button type="submit" class=" btn btn-info btn-lg " name="traiter" value="refuser">Refuser Don</button>
        </fieldset>
    </form>

</div> 
<?php
        } else{
            echo "Ce don n'existe pas";
        }
    } else {
        header('Location: ../vues/connexion.php');
        exit();
    }
 include('footer.php'); 
 ?>