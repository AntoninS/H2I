<?php
		require_once ("Model.php");
	 	class AnnoncesManager extends Model
		{

			public function getAnnonces($groupeID)
			{
			  $req = $this->executerRequete('SELECT annonceID, annonce.nom, message, pseudo, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, dateAnnonce, epingle, nbComment FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY epingle DESC, priority ASC', array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getAnnoncesLimite($groupeID, $limiteDeb, $nbParPage)
			{
			  $req = $this->executerRequete('SELECT annonceID, annonce.nom, message, pseudo, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, dateAnnonce, epingle, nbComment FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY epingle DESC, priority ASC LIMIT '.$limiteDeb.', '.$nbParPage, array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function setAnnonce($groupeID, $nom, $message, $auteurID, $date)
			{
				$req = $this->executerRequete('INSERT INTO annonce VALUES (?,?,?,?,?,?,?,?,?)', array(NULL, $groupeID, $nom, $message, $auteurID, $date, 0, 0, 1));
			}
		
		}
		
?>