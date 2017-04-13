<?php
		require_once ("Model.php");
	 	class CoursManager extends Model
    {
    	public function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
      {
	      if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0)//Test1: fichier correctement uploadé
				{
					return FALSE;
				}
	      if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize)//Test2: taille limite
				{
					return FALSE;
				}
	      $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);//Test3: extension
	      if ($extensions !== FALSE AND !in_array($ext,$extensions))
				{
					return FALSE;
				}
	      return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);//Déplacement
      }


			public function ajouterCours($nomCours,$fileURL,$moduleIDC,$auteurIDC)
			{
				$req = $this->executerRequete('INSERT INTO cours (nomCours, fileURL, moduleIDC, auteurIDC) VALUES (?,?,?,?)', array($nomCours,$fileURL,$moduleIDC,$auteurIDC));
			}


			public function checkCours($nomCours, $fileURL)
			{
				$req = $this->executerRequete('SELECT * FROM cours WHERE nomCours=? AND fileURL=?', array($nomCours,$fileURL));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}

			public function getCours($moduleID)
			{
				$req = $this->executerRequete('SELECT DISTINCT fileURL,nomCours,prenom, coursID, dateCours FROM cours,utilisateurs WHERE auteurIDC=utilisateurID AND moduleIDC=?', array($moduleID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}
			
			public function getDerniersCours($userID)
			{
				$req = $this->executerRequete('SELECT * FROM cours WHERE auteurIDC=? ORDER BY dateCours DESC LIMIT 3', array($userID));
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}

			public function getListeCours()
			{
				$req = $this->executerRequete('SELECT nomModule,nomCours,pseudo,semestre FROM cours,utilisateurs,module WHERE auteurIDC=utilisateurID and moduleID = moduleIDC order by dateCours desc' );
				$result=$req->fetchALL(PDO::FETCH_ASSOC);
				return $result;
			}


    }
?>
