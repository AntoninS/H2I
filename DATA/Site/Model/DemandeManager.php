<?php
  require_once ("Model.php");
  class DemandeManager extends Model
  {
  		public function getDemandesTutorat(){
	  		$requete = $this->executerRequete('SELECT demandeID, nomModule, jour, heureDebut, heureFin, eleve, salle, commentaire, dateDemande FROM demande ORDER BY priority ASC, dateDemande DESC');
	  		$data = $requete->fetchAll(PDO::FETCH_ASSOC);
	  		return $data;
  		}
  		
  		public function setDemande($module, $userID, $jour, $heureDebut, $heureFin, $salle, $commentaire)
  		{
  			$req1 = $this->executerRequete('UPDATE demande SET priority = ?', array("0"));
  			$req2 = $this->executerRequete('INSERT INTO demande VALUES (?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP,?)', array(NULL, $module, $jour, $heureDebut, $heureFin, $userID, $salle, $commentaire, "1"));
  		}
  		
  		public function remonterDemande($demandeID)
  		{
  			$req = $this->executerRequete('UPDATE demande SET priority = ? WHERE demandeID = ?', array("1",$demandeID));
  		}
  		
  		public function supprimerDemande($demandeID)
  		{
  			$req = $this->executerRequete('DELETE FROM demande WHERE demandeID = ?', array($demandeID));
  		}
  }

?>
