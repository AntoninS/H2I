
<?php
		$title='Tutorat';
		$pageCSS='tutorat';
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
		echo'
		</table>
		';
		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
