<?php
		require_once ("Model.php");
	 	class AnnoncesManager extends Model
		{

			public function getAnnonces($groupeID)
			{
			  $req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom as nom, message, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, avatar, dateAnnonce, type, nbComment, modification, priority FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY priority ASC, dateAnnonce DESC', array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getAnnoncesByType($groupeID,$type)
			{
				$req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom as nom, message, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, avatar, dateAnnonce, type, nbComment, modification, priority FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID AND annonce.type = ? ORDER BY priority ASC, dateAnnonce DESC', array($groupeID,$type));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getAnnoncesLimite($groupeID, $limiteDeb, $nbParPage)
			{
			  $req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom, message, pseudo, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, avatar, dateAnnonce, type, nbComment, modification, priority FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID ORDER BY priority ASC, dateAnnonce DESC LIMIT '.$limiteDeb.', '.$nbParPage, array($groupeID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getAnnoncesLimiteByType($groupeID, $limiteDeb, $nbParPage, $type)
			{
				$req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom, message, pseudo, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, avatar, dateAnnonce, type, nbComment, modification, priority FROM annonce, utilisateurs WHERE annonce.groupeID=? AND annonce.auteurID=utilisateurs.utilisateurID AND annonce.type = ? ORDER BY priority ASC, dateAnnonce DESC LIMIT '.$limiteDeb.', '.$nbParPage, array($groupeID, $type));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getAnnonce($annonceID)
			{
				$req = $this->executerRequete('SELECT annonceID, auteurID, annonce.nom as nom, message, utilisateurs.prenom AS prenomAuteur, utilisateurs.nom AS nomAuteur, avatar, dateAnnonce, type, nbComment, modification, priority FROM annonce, utilisateurs WHERE annonce.auteurID=utilisateurs.utilisateurID AND annonce.annonceID=?', array($annonceID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getAuteurAnnonce($annonceID)
			{
				$req = $this->executerRequete('SELECT auteurID FROM annonce WHERE annonceID = ?', array($annonceID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['auteurID'];
			}
			
			public function getContenuAnnonce($annonceID)
			{
				$req = $this->executerRequete('SELECT message FROM annonce WHERE annonceID = ?', array($annonceID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['message'];
			}
			
			public function getEpingles($groupeID,$type)
			{
				$req = $this->executerRequete('SELECT * FROM annonce WHERE groupeID= ? AND type = ? AND priority=0', array($groupeID, $type));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function setAnnonce($groupeID, $userID, $type, $nom, $message)
			{
				$req = $this->executerRequete('INSERT INTO annonce VALUES (?,?,?,?,?,CURRENT_TIMESTAMP,?,?,?,?)', array(NULL, $groupeID, $nom, $message, $userID, NULL, $type, "0", "1"));
				$annonceID = $this ->executerRequete('SELECT LAST_INSERT_ID()');
				return $annonceID;
			}
			
			public function setContenu($annonceID, $message)
			{
				$req = $this->executerRequete('UPDATE annonce SET message = ? WHERE annonceID = ?', array($message, $annonceID));
			}
			
			public function epingler($annonceID)
			{
				$req2 = $this->executerRequete('UPDATE annonce SET priority = 0 WHERE annonceID=?', array($annonceID));
			}
			
			public function prioriser($annonceID,$groupeID,$type)
			{
				$req1 = $this->executerRequete('UPDATE annonce SET priority = 2 WHERE priority=1 AND groupeID=? AND type=?', array($groupeID,$type));
				$req2 = $this->executerRequete('UPDATE annonce SET priority = 1 WHERE annonceID=?', array($annonceID));
			}
			
			public function supprAnnonce($annonceID)
			{
				$req = $this->executerRequete('DELETE FROM annonce WHERE annonceID = ?', array($annonceID));
			}
		
		}
		
?>