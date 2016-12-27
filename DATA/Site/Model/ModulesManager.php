<?php
		require_once ("Model.php");
	 	class ModulesManager extends Model
		{
			public function getModul()
			{
				$req=$this->executerRequete('SELECT * FROM module');
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			public function getModules($semestreID)
			{
				$req=$this->executerRequete('SELECT * FROM module WHERE semestre=?', array($semestreID));
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
	}
?>
