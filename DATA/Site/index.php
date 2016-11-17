<?php
session_name ('user'); //nommer la session
session_start (); //start la session actuelle
require_once("Model/UsersManager.php");
require_once("Model/SujetsManager.php");
require_once("Model/MessagesManager.php");
require_once("Model/ModuleManager.php");
//require_once("Model/TutoratManager.php");
$um1 = new UsersManager();
$sm = new SujetsManager();
$mm = new MessagesManager();
$mom = new ModuleManager();

if( isset($_POST['identifiant']) && isset($_POST['motDePasse']) ) //on test que les login soit entrés
{


	$testConnexion = $um1->getUsers($_POST['identifiant'],$_POST['motDePasse']);
	if ($testConnexion == false) //si mauvais logins
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
	$utilisateurID = $um2->getUserID($_SESSION ['Login']);


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
		else if ($_GET["action"] == "inscription")
		{
			require_once("./Views/accueil.php");
		}

	/*	else
		{
				$erreur = 400;
				$messageErreur = "L'action n'est pas définie";
				require_once("Views/erreur.php");
		}*/
	}
	else if(isset($_GET["page"]))
	{
		
/*----------------------------------------RESSOURCES----------------------------------------*/	

			if($_GET["page"] == "cours")
			{
					require_once("Views/cours.php");
			}
			
/*----------------------------------------FORUM----------------------------------------*/				
			
			else if($_GET["page"] == "forum")
			{
				if(isset($_GET["actionForum"]))
				{
					if($_GET["actionForum"]=="ajout_message")
					{
						$idSujet=$_POST['id'];
						$contenu=$_POST['message'];
						$contenu=nl2br($contenu);
						$date = date("Y-m-d");
						$mm->setMessage($utilisateurID,$contenu,$date,$idSujet,false);
						header('Location: index.php?page=forum&sujet='.$idSujet);
					}
					else if($_GET["actionForum"]=="ajout_sujet")
					{
						$nom_sujet=$_POST["nom"];
						$message=$_POST["message"];
						$message=nl2br($message);
						$date = date("Y-m-d");
						$sujets=$sm->checkSujets($nom_sujet);
						if($sujets==NULL){
							$sm->setSujet($utilisateurID,$nom_sujet,$_GET['moduleID'],$message,$date);
							$idSujet=$sm->getSujetID($nom_sujet,$utilisateurID);
							$mm->setMessage($utilisateurID,$message,$date,$idSujet,true);
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID']);
						}
						else{
							$erreur="Ce sujet existe déjà ! Cherchez un peu dans les sujets déjà publiés et vous trouverez sûrement la réponse à votre question.";
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID'].'&erreur='.$erreur);
						}
					}
					elseif($_GET["actionForum"]=="supprsujet"){
						$moduleID=$sm->getModuleID($_GET["id"]);
						$sm->supprSujet($_GET["id"]);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID);
					}
					elseif($_GET["actionForum"]=="supprmessage"){
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$premierMessage=$mm->getStatut($_GET["idm"]);
						$moduleID=$sm->getModuleID($idSujet);
						$messageValide=$mm->checkValide($_GET["idm"]);
						if($premierMessage==True){
							$sm->supprSujet($idSujet);
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID);
						}
						elseif($messageValide==True){
							$sm->ouvrir($idSujet);
							$mm->supprMessage($_GET["idm"]);
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID);
						}
						else{
							$mm->supprMessage($_GET["idm"]);
							header('Location: index.php?page=forum&sujet='.$idSujet);
						}
					}
					elseif($_GET["actionForum"]=="fermer"){
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$moduleID=$sm->getModuleID($idSujet);
						$sm->fermer($idSujet,$_GET['idm']);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID);
					}
					elseif($_GET["actionForum"]=="epingler"){
						$sm->epingler($_GET["id"]);
						$moduleID=$sm->getModuleID($_GET["id"]);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID);
					}
					elseif($_GET["actionForum"]=="afficher"){
						if(isset($_GET['erreur'])){
							$erreur=$_GET['erreur'];
						}
						$moduleID=$_GET['moduleID'];
						$module=$mom->getNom($moduleID);
						$sujets=$sm->getSujets($moduleID);
						require_once("Views/forum.php");
					}
				}
				elseif(isset($_GET["sujet"])){
					$messages=$mm->getMessage($_GET["sujet"]);
					$moduleID=$sm->getModuleID($_GET["sujet"]);
					$module=$mom->getNom($moduleID);
					$sujet=$sm->getSujet($_GET["sujet"]);
					$sm->updateVues($_GET["sujet"]);
					require_once("Views/sujet.php");
				}
				else{
					$modules1=$mom->getModules(1);
					$modules2=$mom->getModules(2);
					$modules3=$mom->getModules(3);
					$modules4=$mom->getModules(4);
					require_once("Views/module.php");
				}
			}
			
/*----------------------------------------TUTORAT----------------------------------------*/			
			
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
else if(isset($_GET["action"]))
{
	if ($_GET["action"] == "inscription")
	{
		require_once("Views/inscription.php");
	}
}
else //si personne n'est connecté, on afficher la page de connexion
{
		require_once("Views/connexion.php");
}



?>
