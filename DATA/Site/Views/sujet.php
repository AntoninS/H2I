<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tempon d�but

		echo '<h1>Forum '.$module['nomModule'].'</h1>
		<h2 id="titreSujet">
			<a href="index.php?page=forum">Forums</a>
			<img class="fleche" src="media/images/flecheDroite.png" alt="vers">
			<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'">'.$module['nomModule'].'</a>';
			if($sujet['epingle']==False)
			{
				echo '<img class="fleche" src="media/images/flecheDroite.png" alt="vers">'.$sujet['nom'].'';
			}
			else
			{
				echo '<img class="fleche" src="media/images/flecheDroite.png" alt="vers">'.$sujet['nom'].' (sujet épinglé)';
			}
		
		echo '</h2>
		
		<nav id="optionsSujet">';
			
			if($sujet['epingle']==False && ($statutUtilisateur=="Admin" OR $statutUtilisateur=="Enseignant" OR $statutUtilisateur=="Tuteur" OR $statutUtilisateur=="Superuser") && $module['nbEpingle']<3)
			{
				echo '<a href="index.php?page=forum&actionForum=epingler&id='.$sujet['sujetID'].'" class="buttonEpingle">Epingler le sujet</a>';
			}
			elseif($sujet['epingle']==True && ($statutUtilisateur=="Admin" OR $statutUtilisateur=="Enseignant" OR $statutUtilisateur=="Tuteur" OR $statutUtilisateur=="Superuser"))
			{
				echo '<a href="index.php?page=forum&actionForum=desepingler&id='.$sujet['sujetID'].'" class="buttonEpingle">Détacher le sujet</a>';
			}
			
			echo '<a href="#repondreAncrage" class="buttonEpingle">Répondre</a>
			<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'" class="buttonEpingle">Retour au forum</a>
		
		</nav>';
		
		echo '<table id="reponses">';
			foreach($messages as $ligne)
			{
				echo '<tr>
					<td id="informations">
						<p class="auteur">'.$ligne['prenom'].'</p>
						<img class="avatar" alt="account" src="media/images/account.png" />
					</td>';
					if(isset($messageEdition) AND $ligne['messageID']==$messageEdition)
					{
						echo '<td id="rep">
							<form method="post" action="index.php?page=forum&actionForum=modif_message">
							  <p><input type="hidden" name="id" value='.$ligne['messageID'].'></p>
							  <p><textarea name="message" id="message" placeholder="">'.$contenu.'</textarea></p>
							  <p><input type="submit" value="Publier" class="button"></p>
							</form>
						</td>';
					}
					else
					{
						echo '<td id="rep">
						<p class="date">'.$ligne['dateMessage'].'</p>';
						
						if($ligne['messageValide']==True)
						{
							echo '<p class="valide">Message validé comme réponse au sujet par un enseignant ou un membre compétent :</p>';
						}
						
						echo '<p id="contenu">'.$ligne['contenu'].'</p>';
						
						if($ligne['modification']!=NULL)
						{
							echo '<p class="dateModif">Message modifié le '.$ligne['modification'].'</p>';
						}
						
						if($ligne['auteurID']==$utilisateurID || $statutUtilisateur=="Admin")
						{
							echo '<p><a href="index.php?page=forum&actionForum=supprmessage&idm='.$ligne['messageID'].'"><img class="poubelle" src="media/images/poubelle.png" alt="poubelle"></a></p>';
							echo '<p><a href="index.php?page=forum&actionForum=editer&idm='.$ligne['messageID'].'" id="delete">Editer</a></p>';
						}
						else
						{
							echo '<p><a href="index.php?page=forum&actionForum=signaler&idm='.$ligne['messageID'].'"><img class="poubelle" src="media/images/signaler.png" alt="signaler" title="Signaler le message"></a></p>';
						}
						
						if($sujet['clos']==False && $ligne['premierMessage']==False && ($statutUtilisateur=="Enseignant" || $statutUtilisateur=="Tuteur" || $statutUtilisateur=="Superuser"))
						{
							echo '<p><a href="index.php?page=forum&actionForum=fermer&idm='.$ligne['messageID'].'" id="delete">Valider</a></p>';
						}
						elseif($ligne['messageValide']==True && ($statutUtilisateur=="Enseignant" || $statutUtilisateur=="Tuteur" || $statutUtilisateur=="Superuser"))
						{
							echo '<p><a href="index.php?page=forum&actionForum=ouvrir&idm='.$ligne['messageID'].'" id="delete">Invalider</a></p>';
						}
						echo '</td>';
					}
				echo '</tr>';
			}
		echo '</table>

		<span id="repondreAncrage">';
		
			if($sujet['clos']==False)
			{
				echo '<h3>Ajouter un message</h3>

				<form method="post" action="index.php?page=forum&actionForum=ajout_message">
				  <p><input type="hidden" name="id" value='.$sujet['sujetID'].'></p>
				  <p><textarea name="message" id="message" placeholder="Contenu du message"></textarea></p>
				  <p><input type="submit" value="Publier" class="button"></p>
				</form>';
			}
			else
			{
				echo '<p class="erreur">Ce sujet a été validé. Il est impossible de publier de nouvelles réponses sauf s"il est invalidé par un membre habilité.</p>';
			}
			
		echo '</span>';

		$content = ob_get_contents(); //r�cupr�ration du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
