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
require_once("Model/StatistiquesManager.php");
require_once("Model/SignalementManager.php");
$um1 = new UsersManager();
$sm = new SujetsManager();
$mm = new MessagesManager();
$mom = new ModulesManager();
$gm = new GroupesManager();
$am = new AnnoncesManager();
$cm = new CommentairesManager();
$tm = new TutoratManager();
$com = new CoursManager();
$stm = new StatistiquesManager();
$sim = new SignalementManager();

if( isset($_POST['identifiant']) && isset($_POST['motDePasse']) ) //on test que les login soit entrés
{


	$testConnexion = $um1->getUsersAccess($_POST['identifiant'],$_POST['motDePasse']);
	if ($testConnexion == false) //si mauvais logins
	{
		require('Views/connexion.php');

	}else //sinon on ouvre une session utilisateur
	{

		$_SESSION ['Login'] = $_POST['identifiant']; // stocke la variable de session avec l'identifiant de l'utilisateur
		$_SESSION['CodeValidation'] = $um1->getUserCode($_SESSION ['Login']);
		header('Location: ./');

	}
}



if(isset($_SESSION ['Login']) && is_null($_SESSION['CodeValidation'])) //si un utilisateur est connecté
{

	$um2 = new UsersManager();
	$prenom = $um2->getUserName($_SESSION ['Login']);
	$pseudo = $um2->getPseudo($_SESSION ['Login']);
	$utilisateurID = $um2->getUserID($_SESSION ['Login']);
	$statutUtilisateur = $um2->getStatut($_SESSION ['Login']);
	$ban = $um2->getBan($_SESSION ['Login']);
	$utilisateur=$um2->getUser($utilisateurID);
	$liste_extension=".jpg, .png, .jpeg";


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
							if($_POST['semestreRadio'] == "1"){
								$moduleIDC = $_POST['moduleS1'];
								$titre = $_POST['titre'];
								$nomCours1 = $_FILES['fichier']['name'];
								$nom_tmp_cours = $_FILES['fichier']['tmp_name'];
								$destination1 = 'uploads/'.$nomCours1;
								$fichier1 = 'fichier';
								$upload1 = $com->upload($fichier1,$destination1,FALSE,FALSE);
								if($upload1)
								{
										$com->ajouterCours($nomCours1, $destination1,$moduleIDC,$utilisateurID,$titre);
										$stm->upNbRessourcesUp($utilisateurID);
										$stm->upActivite($utilisateurID);
										header('Location: index.php?page=cours');
								}
							}
							elseif ($_POST['semestreRadio'] == "2") {
								$moduleIDC = $_POST['moduleS2'];
								$titre = $_POST['titre'];
								$nomCours1 = $_FILES['fichier']['name'];
								$nom_tmp_cours = $_FILES['fichier']['tmp_name'];
								$destination1 = 'uploads/'.$nomCours1;
								$fichier1 = 'fichier';
								$upload1 = $com->upload($fichier1,$destination1,FALSE,FALSE);
								if($upload1)
								{
										$com->ajouterCours($nomCours1, $destination1,$moduleIDC,$utilisateurID,$titre);
										$stm->upNbRessourcesUp($utilisateurID);
										$stm->upActivite($utilisateurID);
										header('Location: index.php?page=cours');
								}
							}
							elseif ($_POST['semestreRadio'] == "3") {
								$moduleIDC = $_POST['moduleS3'];
								$titre = $_POST['titre'];
								$nomCours1 = $_FILES['fichier']['name'];
								$nom_tmp_cours = $_FILES['fichier']['tmp_name'];
								$destination1 = 'uploads/'.$nomCours1;
								$fichier1 = 'fichier';
								$upload1 = $com->upload($fichier1,$destination1,FALSE,FALSE);
								if($upload1)
								{
										$com->ajouterCours($nomCours1, $destination1,$moduleIDC,$utilisateurID,$titre);
										$stm->upNbRessourcesUp($utilisateurID);
										$stm->upActivite($utilisateurID);
										header('Location: index.php?page=cours');
								}
							}
							elseif ($_POST['semestreRadio'] == "4") {
								$moduleIDC = $_POST['moduleS4'];
								$titre = $_POST['titre'];
								$nomCours1 = $_FILES['fichier']['name'];
								$nom_tmp_cours = $_FILES['fichier']['tmp_name'];
								$destination1 = 'uploads/'.$nomCours1;
								$fichier1 = 'fichier';
								$upload1 = $com->upload($fichier1,$destination1,FALSE,FALSE);
								if($upload1)
								{
										$com->ajouterCours($nomCours1, $destination1,$moduleIDC,$utilisateurID,$titre);
										$stm->upNbRessourcesUp($utilisateurID);
										$stm->upActivite($utilisateurID);
										header('Location: index.php?page=cours');
								}
							}

					  }
						else
						{
							$modules1=$mom->getModules(1);
							$modules2=$mom->getModules(2);
							$modules3=$mom->getModules(3);
							$modules4=$mom->getModules(4);
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
					elseif($_GET["actionCours"]=="telecharger")
					{
						$url=$_GET['url'];
						$stm->upNbRessourcesDown($utilisateurID);
						$stm->upActivite($utilisateurID);
						header('Location: '.$url);
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
						if(isset($_POST["anonyme"]))
						{
							$pseudo_publi="Utilisateur anonyme";
						}
						else
						{
							if(isset($pseudo)) $pseudo_publi=$pseudo;
							else $pseudo_publi=$prenom;
						}
						$contenu=nl2br($contenu); //Permet de reconnaître les retours à la ligne du texte de $contenu
						$date = date("Y-m-d H:i:s"); //Current datetime
						$stm->upNbMessages($utilisateurID);
						$stm->upActivite($utilisateurID);
						$mm->setMessage($utilisateurID,$contenu,$date,$idSujet,false,$pseudo_publi);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}

					else if($_GET["actionForum"]=="ajout_sujet") //Publication d'un nouveau sujet et de son premier message
					{
						$nom_sujet=$_POST["nom"];
						$message=$_POST["message"];
						if(isset($_POST["anonyme"]))
						{
							$pseudo_publi="Utilisateur anonyme";
						}
						else
						{
							if(isset($pseudo)) $pseudo_publi=$pseudo;
							else $pseudo_publi=$prenom;
						}
						$message=nl2br($message);
						$date = date("Y-m-d H:i:s");
						$moduleID=$_POST['moduleID'];
						$sujets=$sm->checkSujets($nom_sujet,$moduleID); //Vérifie que le sujet n'existe pas dans le forum
						if($nom_sujet!=NULL && $message!=NULL) //Si le nom du sujet n'est pas vide :
						{
							if($sujets==NULL) //S'il n'existe pas (la table renvoyée est nulle) :
							{
								$stm->upNbMessages($utilisateurID);
								$stm->upNbSujets($utilisateurID);
								$stm->upActivite($utilisateurID);
								$sm->setSujet($utilisateurID,$nom_sujet,$_GET['moduleID'],$message,$date,$pseudo_publi);
								$idSujet=$sm->getSujetID($nom_sujet,$utilisateurID,$moduleID); //Récupération de l'id du sujet nouvellement créé
								$mm->setMessage($utilisateurID,$message,$date,$idSujet,true,$pseudo_publi); //Publication automatique du premier message du sujet
								header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID']); //Redirection forum
							}
							else //sinon :
							{
								$erreur="Ce sujet existe déjà dans ce forum. Cherchez un peu dans les sujets déjà publiés et vous trouverez sûrement la réponse à votre question !";
								header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID'].'&erreur='.$erreur.'#error_anchor'); //Redirection forum avec message d'erreur
							}
						}
						else //sinon :
						{
							$erreur="Veuillez entrer un nom de sujet et un message valides.";
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$_GET['moduleID'].'&erreur='.$erreur.'#error_anchor'); //Redirection forum avec message d'erreur
						}
					}

					elseif($_GET["actionForum"]=="supprsujet") //Suppression d'un sujet et de tous ses messages
					{
						$moduleID=$sm->getModuleID($_GET["id"]);
						$sm->supprSujet($_GET["id"]);
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="supprmessage") //Suppression d'un message
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$auteur=$mm->getAuteur($_GET["idm"]);
						$cause=NULL;
						if($auteur==$utilisateurID){
							$mm->supprMessage("Propriétaire",$cause,$_GET["idm"]); //Message quelconque supprimé
						}
						else
						{
							$mm->supprMessage("Modération",$cause,$_GET["idm"]); //Message quelconque supprimé
						}
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}
					
					elseif($_GET["actionForum"]=="retablir")
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$mm->retablirMessage($_GET["idm"]);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}

					elseif($_GET["actionForum"]=="supprmessagedef") //Suppression d�finitive d'un message
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$premierMessage=$mm->getStatut($_GET["idm"]); //Récupération de la position du message (si 1er ou non)
						$moduleID=$sm->getModuleID($idSujet);
						$messageValide=$mm->checkValide($_GET["idm"]); //Récupération du statut du message (si valide ou non)
						if($premierMessage==True) //Si 1er message :
						{
							$sm->supprSujet($idSujet); //Le sujet entier est supprimé (plus de message à l'intérieur)
							$stm->upActivite($utilisateurID);
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
						}
						elseif($messageValide==True) //Sinon si message validé :
						{
							$sm->ouvrir($idSujet); //Le sujet est rouvert (plus de message validé)
							$mm->supprMessageDef($_GET["idm"]); //Message supprimé
							$stm->upActivite($utilisateurID);
							header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
						}
						else //sinon :
						{
							$mm->supprMessageDef($_GET["idm"]); //Message quelconque supprimé
							$stm->upActivite($utilisateurID);
							header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
						}
					}

					elseif($_GET["actionForum"]=="fermer") //Validation d'un sujet
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$moduleID=$sm->getModuleID($idSujet);
						$date = date("Y-m-d H:i:s");
						$userID=$mm->getAuteur($_GET['idm']);
						$sm->fermer($idSujet,$_GET['idm'],$date); //Le sujet est clos, statut du message validé changé, remis en haut de liste
						$stm->upNbValides($userID);
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="ouvrir") //Invalidation d'un sujet
					{
						$idSujet=$mm->getSujetID($_GET["idm"]);
						$date = date("Y-m-d H:i:s");
						$sm->ouvrir($idSujet,$_GET["idm"],$date); //Le sujet est rouvert, le message validé ne l'est plus, remis en haut de liste
						$moduleID=$sm->getModuleID($idSujet);
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="epingler") //Epingler un sujet
					{
						$date = date("Y-m-d H:i:s");
						$sm->epingler($_GET["id"],$date); //Sujet épinglé (reste en haut de liste)
						$moduleID=$sm->getModuleID($_GET["id"]);
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&actionForum=afficher&moduleID='.$moduleID); //Redirection forum
					}

					elseif($_GET["actionForum"]=="desepingler") //Desepingler un sujet
					{
						$date = date("Y-m-d H:i:s");
						$sm->desepingler($_GET["id"],$date); //Sujet désépinglé (revient au niveau des autres), remis en haut de liste
						$moduleID=$sm->getModuleID($_GET["id"]);
						$stm->upActivite($utilisateurID);
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
						require_once("Views/forum/sujet.php"); //Affichage classique de la vue sujet.php avec la variable $messageEdition
					}

					elseif($_GET["actionForum"]=="modif_message") //Edition de message
					{
						$idSujet=$mm->getSujetID($_POST['id']);
						$message=$_POST['message'];
						$message=nl2br($message);
						$date = date("Y-m-d H:i:s");
						$mm->setContenu($_POST['id'],$message,$idSujet,$date); //Le contenu du message est édité, sujet remis en haut de liste
						$stm->upActivite($utilisateurID);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
					}

					elseif($_GET["actionForum"]=="signalement") //Affichage de la page de signalement
					{
						if(isset($_GET['ids']))//Si sujet signalé :
						{
							if(isset($_GET['ids']))
							{
								$idSujet=$_GET['ids'];
							}
							$message=$mm->getPremierMessage($idSujet); //Le message signalé est le premier du sujet
							require_once("Views/forum/signalement.php"); //Affichage de la vue signalement.php
						}
						elseif(isset($_GET['idm']))//Si message signalé, méthode classique
						{
							if(isset($_GET['idm']))
							{
								$idMessage=$_GET['idm'];
							}
							$message=$mm->getOneMessage($idMessage);
							require_once("Views/forum/signalement.php");
						}
					}
					
					elseif($_GET["actionForum"]=="signaler") //Signalement de message
					{
						if(isset($_GET['idm']))
						{
							$idMessage=$_GET['idm'];
						}
						if(isset($_GET['ids']))
						{
							$idSujet=$_GET['ids'];
						}
						$sujet=$_POST['sujet'];
						$message=$_POST['message'];
						$sim->setSignalement($idMessage, $utilisateurID, $sujet, $message);
						header('Location: index.php?page=forum&sujet='.$idSujet); //Redirection sujet
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
						$semestre=$mom->getSemestre($moduleID);
						$result=$sm->getSujets($moduleID);
						$nbSujets=count($result);//On récupère le nombre total de sujets du forum
						$sujets=$sm->getSujetsLimite($moduleID,$limiteDeb,$nbParPage);//On affiche les sujets d'une page (10 au maximum)
						$rapport=intval($nbSujets/($nbParPage+1)); //On stocke dans une variable le nombre de pages nécessaires pour tout afficher (valeur entière de la division du nombre total de sujets par le nombre maximal de sujets par page)
						require_once("Views/forum/forum.php"); //Affichage de la vue forum.php
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
					require_once("Views/forum/sujet.php"); //Affichage de la vue sujet.php
				}
				else //Si aucune action n'est détectée (cad première visite sur la section forum)...
				{
					$ue1=$mom->getUE(1);
					$ue2=$mom->getUE(2);
					$ue3=$mom->getUE(3);
					$ue4=$mom->getUE(4);

					$i1=0;
					$i2=0;
					$i3=0;
					$i4=0;

					foreach($ue1 as $ligne){
						${'ue1Modules'.$i1}=$mom->getModulesUE(1,$ligne['UE']);
						$i1=$i1+1;
					}

					foreach($ue2 as $ligne){
						${'ue2Modules'.$i2}=$mom->getModulesUE(2,$ligne['UE']);
						$i2=$i2+1;
					}

					foreach($ue3 as $ligne){
						${'ue3Modules'.$i3}=$mom->getModulesUE(3,$ligne['UE']);
						$i3=$i3+1;
					}

					foreach($ue4 as $ligne){
						${'ue4Modules'.$i4}=$mom->getModulesUE(4,$ligne['UE']);
						$i4=$i4+1;
					}

					require_once("Views/forum/module.php"); //On affiche la vue module.php avec tous les forums de chaque module de chacun des 4 semestres
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

						require_once("Views/tutorat/ajoutTutorat.php");
					}
					elseif ($_GET['actionTutorat'] == 'rejoindre')
					{
						if(isset($_GET['id']))
						{
							$idEleve = $um1->getUserID($_SESSION ['Login']);
							$listeEleves = $tm->getElevesInscrit($_GET['id']);
							if($idEleve == $listeEleves['eleve1'] OR $idEleve == $listeEleves['eleve2'] OR $idEleve == $listeEleves['eleve3'] OR $idEleve == $listeEleves['eleve4'])
							{
								echo '<script language="JavaScript">
											alert("Vous êtes déjà inscrit dans ce tutorat !");
											window.location.replace("index.php?page=tutorats");
											</script>';
							}
							elseif ($tm->getTuteurTutorat($_GET['id']) == $idEleve)
							{
								echo '<script language="JavaScript">
											alert("Vous êtes le tuteur de ce tutorat ! Vous ne pouvez donc pas le rejoindre");
											window.location.replace("index.php?page=tutorats");
											</script>';
							}
							elseif ($tm->getNombrePlacesRestantes($_GET['id']) == 0)
							{
								echo '<script language="JavaScript">
											alert("Toutes les places sont déjà prises !");
											window.location.replace("index.php?page=tutorats");
											</script>';
							}
							else
							{
								$idTutorat = $_GET['id'];
								$nomModuleTutorat = $tm->getNomModule($_GET['id']);
								$nbPlacesRestantes = $tm->getNombrePlacesRestantes($_GET['id']);

								$dateComplete = $tm->getDateTutorat($_GET['id']);
								$jourTutorat = $dateComplete['jour'];
								$heureDebutTutorat = $dateComplete['heureDebut'];
								$heureFinTutorat = $dateComplete['heureFin'];
								require_once("Views/tutorat/rejoindreTutorat.php");
							}

						}
						else
						{
							echo 'PAGE INEXISTANTE'; //TODO : mieux gerer ça
						}
					}

					elseif ($_GET['actionTutorat'] == 'consulter')
					{
						$statutUtilisateur = $um1->getStatut($_SESSION ['Login']);
						if($statutUtilisateur == 'Tuteur' OR $statutUtilisateur == 'Enseignant')
						{
							$idTuteur = $um1->getUserID($_SESSION ['Login']);
							$listeTutoratsEleve = $tm->getListeParticipationTutoratEleve($idTuteur);
							$listeTutoratsTuteur = $tm->getListeTutoratDispense($idTuteur);

							require_once("Views/tutorat/consulterSesTutoratsTuteur.php");
						}
						else
						{
							$idEleve = $um1->getUserID($_SESSION ['Login']);
							$listeTutoratsEleve = $tm->getListeParticipationTutoratEleve($idEleve);

							require_once("Views/tutorat/consulterSesTutoratsEleve.php");
						}
					}

					elseif ($_GET['actionTutorat'] == 'devenirtuteur')
					{
						$listeModules = $mom->getModul();
						require_once("Views/tutorat/devenirTuteur.php");
					}
				}



				elseif (isset($_POST['selectionModuleTutorat']) && isset($_POST['choixJourTutorat']) && isset($_POST['choixHeureTutorat']) && isset($_POST['choixSalleTutorat']) && isset($_POST['dureeTutorat']) && isset($_POST['commentaireTutorat'])) //Si tout les champs du formulaire d'ajout tutorat sont remplis
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
					$salle = $_POST['choixSalleTutorat'];

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



				elseif (isset($_POST['commentaireRejoindreTutorat']) && isset($_POST['nbPlacesRestantes']) && isset($_POST['idTutoratRejoindre'])) //C'est le seul champ du formulaire de rejoindreTutorat.php TODO : meilleure verif
				{
					$idEleve = $um1->getUserID($_SESSION ['Login']);
					$listeEleves = $tm->getElevesInscrit($_POST['idTutoratRejoindre']);
					if($idEleve == $listeEleves['eleve1'] OR $idEleve == $listeEleves['eleve2'] OR $idEleve == $listeEleves['eleve3'] OR $idEleve == $listeEleves['eleve4'])
					{
						echo 'Erreur : Vous êtes déjà inscrit dans ce tutorat'; //Redirection normalement gérée dans $_GET['actionTutorat'] == 'rejoindre'
					}
					if($_POST['nbPlacesRestantes'] == 0)
					{
						echo '<script language="JavaScript">
									alert("Toutes les places sont déjà prises !");
									window.location.replace("index.php?page=tutorats");
									</script>';
					}
					else
					{
						switch ($_POST['nbPlacesRestantes'])
						{
							case 1:
								$tm->ajouterEleveTutorat($idEleve ,$_POST['idTutoratRejoindre'], 'eleve4');
								break;
							case 2:
								$tm->ajouterEleveTutorat($idEleve ,$_POST['idTutoratRejoindre'], 'eleve3');
								break;
							case 3:
								$tm->ajouterEleveTutorat($idEleve ,$_POST['idTutoratRejoindre'], 'eleve2');
								break;

							default:

								break;
						}
						header('Location: index.php?page=tutorats');
					}

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

						$enteteLundi = $tm->trouverDateFormatJourMois(date('W'), date('Y'), 1);
						$enteteMardi = $tm->trouverDateFormatJourMois(date('W'), date('Y'), 2);
						$enteteMercredi = $tm->trouverDateFormatJourMois(date('W'), date('Y'), 3);
						$enteteJeudi = $tm->trouverDateFormatJourMois(date('W'), date('Y'), 4);
						$enteteVendredi = $tm->trouverDateFormatJourMois(date('W'), date('Y'), 5);
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

						if($_GET['annee'] == date('Y'))    //Si quand on spécifie l'année, c'est l'année en cours IRL, on affiche pas l'année dans l'entête de l'EDT
						{
							$enteteLundi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 1);
							$enteteMardi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 2);
							$enteteMercredi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 3);
							$enteteJeudi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 4);
							$enteteVendredi = $tm->trouverDateFormatJourMois($_GET['semaine'], date('Y'), 5);
						}
						else
						{
							$enteteLundi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 1);
							$enteteMardi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 2);
							$enteteMercredi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 3);
							$enteteJeudi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 4);
							$enteteVendredi = $tm->trouverDateFormatJourMoisAnnee($_GET['semaine'], $_GET['annee'], 5);
						}

					}

					elseif (!isset($_GET['semaine']) and isset($_GET['annee']))
					{
							header('Location: index.php?page=tutorats');
					}

					require_once("Views/tutorat/tutorats.php");

				}
			}

