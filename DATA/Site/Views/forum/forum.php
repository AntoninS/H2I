<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		echo '<h1>Forum</h1>
		<a id="retour" href="index.php?page=forum">Retour à la liste des forums</a>
		<h3>Semestre '.$semestre.'</h3>
		<h2>Module de '.$module.'</h2>';

		if($sujets==null)
		{
			echo '<table>
				<tr>
					<th>Sujets</th>
				</tr>
				<tr>
					<td>
						<p id="nosujet">Aucun sujet disponible dans ce forum</p>
					</td>
				</tr>
			</table>';
		}

		else
		{
			echo '<div id="no">';

				if($rapport+1!=1)
				{
					for($i=1 ; $i<=$rapport+1 ; $i++)
					{
						if($i==$page)
						{
							echo '<span class="noCurrentPage">'.$i.'</span>';
						}
						else
						{
							echo '<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'&p='.$i.'" class="noPage">'.$i.'</a>';
						}
					}
				}

			echo '</div>

			<table>
				<tr>
					<th></th>
					<th>Sujets</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>';
				foreach($sujets as $ligne)
				{
					echo '<tr>
						<td id="celluleIcone">';
						if ($ligne['epingle']==True){
							echo '<img class="icone" src="media/images/epingle.png" alt="Sujet épinglé">';
						}
						elseif($ligne['clos']==True){
							echo '<img class="icone" src="media/images/clos.png" alt="Sujet clos">';
						}
						else{
							echo '<img class="icone" src="media/images/sujet.png" alt="Sujet ouvert">';
						}
						echo '</td>
						<td id="sujet">
							<a href="index.php?page=forum&sujet='.$ligne['sujetID'].'">
								<p class="nomSujet">'.$ligne['nom'].'</p>';
								if($ligne['pseudo']==NULL){
									echo '<p class="createurSujet">Créé par '.$ligne['prenom'].' le '.$ligne['dateSujet'].'</p>';
								}
								else
								{
									echo '<p class="createurSujet">Créé par '.$ligne['pseudo'].' le '.$ligne['dateSujet'].'</p>';
								}
							echo '</a>
						</td>

						<td id="dernierMessage">
							<p>Dernier message par</p>';
							if($ligne['pseudoMessage']==NULL)
							{
								echo '<p class="auteur">'.$ligne['prenomMessage'].'</p>';
							}
							else
							{
								echo '<p class="auteur">'.$ligne['pseudoMessage'].'</p>';
							}
							echo '<p>'.$ligne['dateMessage'].'</p>
						</td>

						<td id="informations">
							<p>'.$ligne['nbVues'].' vues</p>
							<p>'.$ligne['nbRep'].' messages</p>
						</td>';

					echo '</tr>';
				}
			echo '</table>

			<div id="no">';

				if($rapport+1!=1)
				{
					for($i=1 ; $i<=$rapport+1 ; $i++)
					{
						if($i==$page)
						{
							echo '<span class="noCurrentPage">'.$i.'</span>';
						}
						else
						{
							echo '<a href="index.php?page=forum&actionForum=afficher&moduleID='.$moduleID.'&p='.$i.'" class="noPage">'.$i.'</a>';
						}
					}
				}

			echo '</div>';
		}

		echo '<h3 id="error_anchor">Ajouter un sujet</h3>';

		if(isset($erreur)){
			echo '<p class="erreur">'.$erreur.'</p>';
		}
		
		if($ban==FALSE)
		{
			echo '<form method="post" action="index.php?page=forum&actionForum=ajout_sujet&moduleID='.$moduleID.'">
			  <p><input type="hidden" name="moduleID" value="'.$moduleID.'"></p>
			  <p id="checkbox_anonyme"><input type="checkbox" name="anonyme">Anonyme (votre pseudo et votre profil ne seront pas accessibles)</p>
			  <p><input type="text" name="nom" value="" placeholder="Nom du sujet"></p>
			  <p><textarea name="message" id="message" placeholder="Message du sujet"></textarea></p>
			  <p><input type="submit" value="Publier" class="button"></p>
			</form>';
		}

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
