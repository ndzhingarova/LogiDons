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
            $pstmt = $conn->prepare("INSERT INTO  tbl_donnateurs (DONNATEUR_NOM ,DONNATEUR_EMAIL ,DONNATEUR_ADRESS, DONNATEUR_TEL, MOT_DE_PASSE, DATE_CREATION)
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
	public function findEmail($courriel) // utile
	{
	           // cette fonction nous renvoie le nombre d'enregistrements
	            // lié à cet email (0 ou 1 ).
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM  tbl_donnateurs WHERE DONNATEUR_EMAIL = :x");
		$pstmt->execute(array(':x' => $courriel));	
		$count = $pstmt->rowCount();
		$pstmt->closeCursor();
		Database::close();
		return $count;
	}	
	public function getTot_Donnateurs() // utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM  tbl_donnateurs");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		return $count;
	}
	
}

?>