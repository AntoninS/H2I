<?php
		require_once ("Model.php");
	 	class CommentairesManager extends Model
		{
			public function getCommentaires($annonceID)
			{
				$req = $this->executerRequete('SELECT commentaireID, annonceID, auteurID, message, utilisateurs.prenom AS prenom, utilisateurs.nom AS nom, avatar, dateCommentaire, nbPouce FROM commentaire, utilisateurs WHERE commentaire.annonceID=? AND commentaire.auteurID=utilisateurs.utilisateurID ORDER BY nbPouce DESC, dateCommentaire DESC', array($annonceID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getCommentaire($commentaireID)
			{
				$req = $this->executerRequete('SELECT commentaireID, annonceID, auteurID, message, utilisateurs.prenom AS prenom, utilisateurs.nom AS nom, avatar, dateCommentaire, nbPouce FROM commentaire, utilisateurs WHERE commentaire.annonceID=? AND commentaire.auteurID=utilisateurs.utilisateurID', array($annonceID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getAnnonce($commentaireID)
			{
				$req = $this->executerRequete('SELECT annonceID FROM commentaire WHERE commentaireID=?', array($commentaireID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['annonceID'];
			}
			
			public function getAuteurCommentaire($commentaireID)
			{
				$req = $this->executerRequete('SELECT auteurID FROM commentaire WHERE commentaireID = ?', array($commentaireID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['auteurID'];
			}
			
			public function setCommentaire($utilisateurID, $message, $annonceID)
			{
				$req = $this->executerRequete('INSERT INTO commentaire VALUES (?,?,?,?,CURRENT_TIMESTAMP,?)', array(NULL, $utilisateurID, $annonceID, $message, "0"));
				$req2 = $this->executerRequete('UPDATE annonce SET nbComment=nbComment+1 WHERE annonceID=?', array($annonceID));
			}
			
			public function updatePouce($commentaireID)
			{
				$req = $this->executerRequete('UPDATE commentaire SET nbPouce=nbPouce+1 WHERE commentaireID=?', array($commentaireID));
			}
			
			public function editer($commentaireID, $message)
			{
				$req = $this->executerRequete('UPDATE commentaire SET message=? WHERE commentaireID=?', array($message, $commentaireID));
			}
			
			public function supprimer($commentaireID, $annonceID)
			{
				$req = $this->executerRequete('DELETE FROM commentaire WHERE commentaireID = ?', array($commentaireID));
				$req2 = $this->executerRequete('UPDATE annonce SET nbComment=nbComment-1 WHERE annonceID=?', array($annonceID));
				
			}
		
		}
		
?>