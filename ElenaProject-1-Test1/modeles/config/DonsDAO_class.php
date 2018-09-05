<?php
//if (!ISSET($_SESSION))		
//    session_start();    

require_once("../modeles/classes/2-Database_class.php");
require_once("../modeles/classes/6-LesDons_class.php");
require_once("../modeles/classes/3-Membre_class.php");
require_once("../modeles/config/MembreDAO_class.php");

class Dons_DAO
{
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
}
?>
