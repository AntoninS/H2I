
<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';
		ob_start(); //mise en tampon début
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

			foreach ($semaine as $ligne) 	// $semaine est le tableau resultant de la requete SQL qui récupère tout le planning pour une semaine
			{
				echo '
					<tr>
						<td class="colonneHeure">'. $ligne["heurePlanning"] .'</td>
						<td class='. str_replace(' ', '_', $ligne["lundi"]) .'>'. $ligne["lundi"] .'</td>
						<td class='. str_replace(' ', '_', $ligne["mardi"]) .'>'. $ligne["mardi"] .'</td>
						<td class='. str_replace(' ', '_', $ligne["mercredi"]) .'>'. $ligne["mercredi"] .'</td>
						<td class='. str_replace(' ', '_', $ligne["jeudi"]) .'>'. $ligne["jeudi"] .'</td>
						<td class='. str_replace(' ', '_', $ligne["vendredi"]) .'>'. $ligne["vendredi"] .'</td>
					</tr>
				';
				//Dans class on récupère le nom du module, par exemple "Programmation_C". Si il n'y a pas de module (valeur NULL dans le planning), on utilise td[class=''] dans le css
			}
		echo'</table>';

		// TODO : RAJOUTER verification qu'on rentre pas une année trop loin

		if(!isset($_GET['semaine']) and !isset($_GET['annee']) ){ 				//si on a pas la semaine ni l'année dans l'URL, ça signifie qu'on calcule le planning par rapport à la semaine dans laquelle on est au jour j
			if(date('W')==52){	//Si la semaine actuelle est la 52eme, on passe à l'année suivante quand on fait "semaine suivante"
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
			elseif(date('W')==1){ //Si la semaine actuelle est la 1ere, on passe à l'année précedente quand on fait "semaine précédente"
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
			else{		//si la semaine actuelle n'est ni la 1ere ni la 52eme, on change juste de semaine normalement
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

		elseif(isset($_GET['semaine']) and !isset($_GET['annee']) ){		//si on a la semaine dans l'URL mais pas l'année, ça signifie qu'on va calculer les semaines suivantes et précedentes du planning par rapport à la semaine spécifiée dans l'URL
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

		elseif (!isset($_GET['semaine']) and isset($_GET['annee']) ) { //si on a que l'année dans l'URL on affiche une erreur
			echo'Erreur : année précisée mais semaine non précisée.'; //A FAIRE : mieux gerer l'erreur
		}

		elseif (isset($_GET['semaine']) and isset($_GET['annee']) ) {		//si on a la semaine et l'année dans l'URL, on va calculer les semaines suivantes et précédentes à l'aide des 2 paramètres
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
