<?php
		require_once ("Model.php");
	 	class ModuleManager extends Model
		{
			
			public function getModules($semestreID)
			{
				$req=$this->executerRequete('SELECT * FROM module WHERE semestre=?', array($semestreID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getNom($moduleID)
			{
				$req=$this->executerRequete('SELECT module.nomModule FROM module WHERE moduleID=?', array($moduleID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['nomModule'];
			}
	}
?>