/*----------------------------------------COMPTE----------------------------------------*/

			elseif ($_GET["page"] == "monCompte")
			{
				$userID=$_GET['compte'];
				$user=$um2->getUser($userID);
				$messages=$mm->getDerniersMessages($userID);
				$cours=$com->getDerniersCours($userID);
				$tutorats=$tm->getDerniersTutorats($userID);

				if (isset($_POST['validermodif']))
				{
					if(isset($_POST['public']) && $_POST['public']) $public=1;
					else $public=0;
					$edt=$_POST['edt'];
					$tel=$_POST['tel'];
					$pseudo=$_POST['pseudo'];
					$mail=$_POST['mail'];
					$sem=$_POST['semestre'];
					$groupe=$_POST['groupe'];

					if($_FILES['avatar']['error'] == 0)
					{
						$file_name = $_FILES['avatar']['name']; //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.pdf).
						$file_path = 'uploads/avatar/'.$file_name; //Le chemin du r�pertoire dans lequel sera upload� le fichier
						$extension = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //L'extension du fichier
						/*if(in_array($extension, $liste_extension))//Si l'extension du fichier est valide
						{*/
							$size = $_FILES['avatar']['size'] ; //La taille du fichier en octets.
							if($size <= 26214400) //Si la taille du fichier est inf�rieure � 25Mo
							{
								move_uploaded_file($_FILES['avatar']['tmp_name'], $file_path); //On upload le fichier t�l�vers� dans le r�pertoire "avatar"
								$um2 -> setModifCompte($file_name,$tel,$pseudo,$mail, $utilisateurID,$sem,$groupe,$public,$edt);
								$confirm='Les modifications ont bien �t� enregistr�es';
								header('Location: index.php?page=monCompte&compte='.$utilisateurID.'&confirm='.$confirm);
							}
							else
							{
								$error='Le fichier importé est trop volumineux (taille limite : 2Mo ; taille du fichier : '.$size.')';
								header('Location: index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'&error='.$error);
							}
						/*}
						else
						{
							$error='Le type de fichier import� n\'est pas valide (liste d\'extensions support�es : jpg, png, jpeg)';
							header('Location: index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'&error='.$error);
						}*/
					}
					else
					{
						$um2 -> setModifComptewithoutavatar($tel,$pseudo,$mail, $utilisateurID,$sem,$groupe,$public,$edt);
						$confirm='Les modifications ont bien �t� enregistr�es';
						header('Location: index.php?page=monCompte&compte='.$utilisateurID.'&confirm='.$confirm);
					}

				}

				elseif(isset($_GET["actionCompte"]))

				{
					$semestre = $um2 -> getSemestre($utilisateurID);
					$ue = $mom -> getUE($semestre);
					$i=0;
					foreach($ue as $ligne){
						$i=$i+1;
						${'result'.$i}= $mom -> getModulesUE($semestre, $ligne['UE']);
					}


					if($_GET["actionCompte"]=="moyenne"){

						require_once("Views/compte/moyenne.php");

						if(isset($_POST["retour"])){
							header('Location: index.php?page=monCompte&compte='.$utilisateurID);
						}

					}
					
					elseif($_GET["actionCompte"]=="calcul"){

						$i=1;

						foreach($ue as $lolo){

							$totalNotes=0;
							$totalCoeff=0;

							foreach(${'result'.$i} as $ligne)
							{
								$coeff=$ligne["Coefficient"];
								$note=$_POST[$ligne["moduleID"]];
								$totalCoeff+=$coeff;
								$totalNotes+=$coeff*$note;
							}

							${'moyenne'.$i}=round($totalNotes/$totalCoeff, 2);

							$i=$i+1;
						}

						$totalMoyenne=0;
						$j=1;

						while($j<$i){
							$totalMoyenne=$totalMoyenne+${'moyenne'.$j};
							$j=$j+1;
						}

						$moyenne=round($totalMoyenne/($i-1),2);

						require_once("Views/compte/moyenne.php");

					}

					elseif($_GET["actionCompte"]=="modifierCompte"){

							if(isset($_GET['error']))
							{
								$error=$_GET['error'];
							}
							require_once("Views/compte/modifiercompte.php");
					}
					
					elseif($_GET["actionCompte"]=="stats"){
					
						if(isset($_GET['error']))
						{
							$error=$_GET['error'];
						}
						$stats = $stm -> getStats($utilisateurID);
						require_once("Views/compte/statistiques.php");
					}
					
					elseif($_GET["actionCompte"]=="pref"){
							
						if(isset($_GET['error']))
						{
							$error=$_GET['error'];
						}
						require_once("Views/compte/preferences.php");
					}
				}

				else
				{
					require_once("Views/compte/moncompte.php");
				}
			}

/*----------------------------------------GROUPE----------------------------------------*/

			 elseif ($_GET["page"] == "groupe")
			 {
			 	if(isset($_GET['actionGroupe']))
			 	{
			 		if($_GET['actionGroupe']=="annonce")
			 		{
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$groupe=$gm->getGroupe($groupeID);
			 			$listeGroupe=$um2->getListeGroupe($groupeID);
			 			$annonceID=$_GET['ida'];
			 			$annonce=$am->getAnnonce($annonceID);
			 			$nbEpingle=count($am->getEpingles($groupeID,$annonce['type']));
			 			$comments=$cm->getCommentaires($annonceID);
			 			require_once("Views/groupe/annonce.php");
			 		}
			 		if($_GET['actionGroupe']=="ressources")
			 		{
			 			require_once("Views/groupe/ressources.php");
			 		}
			 		elseif($_GET['actionGroupe']=="election")
			 		{
			 			require_once("Views/groupe/election.php");
			 		}
			 		elseif($_GET['actionGroupe']=="ajout_annonce")
			 		{
			 			$type=$_POST['type'];
			 			$nom=$_POST['nom'];
			 			$message=nl2br($_POST['message']);
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$annonceID=$am->setAnnonce($groupeID, $utilisateurID, $type, $nom, $message);
			 			header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonce['annonceID']);
			 		}
			 		elseif($_GET['actionGroupe']=="ajout_commentaire")
			 		{
			 			$message=nl2br($_POST['message']);
			 			$annonceID=$_GET['ida'];
			 			$cm->setCommentaire($utilisateurID, $message, $annonceID);
			 			header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 		}
			 		elseif($_GET['actionGroupe']=="editer")
			 		{
			 			$annonceEdition=$_GET['ida'];
			 			$annonce=$am->getAnnonce($annonceEdition);
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$groupe=$gm->getGroupe($groupeID);
			 			$nbEpingle=count($am->getEpingles($groupeID,$annonce['type']));
			 			if($utilisateurID==$annonce['auteurID'] || $groupe['responsable']==$utilisateurID)
			 			{
			 				$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 				$groupe=$gm->getGroupe($groupeID);
			 				$listeGroupe=$um2->getListeGroupe($groupeID);
			 				require_once("Views/groupe/annonce.php");
			 			}
			 			else
			 			{
			 				require_once("Views/groupe/annonce.php");
			 			}
			 		}
			 		elseif($_GET['actionGroupe']=="modif_annonce")
			 		{
			 			$annonceID=$_GET['ida'];
			 			$message=nl2br($_POST['message']);
		 				$am->setContenu($annonceID, $message);
		 				header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 		}
			 		elseif($_GET['actionGroupe']=="supprimer")
			 		{
			 			$annonceID=$_GET['ida'];
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$groupe=$gm->getGroupe($groupeID);
			 			$auteurID=$am->getAuteurAnnonce($annonceID);
			 			if($utilisateurID==$auteurID || $groupe['responsable']==$utilisateurID)
			 			{
			 				$am->supprAnnonce($annonceID);
			 				header('Location: index.php?page=groupe');
			 			}
			 			else
			 			{
			 				header('Location: index.php?page=groupe');
			 			}
			 		}
			 		elseif($_GET['actionGroupe']=="epingler")
			 		{
			 			$annonceID=$_GET['ida'];
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$groupe=$gm->getGroupe($groupeID);
			 			$auteurID=$am->getAuteurAnnonce($annonceID);
			 			if($utilisateurID==$auteurID || $groupe['responsable']==$utilisateurID)
			 			{
			 				$am->epingler($annonceID);
			 				header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 			}
			 			else
			 			{
			 				header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 			}
			 		}
			 		elseif($_GET['actionGroupe']=="desepingler")
			 		{
			 			$annonceID=$_GET['ida'];
			 			$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 			$groupe=$gm->getGroupe($groupeID);
			 			$auteurID=$am->getAuteurAnnonce($annonceID);
			 			if($utilisateurID==$auteurID || $groupe['responsable']==$utilisateurID)
			 			{
			 				$am->prioriser($annonceID,$groupeID,$_GET['channel']);
			 				header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 			}
			 			else
			 			{
			 				header('Location: index.php?page=groupe&actionGroupe=annonce&ida='.$annonceID);
			 			}
			 		}
			 	}
			 	else //Sinon on affiche la page d'annonces avec le channel correspondant
			 	{
			 		$groupeID=$um2->getUserGroupe($_SESSION ['Login']);
			 		$groupe=$gm->getGroupe($groupeID);
			 		$listeGroupe=$um2->getListeGroupe($groupeID);
			 			
			 		$nbParPage=10; //Nombre maximal d'annonce par page (modifiable)
			 		if(isset($_GET['p']) && $_GET['p']>0) //Si un numéro de page est passé en paramètre...
			 		{
			 			$page=$_GET['p']; //... on le stocke
			 		}
			 		else//sinon...
			 		{
			 			$page=1; //...la page par défaut est la première
			 		}
			 		$limiteDeb=($page -1)*$nbParPage; //La position de la premi�re annonce de la table qui sera affiché (0ème pour la première page, 10ème pour la deuxième, 20ème pour la troisième, etc...)
			 			
			 		if(isset($_GET['channel']))
			 		{
			 			$result=$am->getAnnoncesByType($groupeID,$_GET['channel']);
			 			$annonces=$am->getAnnoncesLimiteByType($groupeID,$limiteDeb,$nbParPage,$_GET['channel']);//On affiche les sujets d'une page (10 au maximum)
			 		}
			 		else
			 		{
			 			$result=$am->getAnnonces($groupeID);
			 			$annonces=$am->getAnnoncesLimite($groupeID,$limiteDeb,$nbParPage);//On affiche les sujets d'une page (10 au maximum)
			 		}
			 			
			 		$nbAnnonces=count($result);
			 		$rapport=intval($nbAnnonces/($nbParPage+1)); //On stocke dans une variable le nombre de pages nécessaires pour tout afficher (valeur entière de la division du nombre total de sujets par le nombre maximal de sujets par page)
			 		require_once("Views/groupe/groupe.php");
			 	}
			 }
			
