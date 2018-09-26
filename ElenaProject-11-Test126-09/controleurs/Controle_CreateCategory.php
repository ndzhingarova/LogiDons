<?php
        require_once('../modeles/config/CategoryDAO.class.php');
           
        if($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            header('Location: ../vues/create-category.php');
        }
        else
        {
            if( empty($_POST['nomCat']) || empty($_POST['desCat']) )
            {
                // lui afficher un message d'erreur
                header('Location: ../vues/create-category.php');
            }
            else
            {
                // est-ce que le nom existe deja ou pas
                $catDAO = new CategorieDAO();
                if( $catDAO->findCatByName($_POST['nomCat']) > 0 )
                {
                    // lui afficher un message que le nom choisi existe deja dans la BDD
                    header('Location: ../vues/create-category.php');
                }
                else
                {
                    $catDAO->createCategory($_POST['nomCat'], $_POST['desCat']);
                    header('Location: ../vues/PageAdmin.php');
                }
            }
        }
    

?>
