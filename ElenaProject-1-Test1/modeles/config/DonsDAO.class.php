<?php
//if (!ISSET($_SESSION))		
//    session_start();    

require_once("../modeles/classes/2-Database.class.php");
require_once("../modeles/classes/6-LesDons.class.php");
require_once("../modeles/classes/3-Membre.class.php");
require_once("../modeles/config/MembreDAO.class.php");

class DonsDAO
{

	public function createDon($donateurID,$emp_id,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img)
		{
			try
			{
				$conn  = Database::getInstance();
				$pstmt = $conn->prepare("INSERT INTO don (MEMBRE_ID,EMPLOYE_ID, CATEGORIE_ID,NOM,DESCRIPTION,QUANTITE,MODE_LIVRAISON,MONTANT,DATE_PROMESSE,DATE_PROMISE,PHOTO)
										VALUES (:zdonateurID,:emp, :zcatDon,:znom,:zdesc,:zqtt,:zmodeLivr,:zmont,now(),:zdtPrm,:zimg) ");
				$reponse = $pstmt ->execute(array('zdonateurID' => $donateurID ,
										'emp' => $emp_id,
										'zcatDon' => $catDon, 
										'znom' => $nom, 
										'zdesc' => $DescDon, 
										'zqtt' => $qtt, 
										'zmodeLivr' => $modeLivr, 
										'zmont' => $montantDon, 
										'zdtPrm' => $dtPrm, 
										'zimg' =>$img));
				return $reponse;

			}
			catch(PDOException $e)
			{
				throw $e;
			}
		}

	public function AttibuerEmploye()
		{
			$conn  = Database::getInstance();
			try
			{ 
			$pstmt = $conn->prepare(" SELECT ID, NUM_JETON FROM membre WHERE GROUP_ID = 3 AND ACTIF = 1 ORDER BY ID ASC");
			$pstmt->execute();
			$rows = $pstmt->fetchAll();
			$id_Emp_actuel = 0;
				$id_Emp_Suivant = 0;
				for($i=0; $i < count($rows);$i++)
					{
						if( $rows[$i]['NUM_JETON'] == 1 )
							{
								if($i != count($rows)-1)
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[$i+1]['ID'];				
									break;
								}
								else
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[0]['ID'];							
									break;
								}							
							}											
					}
			$res = $conn->prepare( "UPDATE membre SET NUM_JETON = 0 WHERE ID =".$id_Emp_actuel);
			$res->execute();	
			$res = $conn->prepare("UPDATE membre SET NUM_JETON = 1 WHERE ID = ".$id_Emp_Suivant);
			$res->execute();
			$res->closeCursor();
				Database::close();

			}
			catch(Exception $e)
			{
				$conn->rollBack();
				echo "Failed : ". $e->getMessage();
			}
			
			var_dump($id_Emp_Suivant);

