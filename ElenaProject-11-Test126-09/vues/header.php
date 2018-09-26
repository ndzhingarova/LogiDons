<?php
if($pageTitle == "La page Index")
     $cheminCSS = 'styles-CSS/';
else
     $cheminCSS = '../styles-CSS/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo 'title' ?></title>
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>NavBarCSS.css"> 
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>Page-damin.CSS.css">
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>PageMembres.CSS.css">
    <link rel="stylesheet" href="<?php echo $cheminCSS ?>CreateDonCSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</head>
<body>


