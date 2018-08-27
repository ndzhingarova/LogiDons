<?php
     if (!ISSET($_SESSION)) 
         session_start();
     session_unset();
     session_destroy();
     header('Location: ../index-0.php');
     exit();
?>