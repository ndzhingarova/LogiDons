<?php
if (!ISSET($_SESSION)) 
    session_start();
if(isset($_SESSION['connected']) &&  isset($_SESSION['admin']) )
{ // n'autoriser l'acces a cette page qu'a l'admin
   $pageTitle = "Page Admin";
   
   require_once('../modeles/config/CategoryDAO.class.php');
   require_once('../modeles/config/MembreDAO.class.php');
   require_once('../modeles/config/DonnateurDAO.class.php');
   require_once('../modeles/config/DonsDAO.class.php');

   $catdao      = new CategorieDAO();
   $mbrdao      = new MembreDAO();
   $donateurdao = new DonnateurDAO();
   $dondao      = new DonsDAO();
 
   include('header.php');  ?>
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
   include('navBar.php');
?>
   <div class="home-stats">
     <div class="container text-center">
       <h1 class="text-center">Espace Administrateur</h1>
	       <div class="row">	      

        <div class="col-md-4" >
		        <div class="stat admin-st-category"><i class="fa fa-calendar-o"></i>
			        <div class="admin-info">
                Categories<span><a href="LesCategories.php"><?php echo $catdao->getTot_Categories(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-4">
		        <div class="stat admin-st-employe"><i class="fa fa-users"></i>
			        <div class="admin-info">
                Totale Employés<span><a href="LesMembres.php"><?php echo $mbrdao-> getTot_Membres(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-4">
		        <div class="stat admin-st-volentaires"><i class="fa fa-user"></i>
			        <div class="admin-info">
                Volentaires<span><a href=""><?php echo $mbrdao->tot_Volentaires(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-4" style="top:30px;">
		        <div class="stat admin-st-donateurs"><i class="fa fa-users"></i>
			        <div class="admin-info">
                Totale Donnateurs <span><?php echo $donateurdao->getTot_Donnateurs(); ?></span>
              </div>
			      </div>
		    </div>
         
        <div class="col-md-4" style="top:30px;">
		        <div class="stat admin-st-dons"><i class="fa fa-edit"></i>
			        <div class="admin-info">
                Totale Dons <span><?php echo $dondao-> getTot_Dons(); ?></span>
              </div>
			      </div>
		    </div>

        <div class="col-md-4" style="top:30px;">
		        <div class="stat admin-st-montant"><i class="fa fa-inbox"></i>
			        <div class="admin-info">
                Montant des Dons <span> $<?php echo $dondao->get_Somme_Dons(); ?></span>
              </div>
			      </div>
		    </div>
         
	   </div>
    </div><!-- end div container -->
  </div><!-- end div home-stats -->
  <div class="latest">
      <div class="container "><!-- start div container Deuxieme-->
        <div class="row"><!-- start div row Deuxieme -->
            <!-- ------------------------------Debut Premier Panel ---------------------------->
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i>Employés
                        <span class="admin-toggle-info pull-right"> 
                            <i class="fa fa-plus fa-lg"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                       <table class="table-condensed table-hover">
                          <thead>
                            <tr>
                              <th width='30%'>Nom</th>
                              <th width='40%'>Disponibilité</th>
                              <th class='pull-right' width='30%'>Action</th>
                            </tr>
                          </thead>  
                          <tbody>                            
                              <?php 
                                
                                  $tab_Emp = $mbrdao->get_Emp_traiteurs();
                                  foreach($tab_Emp as $empl)
                                  {
                                    echo "<tr >";
                                    echo "<td>".$empl['NOM'].'</td>';
                                      if($empl['ACTIF'] == 1) { echo "<td>Disponible</td>"; }
                                      else { echo "<td>Non Disponible</td>"; }
                                   
                                    echo " <td class='pull-right'>
                                              <a href='../controleurs/Controle_ActiverMembre.php?action=activer&idMembre=".$empl['ID']."' class='btn btn-success btn-sm'>Activer</a>
                                              <a href='../controleurs/Controle_ActiverMembre.php?action=desactiver&idMembre=".$empl['ID']."' class='btn btn-danger btn-sm'>Désactiver</a>
                                            </td> ";
                                    echo "</tr>";
                                  }                               
                              ?>                           
                          </tbody>                    
                       </table><!-- end div table -->
                    </div>
                </div>
            </div>
            <!-- -------------------------------Fin Premier Panel ----------------------------->
            <!-- -------------------------------Debut Deuxieme Panel -------------------------->
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-tag"></i>Volentaires
                        <span class="admin-toggle-info pull-right"> 
                            <i class="fa fa-plus fa-lg"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                       <table class="table-condensed table-hover">
                          <thead>
                            <tr>
                              <th width='30%'>Nom</th>
                              <th width='40%'>Disponibilité</th>
                              <th class='pull-right' width='30%'>Action</th>
                            </tr>
                          </thead>  
                          <tbody>                            
                              <?php 
                                
                                  $tab_volentaires = $mbrdao->get_Volentaires();
                                  foreach($tab_volentaires as $volentaire)
                                  {
                                    echo "<tr>";
                                    echo "<td>".$volentaire['NOM'].'</td>';
                                      if($volentaire['ACTIF'] == 1) { echo "<td>Disponible</td>"; }
                                      else { echo "<td>Non Disponible</td>"; }
                                   
                                    echo " <td class='pull-right'>
                                              <a href='../controleurs/Controle_ActiverMembre.php?action=activer&idMembre=".$volentaire['ID']."' class='btn btn-success btn-sm'>Activer</a>
                                              <a href='../controleurs/Controle_ActiverMembre.php?action=desactiver&idMembre=".$volentaire['ID']."' class='btn btn-danger btn-sm'>Désactiver</a>
                                            </td> ";
                                    echo "</tr>";
                                  }                               
                              ?>                           
                          </tbody>                    
                       </table><!-- end div table --> 
                    </div><!-- end div panel-body -->
                </div>
            </div>
            <!-- -------------------------------Fin Deuxieme Panel ---------------------------->
        </div><!-- end div row Deuxieme -->
      </div><!-- end div container Deuxieme -->
</div>
    
<?php
}
  else
{
     return ""; //lui renvoyer la page d'Accueil.
}
?>

<?php include('footer.php') ?>