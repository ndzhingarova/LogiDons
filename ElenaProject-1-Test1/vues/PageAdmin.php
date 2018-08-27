<?php

if (!ISSET($_SESSION)) 
    session_start();
if(isset($_SESSION['courriel']) &&  $_SESSION['courriel'] == 'admin@admin.ca')
{ // n'autoriser l'acces a cette page qu'a l'admin
   $pageTitle = "Page Admin";
   //$navUser = "Administrateur";
   //$latestClients = 5;
   //$latestItems = 5;
   require_once('../modeles/config/CategoryDAO_class.php');
   require_once('../modeles/config/MembreDAO_class.php');
   require_once('../modeles/config/DonnateurDAO_class.php');
   $catdao = new CategorieDAO();
   $mbrdao = new MembreDAO();
   $donateurdao = new DonnateurDAO();
   //$tabLatestClients = $cldao->getLatestClients($latestClients);
   include('header.php');  
   include('navBar.php');
?>
   <div class="home-stats">
     <div class="container text-center">
       <h1 class="text-center">Espace Administrateur</h1>
	       <div class="row">	      

        <div class="col-md-3">
		        <div class="stat admin-st-category"><i class="fa fa-calendar-o"></i>
			        <div class="admin-info">
                Categories<span><a href="LesCategories.php"><?php echo $catdao->getTot_Categories(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-3">
		        <div class="stat admin-st-category"><i class="fa fa-calendar-o"></i>
			        <div class="admin-info">
                Totale Employés<span><a href="LesMembres.php"><?php echo $mbrdao-> getTot_Membres(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-3">
		        <div class="stat admin-st-category"><i class="fa fa-calendar-o"></i>
			        <div class="admin-info">
                Volentaires pas encore activés<span><a href=""><?php echo $mbrdao-> tot_Pending_Membres(); ?></a></span>
              </div>
			      </div>
		    </div>

		    <div class="col-md-3">
		        <div class="stat admin-st-category"><i class="fa fa-calendar-o"></i>
			        <div class="admin-info">
                Totale Donnateurs <span><a href=""><?php echo $donateurdao->getTot_Donnateurs(); ?></a></span>
              </div>
			      </div>
		    </div>
         
         
	   </div>
    </div>
  </div>

   
    <?php include('footer.php') ?>
<?php
}
  else
{
     // return ""; lui renvoyer la page d'Accueil.
}
?>