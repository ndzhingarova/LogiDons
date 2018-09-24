<?php
require_once("../modeles/classes/3-Membre.class.php");
class disponibiliteBenevole
{
    private $fkBenevole;
    private $date;
    private $debut;
    private $fin;
    private $accepter;
    private $note;

    public function getFkBenevole()                { return $this->fkBenevole; }	
    public function setFkBenevole($value)          { $this->fkBenevole = $value; }
    public function getDate()                { return $this->date; }	
    public function setDate($value)          { $this->date = $value; }
    public function getDebut()                { return $this->debut; }	
    public function setDebut($value)          { $this->debut = $value; }
    public function getFin()                { return $this->fin; }	
	public function setFin($value)          { $this->fin = $value; }
    public function getAccepter()                { return $this->accepter; }	
    public function setAccepter($value)          { $this->accepter = $value; }
    public function getNote()          { return $this->note; }
    public function setNote($value)          { $this->note = $value; }

    public function __construct()
    {
        $this->fkBenevole = null;
        $this->date = null;
        $this->debut = null;
        $this->fin = null;
        $this->accepter = null;
        $this->note = null;
    }

    public function loadFromObject($x)
    {
        $this->fkBenevole = $x->fkBenevole;
        $this->date = $x->date;
        $this->debut = $x->debut;
        $this->fin = $x->fin;
        $this->accepter = $x->accepter;
        $this->note = $x->note;
    }

}