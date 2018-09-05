<?php
require_once("../modeles/classes/2-Database_class.php");
require_once("../modeles/classes/3-Membre_class.php");

class MembreDAO
{	
	public function createMembre($x1,$x2,$x3,$x4,$x5) // utile
	{
		try
		{
			$conn  = Database::getInstance();
            $pstmt = $conn->prepare("INSERT INTO membre (MEMBRE_NAME ,MEMBRE_EMAIL ,MEMBRE_ADRESS, MEMBRE_TEL, MOT_DE_PASSE, DATE_CREATION)
			                         VALUES                  (:znom,      :zcourriel,   :zadresse,      :ztel,      :zmotDP,      now())");
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
	public function findMembre($courriel, $MotDePasse)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM membre WHERE MEMBRE_EMAIL = :x AND MOT_DE_PASSE = :y");
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
	public function findMembreByEmail($courriel)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM membre WHERE COURRIEL = :x");
		$pstmt->execute(array(':x' => $courriel));		
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
	public function findEmail($courriel) // utile
	{
	           // cette fonction nous renvoie le nombre d'enregistrements
	            // lié à cet email (0 ou 1 ).
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM membre WHERE MEMBRE_EMAIL = :x");
		$pstmt->execute(array(':x' => $courriel));	
		$count = $pstmt->rowCount();
		$pstmt->closeCursor();
		Database::close();
		return $count;
	}	
	public function getTot_Membres() // utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare(" SELECT * FROM  membre");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		return $count;
	}
	public function tot_Pending_Membres() // utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare(" SELECT * FROM  membre WHERE GROUP_ID = 4 AND PENDING = 0  ");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		return $count;
	}
	public function findAll_Membres() // cette methode fait un select * de toute la table, et renvoie 
	{                         // toutes les donnees dans un tableau a 2 dimensions.                      
		try 
		{
			$conn = Database::getInstance();			
            $res = $conn->prepare("SELECT * FROM membre");
            $res->execute();
            $rows = $res->fetchAll();		  
			$res->closeCursor();
			Database::close();
			return $rows;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $rows;
		}	
	}	
	public function getMembreById($id) //utile
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM membre WHERE MEMBRE_ID = :x ");
		$pstmt->execute(array(':x' => $id));		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);		
		if ($result)
		{
			$membre = new Membre();
			$c->loadFromObject($result);
			$pstmt->closeCursor();
			Database::close();
			return $membre;
		}
		$pstmt->closeCursor();
		return NULL;
	}
	
}

?>