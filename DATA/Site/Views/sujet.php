<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tempon d�but

		echo '<h1>Forum '.$module.'</h1>
		<h2 id="titreSujet">
			<a href="index.php?page=forum">Forums</a>
			<img class="fleche" src="media/images/flecheDroite.png" alt="vers">
			<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'">'.$module.'</a>';
			if($sujet['epingle']==False){
				echo '<img class="fleche" src="media/images/flecheDroite.png" alt="vers">'.$sujet['nom'].'';
			}
			else{
				echo '<img class="fleche" src="media/images/flecheDroite.png" alt="vers">'.$sujet['nom'].' (sujet épinglé)';
			}
		
		echo '</h2>';
			
		if($sujet['epingle']==False){
			echo '<a href="index.php?page=forum&actionForum=epingler&id='.$sujet['sujetID'].'" class="buttonEpingle">Epingler le sujet</a>';
		}
		
		echo '<table id="reponses">';
			foreach($messages as $ligne)
			{
				echo '<tr>
					<td id="informations">
						<p class="auteur">'.$ligne['prenom'].'</p>
						<img class="avatar" alt="account" src="media/images/account.png" />
					</td>
					<td id="rep">
						<p class="date">'.$ligne['dateMessage'].' à</p>';
						
						if($ligne['messageValide']==True){
							echo '<p class="valide">Message validé comme réponse au sujet par un enseignant ou un membre compétent :</p>';
						}
						
						echo '<p>'.$ligne['contenu'].'</p>
						<p><a href="index.php?page=forum&actionForum=supprmessage&idm='.$ligne['messageID'].'"><img class="poubelle" src="media/images/poubelle.png" alt="poubelle"></a></p>';
						if($sujet['clos']==False && $ligne['premierMessage']==False){
							echo '<p><a href="index.php?page=forum&actionForum=fermer&idm='.$ligne['messageID'].'" id="delete">Valider</a></p>';
						}
					echo '</td>
				</tr>';
			}
		echo '</table>

		<h3>Ajouter un message</h3>

		<form method="post" action="index.php?page=forum&actionForum=ajout_message">
		  <p><input type="hidden" name="id" value='.$sujet['sujetID'].'></p>
		  <p><textarea name="message" id="message" placeholder="Contenu du message"></textarea></p>
		  <p><input type="submit" value="Publier" class="button"></p>
		</form>

		<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'">Retour au forum</a>';

		$content = ob_get_contents(); //r�cupr�ration du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
