<?php
session_name ('user'); //nommer la session
session_start (); //start la session actuelle
require_once("Model/UsersManager.php");
require_once("Model/SujetsManager.php");
require_once("Model/MessagesManager.php");
require_once("Model/ModulesManager.php");
require_once("Model/TutoratManager.php");
require_once("Model/GroupesManager.php");
require_once("Model/AnnoncesManager.php");
require_once("Model/CommentairesManager.php");
require_once("Model/CoursManager.php");
$um1 = new UsersManager();
$sm = new SujetsManager();
$mm = new MessagesManager();
$mom = new ModulesManager();
$gm = new GroupesManager();
$am = new AnnoncesManager();
$cm = new CommentairesManager();
$tm = new TutoratManager();
$com = new CoursManager();

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
	$statutUtilisateur = $um2->getStatut($_SESSION ['Login']);


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
				if(isset($_GET["actionCours"]))
				{
					if($_GET["actionCours"] == 'ajout_cours')
					{
						if(!empty($_FILES))
					  {
							$moduleIDC = $_POST['module'];
							$titre = $_POST['titre'];
					    $nomCours1 = $_FILES['fichier']['name'];
					    $nom_tmp_cours = $_FILES['fichier']['tmp_name'];
					    $destination1 = 'uploads/'.$nomCours1;
							$fichier1 = 'fichier';
							$upload1 = $com->upload($fichier1,$destination1,FALSE,FALSE);
							if($upload1)
					    {
									$com->ajouterCours($nomCours1, $destination1,$moduleIDC,$utilisateurID,$titre);
									header('Location: index.php?page=cours');
					    }
					  }
						else
						{
							$modules1=$mom->getModul();
							require_once("Views/formulaireCours.php");
						}
					}
					elseif($_GET["actionCours"]=="afficher") //Affichage d'un forum
					{
						if(isset($_GET['erreur']))//Si une erreur est passée en paramètre, on la stocke dans une variable pour l'afficher ensuite dans la vue
						{
							$erreur=$_GET['erreur'];
						}

						$moduleID=$_GET['moduleID'];
						$nomModule=$mom->getNom($moduleID);
						$cours=$com->getCours($moduleID);
						require_once("Views/cours.php"); //Affichage de la vue forum.php
					}
				}
				else
				{
					$coursS1=$mom->getModules(1);
					$coursS2=$mom->getModules(2);
					$coursS3=$mom->getModules(3);
					$coursS4=$mom->getModules(4);
					require_once("Views/modulesCours.php"); //On affiche la vue module.php avec tous les forums de chaque module de chacun des 4 semestres
				}
			}

