<?php
  require_once ("Model.php");
  class StatistiquesManager extends Model
  {
  		public function getStats($userID)
  		{
  			$req = $this->executerRequete('SELECT * FROM statistiques WHERE userID=?', array($userID));
  			$result=$req->fetch(PDO::FETCH_ASSOC);
  			return $result;
  		}
  		
  		public function upNbMessages($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbMessages = nbMessages + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbSujets($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbSujets = nbSujets + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbValides($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbValides = nbValides + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbRessourcesDown($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbRessourcesDown = nbRessourcesDown + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbRessourcesUp($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbRessourcesUp = nbRessourcesUp + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbTuteurs($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbTuteurs = nbTuteurs + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upNbTutorats($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET nbTutorats = nbTutorats + 1 WHERE userID=?', array($userID));
  		}
  		
  		public function upActivite($userID)
  		{
  			$req = $this->executerRequete('UPDATE statistiques SET derniereActivite =CURRENT_TIMESTAMP WHERE userID=?', array($userID));
  		}
  		
  		
  		 
  	
  	
  	
  	
  	
  }
?>