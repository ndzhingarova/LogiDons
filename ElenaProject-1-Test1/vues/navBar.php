<?php
 if (!ISSET($_SESSION))	
	  session_start();    
 
  if($pageTitle == "La page Index")
  {
	  $cheminAccueil = '';
	  $chemin = 'vues/';
	  $cheminLogout = '';
  }	 	 
  else
  {
	  $cheminAccueil = '../index.php';
	  $chemin = '';
	  $cheminLogout = '../';	  
  }    
?>
<div class="navbar">
    <div class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $cheminAccueil ?>"><span class="glyphicon glyphicon-home"></span>Acceuil</a>
			</div>			
			<div class="collapse navbar-collapse" id="app-nav">			
 			     
			    <?php
					if( ISSET($_SESSION['admin']) )
					  {
						echo "<ul class='nav navbar-nav'>
						         <li><a href='".$chemin."PageAdmin.php.'><span class='glyphicon glyphicon-folder-open'></span></span>Page Admin</a></li>
					          </ul>";
					  }
				?>
				
				<?php		
				    if( !ISSET($_SESSION['connected']) )
				        {
						  echo " <ul class='nav navbar-nav'> 
							        <li><a href='".$chemin."connexion.php'><span class='glyphicon glyphicon-user'></span>Connection</a></li> 
								 </ul>
								 <ul class='nav navbar-nav navbar-right'> 
					                <li><a href='".$chemin."CreateDon.php'><span class='glyphicon glyphicon-user'></span>Ofrir un Don</a></li> 
				                 </ul>
				                 <ul class='nav navbar-nav navbar-right'> 
					                <li><a href='".$chemin."RechercheDon.php'><span class='glyphicon glyphicon-user'></span>Modifier un Don</a></li> 
				                 </ul>";
						}
                    else
                        {
						  echo "<ul class='page0 nav navbar-nav navbar-right'>					        
						            <li class='dropdown'>
							            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true'
												   ria-expanded='false'>".$_SESSION['userName']."<span class='caret'></span>
										</a>
										<ul class='dropdown-menu'>
											
											<li><a href='".$cheminLogout."controleurs/Controle_logout.php'>LogOut</a></li>
										</ul>
									</li>
								</ul>";									
					   }				
				?>			
												
			</div>
		</div>
    </div>
</div>












