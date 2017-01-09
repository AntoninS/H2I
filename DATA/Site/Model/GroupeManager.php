<?php
		require_once ("Model.php");
	 	class GroupeManager extends Model
		{
			
			public function getGroupe($idGroupe)
			{
				$requete = $this->executerRequete('SELECT * FROM groupe where groupeID = ?', array($idGroupe));
				$data = $requete->fetch(PDO::FETCH_ASSOC);
				return $data;
			}
			
			
			
			
		}
?>