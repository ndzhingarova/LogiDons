<?php

require_once('../modeles/config/DonsDAO.class.php');
require_once('../modeles/config/Format.php');

$pageTitle = "";
include('../vues/header.php');  
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
include('../vues/navBar.php');

$format   = new Format();

if(isset($_GET['donID']) && is_numeric($_GET['donID']))
{
    $id = intval($_GET['donID']);
    $dao = new DonsDAO();     
    $dao->deleteDon($id);

    $message = "Le don a été supprimmé avec succes.";
    $class   = "success";
    $url     = "../vues/TousLesDons.php";
    $nomPage = "vos dons.";   
    $format->redirect($message, $class, $url, $nomPage);
}
?>