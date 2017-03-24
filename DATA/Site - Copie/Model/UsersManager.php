<?php
		require_once ("Model.php");
		require("./lib/password.php");
	 	class UsersManager extends Model
		{

			function random() {
				$string = "";
				$chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
				srand((double)microtime()*1000000);
				for($i=0; $i<7; $i++) {
					$string .= $chaine[rand()%strlen($chaine)];
				}
				return $string;
		  }

			function sendEmail($id,$prenom,$mail,$code)
			{
				$to      = $mail;//.'@etu.univ-lyon1.fr';
				$from = 'no-reply@hub-iut-lyon1.fr';
				$subject = 'Confirmez votre compte';
				$message = '<html><body><head><title>Titre</title> </head>Bonjour '.$prenom.' et bienvenue sur la plateforme H2I ! <br><br>Identifiant: '.$id.'<br>Veuillez valider votre inscription avec le code de validation suivant:<b> '.$code.'</b></body></html>';



				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers  .= "From: $from";



				mail($to, $subject, $message, $headers, "-f " . $from);
			}

			function testUserCode($identifiant,$code)
			{
				$requete = $this->executerRequete('SELECT confirmationCode FROM utilisateurs where identifiant = ? AND confirmationCode=?', array($identifiant,$code));
				$data = $requete->fetch();
				return $data;
			}
			function getUserCode($identifiant)
			{
				$requete = $this->executerRequete('SELECT confirmationCode FROM utilisateurs where identifiant = ?', array($identifiant));
				$data = $requete->fetch();
				return $data['confirmationCode'];
			}

			function setUserCodeNull($identifiant)
			{
				$req = $this->executerRequete('UPDATE utilisateurs SET confirmationCode=NULL  WHERE identifiant=?', array($identifiant));
			}
			function setUserCode($idft,$randCode)
			{
				$req = $this->executerRequete('UPDATE utilisateurs SET confirmationCode=?  WHERE identifiant=?', array($randCode,$idft));
			}


			public function addUser($identifiant,$password, $groupe, $prenom,$nom,$pseudo,$mail,$tel,$statut,$randCode){


				$password = password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT INTO utilisateurs (identifiant,motDePasse,groupeID,prenom,nom,pseudo,mail,tel,statut,confirmationCode)
				       VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$req = $this->executerRequete($sql, array($identifiant,$password, $groupe,$prenom,$nom,$pseudo,$mail,$tel,$statut,$randCode));
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
			public function getUserEmail($identifiant)
			{
				$requete = $this->executerRequete('SELECT mail FROM utilisateurs where identifiant = ?', array($identifiant));
				$data = $requete->fetch();
				return $data['mail'];
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

		public function setModifCompte ($avatar,$tel, $pseudo, $mail, $utilisateurID, $semestreID, $groupe, $public)

		{
				$nomGroupe =  $this->executerRequete('SELECT GroupeID FROM groupe WHERE NomGroupe=? AND Semestre=?',array($groupe,$semestreID));
				$data=$nomGroupe->fetch(PDO::FETCH_ASSOC);
				$req = $this->executerRequete('UPDATE utilisateurs SET avatar=?, tel=? , pseudo=? ,mail=? , GroupeID=?, public=? WHERE utilisateurID=?', array($avatar, $tel,$pseudo, $mail,$data["GroupeID"],$public, $utilisateurID));

		}

		public function setModifComptewithoutavatar($tel, $pseudo, $mail, $utilisateurID, $semestreID, $groupe, $public)

		{
				$nomGroupe =  $this->executerRequete('SELECT GroupeID FROM groupe WHERE NomGroupe=? AND Semestre=?',array($groupe,$semestreID));
				$data=$nomGroupe->fetch(PDO::FETCH_ASSOC);

				$req = $this->executerRequete('UPDATE utilisateurs SET tel=? , pseudo=? ,mail=? , GroupeID=?, public=? WHERE utilisateurID=?', array($tel,$pseudo,$mail,$data['GroupeID'],$public,$utilisateurID));
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