			return $id_Emp_Suivant;
		}

	public function trouverDonsDonateur($id)
		{
			$cnx = Database::getInstance();
			try {
			$liste = Array();//new Liste();
		
			$pstmt = $cnx->prepare("SELECT * FROM don WHERE MEMBRE_ID = :x");
			$res = $pstmt->execute(array(':x' => $id));
			$res = $pstmt->fetchAll	(PDO::FETCH_OBJ);
		    foreach($res as $row) {
				$c = new Don();
				$c->loadFromArray($row);
				array_push($liste, $c); //$liste->add($c);
		    }
			$pstmt->closeCursor();
			Database::close();
			return $liste;
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				return $liste;
			}	
    	}	
	
	public function createDonAvecIdDonnateur($donateurID,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img) 
		{
			try
			{   
				$conn  = Database::getInstance();
				// debut de la transaction
				$conn->beginTransaction();

				//on recupere l'ID du dernier Employe qu'on lui avait donner un don a traiter
				$pstmt = $conn->prepare(" SELECT ID, NUM_JETON FROM membre WHERE GROUP_ID = 3 AND ACTIF = 1 ORDER BY ID ASC");
				$pstmt->execute();
				$rows = $pstmt->fetchAll(); // pour avoir un tableau a 2 dimensions qui contient le resultat de la requete
				//var_dump($rows);
				$id_Emp_actuel = 0;
				$id_Emp_Suivant = 0;
				for($i=0; $i < count($rows);$i++)
					{
						if( $rows[$i]['NUM_JETON'] == 1 )
							{
								if($i != count($rows)-1)
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[$i+1]['ID'];				
									break;
								}
								else
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[0]['ID'];							
									break;
								}							
							}											
					}
					//echo $id_Emp_actuel."<br>";
					//echo $id_Emp_Suivant."<br>";
					$res = $conn->prepare( "UPDATE membre SET NUM_JETON = 0 WHERE ID =".$id_Emp_actuel);
					$res->execute();	
					$res = $conn->prepare("UPDATE membre SET NUM_JETON = 1 WHERE ID = ".$id_Emp_Suivant);
					$res->execute();
					$stmt = $conn->prepare(" INSERT INTO don (MEMBRE_ID,EMP_TRAITEUR,CATEGORIE_ID,NOM,DESCRIPTION,QUANTITE,MODE_LIVRAISON,MONTANT,DATE_PROMESSE,DATE_PROMISE,PHOTO) VALUES (:zdonateurID,:zempl,:zcatDon,:znom,:zdesc,:zqtt,:zmodeLivr,:zmont,now(),:zdtPrm,:zimg) ");
					$stmt ->execute(array('zdonateurID' => $donateurID ,'zempl' => $id_Emp_Suivant,'zcatDon' => $catDon, 'znom' => $nom, 'zdesc' => $DescDon, 'zqtt' => $qtt, 'zmodeLivr' => $modeLivr, 'zmont' => $montantDon, 'zdtPrm' => $dtPrm, 'zimg' =>$img));
									
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

	public function createDonAvecNouveauDonnateur($nomDntr,$courriel,$tel,$adresse,$catDon,$nom,$DescDon,$qtt,$modeLivr,$montantDon,$dtPrm,$img) 
		{
			try
			{   
				$conn  = Database::getInstance();
				// debut de la transaction
				$conn->beginTransaction();

				//on recupere l'ID du dernier Employe qu'on lui avait donner un don a traiter
				$pstmt = $conn->prepare(" SELECT ID, NUM_JETON FROM membre WHERE GROUP_ID = 3 AND ACTIF = 1 ORDER BY ID ASC");
				$pstmt->execute();
				$rows = $pstmt->fetchAll(); // pour avoir un tableau a 2 dimensions qui contient le resultat de la requete
				var_dump($rows);
				$id_Emp_actuel = 0;
				$id_Emp_Suivant = 0;
				for($i=0; $i < count($rows);$i++)
					{
						if( $rows[$i]['NUM_JETON'] == 1 )
							{
								if($i != count($rows)-1)
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[$i+1]['ID'];				
									break;
								}
								else
								{
									$id_Emp_actuel  = $rows[$i]['ID'];
									$id_Emp_Suivant = $rows[0]['ID'];							
									break;
								}							
							}											
					}
					echo $id_Emp_actuel."<br>";
					echo $id_Emp_Suivant."<br>";
					$res = $conn->prepare( "UPDATE membre SET NUM_JETON = 0 WHERE ID =".$id_Emp_actuel);
					$res->execute();	
					$res = $conn->prepare("UPDATE membre SET NUM_JETON = 1 WHERE ID = ".$id_Emp_Suivant);
					$res->execute();
					$stmt = $conn->prepare(" INSERT INTO don (MEMBRE_ID,EMP_TRAITEUR,CATEGORIE_ID,NOM,DESCRIPTION,QUANTITE,MODE_LIVRAISON,MONTANT,DATE_PROMESSE,DATE_PROMISE,PHOTO) VALUES (:zdonateurID,:zempl,:zcatDon,:znom,:zdesc,:zqtt,:zmodeLivr,:zmont,now(),:zdtPrm,:zimg) ");
					$stmt ->execute(array('zdonateurID' => $donateurID ,'zempl' => $id_Emp_Suivant,'zcatDon' => $catDon, 'znom' => $nom, 'zdesc' => $DescDon, 'zqtt' => $qtt, 'zmodeLivr' => $modeLivr, 'zmont' => $montantDon, 'zdtPrm' => $dtPrm, 'zimg' =>$img));
					$stmt = $conn->prepare(" INSERT INTO don (MEMBRE_ID,   EMP_TRAITEUR,CATEGORIE_ID,NOM,DESCRIPTION,QUANTITE,MODE_LIVRAISON,MONTANT,DATE_PROMESSE,DATE_PROMISE,PHOTO) 
													VALUES (:zdonateurID, :zempl,      :zcatDon,    :znom,:zdesc,   :zqtt,   :zmodeLivr,    :zmont, now(),        :zdtPrm,     :zimg) ");
					$stmt ->execute(array('zdonateurID' => $donateurID ,'zempl' => $id_Emp_Suivant,'zcatDon' => $catDon, 'znom' => $nom, 'zdesc' => $DescDon, 'zqtt' => $qtt, 'zmodeLivr' => $modeLivr, 'zmont' => $montantDon, 'zdtPrm' => $dtPrm, 'zimg' =>$img));
			
									
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

	public function findAllDons()		
	    {
			try 
			{
				$conn = Database::getInstance();			
				$res = $conn->prepare("SELECT * FROM don");
				$res->execute();
				$rows = $res->fetchAll();		  
				$res->closeCursor();
				Database::close();
				return $rows;//return un tableau de 2 dimensions, ou chaque ligne est un tableau 
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				return $rows;
			}	
		}

	public function getTot_Dons() // utile
		{
			$db = Database::getInstance();
	
			$pstmt = $db->prepare(" SELECT * FROM don ");
			$pstmt->execute();		
			$count = $pstmt->rowCount();								
			$pstmt->closeCursor();
			Database::close();
			return $count;;
		}	

	public function get_Somme_Dons()	
	{ 
		$db = Database::getInstance();			
		$pstmt = $db->prepare(" select SUM(MONTANT) AS total FROM don ");
		$pstmt->execute();
		$laSomme = 0;
		$row = $pstmt->Fetch(PDO::FETCH_ASSOC);
		$laSomme = $row['total'];		
		return $laSomme;
	}
}


?>
