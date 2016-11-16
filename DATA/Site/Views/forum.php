<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		echo '<h1>Forum</h1>
		<h2>Liste des sujets</h2>
		<table>
			<tr>
				<th></th>
				<th>Sujet</th>
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
						echo '<img class="icone" src="media/images/sujet.png" alt="Sujet">';
					}
					echo '</td>
					<td id="sujet"><a href="index.php?page=forum&sujet='.$ligne['sujetID'].'">'.$ligne['nom'].'</a></td>
					<td id="informations">
						<p class="auteur">'.$ligne['pseudo'].'</p>
						<p>'.$ligne['dateSujet'].'</p>
						<p>'.$ligne['nbVues'].' vues</p>
						<p>'.$ligne['nbRep'].' réponses</p>
					</td>
					<td class="suppr"><a href="index.php?page=forum&actionForum=supprsujet&id='.$ligne['sujetID'].'" id="delete">S</a></td>
				</tr>';
			}
		echo '</table>

		<h3>Ajouter un sujet</h3>';

		if(isset($erreur)){
			echo '<p class="erreur">'.$erreur.'</p>';
		}

		echo '<form method="post" action="index.php?page=forum&actionForum=ajout_sujet">
		  <p><input type="text" name="nom" value="" placeholder="Nom du sujet"></p>
		  <p><textarea name="message" id="message" placeholder="Message du sujet"></textarea></p>
		  <p><input type="submit" value="Publier" class="button"></p>
		</form>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
