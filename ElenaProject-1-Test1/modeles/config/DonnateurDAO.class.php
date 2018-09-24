<?php
require_once("../modeles/classes/2-Database.class.php");
require_once("../modeles/classes/5-Donnateurs.class.php");
require_once("../modeles/classes/7-Compagnie.class.php");

class DonnateurDAO
{	
	public function createDonateurSansReg($nomDonateur,$courriel,$adresse,$ville,$codePost,$province,$telephone)
	{// inserer un nouveau Donateur qui n'existe pas dans la BDD
		$db = Database::getInstance();
		$pstmt = $db->prepare("INSERT INTO membre (NOM,COURRIEL,ADRESSE,VILLE,CODE_POSTALE,PROVINCE,TELEPHONE,GROUP_ID,DATE_CREATION) 
		                                  VALUES (:nom,:courriel,:adresse,:ville,:codePostale,:province,:telephone, 5, now() )");	
		try
		{
			$donateurResponse =  $pstmt->execute(array(':nom' => $nomDonateur,
											':courriel' => $courriel,
											':adresse' => $adresse,
											':ville' => $ville,
											':codePostale' => $codePost,
											':province' => $province,
											':telephone' => $telephone								
											));
			
			return $donateurResponse;
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function findDonateurByID($id) // utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM membre WHERE ID = :x");
		$pstmt->execute(array(':x' => $id));
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
	public function insererNouvelleEntreprise($nomComp)
	{// inserer une nouvelle Entreprise qui n'existe pas dans la BDD
		try
		{
			$conn  = Database::getInstance();
            $pstmt = $conn->prepare(" INSERT INTO compagnie (NOM, DATE_CREATION) VALUES(:znom, now()) ");
            $pstmt->execute( array(':znom' => $nomComp) );
            $pstmt->closeCursor();
			Database::close();			
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public function findDonateurByEmail($courriel) // utile
	{// rechercher un Donateur par son email. S'il existe la fonction le retourne sous
     // forme d'objet, sinon elle retourne null.(elle est appellée dans Controle_CreateDon.php)
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

    public function findDonateurByNameByCourriel($nomComp, $courriel) // utile
	{// cette fonction verifie si le nom du Contact de la compagnie existe dans la BDD ou non(Controle_createDon.php)
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM membre WHERE NOM = :x AND COURRIEL = :y");
		$pstmt->execute(array(':x' => $nomComp, ':y' => $courriel));
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

	public function findDonateurInscrit($courriel,$MotDePasse)// a vérifier avec Manesh
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
	{// cette fonction retourne le nombre de donateurs pour l'afficher dans la PageAdmin
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM membre WHERE GROUP_ID = 5");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		return $count;
	}
	
	public function findCompByName($nomComp) // utile
	{// cette fonction verifie si la compagnie existe dans la BDD ou non(Controle_createDon.php)
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM compagnie WHERE NOM = :x");
		$pstmt->execute(array(':x' => $nomComp));
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		if ($result)
		{
			$c = new Compagnie();
			$c->loadFromObject($result);
			$pstmt->closeCursor();
			return $c;
		}
		$pstmt->closeCursor();
		Database::close();
		return NULL;
	}
	
}

?>