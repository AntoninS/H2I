<?php
session_name ('user'); //nommer la session
session_start (); //start la session actuelle
require_once("Model/UsersManager.php");
//require_once("Model/TutoratManager.php");

if( isset($_POST['identifiant']) && isset($_POST['motDePasse']) ) //on test que les login soit entrés
{

	$um1 = new UsersManager();
	$testConnexion = $um1->getUsers($_POST['identifiant'],$_POST['motDePasse']);
	if ($testConnexion == false) //si il mauvais logins
	{
		require('Views/connexion.php');

	}else //sinon on ouvre une session utilisateur
	{

		$_SESSION ['Login'] = $_POST['identifiant']; // stocke la variable de session avec l'identifiant de l'utilisateur
		header('Location: ./');

	}
}


if(isset($_SESSION ['Login'])) //si un utilisateur est connecté
{

	$um2 = new UsersManager();
	$prenom = $um2->getUserName($_SESSION ['Login']);


	if(isset($_GET["action"]))
	{
		if ($_GET["action"] == "deconnexion")
		{
			$_SESSION = array();
			session_unset ();
			session_destroy ();
			header('Location: ./');
			exit(0);
		}
		else
		{
				$erreur = 400;
				$messageErreur = "L'action n'est pas définie";
				require_once("Views/erreur.php");
		}
	}
	else if(isset($_GET["page"]))
	{
			if($_GET["page"] == "cours")
			{
					require_once("Views/cours.php");
			}
			else if($_GET["page"] == "forum")
			{
					require_once("Views/forum.php");
			}
			else if($_GET["page"] == "tutorats")
			{
					$tm = new TutoratManager();
					$semaine = $tm->getSemaineTutorat(32);  //comment faire avec le num de semaine ?
					require_once("Views/tutorats.php");
			}
			elseif ($_GET["page"] == "monCompte")
			{
				require_once("Views/moncompte.php");
			}
			elseif ($_GET["page"] == "accueil")
			{
				require_once("Views/accueil.php");
			}
			else
			{
					$erreur = 404;
					$messageErreur = "La page demandée n'existe pas ou a été supprimée";
					require_once("Views/erreur.php");
			}
		}
		else
		{
			require_once("Views/accueil.php");
		}





}
else //si personne n'est connecté, on afficher la page de connexion
{
		require_once("Views/connexion.php");
}



?>
