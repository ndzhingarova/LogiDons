<?php
require_once("../modeles/classes/2-Database.class.php");
require_once("../modeles/classes/4-Categorie.class.php");

class CategorieDAO
{
    public function createCategory($nom, $desc) // utile
	{
		try
		{
			$conn  = Database::getInstance();
            $pstmt = $conn->prepare(" INSERT INTO categorie (NOM, DESCRIPTION) VALUES(:znom, :zdesc) ");
            $pstmt->execute( array('znom' => $nom, 'zdesc' =>$desc) );
            $pstmt->closeCursor();
			Database::close();			
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}	
	public function findCatByName($nom) //utile
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM categorie WHERE NOM = :x");
		$pstmt->execute(array('x' => $nom));	
		$count = $pstmt->rowCount();
		$pstmt->closeCursor();
		Database::close();
		return $count;// return 1 si existe, sinon 0
	}
	public function getCatById($id)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM categorie WHERE ID = :x ");
		$pstmt->execute(array('x' => $id));		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);		
		if ($result)
		{
			$c = new Categorie();
			$c->loadFromObject($result);
			$pstmt->closeCursor();
			Database::close();
			return $c;
		}
		$pstmt->closeCursor();
		return NULL;
	}
	public function catUpdate($nom, $desc, $id) //utile
	{  		
		$request = "UPDATE categorie SET NOM = '".$nom."', DESCRIPTION = '".$desc."'".
				   " WHERE ID = '".$id."'";
		try
		{
			$conn  = Database::getInstance();          
            return $conn->exec($request);
            $pstmt->closeCursor();
			Database::close();			
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	} 
	public function getTot_Categories() // utile
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare(" SELECT * FROM categorie ");
		$pstmt->execute();		
		$count = $pstmt->rowCount();								
		$pstmt->closeCursor();
		Database::close();
		return $count;;
	}
	public function findAllCat() // utile
	{                           
		try 
		{
			$conn = Database::getInstance();			
            $res = $conn->prepare("SELECT * FROM categorie");
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
	public function deleteCat($id) // utile
	{
		$request = "DELETE FROM categorie WHERE ID = '".$id."'";
		try
		{
			$conn = Database::getInstance();
			return $conn->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
}

