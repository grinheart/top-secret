<?php

class Mission {
    private $codeMission; 
    private $titreMission;
    private $descriptionMission;
    private $dateDebutMission;
    private $dateFinMission;
    private $codePays;
    private $libelleMission;
    private $libelleStatutMission; //mes variables

    public function getcodeMission() { //fonction qui cherche des données de ma table Missions
        return $this->codeMission;
    }

    public function setcodeMission($codeMission) {
        $this->codeMission = $codeMission;
    }
    public function gettitreMission() {
        return $this->titreMission;
    }

    public function settitreMission($titreMission) {
        $this->titreMission = $titreMission;
    }

    public function getdescriptionMission() {
        return $this->descriptionMission;
    }

    public function setdescriptionMission($descriptionMission) {
        $this->descriptionMission = $descriptionMission;
    }
    public function getdateDebutMission() {
        return $this->dateDebutMission;
    }

    public function setdateDebutMission($dateDebutMission) {
        $this->dateDebutMission = $dateDebutMission;
    }
    public function getdateFinMission() {
        return $this->dateFinMission;
    }

    public function setdateFinMission($dateFinMission) {
        $this->dateFinMission = $dateFinMission;
    }

    public function getcodePays() {
        return $this->codePays;
    }
    public function setcodePays($codePays) {
        $this->codePays = $codePays;
    }
    public function getlibelleMission() {
        return $this->libelleMission;
    }
    public function setlibelleMission($libelleMission) {
        $this->libelleMission = $libelleMission;
    }
    public function getlibelleStatutMission() {
        return $this->libelleStatutMission;
    }
    public function setlibelleStatutMission($libelleStatutMission) {
        $this->libelleStatutMission = $libelleStatutMission;
    }
}