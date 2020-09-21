<?php

require './Manager/DBManager.php';
require './Model/Mission.php';
require './Model/Agent.php';



class MissionManager extends DBManager{
	public function queryHandler($query_res) {
		while($row = $query_res->fetch()) {
            $mission = new Mission();
            $mission->setcodeMission($row['code_mission']);
            $mission->settitreMission($row['titre_mission']);
            $mission->setdescriptionMission($row['descriptions']);
            $mission->setdateDebutMission($row['date_debut_mission']);
            $mission->setdateFinMission($row['date_fin_mission']);
            $mission->setlibelleStatutMission($row['libelle_statut']);

            $result[] = $mission;
        }

        // while($row2 = $agts->fetch()){
        //     echo $row2["code_agent"];
        // }

        return $result;
	}
	
    public function getAll() {
        $result = [];

        $stmt = $this->getConnexion()->query('SELECT * FROM missions');
		
        return $this->queryHandler($stmt);

    }
	
	public function getWithAgentsByCode($code = NULL) {
		if (is_null($code) || $code == '') {
			$q = "SELECT missions.*, code_agent, nom_agent, prenom_agent, date_naissance_agent FROM missions, agents WHERE missions.code_pays = agents.code_pays";
		}
		else {
			$q = "SELECT missions.*, code_agent, nom_agent, prenom_agent, date_naissance_agent FROM missions, agents WHERE missions.code_pays = agents.code_pays		AND code_mission  = '{$code}'";
		}
		
        $stmt = $this->getConnexion()->query($q);
		
		$result = array();
		while($row = $stmt->fetch()) {
            $mission = new Mission();
            $mission->setcodeMission($row['code_mission']);
            $mission->settitreMission($row['titre_mission']);
            $mission->setdescriptionMission($row['descriptions']);
            $mission->setdateDebutMission($row['date_debut_mission']);
            $mission->setdateFinMission($row['date_fin_mission']);
            $mission->setlibelleStatutMission($row['libelle_statut']);
			
			$agent = new Agent();
			$agent->setcodeAgent($row['code_agent']);
			$agent->setnomAgent($row['nom_agent']);
			$agent->setprenomAgent($row['prenom_agent']);
			$agent->setdateNaissanceAgent($row['date_naissance_agent']);

            array_push($result, array('mission' => $mission, 'agent' => $agent));
        }
        
        return $result;

    }

   
    
}