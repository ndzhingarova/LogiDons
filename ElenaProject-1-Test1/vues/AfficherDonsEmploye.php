
<html>

<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="./css/style.css" type="text/css" />
<title>Dons a traiter</title>
</head>

<body>
<div>
    <div id="content">
        <h2>Liste des dons a traiter</h2>
        <?php
        if (!ISSET($_SESSION)) 
            session_start();
//        if(ISSET($_SESSION['userId'])){
            require_once('../modeles/config/DonsDAO.class.php');
            $dao = new DonsDAO();
            $_SESSION["employe"] = 3; //gerer ca au login
            $liste = $dao->trouverDonsEmploye($_SESSION['employe']);// change to employe
            if (empty($liste)) {
                echo "Vous avez traiter toutes les dons attribues";
            } else {
                echo "<table border=1>",
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
                echo "</table>";
            } 
 /*       } else {
            header('Location: ../vues/connexion.php');
            exit();
        }*/

        ?>	
    </div>
    <?php
        include("footer.php");
    ?>
</div>
</body>
</html>