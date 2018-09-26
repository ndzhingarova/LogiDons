<?php
   require_once('../modeles/classes/3-Membre.class.php');
   require_once('../modeles/classes/disponibiliteBenevole.class.php');
     if (!ISSET($_SESSION)) 
     session_start(); 
   // if()
    $pageTitle = "La page Login";
    include('header.php');   
    include('navBar.php');
?>
    
<div class="container spacer col-md-6 col-xs-12 col-md-offset-3" style="top:100px">
    <div class="panel panel-default">
        <div class="panel-heading">Informations Personnelles</div>
            <div class="panel-body">
                <form method="post" action="../controleurs/Controle_CreateDisponibilite.php">

                        <div class="form-group <?= (isset($_SESSION['benevole']['inconnue']))?'alert alert-danger':'' ?>">
                        <label class="control-label">Courriel Benevole</label>
                        <input type="text" name="courrielBenevole" class="form-control" value="<?= (isset($_SESSION['benevole']['actuel']))?$_SESSION['benevole']['actuel']->getCourriel():'' ?>" required>
                        <?= (isset($_SESSION['benevole']['inconnue']))?'<div>ce courriel n\'est pas associer a un benevole</div>':'' ?>
                        </div>
                       

                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" class="form-control" name="date" rows="5" required></textarea>
                        </div>         

                        <div class="form-group">
                            <label class="control-label">Debut</label>
                            <input type="time" class="form-control" name="debut" rows="5" required></textarea>
                        </div>      

                        <div class="form-group">
                            <label class="control-label">Fin</label>
                            <input type="time" class="form-control" name="fin" rows="5" required></textarea>
                        </div>                              

                    <div>
                        <button class="btn btn-info" type="submit">Soumettre</button>
                    </div>                               
                </form>
            </div>
        </div><!--end div panel heading -->
    </div><!--end div panel default -->
</div><!--end div container -->

<div>
<?php

if(isset($_SESSION['benevole']['jourTravailler']) && count($_SESSION['benevole']['jourTravailler']) != 0)
{ ?>
    <table>
        <thead>
            <tr>
                <th> date </th>
                <th> debut </th>
                <th> fin </th>
            </tr>
        </thead>
            <tbody>
            <?php
                foreach($_SESSION['benevole']['jourTravailler'] as $value)
                {
                    $value_obj = new disponibiliteBenevole();
                    $value_obj->loadFromObject($value);
                    echo "<tr>";
                    echo "<td>".$value_obj->getDate()."</td>";
                    echo "<td>".$value_obj->getDebut()."<td>";
                    echo "<td>".$value_obj->getFin()."<td>";
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>

    <?php    } ?>
</div>

<?php include('footer.php') ?>


