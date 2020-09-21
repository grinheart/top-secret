<?php

class Agent {

    private $codeAgent;
    private $nomAgent;
    private $prenomAgent;
    private $dateNaissanceAgent;
    private $codePays;
    
    public function getcodeAgent() {
        return $this->code_agent;
    }
    public function setcodeAgent($codeAgent) {
        $this->code_agent = $codeAgent;
    }
    public function setnomAgent($nomAgent) {
        $this->nom_agent = $nomAgent;
    }
    public function getnomAgent() {
        return $this->nom_agent;
    }
    public function setprenomAgent($prenomAgent) {
        $this->prenom_agent = $prenomAgent;
    }
    public function getprenomAgent() {
        return $this->prenom_agent;
    }
    public function setdateNaissanceAgent($dateNaissanceAgent) {
        $this->date_naissance_agent = $dateNaissanceAgent;
    }
  
    public function getdateNaissanceAgent() {
        return $this->date_naissance_agent;
    }

    public function getcodePays() {
        return $this->code_pays;
    }
    public function setcodePays($codePays) {
        $this->code_pays = $codePays;

    }
    
}