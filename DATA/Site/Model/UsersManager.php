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

		public function getUserName($login)
		{
			$requete = $this->executerRequete('SELECT prenom FROM utilisateurs where identifiant = ?', array($login));
			$data = $requete->fetch();
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



	/*	public function addUser($para)
		{
			$requete = $this->executerRequete('insert into User(Login, Pass, Nom, Mail) values(?, ?, ?, ?), array($para['Login'], $para['Pass'], $para['Nom'], $para['Mail']) ')
		}*/


	}
