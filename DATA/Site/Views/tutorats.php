
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

		if(!isset($_GET['semaine']) and !isset($_GET['annee']) ){ 				//si on a pas la semaine ni l'année dans l'URL
			if(date('W')==52){
				$semainePrecedente = date('W')-1;
				$semaineSuivante = 1;
				$anneeSuivante = date('Y')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> >> </a></li>
				</ul>
				';
			}
			elseif(date('W')==1){
				$semainePrecedente = 52;
				$semaineSuivante = date('W')+1;
				$anneePrecedente = date('Y')-1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. ' "> >> </a></li>
				</ul>
				';
			}
			else{
				$semainePrecedente = date('W')-1;
				$semaineSuivante = date('W')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '"> >> </a></li>
				</ul>
				';
			}
		}

		elseif(isset($_GET['semaine']) and !isset($_GET['annee']) ){
			if($_GET['semaine']==52){
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = 1;
				$anneeSuivante = date('Y')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> >> </a></li>
				</ul>
				';
			}
			elseif($_GET['semaine']==1){
				$semainePrecedente = 52;
				$semaineSuivante = $_GET['semaine']+1;
				$anneePrecedente = date('Y')-1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. ' "> >> </a></li>
				</ul>
				';
			}
			else{
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = $_GET['semaine']+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '"> >> </a></li>
				</ul>
				';
			}
		}

		elseif (!isset($_GET['semaine']) and isset($_GET['annee']) ) {
			echo'Erreur : année précisée mais semaine non précisée.';
		}

		elseif (isset($_GET['semaine']) and isset($_GET['annee']) ) {
			if($_GET['semaine']==52){
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = 1;
				$anneeSuivante = $_GET['annee']+1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$annee. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> >> </a></li>
				</ul>
				';
			}
			elseif($_GET['semaine']==1){
				$semainePrecedente = 52;
				$semaineSuivante = $_GET['semaine']+1;
				$anneePrecedente = $_GET['annee']-1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$annee. '"> >> </a></li>
				</ul>
				';
			}
			else{
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = $_GET['semaine']+1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$annee. '"> << </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$annee. '"> >> </a></li>
				</ul>
				';
			}
		}



		echo'<a href="index.php?page=tutorats&actionTutorat=ajout">Demander un cours</a>';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
