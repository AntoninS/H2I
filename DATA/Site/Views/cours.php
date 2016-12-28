<?php
		$title='Cours';
		$pageCSS='cours';
		ob_start(); //mise en tempon début

		echo '
		<h1>Liste des cours de '.$nomModule.'</h1>
		<nav id="boxCours">

				<div id ="ajoutCours">
					<a href="index.php?page=cours&actionCours=ajout_cours" id="boutonDemandeTutorat">Ajouter un nouveau cours</a>
				</div>

				<h2>
					<a href="index.php?page=forum">Cours</a>
					<img class="fleche" src="media/images/flecheDroite.png" alt="vers">
					<a href="index.php?page=cours&actionCours=afficher&moduleID='.$moduleID.'">'.$nomModule.'</a>
				</h2>
				<table>
					<tr>
						<th>Nom du cours</th>
						<th>Auteur du cours</th>
					</tr>';

					foreach ($cours as $ligne)
					{
						echo '<tr>
							<td>'.$ligne['nomCours'].'</td>
							<td>'.$ligne['pseudo'].'</td>';

					}
					echo '</tr>
				</table>



		</nav>

			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
