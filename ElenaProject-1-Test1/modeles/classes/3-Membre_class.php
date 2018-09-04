<?php

class Membre
{
	private       $id;
	private       $nom;
	private       $courriel;	
	private       $adresse;
	private       $tel;
	private       $mdp;
	private       $grId;
	private       $etat;
	private       $dateCreation;
    public static $leTour;

	public function __construct()      {}
	
	public function getid()            { return $this->id; }	
	public function setid($value)      { $this->id = $value; }
	public function getNom()           { return $this->nom; }	
	public function setNom($value)     { $this->nom = $value; }
	public function getAdresse()       { return $this->adresse; }
	public function setAdresse($value) { $this->adresse = $value; }
	public function getCourriel()      { return $this->courriel; }
	public function setCourriel($value){ $this->courriel = $value; }
	public function getTel()           { return $this->tel; }	
	public function setTel($value)     { $this->tel = $value; }
	public function getMdp()           { return $this->mdp; }
	public function setMdp($value)     { $this->mdp = $value; }
	public function getGroupId()       { return $this->grId; }
	public function setGroupId($value) { $this->grId = $value; }	
	public function getEtat()          { return $this->etat; }
	public function setEtat($value)    { $this->etat = $value; }
	public function getDt()            { return $this->dateCreation; }
	public function setDt($value)      { $this->dateCreation = $value; }
	//public function getLetour()        { return $this->leTour; }	
	//public function setLetour($value)  { $this->leTour = $value; }
	
	public function loadFromObject($x)
	{
		$this->id           = $x->MEMBRE_ID;
		$this->nom          = $x->NOM;
		$this->courriel     = $x->COURRIEL;
		$this->adresse      = $x->ADRESSE;
		$this->tel          = $x->TELEPHONE;
		$this->mdp          = $x->MOT_DE_PASSE;
		$this->grId         = $x->GROUP_ID;
		$this->etat         = $x->ACTIF;
		$this->dateCreation = $x->DATE_CREATION;		
    }	
}
?>