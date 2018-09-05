<?php
require_once("../modeles/classes/2-Database_class.php");
require_once("../modeles/classes/5-Donnateurs_class.php");

class DonnateurDAO
{	
	public function createDonnateur($x1,$x2,$x3,$x4,$x5) //utile
	{
		try
		{
			$conn  = Database::getInstance();
            $pstmt = $conn->prepare("INSERT INTO membre (DONNATEUR_NOM ,DONNATEUR_EMAIL ,DONNATEUR_ADRESS, DONNATEUR_TEL, MOT_DE_PASSE, DATE_CREATION)
			                         VALUES                  (:znom,         :zcourriel,      :zadresse,        :ztel,         :zmotDP,      now())");
			$pstmt->execute(array('znom'      => $x1,
								  'zcourriel' => $x2,
								  'zadresse'  => $x3,
								  'ztel'      => $x4,
								  'zmotDP'    => $x5,
								  ));			
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function createDonateurSansReg($nomDonateur, $courriel, $telephone, $adresse){
		$db = Database::getInstance();
		$pstmt = $db->prepare("INSERT INTO membre (NOM ,COURRIEL ,ADRESSE, TELEPHONE, GROUP_ID) VALUES 
		(:nom, :courriel, :adresse, :telephone, 5 )");	
		try
		{
			$donateurResponse =  $pstmt->execute(array(':nom' => $nomDonateur,
											':courriel' => $courriel,
											':adresse' => $adresse,
											':telephone' => $telephone
											
											));
			
			return $donateurResponse;
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function findDonateurByEmail($courriel) // utile
	{
	        // cette fonction nous renvoie le nombre d'enregistrements
	        // lié à cet email (0 ou 1 ).
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM membre WHERE COURRIEL = :x");
		$pstmt->execute(array(':x' => $courriel));
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		if ($result)
		{
			$c = new Donnateur();
			$c->loadFromObject($result);
			$pstmt->closeCursor();
			return $c;
		}
		$pstmt->closeCursor();
		Database::close();
		return NULL;
	}
	public function findDonateurInscrit($courriel,$MotDePasse) 
	{	
        $db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM donnateur WHERE COURRIEL = :x AND MOT_DE_PASSE = :y");
		$pstmt->execute(array(':x' => $courriel, ':y' => $MotDePasse));		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);		
		if ($result)
		{
			$c = new Membre();
			$c->loadFromObject($result);
			$pstmt->closeCursor();
			return $c;
		}
		$res->closeCursor();
		Database::close();
		return NULL;
	}	
	public function getTot_Donnateurs() // utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM donnateur");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		return $count;
	}
	
}

?>