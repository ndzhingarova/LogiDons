

<?php
if (!ISSET($_SESSION))
{		
   session_start();
   if(!isset( $_SESSION['courriel']))
   {
       $_SESSION['courriel'] = ''; 
       $_SESSION['userName'] = '';
   }        
}
    $pageTitle = "La page Index";        
    include('vues/header.php');
    include('vues/navBar.php');   
    include("./PageAccueilSiteDon/pageAccueil.php");
?>

<h1 class="text-center">La page Accueil</h1>

<script src="ficiers-js/jquery-1.12.1.min.js"></script> 
<script src="ficiers-js/bootstrap.min.js"></script>
<script src="ficiers-js/Page-admin-js.js"></script>
</body>
</html>