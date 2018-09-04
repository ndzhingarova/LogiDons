<?php
//if (!ISSET($_SESSION))		
//    session_start();    

require_once("../modeles/classes/2-Database_class.php");
require_once("../modeles/classes/6-LesDons_class.php");
require_once("../modeles/classes/3-Membre_class.php");
require_once("../modeles/config/MembreDAO_class.php");

class Dons_DAO
{	
	public function createDon_Old($donIdtf,$donnateurID,$donCat,$NomDon,$DescDon,$LivrMode,$montant,$dtPrm,$img,$nom,$email,$adresse,$tel) 
	{
		try
		{   
			$conn  = Database::getInstance();
			// debut de la transaction
			$conn->beginTransaction();
			$stmt1 = $conn->prepare(" INSERT INTO tbl_dons (IDENTIF_DON,DONNATEUR_ID,DON_CATEGORY,NOM_DON,DESC_DON,MODE_LIVRAISON,MANTANT_DON,DATE_PROMESSE,DATE_PROMISE,PHOTO_DON) VALUES (:zdonIdtf,:zdonnateurID,:zdonCat,:zNomDon,:zDescDon,:zLivrMode,:zmontant,now(),:zdtPrm,:zimg ) ");
            $stmt1 ->execute(array('zdonIdtf' => $donIdtf, 'zdonnateurID' => $donnateurID , 'zdonCat' => $donCat, 'zNomDon' => $NomDon, 'zDescDon' => $DescDon, 'zLivrMode' => $LivrMode, 'zmontant' => $montant, 'zdtPrm' => $dtPrm, 'zimg' =>$img )); 
			$stmt2 = $conn->prepare(" INSERT INTO tbl_donnateurs (DONNATEUR_NOM,DONNATEUR_EMAIL,DONNATEUR_ADRESS,DONNATEUR_TEL,DATE_CREATION) VALUES (:znom,:zemail,:zadresse,:ztel,now())");
			$stmt2 ->execute(array('znom' => $nom,'zemail' => $email,'zadresse' => $adresse,'ztel' => $tel));

			$res = $conn->prepare("SELECT MEMBRE_ID, NUM_JETON FROM tbl_membres WHERE GROUP_ID = 3");
            $res->execute();
			$rows = $res->fetchAll(); // un tableau de 2 dimensions	 
			for($i=0; $i<count($rows); $i++) 
			{
				if($rows[$i]['NUM_JETON'] == 1)
				{
					$res = $conn->prepare("UPDATE tbl_membres SET NUM_JETON = 0 WHERE MEMBRE_ID =".$rows[$i]['MEMBRE_ID']);
					$res->execute();				
					if($i != count($rows)-1)
					    {
						   $res = $conn->prepare("UPDATE tbl_membres SET NUM_JETON = 1 WHERE MEMBRE_ID =".$rows[$i+1]['MEMBRE_ID']);
						   $res->execute();	
						   $stmt3 = $conn->prepare(" INSERT INTO tbl_affectation_don (IDENTIF_DON,MEMBRE_ID,DATE_AFFECT) VALUES (:zdonIdtf,:zmbId,now())");
			               $stmt3 ->execute(array('zdonIdtf' => $donIdtf, 'zmbId' => $rows[$i+1]['MEMBRE_ID']));
						}	
					else	
					    {
						   $res = $conn->prepare("UPDATE tbl_membres SET NUM_JETON = 1 WHERE MEMBRE_ID =".$rows[0]['MEMBRE_ID']);
						   $res->execute();
						   $stmt3 = $conn->prepare(" INSERT INTO tbl_affectation_don (IDENTIF_DON,MEMBRE_ID,DATE_AFFECT) VALUES (:zdonIdtf,:zmbId,now())");
			               $stmt3 ->execute(array('zdonIdtf' => $donIdtf,'zmbId' => $rows[0]['MEMBRE_ID'] ));
						}		
				}				
			}		
			$conn->commit();
			$res->closeCursor();
		    Database::close();
		}
		catch(Exception $e)
		{
			$conn->rollBack();
			echo "Failed : ". $e->getMessage();
		}	
	}
	public function createDonAvecIdDonnateur($donateurID,$catDon) 
	{//createDonAvecIdDonnateur($donnateurID,$catDon,$NomDon,$DescDon,$ModeLivr,$montantDon,$dtPrm,$img,$employeID) 
		try
		{   
			$conn  = Database::getInstance();
			// debut de la transaction
			//$conn->beginTransaction();
			// retrouver l'employé a qui il a le tour
			$pstmt = $conn->prepare(" SELECT MEMBRE_ID FROM membre WHERE GROUP_ID = 3 AND ACTIF = 1 ORDER BY MEMBRE_ID ASC");
			$pstmt->execute();
			$rows = $pstmt->fetchAll(); // pour avoir un tableau a 2 dimensions qui contient le resultat de la requete
			var_dump($rows);
			$membredao = new MembreDAO();
			if(Membre::$leTour == null){
				Membre::$leTour = $membredao->getLePremier();// variable qui va contenir l'ID suivant
				
			}
			    
			     
			//echo "actuel :".$id_Emp_actuel."<br>";
			  
			//if(Membre::$leTour == null)
			   // Membre::$leTour =  $id_Emp_actuel;
			//echo "le static : ". Membre::$leTour."<br>";
			//$id_Emp_actuel = Membre::$leTour;
			//var_dump(Membre::$leTour);
           // var_dump($id_Emp_actuel);
			
			
			//$membre = new Membre();
			//$membre->setLetour($id_Emp_actuel);
			//echo "apres setleTour".$membre->getLeTour()."<br>";	
			$id_Emp_Suivant = 0;
			//$idDernier = $membre->getLeTour();  //pour avoir l'ID du dernier Employe affecte
			
			for($i=0; $i < count($rows);$i++)
			    {
					if( $rows[$i][0] == Membre::$leTour )
						{
							if($i != count($rows)-1)
							{ 
								$id_Emp_Suivant = $rows[$i+1][0];
								echo "le suivant: ".$id_Emp_Suivant."<br>";
								//$membre->setLeTour($id_Emp_Suivant);
								Membre::$leTour = $id_Emp_Suivant;
								var_dump(Membre::$leTour);
								break;
							}
							else
							{
								$id_Emp_Suivant = $rows[0][0];
								echo "le suivant: ".$id_Emp_Suivant."<br>";	
								Membre::$leTour = $id_Emp_Suivant;
								//var_dump(Membre::$leTour);
								break;
							}							
						}											
				}
				//Membre::$leTour = $id_Emp_Suivant;
				//var_dump(Membre::$leTour);
			//	echo $membre->getLeTour();
			//Membre::$ID_EMPLOYE_TRAITEUR["actuel"] = $id_Emp_Suivant;	
			//echo "valeur apres :".$tab['actuel']."<br>";
			//echo "static apres :".Membre::$ID_EMPLOYE_TRAITEUR["actuel"]."<br>";
			$stmt1 = $conn->prepare(" INSERT INTO don (DONATEUR_ID,CATEGORIE,MEMBRE_ID) VALUES (:zdonnateurID,:zdonCat,:zid_Emp_Suivant) ");
            $stmt1 ->execute (array('zdonnateurID' => $donateurID , 'zdonCat' => $catDon, 'zid_Emp_Suivant' =>$id_Emp_Suivant)); 
			//$stmt1 ->execute (array('zdonnateurID' => $donateurID , 'zdonCat' => $donCat, 'zNomDon' => $NomDon, 'zDescDon' => $DescDon, 'zLivrMode' => $LivrMode, 'zmontant' => $montantDon, 'zdtPrm' => $dtPrm, 'zimg' =>$img, ':zidEmp' =>$id_Emp_Suivant)); 
					
			//$conn->commit();
			$pstmt->closeCursor();
		    Database::close();
		}
		catch(Exception $e)
		{
			//$conn->rollBack();
			echo "Failed : ". $e->getMessage();
		}	
	}
	public function createDonSansIdDonnateur($donIdtf,$donnateurID,$donCat,$NomDon,$DescDon,$LivrMode,$montant,$dtPrm,$img,$nom,$email,$adresse,$tel) 
	{
		try
		{   
			$conn  = Database::getInstance();
			// debut de la transaction
			$conn->beginTransaction();
				
					
			$conn->commit();
			$res->closeCursor();
		    Database::close();
		}
		catch(Exception $e)
		{
			$conn->rollBack();
			echo "Failed : ". $e->getMessage();
		}	
	}
}
?>
