<?php
		$title='Mon compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
		if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">
					
				<div id="navbox">
					<ul>
						<a href="index.php?page=monCompte&compte='.$userID.'"><li class="current">Compte</li></a>
						<a href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'"><li class="tabs">Modifier</li></a>
						<a href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'"><li class="tabs">Moyenne</li></a>
						<a href="index.php?page=monCompte&actionCompte=pref&compte='.$userID.'"><li class="tabs">Préférences</li></a>
						<a href="index.php?page=monCompte&actionCompte=stats&compte='.$userID.'"><li class="last_tab">Statistiques</li></a>
					</ul>
				</div>

				<div id="boxInfoUser">';
					
					if(isset($_GET['confirm']))
					{
						echo '<p id="confirm">'.$_GET['confirm'].'</p>';
					}
					
					echo '<ul>
								
						<div class="usr">
								
							<img  src="./uploads/avatar/'.$user['avatar'].'"  width="200" height="200"/>';
										
							if ($user['pseudo']==NULL) 
							{
								echo '<h2 id="nom_profil">'.$user['prenom'].'<br><span id="prenom">'.$user['nom'].'</span></h2>';
								
								echo '<div id="usr_info">';
								
									if($statutUtilisateur=="Administrateur") echo '<p><a href="index.php?page=administration&compte='.$utilisateurID.'">'.$user['statut'].'</a></p>';
									else echo '<p>'.$user['statut'].'</p>';
									
									if($user['nomGroupe']!=NULL) echo '<p>'.$user['nomGroupe'].'S'.$user['semestre'].'</p>';
							}
									
							else 
							{
								echo '<h2 id="nom_profil">'.$user['pseudo'].'</h2>';
								
								echo '<div id="usr_info">';
								
								echo '<p>'.$user['prenom'].'<br>'.$user['nom'].'</p>';
								
								if($statutUtilisateur=="Administrateur") echo '<p><a href="index.php?page=administration&compte='.$utilisateurID.'">'.$user['statut'].'</p>';
								else echo '<p>'.$user['statut'].'</p>';
								
								if($user['nomGroupe']!=NULL) echo '<p>'.$user['nomGroupe'].'S'.$user['semestre'].'</p>';
							}
																	
							echo '</div>
						
						</div>
								
						<div class="usr_side">
						
							<h3 id="contacts_titre">Contact</h3>
									
							<div id="contacts">';
							
								if ($user['tel']!=NULL)  echo '<li class="label">Téléphone : <span class="info">'.$user['tel'].'</span></li>';
								else echo '<li class="label">Téléphone : <span class="info">non communiqué</span></li>';
								  
								if ($user['mail']!=NULL) echo '<li class="label">Mail : <span class="info">'.$user['mail'].'</span></li>';
								else echo '<li class="label">Mail : <span class="info">non communiqué</span></li>';
								
								echo '<li class="label">Site perso : <span class="info">non communiqué</span></li>
							
							</div>
										
							<h3 id="infos_titre">Infos personnelles</h3>
										
							<div id="infos_perso">
										
								<li>Age :</li>
								<li>Parcours : </li>
										
							</div>
										
							<h3 id="outils_titre">Outils</h3>
									
							<div id="outils">
									
								<li class="outils"><a href="http://edt.jordan-martin.fr/'.$user["edt"].'">Mon emploi du temps</a></li>
								<li class="outils"><a href="index.php?page=groupe">Ma page de groupe</a></li>
					  		
							</div>';
									
						echo '</div>
					
					</ul>
								
				</div>

			<div id="news">
			
				<div class = "ressources">
					<h3>Mes ressources</h3>';
					if($cours!=false)
					{
						foreach($cours as $list)
						{
							echo '
							<a  href="index.php?page=cours&actionCours=afficher&moduleID='.$list['moduleIDC'].'#'.$list['coursID'].'">
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['nomCours'].'.'.$list['type'].'</li>
										<li class="date">Le '.$list['dateCours'].'</li>
									</ul>
								</div>
							</a>';
						}
					}
					else
					{
						echo '<p class="message_fin">Aucune ressource téléversée récemment.</p>';
					}
				echo '</div>
			
				<div class ="forum">
					<h3>Mes messages</h3>';
						if($messages!=false)
						{
							foreach($messages as $list)
							{
								echo '
								<a  href="index.php?page=forum&sujet='.$list['sujetID'].'#'.$list['messageID'].'">
									<div id="bulle">
										<ul>';
											if(strlen($list['contenu'])>80)
											{
												echo '<li class="titre_bulle">"'.substr($list['contenu'],0,80).'..."</li>';
											}
											else
											{
												echo '<li class="titre_bulle">"'.$list['contenu'].'"</li>';
											}
											echo '<li class="date">Le '.$list['dateMessage'].'</li>
											<li class="sujet">Sur le sujet "<span class="nom_sujet">'.$list['nom'].'</span>"</li>
										</ul>
									</div>
								</a>';
							}
						}
						else
						{
							echo '<p class="message_fin">Aucun message publié récemment.</p>';
						}
				echo '</div>
								
				<div class ="tutorat">
					<h3>Tutorats à venir</h3>';
					if($tutorats!=false)
					{
						foreach($tutorats as $list)
						{
							echo '<a  href="index.php?page=tutorats&actionTutorat=consulter">
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['nomModule'].'</li>
										<li class="date">Le '.date_format(new DateTime($list['jour']),"d/m/Y").', de '.substr($list['heureDebut'], 0, 2).'h à '.substr($list['heureFin'], 0, 2).'h en '.$list['salle'].'</li>
									</ul>
								</div>
							</a>';
						}
					}
					else
					{
						echo '<p class="message_fin">Aucun tutorat prochainement</p>';
					}
				echo '</div>
			</div>
							
		</div>	';
				
		}
		
		//Si le compte demandé est public ou appartient à un admin, enseignant ou tuteur
		elseif($user['public']==true || $user['statut']=="Administrateur" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
		{
			echo '
			<div id="corpsMonCompte">
			
			  <div id="boxInfoUser">';
					
					if(isset($_GET['confirm']))
					{
						echo '<p id="confirm">'.$_GET['confirm'].'</p>';
					}
					
					echo '<ul>
								
						<div class="usr">
								
							<img  src="./uploads/avatar/'.$user['avatar'].'"  width="200" height="200"/>';
										
							if ($user['pseudo']==NULL) 
							{
								echo '<h2 id="nom_profil">'.$user['prenom'].'<br><span id="prenom">'.$user['nom'].'</span></h2>';
								
								echo '<div id="usr_info">';
								
									if($statutUtilisateur=="Administrateur") echo '<p>'.$user['statut'].'</p>';
									else echo '<p>'.$user['statut'].'</p>';
									
									if($user['nomGroupe']!=NULL) echo '<p>'.$user['nomGroupe'].'S'.$user['semestre'].'</p>';
							}
									
							else 
							{
								echo '<h2 id="nom_profil">'.$user['pseudo'].'</h2>';
								
								echo '<div id="usr_info">';
								
								echo '<p>'.$user['prenom'].'<br>'.$user['nom'].'</p>';
								
								if($statutUtilisateur=="Administrateur") echo '<p><a href="index.php?page=administration&compte='.$utilisateurID.'">'.$user['statut'].'</a></p>';
								else echo '<p>'.$user['statut'].'</p>';
								
								if($user['nomGroupe']!=NULL) echo '<p>'.$user['nomGroupe'].'S'.$user['semestre'].'</p>';
							}
																	
							echo '</div>
						
						</div>
								
						<div class="usr_side">
						
							<h3 id="contacts_titre">Contact</h3>
									
							<div id="contacts">';
							
								if ($user['tel']!=NULL)  echo '<li class="label">Téléphone : <span class="info">'.$user['tel'].'</span></li>';
								else echo '<li class="label">Téléphone : <span class="info">non communiqué</span></li>';
								  
								if ($user['mail']!=NULL) echo '<li class="label">Mail : <span class="info">'.$user['mail'].'</span></li>';
								else echo '<li class="label">Mail : <span class="info">non communiqué</span></li>';
								
								echo '<li class="label">Site perso : <span class="info">non communiqué</span></li>
							
							</div>
										
							<h3 id="infos_titre">Infos personnelles</h3>
										
							<div id="infos_perso">
										
								<li>Age :</li>
								<li>Parcours : </li>
										
							</div>
										
						</div>
					
					</ul>
								
				</div>
					
				<div id="news">
			
				<div class = "ressources">
					<h3>Ressources</h3>';
					if($cours!=false)
					{
						foreach($cours as $list)
						{
							echo '
							<a  href="index.php?page=cours&actionCours=afficher&moduleID='.$list['moduleIDC'].'#'.$list['coursID'].'">
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['nomCours'].'.'.$list['type'].'</li>
										<li class="date">Le '.$list['dateCours'].'</li>
									</ul>
								</div>
							</a>';
						}
					}
					else
					{
						echo '<p class="message_fin">Aucune ressource téléversée récemment.</p>';
					}
				echo '</div>
			
				<div class ="forum">
					<h3>Messages</h3>';
						if($messages!=false)
						{
							foreach($messages as $list)
							{
								echo '
								<a  href="index.php?page=forum&sujet='.$list['sujetID'].'#'.$list['messageID'].'">
									<div id="bulle">
										<ul>';
											if(strlen($list['contenu'])>80)
											{
												echo '<li class="titre_bulle">"'.substr($list['contenu'],0,80).'..."</li>';
											}
											else
											{
												echo '<li class="titre_bulle">"'.$list['contenu'].'"</li>';
											}
											echo '<li class="date">Le '.$list['dateMessage'].'</li>
											<li class="sujet">Sur le sujet "<span class="nom_sujet">'.$list['nom'].'</span>"</li>
										</ul>
									</div>
								</a>';
							}
						}
						else
						{
							echo '<p class="message_fin">Aucun message publié récemment.</p>';
						}
				echo '</div>
								
				<div class ="tutorat">
					<h3>Tutorats à venir</h3>';
					if($tutorats!=false)
					{
						foreach($tutorats as $list)
						{
							echo '<a  href="index.php?page=tutorats&actionTutorat=consulter">
								<div id="bulle">
									<ul>
										<li class="titre_bulle">'.$list['nomModule'].'</li>
										<li class="date">Le '.date_format(new DateTime($list['jour']),"d/m/Y").', de '.substr($list['heureDebut'], 0, 2).'h à '.substr($list['heureFin'], 0, 2).'h en '.$list['salle'].'</li>
									</ul>
								</div>
							</a>';
						}
					}
					else
					{
						echo '<p class="message_fin">Aucun tutorat prochainement</p>';
					}
				echo '</div>
			</div>
						
		</div>	';
		}
		
		elseif($user['public']==false) //Sinon si le compte est privé
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
