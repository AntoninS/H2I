<?php
		require_once ("Model.php");
	 	class ModulesManager extends Model
		{
			
			public function getModules($semestreID)
			{
				$req=$this->executerRequete('SELECT * FROM module WHERE semestre=?', array($semestreID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getModulesUE($semestreID,$ue)
			{
				$req=$this->executerRequete('SELECT * FROM module WHERE semestre=? AND UE=?', array($semestreID,$ue));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getModule($idModule)
			{
				$req=$this->executerRequete('SELECT * FROM module WHERE moduleID=?', array($idModule));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getNom($moduleID)
			{
				$req=$this->executerRequete('SELECT module.nomModule FROM module WHERE moduleID=?', array($moduleID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['nomModule'];
				
			}
			
			public function getUE ($semestreID)
			{
						$req=$this->executerRequete('SELECT DISTINCT UE FROM module WHERE semestre=?', array($semestreID));
				$result=$req->fetchall(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getSemestre($moduleID)
			{
				$req=$this->executerRequete('SELECT module.semestre FROM module WHERE moduleID=?', array($moduleID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['semestre'];
				
			}
	
	}
?>
