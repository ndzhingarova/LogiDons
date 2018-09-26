<?php

class Categorie {
	private $id_categorie;
	private $nom_categorie;
	private $desc_categorie;
	
	public function __construct() { }	

	public function getID()             { return $this->id_categorie; }	
	public function setId($value)       { $this->id_categorie = $value; }
	public function getNom()            { return $this->nom_categorie; }	
	public function setNom($value)      { $this->nom_categorie = $value; }
	public function getDESC_CAT()       { return $this->desc_categorie; }	
	public function setDESC_CAT($value) { $this->desc_categorie = $value; }
	
	public function loadFromObject($x)
	{
		$this->id_categorie   = $x->ID;
		$this->nom_categorie  = $x->NOM;
		$this->desc_categorie = $x->DESCRIPTION;
	}	
}
?>