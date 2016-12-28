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
				<table id="tablecours">
					<thead>
						<tr>
							<th>Titre du cours</th>
							<th>Auteur du cours</th>
							<th>Télécharger le fichier</th>
						</tr>
					</thead>
					<tbody>
							';
							foreach ($cours as $cour)
							{
								echo '<tr><td>'.$cour['titre'].'</td>';
								echo '<td>'.$cour['pseudo'].'</td>';
								echo '<td><a href="'.$cour['fileURL'].'">'.$cour['nomCours'].'</a></td></tr>';
							}
								echo '
				<tbody>
			</table>
	</nav>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
