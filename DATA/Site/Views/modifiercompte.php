<?php
	$title='Modifier compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
	if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">
					
				<form method="post" action=index.php?page=monCompte&compte='.$utilisateurID.' enctype="multipart/form-data">

					<div id="navbox">
						<ul>
							<a href="index.php?page=monCompte&compte='.$userID.'"><li class="tabs">Compte</li></a>
							<a href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'"><li class="tabs">Modifier</li></a>
							<a href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'"><li class="tabs">Moyenne</li></a>
							<a href="index.php?page=monCompte&actionCompte=pref&compte='.$userID.'"><li class="tabs">Préférences</li></a>
							<a href="index.php?page=monCompte&actionCompte=stats&compte='.$userID.'"><li>Statistiques</li></a>
						</ul>
					</div>
						
					<div id="boxInfoUser">';
						
							//Entrez les modifications que vous voulez faire sur votre profil : <br>
							echo '<h2 class="no_pseudo_modif">'.$user['prenom'].' '.$user['nom'].'</h2>
									
							<div class="usr_modif">
								<img id="imgTempo" src="./uploads/avatar/'.$user['avatar'].'" height="200" width="200" alt="Aucune image"/><br>
								<input id="imgInput" type="file" name="avatar" id="avatar"/>';
	
								if(isset($error)){
									echo '<p>'.$error.'</p>';
								}
							echo '</div>
							
							<ul id="modif_ul">';
								if($user['edt']=="index")
								{
									echo '<li><p>Emploi du temps * : </p><input class="short_input" type="text" name="edt" value="" placeholder="EDT Jordan Martin" pattern="[A-Za-z]{3}" title=""aaa""> </li>';
								}
								else 
								{
									echo '<li><p>Emploi du temps * : </p><input class="short_input" type="text" name="edt" value="'.$user['edt'].'" placeholder="EDT Jordan Martin" pattern="[A-Za-z]{3}" title=""aaa""> </li>';
								}
								echo '<li><p>Semestre : </p>';
									if($user['semestre']==1){
										echo '<select id="semestre" name="semestre">
											<option value="1" selected>1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>';
									}
									elseif($user['semestre']==2){
										echo '<select id="semestre" name="semestre">
											<option value="1">1</option>
											<option value="2" selected>2</option>
											<option value="3">3</option>
											<option value="4">4</option>
										</select>';
									}
									elseif($user['semestre']==3){
										echo '<select id="semestre" name="semestre">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3" selected>3</option>
											<option value="4">4</option>
										</select>';
									}
									elseif($user['semestre']==4){
										echo '<select id="semestre" name="semestre">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4" selected>4</option>
										</select>';
									}
								
								echo '</li>
								<li><p>Groupe : </p>';
									if($user['nomGroupe']=="G1"){
										echo '<select name="groupe">
											<option value="G1" selected>G1</option>
											<option value="G2">G2</option>
											<option value="G3">G3</option>
											<option value="G4">G4</option>
											<option value="G5">G5 (Semestre 1 seulement)</option>
											<option value="G6">G6</option>
										</select>';
									}
									elseif($user['nomGroupe']=="G2"){
										echo '<select name="groupe">
											<option value="G1">G1</option>
											<option value="G2" selected>G2</option>
											<option value="G3">G3</option>
											<option value="G4">G4</option>
											<option value="G5">G5 (Semestre 1 seulement)</option>
											<option value="G6">G6</option>
										</select>';
									}
									elseif($user['nomGroupe']=="G3"){
										echo '<select name="groupe">
											<option value="G1">G1</option>
											<option value="G2">G2</option>
											<option value="G3" selected>G3</option>
											<option value="G4">G4</option>
											<option value="G5">G5 (Semestre 1 seulement)</option>
											<option value="G6">G6</option>
										</select>';
									}
									elseif($user['nomGroupe']=="G4"){
										echo '<select name="groupe">
											<option value="G1">G1</option>
											<option value="G2">G2</option>
											<option value="G3">G3</option>
											<option value="G4" selected>G4</option>
											<option value="G5">G5 (Semestre 1 seulement)</option>
											<option value="G6">G6</option>
										</select>';
									}
									elseif($user['nomGroupe']=="G5"){
										echo '<select name="groupe">
											<option value="G1">G1</option>
											<option value="G2">G2</option>
											<option value="G3">G3</option>
											<option value="G4">G4</option>
											<option value="G5" selected>G5 (Semestre 1 seulement)</option>
											<option value="G6">G6</option>
										</select>';
									}
									elseif($user['nomGroupe']=="G6"){
										echo '<select name="groupe">
											<option value="G1">G1</option>
											<option value="G2">G2</option>
											<option value="G3">G3</option>
											<option value="G4">G4</option>
											<option value="G5">G5 (Semestre 1 seulement)</option>
											<option value="G6" selected>G6</option>
										</select>';
									}
								echo '</li>
								<li><p>Pseudo : </p><input class="long_input" type="text" name="pseudo" value="'.$user['pseudo'].'" placeholder="Pseudo"></li>
								<li><p>Email : </p><input class="long_input" type="email" name="mail" value="'.$user['mail'].'" placeholder="Mail"></li>
								<li><p>Numéro de téléphone : </p><input class="long_input" type="tel" name="tel" value="'.$user['tel'].'" placeholder="Téléphone" pattern="[0-9]{10}" title=""0102030405""></li>';
								if($user['statut']=="Administrateur" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
								{
									echo '<li><p id="checkbox">Compte public ** : <input type="checkbox" name="public" value="public" checked="checked" disabled></p></li>';
								}
								elseif($user['public']==true)
								{
									echo '<li><p id="checkbox">Compte public ** : <input type="checkbox" name="public" value="public" checked="checked"></p></li>';
								}
								else
								{
									echo '<li><p id="checkbox">Compte public ** : <input type="checkbox" name="public" value="public"></p></li>';
								}
								
							echo '</ul>
										
							<div class="infos">
								<p>* 3 lettres sont attendues, consultez <a href = "http://edt.jordan-martin.fr/index">EDT</a> pour plus d\'informations </p>
								<p>** Une fois votre compte rendu public, ses informations seront visibles par les autres utilisateurs du site</p>
							</div>
										
							<input id="submit" type="submit" name="validermodif" value="Valider les modification">
									
						</div>
									
					</form>

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
										<li class="titre_bulle">'.$list['titre'].' ('.$list['nomCours'].')</li>
										<li class="date">Le '.$list['dateCours'].'</li>
									</ul>
								</div>
							</a>';
						}
					}
					else
					{
						echo '<p class="message_fin">Aucun cours téléversé récemment.</p>';
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
										<ul>
											<li class="titre_bulle">"'.substr($list['contenu'],0,80).'..."</li>
											<li class="date">Le '.$list['dateMessage'].'</li>
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
							
			</div>';
		}
		
		else
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content				
?>