/*----------------------------------------FORUM----------------------------------------*/

			else if($_GET["page"] == "forum") //Traitement des requêtes sur le forum
			{

				if(isset($_GET["actionForum"])) //Traitement des actions passées en paramètre de l'url (via l'action spécifique action Forum)
				{

					if($_GET["actionForum"]=="ajout_message") //Publication d'un message sur un sujet
					{
						$idSujet=$_POST['id'];
						$contenu=$_POST['message'];
						$pseudo=$_POST['pseudo'];
						$contenu=nl2br($contenu); //Permet de reconnaître les retours à la ligne du texte de $contenu
						$date = date("Y-m-d H:i:s"); //Current datetime
						$mm->setMessage($utilisateurID,$contenu,$date,$idSujet,false,$pseudo);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}

					else if($_GET["actionForum"]=="ajout_sujet") //Publication d'un nouveau sujet et de son premier message
					{
						$nom_sujet=$_POST["nom"];
						$message=$_POST["message"];
						$pseudo=$_POST['pseudo'];
						$message=nl2br($message);
						$date = date("Y-m-d H:i:s");
						$moduleID=$_POST['moduleID'];
						$sujets=$sm->checkSujets($nom_sujet,$moduleID); //Vérifie que le sujet n'existe pas dans le forum
						if($sujets==NULL) //S'il n'existe pas (la table renvoyée est nulle) :
						{
							$sm->setSujet($utilisateurID,$nom_sujet,$_GET['moduleID'],$message,$date,$pseudo);
							$idSujet=$sm->getSujetID($nom_sujet,$utilisateurID,$moduleID); //Récupération de l'id du sujet nouvellement créé
							$mm->setMessage($utilisateurID,$message,$date,$idSujet,true,$pseudo); //Publication automatique du premier message du sujet
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID']); //Redirection forum
						}
						else //sinon :
						{
							$erreur="Ce sujet existe déjà ! Cherchez un peu dans les sujets déjà publiés et vous trouverez sûrement la réponse à votre question.";
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID'].'&erreur='.$erreur); //Redirection forum avec message d'erreur
						}
					}

					elseif($_GET["actionForum"]=="supprsujet") //Suppression d'un sujet et de tous ses messages
					{
						$moduleID=$sm->getModuleID($_GET["id"]);
						$sm->supprSujet($_GET["id"]);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="supprmessage") //Suppression d'un message
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$premierMessage=$mm->getStatut($_GET["idm"]); //Récupération de la position du message (si 1er ou non)
						$moduleID=$sm->getModuleID($idSujet);
						$messageValide=$mm->checkValide($_GET["idm"]); //Récupération du statut du message (si valide ou non)
						if($premierMessage==True) //Si 1er message :
						{
							$sm->supprSujet($idSujet); //Le sujet entier est supprimé (plus de message à l'intérieur)
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
						}
						elseif($messageValide==True) //Sinon si message validé :
						{
							$sm->ouvrir($idSujet); //Le sujet est rouvert (plus de message validé)
							$mm->supprMessage($_GET["idm"]); //Message supprimé
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
						}
						else //sinon :
						{
							$mm->supprMessage($_GET["idm"]); //Message quelconque supprimé
							header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
						}
					}

					elseif($_GET["actionForum"]=="fermer") //Validation d'un sujet
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$moduleID=$sm->getModuleID($idSujet);
						$date = date("Y-m-d H:i:s");
						$sm->fermer($idSujet,$_GET['idm'],$date); //Le sujet est clos, statut du message validé changé, remis en haut de liste
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="ouvrir") //Validation d'un sujet
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$date = date("Y-m-d H:i:s");
						$sm->ouvrir($idSujet,$_GET["idm"],$date); //Le sujet est rouvert, le message validé ne l'est plus, remis en haut de liste
						$moduleID=$sm->getModuleID($idSujet);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="epingler") //Epingler un sujet
					{
						$date = date("Y-m-d H:i:s");
						$sm->epingler($_GET["id"],$date); //Sujet épinglé (reste en haut de liste)
						$moduleID=$sm->getModuleID($_GET["id"]);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="desepingler") //Desepingler un sujet
					{
						$date = date("Y-m-d H:i:s");
						$sm->desepingler($_GET["id"],$date); //Sujet désépinglé (revient au niveau des autres), remis en haut de liste
						$moduleID=$sm->getModuleID($_GET["id"]);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="editer") //Affichage du bloc d'édition de message
					{
						$nbParPage=10;
						if(isset($_GET['p']) && $_GET['p']>0)
						{
							$page=$_GET['p'];
						}
						else
						{
							$page=1;
						}
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$limiteDeb=($page -1)*$nbParPage;
						$moduleID=$sm->getModuleID($idSujet);
						$module=$mom->getModule($moduleID);
						$result=$mm->getMessage($idSujet);
						$nbMessages=count($result);
						$messages=$mm->getMessageLimite($idSujet,$limiteDeb,$nbParPage);
						$sujet=$sm->getSujet($idSujet);
						$sm->updateVues($idSujet);
						$rapport=(int)($nbMessages/$nbParPage);
						$messageEdition=$_GET["idm"];
						$contenu=$mm->getContenu($_GET["idm"]);
						require_once("Views/sujet.php"); //Affichage classique de la vue sujet.php avec la variable $messageEdition
					}

					elseif($_GET["actionForum"]=="modif_message") //Edition de message
					{
						$idSujet=$mm->getSujetID($_POST['id']);
						$message=$_POST['message'];
						$message=nl2br($message);
						$date = date("Y-m-d H:i:s");
						$mm->setContenu($_POST['id'],$message,$idSujet,$date); //Le contenu du message est édité, sujet remis en haut de liste
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}

					elseif($_GET["actionForum"]=="signaler") //Signalement de message
					{
						if(isset($_GET['ids']))//Si sujet signalé :
						{
							$idSujet=$_GET['ids'];
							$message=$mm->getPremierMessage($idSujet); //Le message signalé est le premier du sujet
							require_once("Views/signalement.php"); //Affichage de la vue signalement.php
						}
						elseif(isset($_GET['idm']))//Si message signalé, méthode classique
						{
							$idMessage=$_GET['idm'];
							$message=$mm->getOneMessage($idMessage);
							require_once("Views/signalement.php");
						}
					}


					elseif($_GET["actionForum"]=="afficher") //Affichage d'un forum
					{
						if(isset($_GET['erreur'])){ //Si une erreur est passée en paramètre, on la stocke dans une variable pour l'afficher ensuite dans la vue
							$erreur=$_GET['erreur'];
						}
						$nbParPage=10; //Nombre maximal de sujet par page (modifiable)
						if(isset($_GET['p']) && $_GET['p']>0) //Si un numéro de page est passé en paramètre...
						{
							$page=$_GET['p']; //... on le stocke
						}
						else//sinon...
						{
							$page=1; //...la page par défaut est la première
						}
						$limiteDeb=($page -1)*$nbParPage; //La position du premier sujet de la table qui sera affiché (0ème pour la première page, 10ème pour la deuxième, 20ème pour la troisième, etc...)
						$moduleID=$_GET['moduleID'];
						$module=$mom->getNom($moduleID);
						$result=$sm->getSujets($moduleID);
						$nbSujets=count($result);//On récupère le nombre total de sujets du forum
						$sujets=$sm->getSujetsLimite($moduleID,$limiteDeb,$nbParPage);//On affiche les sujets d'une page (10 au maximum)
						$rapport=(int)($nbSujets/$nbParPage); //On stocke dans une variable le nombre de pages nécessaires pour tout afficher (valeur entière de la division du nombre total de sujets par le nombre maximal de sujets par page)
						require_once("Views/forum.php"); //Affichage de la vue forum.php
					}
				}
				elseif(isset($_GET["sujet"])) //Affichage d'un sujet
				{
					$nbParPage=10;
					if(isset($_GET['p']) && $_GET['p']>0)
					{
						$page=$_GET['p'];
					}
					else
					{
						$page=1;
					}
					$limiteDeb=($page -1)*$nbParPage;
					$moduleID=$sm->getModuleID($_GET["sujet"]);
					$module=$mom->getModule($moduleID);
					$result=$mm->getMessage($_GET["sujet"]);
					$nbMessages=count($result);
					$messages=$mm->getMessageLimite($_GET["sujet"],$limiteDeb,$nbParPage);
					$sujet=$sm->getSujet($_GET["sujet"]);
					$sm->updateVues($_GET["sujet"]);
					$rapport=(int)($nbMessages/$nbParPage); //Même système qu'au-dessus mais pour les messages
					require_once("Views/sujet.php"); //Affichage de la vue sujet.php
				}
				else //Si aucune action n'est détectée (cad première visite sur la section forum)...
				{
					$modules1=$mom->getModules(1);
					$modules2=$mom->getModules(2);
					$modules3=$mom->getModules(3);
					$modules4=$mom->getModules(4);
					require_once("Views/module.php"); //On affiche la vue module.php avec tous les forums de chaque module de chacun des 4 semestres
				}
			}

