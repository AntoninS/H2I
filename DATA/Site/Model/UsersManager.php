<?php
		require_once ("Model.php");
	 	class UsersManager extends Model
		{

		public function getUsers($login,$pass)
		{
			$requete = $this->executerRequete('SELECT identifiant, motDePasse FROM utilisateurs where identifiant = ? and motDePasse = ?', array($login,$pass));
			$data = $requete->fetch();
			return $data;
		}
		
		public function getUser($userID){
			$requete = $this->executerRequete('SELECT identifiant, prenom, utilisateurs.nom AS nom, groupe.NomGroupe AS nomGroupe, tel, avatar, pseudo, statut, public, mail, groupe.semestre as semestre  FROM utilisateurs,groupe WHERE utilisateurID=? AND utilisateurs.groupeID=groupe.groupeID', array($userID));
			$data=$requete->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function getUserName($login)
		{
			$requete = $this->executerRequete('SELECT prenom FROM utilisateurs where identifiant = ?', array($login));
			$data = $requete->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function getUserID($login)
		{
			$req = $this->executerRequete('SELECT utilisateurID FROM utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch(PDO::FETCH_ASSOC);
			return $data['utilisateurID'];
		}
		
	
		
		public function getStatut($login)
		{
			$req = $this->executerRequete('SELECT utilisateurs.statut FROM utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch(PDO::FETCH_ASSOC);
			return $data['statut'];
		}
		
		public function getUserGroupe($login)
		{
			$req = $this->executerRequete('SELECT groupeID FROM utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch(PDO::FETCH_ASSOC);
			return $data['groupeID'];
		}
		
		public function getListeGroupe($groupeID)
		{
			$req = $this->executerRequete('SELECT * FROM utilisateurs WHERE groupeID=?', array($groupeID));
		}
		
		public function setModifCompte ($tel, $pseudo, $mail, $utilisateurID, $semestreID, $groupe )
		
		{
				
				$req = $this->executerRequete('UPDATE utilisateurs SET tel=? , pseudo=? ,mail=? , semestre=?, NomGroupe=? WHERE utilisateurID=?', array($tel,$pseudo, $mail,  $semestreID, $groupe, $utilisateurID));
			
		}
		
		public function getSemestre($userID)
			{
				$req=$this->executerRequete('SELECT groupe.Semestre FROM groupe, utilisateurs WHERE utilisateurs.groupeID=groupe.GroupeID AND utilisateurID=?', array($userID));
				$result=$req->fetch(PDO::FETCH_ASSOC);
				return $result['Semestre'];
				
			}

	/*	public function addUser($para)
		{
			$requete = $this->executerRequete('insert into User(Login, Pass, Nom, Mail) values(?, ?, ?, ?), array($para['Login'], $para['Pass'], $para['Nom'], $para['Mail']) ')
		}*/


	}
