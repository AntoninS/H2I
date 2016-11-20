
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

		/* echo'
		<input type = "button" name = "precedent" value = "<-- Sem. prec." onclick = ""/>'; */
		if(!isset($_GET['semaine'])){
				echo '<td class="suppr"><a href="index.php?page=tutorats&semaine='.date('W')-1'"></a>'; //Si la semaine est pas précisée dans l'URL, on va calculer la semaine precedente à partir de la date actuelle
		}
		else{
				echo '<td class="suppr"><a href="index.php?page=tutorats&semaine='.$_GET['semaine']-1'"></a>';
		}

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
