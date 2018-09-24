<?php

class Compagnie {
	private $id_compagnie;
	private $nom_compagnie;
	private $dateCreation;
	
	public function __construct() { }	

	public function getID()                 { return $this->id_compagnie; }	
	public function setId($value)           { $this->id_compagnie = $value; }
	public function getNomCompagnie()       { return $this->nom_compagnie; }	
	public function setNomCompagnie($value) { $this->nom_compagnie = $value; }
	public function getDateCreation()       { return $this->dateCreation; }	
	public function setDateCreation($value) { $this->dateCreation = $value; }
	
	public function loadFromObject($x)
	{
		$this->id_compagnie  = $x->ID;
		$this->nom_compagnie = $x->NOM;
		$this->dateCreation  = $x->DATE_CREATION;
	}	
}
?>