/*----------------------------------------TUTORAT----------------------------------------*/

			else if($_GET["page"] == "tutorats") // si dans l'URL page=tutorats, on affiche ce qui est relatif au planning des tutorats
			{
				if(isset($_GET["actionTutorat"]))
				{
					if($_GET["actionTutorat"] == 'ajout')	//si l'action spécifiée dans l'URL est ajout, on envoie sur la page de formulaire d'ajout de cours de tutorat
					{
						$modulesDisponibles = $tm->getNomModuleDispo();

						require_once("Views/ajoutTutorat.php");
					}
					elseif ($_GET['actionTutorat'] == 'rejoindre')
					{

						require_once("Views/rejoindreTutorat.php");
					}
				}
				elseif (isset($_POST['selectionModuleTutorat']) && isset($_POST['choixJourTutorat']) && isset($_POST['choixHeureTutorat']) && isset($_POST['dureeTutorat']) && isset($_POST['commentaireTutorat'])) //Si tout les champs du formulaire d'ajout tutorat sont remplis
				{
					$module = str_replace('_', ' ', $_POST['selectionModuleTutorat']); // Dans le formulaire on remplace les espaces par des '_', donc la on fait l'inverse pour revenir a la forme initiale, et ainsi pouvoir ajouter le bon module

					$dateMauvaisFormat = $_POST['choixJourTutorat'];
					$jour = substr($dateMauvaisFormat, 0, 2);
					$mois = substr($dateMauvaisFormat, 3, 2);
					$annee = substr($dateMauvaisFormat, 6, 4);
					$dateBonFormat = ''.$annee.'-'.$mois.'-'.$jour.'';

					$heureDebut = date('H:i:s', strtotime($_POST['choixHeureTutorat'])); //Ce qu'on récupère dans $_POST['choixHeureTutorat']) c'est une heure au format 08:00, et on la transforme en 08:00:00 pour pouvoir l'inserer dans la BDD

					if($_POST['dureeTutorat'] == '1')
					{
						$heureFin = date('H:i:s', strtotime($_POST['choixHeureTutorat']) + 60*60); //On rajoute 1 heure
					}
					elseif ($_POST['dureeTutorat'] == '2')
					{
						$heureFin = date('H:i:s', strtotime($_POST['choixHeureTutorat']) + 120*60); //On rajoute 2 heures
					}

					$tuteur = $tm->getTuteurID($module);
					$tuteur = $tuteur['utilisateurID'];
					$eleveTutorat = $um1->getUserID($_SESSION ['Login']);
					$salle = 'S13';

					$semaineAjoutTutorat = (new DateTime($dateBonFormat))->format('W'); //On a une date au format 2016-12-25, et on recupère la semaine
					$anneeAjoutTutorat = (new DateTime($dateBonFormat))->format('Y');	//Pareil que ligne précédente, mais pour l'année

					$commentaireTutorat = $_POST['commentaireTutorat'];

					$testInitialisation = $tm->verifierInitSemaine($semaineAjoutTutorat, $anneeAjoutTutorat);

					if($testInitialisation['verifInitSemaine'] > 0)
					{
						$tm->ajouterTutorat($module, $dateBonFormat, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle, $commentaireTutorat);
					}
					else
					{
						$tm->initialiseSemaine($semaineAjoutTutorat, $anneeAjoutTutorat);
						$tm->ajouterTutorat($module, $dateBonFormat, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle, $commentaireTutorat);
					}

					$idCoursTutorat = $tm->getCoursTutoratID($module, $dateBonFormat, $heureDebut, $heureFin, $tuteur, $eleveTutorat, $salle);

					$jourTutoratNb = (new DateTime($dateBonFormat))->format('N'); //format('N') renvoie un jour sous forme de numéro : 1 pour lundi, 7 pour dimanche
					switch($jourTutoratNb)
					{
						case 1:
							$jourTutoratMot='lundi';
							break;
						case 2:
							$jourTutoratMot='mardi';
							break;
						case 3:
							$jourTutoratMot='mercredi';
							break;
						case 4:
							$jourTutoratMot='jeudi';
							break;
						case 5:
							$jourTutoratMot='vendredi';
							break;
					}

					if(substr($_POST['choixHeureTutorat'], 0, 1) == '0')		//Comme on a une heure au format 08h00, on regarde si ça commence par un zero, pour recuperer la bonne heure
					{
						$heureaActualiser = substr($_POST['choixHeureTutorat'], 1, 1);
					}
					else
					{
						$heureaActualiser = substr($_POST['choixHeureTutorat'], 0, 2);
					}

					$tm->actualiserSemainePlanning($semaineAjoutTutorat, $anneeAjoutTutorat, $module, $jourTutoratMot, $idCoursTutorat, $heureaActualiser);
					if($_POST['dureeTutorat'] == 2) //Si le tutorat dure 2h, il faut actualiser 2 cellules dans le planning
					{
						$heureaActualiser++;
						$tm->actualiserSemainePlanning($semaineAjoutTutorat, $anneeAjoutTutorat, $module, $jourTutoratMot, $idCoursTutorat, $heureaActualiser);
					}
					header('Location: index.php?page=tutorats');

				}

				else
				{

					if(!isset($_GET['semaine']) and !isset($_GET['annee']))
					{
						$testInitialisation = $tm->verifierInitSemaine(date('W'), date('Y'));
						if($testInitialisation['verifInitSemaine'] > 0)
						{
							$semaine = $tm->getSemaineTutorat(date('W'), date('Y') );
						}
						else
						{
							$tm->initialiseSemaine(date('W'), date('Y'));
							$semaine = $tm->getSemaineTutorat(date('W'), date('Y') );
						}

						$enteteLundi = $tm->trouverDateFormatJourMoisAnnee(date('W'), date('Y'), 1);
						$enteteMardi = $tm->trouverDateFormatJourMoisAnnee(date('W'), date('Y'), 2);
						$enteteMercredi = $tm->trouverDateFormatJourMoisAnnee(date('W'), date('Y'), 3);
						$enteteJeudi = $tm->trouverDateFormatJourMoisAnnee(date('W'), date('Y'), 4);
						$enteteVendredi = $tm->trouverDateFormatJourMoisAnnee(date('W'), date('Y'), 5);
					}

					elseif (isset($_GET['semaine']) and !isset($_GET['annee']))
					{
						$testInitialisation = $tm->verifierInitSemaine($_GET['semaine'], date('Y'));
						if($testInitialisation['verifInitSemaine'] > 0)
						{
							$semaine = $tm->getSemaineTutorat($_GET['semaine'], date('Y'));
						}
						else
						{
							$tm->initialiseSemaine($_GET['semaine'], date('Y'));
							$semaine = $tm->getSemaineTutorat($_GET['semaine'], date('Y'));
						}

						$enteteLundi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 1);
						$enteteMardi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 2);
						$enteteMercredi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 3);
						$enteteJeudi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 4);
						$enteteVendredi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 5);
					}

					elseif (isset($_GET['semaine']) and isset($_GET['annee']))
					{
						$testInitialisation = $tm->verifierInitSemaine($_GET['semaine'], $_GET['annee']);
						if($testInitialisation['verifInitSemaine'] > 0)
						{
							$semaine = $tm->getSemaineTutorat($_GET['semaine'], $_GET['annee']);
						}
						else
						{
							$tm->initialiseSemaine($_GET['semaine'], $_GET['annee']);
							$semaine = $tm->getSemaineTutorat($_GET['semaine'], $_GET['annee']);
						}

						$enteteLundi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 1);
						$enteteMardi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 2);
						$enteteMercredi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 3);
						$enteteJeudi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 4);
						$enteteVendredi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 5);
					}

					elseif (!isset($_GET['semaine']) and isset($_GET['annee']))
					{
							// si on a que l'année mais pas la semaine on fait qqch ?
					}

					require_once("Views/tutorats.php");

				}
			}

/*----------------------------------------COMPTE----------------------------------------*/

			elseif ($_GET["page"] == "monCompte")
			{
				$userID=$_GET['compte'];
				$user=$um2->getUser($userID);
				require_once("Views/moncompte.php");
			}

/*----------------------------------------GROUPE----------------------------------------*/

			elseif ($_GET["page"] == "groupe")
			{
				$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
				$groupe=$gm->getGroupe($groupeID);
				$listeGroupe=$um2->getListeGroupe($groupeID);
				$annonces=$am->getAnnonces($groupeID);
				require_once("Views/groupe.php");
			}

/*----------------------------------------ACCUEIL----------------------------------------*/

			elseif ($_GET["page"] == "accueil")
			{
				$listeSujets = $sm->getSujetTri();
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
			$listeSujets = $sm->getSujetTri();
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
