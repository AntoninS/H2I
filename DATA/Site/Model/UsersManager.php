<?php
		require_once ("Model.php");
	 	class UsersManager extends Model{

		public function getUsers($login,$pass)
		{
			$requete = $this->executerRequete('select identifiant, motDePasse FROM Utilisateurs where identifiant = ? and motDePasse = ?', array($login,$pass));
			$data = $requete->fetch();
			return $data;
		}

		public function getUserName($login)
		{
			$requete = $this->executerRequete('select prenom FROM Utilisateurs where identifiant = ?', array($login));
			$data = $requete->fetch();
			return $data;
		}


	/*	public function addUser($para)
		{
			$requete = $this->executerRequete('insert into User(Login, Pass, Nom, Mail) values(?, ?, ?, ?), array($para['Login'], $para['Pass'], $para['Nom'], $para['Mail']) ')
		}*/


	}