/*----------------------------------------ADMINISTRATION---------------------------------*/
			
			elseif ($_GET['page'] == "administration")
			{
				$userID=$_GET['compte'];
				$user=$um2->getUser($userID);
				
				if(isset($_GET['actionAdmin']))
				{		
					if($_GET['actionAdmin']=="gestion")
					{
						$utilisateurs=$um2->getUsersByStatut("Etudiant");
						$admins=$um2->getUsersByStatut("Administrateur");
						$tuteurs=$um2->getUsersByStatut("Tuteur");
						$enseignants=$um2->getUsersByStatut("Enseignant");
						$superUsers=$um2->getUsersByStatut("Super-utilisateur");
						require_once('Views/administration/gestion.php');
					}
					elseif($_GET['actionAdmin']=="bannir")
					{
						$compte=$_GET['userID'];
						$um2->ban($compte);
						$confirm="Utilisateur N�$compte banni";
						header('Location: index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					elseif($_GET['actionAdmin']=="retablir")
					{
						$compte=$_GET['userID'];
						$um2->retablir($compte);
						$confirm="Utilisateur N�$compte r�tabli";
						header('Location: index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					elseif($_GET['actionAdmin']=="promotion_admin")
					{
						$compte=$_GET['userID'];
						$um2->setStatut($compte, "Administrateur");
						$confirm="Utilisateur N�$compte promu administrateur";
						header('Location: index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					elseif($_GET['actionAdmin']=="retrograder")
					{
						$compte=$_GET['userID'];
						$um2->setStatut($compte, "Etudiant");
						$confirm="Utilisateur N�$compte r�trograd� �tudiant";
						header('Location: index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					elseif($_GET['actionAdmin']=="supprimer")
					{
						$compte=$_GET['userID'];
						$um2->supprimer($compte);
						$confirm="Utilisateur N�$compte supprim�";
						header('Location: index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					
					elseif($_GET['actionAdmin']=="signalements")
					{
						$signalements=$sim->getSignalements();
						$signalementsResolus=$sim->getSignalementsResolus();
						require_once('Views/administration/signalements.php');
					}
					elseif($_GET['actionAdmin']=="sanctionner")
					{
						$signalementID=$_POST['signalement'];
						$signalement=$sim->getSignalement($signalementID);
						$confirm="Le signalement $signalementID a bien �t� r�solu. Les sanctions suivantes ont �t� prises : ";
						$utilisateur=$um2->getUser($mm->getAuteur($signalement['messageID']));
						if($_POST['avertir']==true)
						{
							//$sim->avertir($utilisateur['mail'],$utilisateur['prenom'],$signalement['sujet'],$signalement['message'], $signalement['sujetID'], $signalement['messageID'], $signalement['contenu']);
							$confirm.="<b>avertissement </b>";
						}
						if($_POST['bannir']==true)
						{
							$um2->ban($utilisateur['utilisateurID']);
							$confirm.="<b>bannissement </b>";
						}
						if($_POST['supprimer']==true)
						{
							$cause=$signalement['sujet'];
							$mm->supprMessage("Modération",$cause,$signalement['messageID']);
							$confirm.="<b>suppression </b>";
						}
						$sim->resoudre($signalement['messageID']);
						header('Location: index.php?page=administration&actionAdmin=signalements&compte='.$utilisateurID.'&confirm='.$confirm);
					}
					elseif($_GET['actionAdmin']=="stats")
					{
						require_once('Views/administration/stats.php');
					}
					elseif($_GET['actionAdmin']=="tuteurs")
					{
						require_once('Views/administration/tuteurs.php');
					}
				}
				else
				{
					require_once('Views/administration/administration.php');
				}
			}
			
					

/*----------------------------------------ACCUEIL----------------------------------------*/

			elseif ($_GET["page"] == "accueil")
			{
				$listeSujets = $sm->getSujetTri();
				$listeTutorats = $tm ->getListeCompleteTutorats();
				$listeCours = $com->getListeCours();
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
			$listeTutorats = $tm ->getListeCompleteTutorats();
			$listeCours = $com->getListeCours();
			require_once("Views/accueil.php");
		}

}
else if (isset($_SESSION ['Login']) && !is_null($_SESSION['CodeValidation'])) {
	$loginTmp = $_SESSION ['Login'];
	$_SESSION = array();
	session_unset ();
	session_destroy ();
	//require_once("Views/validation.php");
	header('Location: ./index.php?action=validation&login='.$loginTmp);
	exit(0);
	/*require_once("Views/validation.php");


	if(isset($_POST['identifiantCode']) ){$idAValider = $_POST['identifiantCode'];}
	if(isset($_POST['code']) ){$validation = $um1->testUserCode($idAValider,$_POST['code']);}

	if (isset($validation) && $validation != false){
		$um1->setUserCodeNull($idAValider);
		$_SESSION['CodeValidation'] = $um1->getUserCode($_SESSION ['Login']);
		header('Location: ./');

	}else {
		$erreurValidation = true;


		require_once("Views/validation.php");
	}*/

}
else if(isset($_GET["action"]))
{
	if ($_GET["action"] == "inscription")
	{
		require_once("Views/inscription.php");
	}

	if ($_GET["action"] == "confirmerinscription"){
		if(!empty($_POST['identifiant']) and !empty($_POST['password']) and !empty($_POST['groupe']) and !empty($_POST['prenom']) and !empty($_POST['nom']) and !empty($_POST['statut'])){
			if($_POST['groupe']=='G1S1'){
				$groupe = 1;
			}elseif ($_POST['groupe']=='G2S1'){
				$groupe = 2;
			}elseif ($_POST['groupe']=='G3S1'){
				$groupe = 3;
			}elseif ($_POST['groupe']=='G4S1'){
				$groupe = 4;
			}elseif ($_POST['groupe']=='G5S1'){
				$groupe = 5;
			}elseif ($_POST['groupe']=='G6S1'){
				$groupe = 6;
			}elseif ($_POST['groupe']=='G1S2'){
				$groupe = 7;
			}elseif ($_POST['groupe']=='G2S2'){
				$groupe = 8;
			}elseif ($_POST['groupe']=='G3S2'){
				$groupe = 9;
			}elseif ($_POST['groupe']=='G4S2'){
				$groupe = 10;
			}elseif ($_POST['groupe']=='G6S2'){
				$groupe = 11;
			}elseif ($_POST['groupe']=='G1S3'){
				$groupe = 12;
			}elseif ($_POST['groupe']=='G2S3'){
				$groupe = 13;
			}elseif ($_POST['groupe']=='G3S3'){
				$groupe = 14;
			}elseif ($_POST['groupe']=='G4S3'){
				$groupe = 15;
			}elseif ($_POST['groupe']=='G6S3'){
				$groupe = 16;
			}elseif ($_POST['groupe']=='G1S4'){
				$groupe = 17;
			}elseif ($_POST['groupe']=='G2S4'){
				$groupe = 18;
			}elseif ($_POST['groupe']=='G3S4'){
				$groupe = 19;
			}elseif ($_POST['groupe']=='G4S4'){
				$groupe = 20;
			}elseif ($_POST['groupe']=='G6S4'){
				$groupe = 21;
			}
			$testIdentifiantDejaPris = $um1->getIdentifiant($_POST['identifiant']);
			$mailDejaPris = $um1->getMail($_POST['mail'].'@etu.univ-lyon1.fr');

		if($testIdentifiantDejaPris == false && $mailDejaPris == false)
			{
				$randCode = $um1->random();
				$idTmp =$_POST['identifiant'];
				$testInscription = $um1->addUser($_POST['identifiant'],$_POST['password'],$groupe,$_POST['prenom'],$_POST['nom'],$_POST['pseudo'],$_POST['mail']."@etu.univ-lyon1.fr",$_POST['tel'],$_POST['statut'],$randCode);
				$um1->sendEmail($_POST['identifiant'],$_POST['prenom'],$_POST['mail']."@etu.univ-lyon1.fr",$randCode);
				$randCode = "null";
				header('Location: ./index.php?action=validation&login='.$idTmp);
				//require_once("Views/validation.php");
					//require_once("Views/connexion.php");
				//	echo "<h3>Inscription effectuée avec succès</h3>";

			}else if ($mailDejaPris != false || $testIdentifiantDejaPris != false) {
				if ($testIdentifiantDejaPris != false)
				{
					$testIdentifiantDejaPris = true;
				}
				if ($mailDejaPris != false)
				{
					$mailDejaPris = true;
				}
				require_once("Views/inscription.php");

			}


		}else{
			echo 'Veuillez remplir les champs obligatoires.';
		}
	}
	if ($_GET["action"] == "validation"){
		if(isset($_GET['login']) ){$idAValider = $_GET['login'];}
		require_once("Views/validation.php");
	}


	if ($_GET["action"] == "confirmerValidation"){

		if(isset($_GET['login']) ){$idAValider = $_GET['login'];}
		if(isset($_POST['code']) ){$validation = $um1->testUserCode($idAValider,$_POST['code']);}

		if (isset($validation) && $validation != false){
			$um1->setUserCodeNull($idAValider);
			$erreurValidation = false;
			require_once("Views/connexion.php");
		}else {
			$erreurValidation = true;

			require_once("Views/validation.php");
		}

	}
	if ($_GET["action"] == "renvoyer"){
		require_once("Views/renvoyer.php");
	}

	  if ($_GET["action"] == "confirmerRenvoi"){
		if(isset($_POST['identifiantRenvoi']) ){
			$logTmp = $_POST['identifiantRenvoi'];
			$randCode = $um1->random();
			$firstName = $um1->getUserName($logTmp);
			$userEmail = $um1->getUserEmail($logTmp);
			$um1->sendEmail($logTmp,$firstName['prenom'],$userEmail,$randCode);
			$um1->setUserCode($logTmp,$randCode);
			$randCode ="null";

			header('Location: ./index.php?action=validation&login='.$logTmp);
		}

	}

}
else //si personne n'est connecté, on afficher la page de connexion
{
		require_once("Views/connexion.php");
}



?>
