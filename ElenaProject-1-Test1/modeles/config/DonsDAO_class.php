<?php
//if (!ISSET($_SESSION))		
//    session_start();    

require_once("../modeles/classes/2-Database_class.php");
require_once("../modeles/classes/6-LesDons_class.php");

class Dons_DAO
{	
    public function createDon_Old($donID,$donnateurID,$donCat,$NomDon,$DescDon,$LivrMode,$montant,$dtPrm,$img) 
	{
		try
		{
            $req = "INSERT INTO tbl_dons (DON_ID,DONNATEUR_ID,DON_CATEGORY,NOM_DON,DESC_DON,MODE_LIVRAISON,MANTANT_DON,DATE_PROMESSE,DATE_PROMISE,DATE_ANNULATION,DATE_ACCEPTATION,DATE_RECU,DATE_REFU,PHOTO_DON)
			        VALUES('".$donID."','".$donnateurID."','".$donCat."','".$NomDon."','".$DescDon."','".$LivrMode."','".$montant."',now(),'".$dtPrm."','2000-01-01', '2000-01-01', '2000-01-01', '2000-01-01','".$img."')";

			$conn  = Database::getInstance();
            $pstmt = $conn->prepare($req);
			$pstmt->execute();							                 								 			
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	public function createDon($donID,$donnateurID,$donCat,$NomDon,$DescDon,$LivrMode,$montant,$dtPrm,$img,$nom,$email,$adresse,$tel) 
	{
		try
		{   // INSERT INTO `tbl_donnateurs` (`DONNATEUR_NOM`, `DONNATEUR_EMAIL`, `DONNATEUR_ADRESS`, `DONNATEUR_TEL`, `MOT_DE_PASSE`, `DATE_CREATION`) VALUES ('nom', 'email@email.ca', 'adresse', 'telephone', 'motDePasse', '2018-08-27');     
			$req1 = "INSERT INTO tbl_dons (DON_ID,DONNATEUR_ID,DON_CATEGORY,NOM_DON,DESC_DON,MODE_LIVRAISON,MANTANT_DON,DATE_PROMESSE,DATE_PROMISE,DATE_ANNULATION,DATE_ACCEPTATION,DATE_RECU,DATE_REFU,PHOTO_DON)  VALUES ('".$donID."','".$donnateurID."','".$donCat."','".$NomDon."','".$DescDon."','".$LivrMode."','".$montant."',now(),'".$dtPrm."','2000-01-01', '2000-01-01', '2000-01-01', '2000-01-01','".$img."')";
			$req2 = " INSERT INTO tbl_donnateurs (DONNATEUR_NOM,DONNATEUR_EMAIL,DONNATEUR_ADRESS,DONNATEUR_TEL,DATE_CREATION) VALUES ('".$nom."','".$email."','".$adresse."','".$tel."',now())";
			$conn  = Database::getInstance();
			// debut de la transaction
			$conn->beginTransaction();
			$conn->exec($req1);
			$conn->exec($req2);
			$conn->commit();
		}
		catch(Exception $e)
		{
			$conn->rollBack();
			echo "Failed : ". $e->getMessage();
		}	
	}
}
?>