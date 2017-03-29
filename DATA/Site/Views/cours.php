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


					<a href="index.php?page=forum"><h2>Cours</h2></a>


				<table id="tablecours">
					<thead>
						<tr>
							<th>Titre du cours</th>
							<th>Auteur du cours</th>
							<th>Nom du fichier</th>
							<th>Télécharger le fichier</th>
						</tr>
					</thead>
					<tbody>
							';
							foreach ($cours as $cour)
							{
								echo '<tr id="'.$cour['coursID'].'"><td>'.$cour['titre'].'</td>';
								echo '<td>'.$cour['pseudo'].'</td>';
								echo '<td>'.$cour['nomCours'].'</td>';
								echo '<td class="suppr"><a href="index.php?page=cours&actionCours=telecharger&url='.$cour['fileURL'].'"><img class="poubelle" src="media/images/telechargement.png" alt="poubelle"></a></td></tr>';

							}
								echo '
				<tbody>
			</table>
	</nav>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
