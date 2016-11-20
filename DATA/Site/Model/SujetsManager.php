<?php
		require_once ("Model.php");
	 	class SujetsManager extends Model
		{

			public function getSujets($moduleID)
			{
			  $req = $this->executerRequete('SELECT sujet.sujetID,sujet.nom,message.auteurID,auteurSujet.prenom, auteurMessage.prenom AS prenomMessage,sujet.message,dateSujet,sujet.epingle,sujet.clos,sujet.messageValide,nbVues,nbRep,sujet.priority,dateMessage,sujet.pseudo,message.pseudo AS pseudoMessage FROM sujet, message, utilisateurs AS auteurSujet, utilisateurs AS auteurMessage WHERE sujet.moduleID=? AND message.auteurID=auteurMessage.utilisateurID AND sujet.auteurID=auteurSujet.utilisateurID AND sujet.dernierMessage=message.messageID ORDER BY epingle DESC, priority ASC, dateDernierChangement DESC', array($moduleID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getSujetsLimite($moduleID, $limiteDeb, $nbParPage)
			{
			  $req = $this->executerRequete('SELECT sujet.sujetID,sujet.nom,message.auteurID,auteurSujet.prenom, auteurMessage.prenom AS prenomMessage,sujet.message,dateSujet,sujet.epingle,sujet.clos,sujet.messageValide,nbVues,nbRep,sujet.priority,dateMessage,sujet.pseudo,message.pseudo AS pseudoMessage,dateDernierChangement FROM sujet, message, utilisateurs AS auteurSujet, utilisateurs AS auteurMessage WHERE sujet.moduleID=? AND message.auteurID=auteurMessage.utilisateurID AND sujet.auteurID=auteurSujet.utilisateurID AND sujet.dernierMessage=message.messageID ORDER BY epingle DESC, priority ASC, dateDernierChangement DESC LIMIT '.$limiteDeb.', '.$nbParPage, array($moduleID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function checkSujets($nomSujet, $moduleID)
			{
			  $req = $this->executerRequete('SELECT * FROM sujet WHERE nom=? AND moduleID=?', array($nomSujet,$moduleID));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function getSujet($idSujet)
			{
			  $req = $this->executerRequete('SELECT sujetID,sujet.nom,auteurID,prenom,message,dateSujet,epingle,clos,messageValide,nbVues,nbRep,priority FROM sujet, utilisateurs WHERE sujetID=? AND auteurID=utilisateurID', array($idSujet));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function getSujetTri()
			{
			  $req = $this->executerRequete('SELECT sujet.sujetID,sujet.nom,dateSujet,nbVues,nbRep,message,prenom,moduleID FROM sujet left join utilisateurs on auteurID = utilisateurID order by dateSujet DESC');
			  $result=$req->fetchAll(PDO::FETCH_ASSOC);
			  return $result;
			}

			public function getRep($idSujet)
			{
			  $req = $this->executerRequete('SELECT nbRep FROM sujet WHERE sujetID=?', array($idSujet));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['nbRep'];
			}

			public function getModuleID($idSujet)
			{
			  $req = $this->executerRequete('SELECT moduleID FROM sujet WHERE sujetID=?', array($idSujet));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['moduleID'];
			}

			public function setSujet($auteurID,$nom_sujet,$moduleID,$message,$date,$pseudo)
			{
				$req = $this->executerRequete('INSERT INTO sujet VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', array(NULL,$nom_sujet,$auteurID,$moduleID,$message,$date,false,false,NULL,"0","0","1",NULL,$pseudo,$date));
			}

			public function getSujetID($nom_sujet,$auteurID,$moduleID)
			{
				$req = $this->executerRequete('SELECT sujetID FROM sujet WHERE nom=? AND auteurID=? AND moduleID=?', array($nom_sujet,$auteurID,$moduleID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['sujetID'];
			}

			public function supprSujet($idSujet)
			{
				$req1 = $this->executerRequete('DELETE FROM message WHERE message.sujetID = ?', array($idSujet));
				$req2 = $this->executerRequete('DELETE FROM sujet WHERE sujet.sujetID = ?', array($idSujet));
			}

			public function updateVues($idSujet)
			{
				$req = $this->executerRequete('UPDATE sujet SET nbVues = nbVues + 1 WHERE sujetID=?', array($idSujet));
			}

			public function prioriser($idSujet)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req2 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
			}

			public function fermer($idSujet,$idMessage,$date)
			{
				$req1 = $this->executerRequete('UPDATE message SET messageValide=true WHERE messageID=?', array($idMessage));
				$req2 = $this->executerRequete('UPDATE sujet SET clos=true WHERE sujetID=?', array($idSujet));
				$req3 = $this->executerRequete('UPDATE sujet SET messageValide = (SELECT contenu FROM message WHERE messageID=?) WHERE sujetID=?', array($idMessage,$idSujet));
				$req4 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req5 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
				$req6 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujetID=?', array($date,$idSujet));
			}

			public function ouvrir($idSujet,$idMessage,$date)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET clos=false WHERE sujetID=?', array($idSujet));
				$req2 = $this->executerRequete('UPDATE sujet SET messageValide = ? WHERE sujetID=?', array(null,$idSujet));
				$req3 = $this->executerRequete('UPDATE message SET messageValide = ? WHERE messageID=?', array(false,$idMessage));
				$req4 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req5 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
				$req6 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujetID=?', array($date,$idSujet));
			}

			public function epingler($idSujet,$date)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET priority = 0 WHERE sujetID=?', array($idSujet));
				$req2 = $this->executerRequete('UPDATE sujet SET epingle=true WHERE sujetID=?', array($idSujet));
				$req3 = $this->executerRequete('SELECT sujet.moduleID FROM sujet WHERE sujetID=?', array($idSujet));
				$idModule=$req3->fetch(PDO::FETCH_ASSOC);
				$req4 = $this->executerRequete('UPDATE module SET nbEpingle=nbEpingle+1 WHERE moduleID=?', array($idModule['moduleID']));
				$req5 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujetID=?', array($date,$idSujet));
			}
			
			public function desepingler($idSujet,$date)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req2 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
				$req3 = $this->executerRequete('UPDATE sujet SET epingle=false WHERE sujetID=?', array($idSujet));
				$req4 = $this->executerRequete('SELECT sujet.moduleID FROM sujet WHERE sujetID=?', array($idSujet));
				$idModule=$req4->fetch(PDO::FETCH_ASSOC);
				$req5 = $this->executerRequete('UPDATE module SET nbEpingle=nbEpingle-1 WHERE moduleID=?', array($idModule['moduleID']));
				$req6 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujetID=?', array($date,$idSujet));
			}
	}
?>
