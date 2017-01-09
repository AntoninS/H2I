
<?php
		$title='Tutorat';
		$pageCSS='tutorats';
		ob_start(); //mise en tempon début

		echo '
		<table>
			<tr>
				<th class="title">Heure</th>
				<th class="title">Lundi</th>
				<th class="title">Mardi</th>
				<th class="title">Mercredi</th>
				<th class="title">Jeudi</th>
				<th class="title">Vendredi</th>
			</tr>';

			foreach ($semaine as $ligne){
				echo '
					<tr>
						<td>'. $ligne["creneau"] .'</td>
						<td>'. $ligne["lundi"] .'</td>
						<td>'. $ligne["mardi"] .'</td>
						<td>'. $ligne["mercredi"] .'</td>
						<td>'. $ligne["jeudi"] .'</td>
						<td>'. $ligne["vendredi"] .'</td>
					</tr>
				';
			}
		echo'</table>';

		if(!isset($_GET['semaine'])){
				$semainePrecedente = date('W')-1; //problème, on continue même apres 52....
				$semaineSuivante = date('W')+1;
				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' . $semainePrecedente . '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' . $semaineSuivante . '"> >> </a></li>
				</ul>
				'; //Si la semaine est pas précisée dans l'URL, on va calculer la semaine precedente à partir de la date actuelle

		}
		else{
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = $_GET['semaine']+1;
				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' . $semainePrecedente . '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' . $semaineSuivante . '"> >> </a></li>
				</ul>
				';
		}

		echo'<a href="index.php?page=tutorats&actionTutorat=ajout">Demander un cours</a>';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
