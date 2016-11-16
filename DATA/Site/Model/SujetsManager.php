<?php
		require_once ("Model.php");
	 	class SujetsManager extends Model{

			public function getSujets(){
			  $req = $this->executerRequete('SELECT sujetID,sujet.nom,pseudo,message,dateSujet,epingle,clos,messageValide,nbVues,nbRep,priority FROM sujet, utilisateurs WHERE auteurID=utilisateurID ORDER BY epingle DESC, priority ASC, sujetID DESC');
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function checkSujets($nomSujet){
			  $req = $this->executerRequete('SELECT * FROM sujet WHERE nom=?', array($nomSujet));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function getSujet($idSujet){
			  $req = $this->executerRequete('SELECT sujetID,sujet.nom,pseudo,message,dateSujet,epingle,clos,messageValide,nbVues,nbRep,priority FROM sujet, utilisateurs WHERE sujetID=? AND auteurID=utilisateurID', array($idSujet));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function getRep($idSujet){
			  $req = $this->executerRequete('SELECT nbRep FROM sujet WHERE sujetID=?', array($idSujet));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['nbRep'];
			}

			public function setSujet($auteurID,$nom_sujet,$message,$date){
				$req = $this->executerRequete('INSERT INTO sujet VALUES (?,?,?,?,?,?,?,?,?,?,?)', array(NULL,$nom_sujet,$auteurID,$message,$date,false,false,NULL,"0","-1","1"));
			}

			public function getSujetID($nom_sujet,$auteurID){
				$req = $this->executerRequete('SELECT sujetID FROM sujet WHERE nom=? AND auteurID=?', array($nom_sujet,$auteurID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['sujetID'];
			}

			public function supprSujet($idSujet){
				$req1 = $this->executerRequete('DELETE FROM message WHERE message.sujetID = ?', array($idSujet));
				$req2 = $this->executerRequete('DELETE FROM sujet WHERE sujet.sujetID = ?', array($idSujet));
			}

			public function updateVues($idSujet){
				$req = $this->executerRequete('UPDATE sujet SET nbVues = nbVues + 1 WHERE sujetID=?', array($idSujet));
			}

			public function prioriser($idSujet){
				$req1 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req2 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
			}

			public function fermer($idSujet,$idMessage){
				$req1 = $this->executerRequete('UPDATE message SET messageValide=true WHERE messageID=?', array($idMessage));
				$req2 = $this->executerRequete('UPDATE sujet SET clos=true WHERE sujetID=?', array($idSujet));
				$req3 = $this->executerRequete('UPDATE sujet SET messageValide = (SELECT contenu FROM message WHERE messageID=?) WHERE sujetID=?', array($idMessage,$idSujet));
			}

			public function epingler($idSujet){
				$req1 = $this->executerRequete('UPDATE sujet SET priority = 0 WHERE sujetID=?', array($idSujet));
				$req2 = $this->executerRequete('UPDATE sujet SET epingle=true WHERE sujetID=?', array($idSujet));
			}
	}
?>
