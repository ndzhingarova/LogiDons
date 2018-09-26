<?php

class LesDons {
	private $id_don;
	private $id_donnateur;
	private $don_category;
	private $nom_don;
	private $desc_don;
	private $mode_livraison;
	private $montant_don;
	private $datePromesse;
	private $datePromise;
	private $dateAnnulation;
	private $dateAcceptation;
	private $dateReception;
	private $dateRefu;
	private $photoDon;
	private $id_membre;
	private $id_employe;
	private $quantite;


	public function __construct() { }	

	public function getID()                { return $this->id_don; }	
	public function setId($value)          { $this->id_don = $value; }
	public function getID_Donnateur()      { return $this->id_donnateur; }	
	public function setId_Donnateur($value){ $this->id_donnateur = $value; }
	public function getCatDon()            { return $this->don_category; }	
	public function setCatDon($value)      { $this->don_category = $value; }
	public function getNomDon()            { return $this->nom_don; }	
	public function setNomDon($value)      { $this->nom_don = $value; }
	public function getDESC_Don()          { return $this->desc_don; }	
	public function setDESC_Don($value)    { $this->desc_don = $value; }
	public function getModeLivr()          { return $this->mode_livraison; }	
	public function setModeLivr($value)	   { $this->mode_livraison = $value; }
	public function getMontantDon()        { return $this->montant_don; }	
	public function setMontantDon($value)  { $this->montant_don = $value; }
	public function getDtPromesse()        { return $this->datePromesse; }	
	public function setDtPromesse($value)  { $this->datePromesse = $value; }
    public function getDtPromise()         { return $this->datePromise; }	
	public function setDtPromise($value)   { $this->datePromise = $value; } 
    public function getDtAnnul()           { return $this->dateAnnulation; }	
	public function setDtAnnul($value)     { $this->dateAnnulation = $value; }
	public function getDtAccept()          { return $this->dateAcceptation; }	
	public function setDtAccept($value)    { $this->dateAcceptation = $value; }
	public function getDtRecpt()           { return $this->dateReception; }	
	public function setDtRecept($value)    { $this->dateReception = $value; }
	public function getDtRefu()            { return $this->dateRefu; }	
	public function setDtRefu($value)      { $this->dateRefu = $value; }
	public function getPhoto()             { return $this->photoDon; }	
	public function setPhoto($value)       { $this->photoDon = $value; }
	public function getMembreID()          { return $this->id_membre; }	
	public function setMembreId($value)    { $this->id_membre = $value; }

	public function getEmployeID()          { return $this->id_employe; }	
	public function setEmployeId($value)    { $this->id_employe = $value; }
	public function getQuantite()          { return $this->quantite; }	
	public function setQuantite($value)    { $this->quantite = $value; }

	public function loadFromObject($x)
	{
		$this->id_don           = $x->ID;
		//$this->id_donnateur     = $x->DONNATEUR_ID;
		$this->don_category     = $x->CATEGORIE_ID;
		$this->nom_don          = $x->NOM;
		$this->desc_don         = $x->DESCRIPTION;
		$this->mode_livraison   = $x->MODE_LIVRAISON;
		$this->montant_don      = $x->MONTANT;

		$this->datePromesse     = $x->DATE_PROMESSE;
		$this->datePromise      = $x->DATE_PROMISE;
		$this->dateAnnulation   = $x->DATE_ANNULATION;
		$this->dateAcceptation  = $x->DATE_ACCEPTATION;
		$this->dateReception    = $x->DATE_RECU;
		$this->dateRefu         = $x->DATE_REFUS;
		$this->photoDon         = $x->PHOTO;
		$this->id_membre        = $x->MEMBRE_ID;
		$this->id_employe        = $x->EMPLOYE_ID;
		$this->quantite        = $x->QUANTITE;

	}	

	public function loadFromArray($tab)
	{
		$this->id_don           = $tab["ID"];
		//$this->id_donnateur     = $tab["DONNATEUR_ID"];
		$this->don_category     = $tab["CATEGORIE_ID"];
		$this->nom_don          = $tab["NOM"];
		$this->desc_don         = $tab["DESCRIPTION"];
		$this->mode_livraison   = $tab["MODE_LIVRAISON"];
		$this->datePromesse     = $tab["DATE_PROMESSE"];
		$this->montant_don      = $tab["MONTANT"];

		$this->datePromesse     = $tab["DATE_PROMESSE"];
		$this->datePromise      = $tab["DATE_PROMISE"];
		$this->dateAnnulation   = $tab["DATE_ANNULATION"];
		$this->dateAcceptation  = $tab["DATE_ACCEPTATION"];
		$this->dateReception    = $tab["DATE_RECU"];
		$this->dateRefu         = $tab["DATE_REFUS"];
		$this->photoDon         = $tab["PHOTO"];
		$this->id_membre        = $tab["MEMBRE_ID"];

		$this->id_employe        = $tab["EMPLOYE_ID"];
		$this->quantite        = $tab["QUANTITE"];

	}


}

?>