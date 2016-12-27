<?php
		require_once ("Model.php");
	 	class CoursManager extends Model
    {
      public function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
      {
         //Test1: fichier correctement uploadé
           if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0)
					 {
						 return FALSE;
					 }

         //Test2: taille limite
           if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize)
					 {
						 return FALSE;
					 }

         //Test3: extension
           $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
           if ($extensions !== FALSE AND !in_array($ext,$extensions))
					 {
						 return FALSE;
					 }

				 //Déplacement
           return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
      }

			public function ajouterCours($nomCours,$fileURL,$moduleIDC,$auteurIDC)
			{
				$req = $this->executerRequete('INSERT INTO cours (nomCours, fileURL, moduleIDC, auteurIDC) VALUES (?,?,?,?)', array($nomCours,$fileURL,$moduleIDC,$auteurIDC));
			}

    }
?>
