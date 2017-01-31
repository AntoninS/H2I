<?php
		require_once ("Model.php");
		require("./lib/password.php");
	 	class UsersManager extends Model
		{

			public function addUser($identifiant,$password, $groupe, $prenom,$nom,$pseudo,$mail,$tel,$statut){


				$password = password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT INTO utilisateurs (identifiant,motDePasse,groupeID,prenom,nom,pseudo,mail,tel,statut)
				       VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$req = $this->executerRequete($sql, array($identifiant,$password, $groupe,$prenom,$nom,$pseudo,$mail,$tel,$statut));
				/*$data = $req->fetch(PDO::FETCH_ASSOC);
				return $data;*/
			}

			public function getUsersAccess($login,$pass)
			{
				$idExiste = $this->getIdentifiant($login);
				if($idExiste != false)
				{
					$passHashTab =$this->getMdp($login);
					$passHash = $passHashTab["motDePasse"];
					if(password_verify($pass,$passHash))
					{
						return true;
					}else {
						return false;
					}
				}else {
					return false;
				}
			}

			public function getIdentifiant($identifiant)
			{
				$requete = $this->executerRequete('SELECT identifiant FROM utilisateurs where identifiant = ?', array($identifiant));
				$data = $requete->fetch();
				return $data;
			}
			
			public function getMdp($identifiant)
			{
				$requete = $this->executerRequete('SELECT motDePasse FROM utilisateurs where identifiant = ?', array($identifiant));
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
			$req = $this->executerRequete('SELECT * FROM utilisateurs WHERE groupeID=? ORDER BY nom ASC', array($groupeID));
			$result=$req->fetchALL(PDO::FETCH_ASSOC);
			return $result;
		}

		public function setModifCompte ($avatar,$tel, $pseudo, $mail, $utilisateurID, $semestreID, $groupe )

		{
				$nomGroupe =  $this->executerRequete('SELECT GroupeID FROM groupe WHERE NomGroupe=? AND Semestre=?',array($groupe,$semestreID));
				$data=$nomGroupe->fetch(PDO::FETCH_ASSOC);
				$req = $this->executerRequete('UPDATE utilisateurs SET avatar=?, tel=? , pseudo=? ,mail=? , GroupeID=? WHERE utilisateurID=?', array($avatar, $tel,$pseudo, $mail,$data["GroupeID"], $utilisateurID));

		}

		public function setModifComptewithoutavatar($tel, $pseudo, $mail, $utilisateurID, $semestreID, $groupe )

		{
				$nomGroupe =  $this->executerRequete('SELECT GroupeID FROM groupe WHERE NomGroupe=? AND Semestre=?',array($groupe,$semestreID));
				$data=$nomGroupe->fetch(PDO::FETCH_ASSOC);

				$req = $this->executerRequete('UPDATE utilisateurs SET tel=? , pseudo=? ,mail=? , GroupeID=? WHERE utilisateurID=?', array($tel,$pseudo, $mail,$data['GroupeID'], $utilisateurID));

		}


		public function getSemestre($userID)
		{
			$req=$this->executerRequete('SELECT groupe.Semestre FROM groupe, utilisateurs WHERE utilisateurs.groupeID=groupe.GroupeID AND utilisateurID=?', array($userID));
			$result=$req->fetch(PDO::FETCH_ASSOC);
			return $result['Semestre'];

		}

		public function getPseudo($login)
		{
			$req = $this->executerRequete('SELECT pseudo FROM utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch(PDO::FETCH_ASSOC);
			return $data['pseudo'];
		}
	}
