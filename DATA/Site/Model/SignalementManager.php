<?php
  require_once ("Model.php");
  class SignalementManager extends Model
  {
  	
  	public function getSignalements()
  	{
  		$req = $this->executerRequete('SELECT signalementID, dateSignalement, signalement.sujet, signalement.message as message, signalement.userID as userID, signalement.messageID as messageID, message.sujetID as sujetID, message.contenu as contenu FROM signalement, message WHERE message.messageID=signalement.messageID AND statut = FALSE ORDER BY dateSignalement DESC');
  		$result=$req->fetchALL(PDO::FETCH_ASSOC);
  		return $result;
  	}
  	
  	public function getSignalementsResolus()
  	{
  		$req = $this->executerRequete('SELECT signalementID, dateSignalement, signalement.sujet, signalement.message as message, signalement.userID as userID, signalement.messageID as messageID, message.sujetID as sujetID, message.contenu as contenu FROM signalement, message WHERE message.messageID=signalement.messageID AND statut = TRUE ORDER BY dateSignalement DESC');
  		$result=$req->fetchALL(PDO::FETCH_ASSOC);
  		return $result;
  	}
  	
  	public function getSignalement($ids)
  	{
  		$req = $this->executerRequete('SELECT signalementID, dateSignalement, signalement.sujet, signalement.message as message, signalement.userID as userID, signalement.messageID as messageID, message.sujetID as sujetID, message.contenu as contenu FROM signalement, message WHERE message.messageID=signalement.messageID AND signalementID = ?', array($ids));
  		$result=$req->fetch(PDO::FETCH_ASSOC);
  		return $result;
  	}
  	
  	function avertir($mail, $prenom, $sujet, $contenu, $sujetID, $messageID, $element)
  	{
  		$to      = $mail;//.'@etu.univ-lyon1.fr';
  		$from = 'no-reply@hub-iut-lyon1.fr';
  		$subject = 'Avertissement';
  		$message = '
  		<html>
  			<body>
  				<head>
  					<title>Titre</title>
  				</head>
  				
  				Bonjour '.$prenom.' ! 
  				<br>
  				<br>
  				Vous avez été avertis pour le motif suivant :
  				<br>
  				Sujet du signalement :<b> '.$sujet.'</b>
  				<br>
  				Message du signalement :<b> '.$contenu.'</b>
  				<br>
  				Concernant le message :<b><a href="localhost/H2I/DATA/Site/index.php?page=forum&sujet='.$sujetID.'#'.$messageID.'">'.substr($element,0,50).'...</a></b>
  				<br>
  				<br>
  				Les sanctions appropriées ont ainsi été prises à votre encontre. Veillez à ne pas reproduire ce comportement. 
  				<br>
  				Attention :En cas de trop grand nombre d\avertissement, votre compte pourrait être temporairement suspendu voire supprimé définitivement.
  			</body>
  		</html>';
  			
  		$headers = 'MIME-Version: 1.0' . "\r\n";
  		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  		$headers  .= "From: $from";
  			
  		mail($to, $subject, $message, $headers, "-f " . $from);
  	}
  	
  	public function resoudre($idm)
  	{
  		$req=$this->executerRequete('UPDATE signalement SET statut= ? WHERE messageID= ?', array(TRUE,$idm));
  	}
  	
  	public function setSignalement($idm, $idu, $sujet, $message)
  	{
  		$req=$this->executerRequete('INSERT INTO signalement VALUES (?,?,?,?,?,CURRENT_TIMESTAMP,?)', array(NULL,$idm,$idu,$sujet,$message,false));
  	}
  	
  }
?>