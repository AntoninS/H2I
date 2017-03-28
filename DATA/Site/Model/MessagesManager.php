<?php
		require_once ("Model.php");
	 	class MessagesManager extends Model
		{

			public function getMessageLimite($idSujet,$limiteDeb,$nbParPage)
			{
			  $req = $this->executerRequete('SELECT messageID,auteurID,sujetID,contenu,dateMessage,messageValide,premierMessage,modification,message.pseudo,dateSuppression FROM message,utilisateurs WHERE sujetID=? AND auteurID=utilisateurID ORDER BY dateMessage ASC LIMIT  '.$limiteDeb.', '.$nbParPage, array($idSujet));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getMessage($idSujet)
			{
			  $req = $this->executerRequete('SELECT messageID,prenom,auteurID,sujetID,contenu,dateMessage,messageValide,premierMessage,modification FROM message,utilisateurs WHERE sujetID=? AND auteurID=utilisateurID ORDER BY dateMessage asc', array($idSujet));
			  $result=$req->fetchALL(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getOneMessage($idMessage)
			{
			  $req = $this->executerRequete('SELECT prenom,auteurID,sujetID,contenu,dateMessage,messageValide,premierMessage FROM message,utilisateurs WHERE messageID=? AND auteurID=utilisateurID', array($idMessage));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getPremierMessage($idSujet)
			{
			  $req1 = $this->executerRequete('SELECT messageID FROM message WHERE sujetID=? AND premierMessage=?', array($idSujet,True));
			  $messageID=$req1->fetch(PDO::FETCH_ASSOC);
			  $req2 = $this->executerRequete('SELECT prenom,auteurID,sujetID,contenu,dateMessage,messageValide,premierMessage,dateSuppression FROM message,utilisateurs WHERE messageID=? AND auteurID=utilisateurID', array($messageID['messageID']));
			  $result=$req2->fetch(PDO::FETCH_ASSOC);
			  return $result;
			}
			
			public function getDerniersMessages($userID)
			{
				$req = $this->executerRequete('SELECT message.sujetID as sujetID, contenu, dateMessage, sujet.nom as nom FROM message,sujet WHERE message.auteurID=? AND sujet.sujetID=message.sujetID ORDER BY dateMessage ASC LIMIT 3', array($userID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}

			public function getSujetID($idMessage)
			{
			  $req = $this->executerRequete('SELECT message.sujetID FROM message WHERE messageID=?', array($idMessage));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['sujetID'];
			}

			public function getStatut($idMessage)
			{
			  $req = $this->executerRequete('SELECT message.premierMessage FROM message WHERE messageID=?', array($idMessage));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['premierMessage'];
			}
			
			public function getContenu($idMessage)
			{
			  $req = $this->executerRequete('SELECT message.contenu FROM message WHERE messageID=?', array($idMessage));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['contenu'];
			} 
			
			public function checkValide($idMessage)
			{
			  $req = $this->executerRequete('SELECT message.messageValide FROM message WHERE messageID=?', array($idMessage));
			  $result=$req->fetch(PDO::FETCH_ASSOC);
			  return $result['messageValide'];
			}

			public function setMessage($auteurID,$contenu,$date,$idSujet,$statut,$pseudo)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET nbRep = nbRep + 1 WHERE sujetID=?', array($idSujet));
				$req2 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req3 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
				$req4 = $this->executerRequete('INSERT INTO message VALUES (?,?,?,?,?,?,?,?,?,?)', array(NULL,$auteurID,$idSujet,$contenu,$date,false,$statut,NULL,$pseudo,NULL));
				$req5 = $this->executerRequete('SELECT messageID FROM message WHERE auteurID=? AND sujetID=? AND dateMessage=?', array($auteurID,$idSujet,$date));
				$data= $req5->fetch(PDO::FETCH_ASSOC);
				$req6 = $this->executerRequete('UPDATE sujet SET dernierMessage = ? WHERE sujet.sujetID=?', array($data['messageID'], $idSujet));
				$req7 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujet.sujetID=?', array($date, $idSujet));
			}
			
			public function setContenu($idMessage, $contenu, $idSujet, $date)
			{
				$req1 = $this->executerRequete('UPDATE message SET contenu=? WHERE message.messageID = ?', array($contenu,$idMessage));
				$req2 = $this->executerRequete('UPDATE sujet SET priority = 2');
				$req3 = $this->executerRequete('UPDATE sujet SET priority = 1 WHERE sujetID=?', array($idSujet));
				$req4 = $this->executerRequete('UPDATE sujet SET dernierMessage = ? WHERE sujet.sujetID=?', array($idMessage, $idSujet));
				$req4 = $this->executerRequete('UPDATE sujet SET dateDernierChangement = ? WHERE sujet.sujetID=?', array($date, $idSujet));
				$req5 = $this->executerRequete('UPDATE message SET modification=? WHERE message.messageID = ?', array($date,$idMessage));
				$req6 = $this->executerRequete('UPDATE sujet SET clos=false WHERE sujetID=?', array($idSujet));
				$req7 = $this->executerRequete('UPDATE sujet SET messageValide = ? WHERE sujetID=?', array(null,$idSujet));
				$req8 = $this->executerRequete('UPDATE message SET messageValide = ? WHERE messageID=?', array("false",$idMessage));
			}
			
			public function supprMessage($dateSuppr,$idMessage)
			{
				$req = $this->executerRequete('UPDATE message SET dateSuppression = ? WHERE message.messageID = ?', array($dateSuppr,$idMessage));
			}

			public function supprMessageDef($idMessage)
			{
				$req1 = $this->executerRequete('UPDATE sujet SET nbRep = nbRep -1 WHERE sujet.sujetID=(SELECT message.sujetID FROM message WHERE messageID=?)', array($idMessage));
				$req2 = $this->executerRequete('DELETE FROM message WHERE message.messageID = ?', array($idMessage));
			}
	}
?>
