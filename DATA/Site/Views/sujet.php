<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tempon d�but

		echo '<h1>Forum</h1>
		<h2 id="titreSujet"><a href="index.php?page=forum">Forum</a><img class="fleche" src="media/images/flecheDroite.png" alt="vers">'.$sujet['nom'].'</h2>';
		/*<p class="infoSujet">'.$sujet['nbVues'].' vues</p>
		<p class="infoSujet">'.$sujet['nbRep'].' reponses</p>*/
		echo '<a href="index.php?page=forum&actionForum=epingler&id='.$sujet['sujetID'].'" class="buttonEpingle">Epingler le sujet</a>
		<table id="reponses">';
			foreach($messages as $ligne)
			{
				echo '<tr>
					<td id="informations">
						<p class="auteur">'.$ligne['pseudo'].'</p>
						<img class="avatar" alt="account" src="media/images/account.png" />
					</td>
					<td id="rep">
						<p class="date">'.$ligne['dateMessage'].'</p>
						<p>'.$ligne['contenu'].'</p>';
						if($ligne['premierMessage']==False){
							echo '<p><a href="index.php?page=forum&actionForum=supprmessage&idm='.$ligne['messageID'].'" id="delete">Supprimer</a></p>
							<p><a href="index.php?page=forum&actionForum=fermer&idm='.$ligne['messageID'].'" id="delete">Valider</a></p>';
						}
						else{
							echo '
							<p><a href="index.php?page=forum&actionForum=supprmessage&idm='.$ligne['messageID'].'" id="delete">Supprimer</a></p>';
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

		<a href="index.php?page=forum">Retour au forum</a>';

		$content = ob_get_contents(); //r�cupr�ration du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
