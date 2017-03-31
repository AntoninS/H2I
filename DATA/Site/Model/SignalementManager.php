<?php
  require_once ("Model.php");
  class SignalementManager extends Model
  {
  	
  	public function getSignalements()
  	{
  		$req = $this->executerRequete('SELECT signalementID, dateSignalement, signalement.sujet, signalement.message as message, signalement.userID as userID, signalement.messageID as messageID, message.sujetID as sujetID, message.contenu as contenu FROM signalement, message WHERE message.messageID=signalement.messageID ORDER BY dateSignalement ASC');
  		$result=$req->fetchALL(PDO::FETCH_ASSOC);
  		return $result;
  	}
  	
  	public function setSignalement($idm, $idu, $sujet, $message)
  	{
  		$req=$this->executerRequete('INSERT INTO signalement VALUES (?,?,?,?,?,CURRENT_TIMESTAMP,?)', array(NULL,$idm,$idu,$sujet,$message,false));
  	}
  	
  }
?>