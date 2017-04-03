<?php
		require_once ("Model.php");
	 	class AnnoncesManager extends Model
		{

			public function getAnnonces($groupeID)
			{
			  $req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom as nom, message, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, dateAnnonce, type, epingle, nbComment, modification FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY epingle DESC, priority ASC', array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getAnnoncesLimite($groupeID, $limiteDeb, $nbParPage)
			{
			  $req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom, message, pseudo, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, dateAnnonce, type, epingle, nbComment, modification FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY epingle DESC, priority ASC LIMIT '.$limiteDeb.', '.$nbParPage, array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
		
		}
		
?>