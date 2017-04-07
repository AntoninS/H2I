<?php
		require_once ("Model.php");
	 	class CommentairesManager extends Model
		{
			public function getCommentaires($annonceID)
			{
				$req = $this->executerRequete('SELECT commentaireID, annonceID, auteurID, message, utilisateurs.prenom AS prenom, utilisateurs.nom AS nom, avatar, dateCommentaire, priority, nbPouce FROM commentaire, utilisateurs WHERE commentaire.annonceID=? AND commentaire.auteurID=utilisateurs.utilisateurID ORDER BY priority ASC, dateCommentaire DESC', array($annonceID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
		
		}
		
?>