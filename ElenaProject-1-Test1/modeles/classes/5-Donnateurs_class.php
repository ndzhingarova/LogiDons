<?php

class Donnateur
{
	private $id;
	private $nom;
	private $courriel;	
	private $adresse;
	private $tel;
	private $mdp;
	private $etat;
	private $dateCreation;
    

    public function __construct(){ }
	
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
	public function getMdp()           {return $this->mdp;}
	public function setMdp($value)     {$this->mdp = $value;}
	public function getEtat()          {return $this->etat;}
	public function setEtat($value)    {$this->etat = $value;}
	public function getDt()            {return $this->dateCreation;}
	public function setDt($value)      {$this->dateCreation = $value;}
    	
	public function loadFromObject($x)
	{
		$this->id           = $x->DONNATEUR_ID;
		$this->nom          = $x->DONNATEUR_NOM;
		$this->courriel     = $x->DONNATEUR_EMAIL;
		$this->adresse      = $x->DONNATEUR_ADRESS	;
		$this->tel          = $x->DONNATEUR_TEL;
		$this->mdp          = $x->MOT_DE_PASSE;
		$this->etat         = $x->DONNATEUR_ETAT;
		$this->dateCreation = $x->DATE_CREATION;		
    }	
}
?>