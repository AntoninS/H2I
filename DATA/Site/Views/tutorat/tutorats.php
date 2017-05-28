
<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';
		ob_start(); //mise en tampon début
		
		echo'<h1>Tutorats</h1>
		<div>';
		/*Tu n'aimes pas le planning ? Fais directement ton choix dans un menu plus conventionnel.*/
		echo '<a href="index.php?page=tutorats&actionTutorat=rejoindreTutorat">Rejoindre un tutorat</a>';
		/*Le tutorat que tu recherches n'est pas plannifié ? Pas de problème, demande-le directement ! 
		Ta demande sera placée dans une liste d'attente et avec un peu de chance, un tuteur y répondra. Tu seras alors notifié.*/
		echo '<a href="index.php?page=tutorats&actionTutorat=demandeTutorat">Demande de tutorat</a>';
		/*Sur cette page, tu pourras consulter les tutorats auxquels tu participes et tes 
		demandes de tutorat en attente dans la file.*/
		echo '<a href="index.php?page=tutorats&actionTutorat=consulter">Consulter ses tutorats</a>';
		/*Tu souhaites pouvoir offrir toi-même des tutorats aux autres étudiants ? 
		Rien de plus simple, clique sur ce lien et remplis un formulaire qui sera 
		automatiquement envoyé à l'administration. Tu recevras leur réponse aussi tôt que possible.*/
		echo '<a href="index.php?page=tutorats&actionTutorat=consulter">Devenir tuteur</a>
		</div>';
		
		echo'

		<table>
			<tr>
				<th class="colonneHeure">Heure</th>
				<th class="title">Lundi '.$enteteLundi.'</th>
				<th class="title">Mardi '.$enteteMardi.'</th>
				<th class="title">Mercredi '.$enteteMercredi.'</th>
				<th class="title">Jeudi '.$enteteJeudi.'</th>
				<th class="title">Vendredi '.$enteteVendredi.'</th>
			</tr>';


			foreach ($semaine as $ligne) 	// $semaine est le tableau resultant de la requete SQL qui récupère tout le planning pour une semaine
			{
				echo '
					<tr>
						<td class="colonneHeure">'. $ligne["heurePlanning"] .'h</td>

						<td class='.str_replace(' ', '_', $ligne["lundi"]["nomModule"]).' id="'.$ligne["lundi"]["nbElevesInscrit"].'">
							<a href="index.php?page=tutorats&actionTutorat=rejoindre&id='. $ligne["lundi"]["id"] .'" class="tooltip">
							'. $ligne["lundi"]["nomModule"] .'
								<span class="tooltiptext">Places restantes : '. $ligne["lundi"]["nbPlacesRestantes"] .'</br>Cliquez pour vous inscrire !</span>
							</a>
						</td>

						<td class='.str_replace(' ', '_', $ligne["mardi"]["nomModule"]).' id="'.$ligne["mardi"]["nbElevesInscrit"].'">
							<a href="index.php?page=tutorats&actionTutorat=rejoindre&id='. $ligne["mardi"]["id"] .'" class="tooltip">
							'. $ligne["mardi"]["nomModule"] .'
								<span class="tooltiptext">Places restantes : '. $ligne["mardi"]["nbPlacesRestantes"] .'</br>Cliquez pour vous inscrire !</span>
							</a>
						</td>

						<td class='.str_replace(' ', '_', $ligne["mercredi"]["nomModule"]).' id="'.$ligne["mercredi"]["nbElevesInscrit"].'">
							<a href="index.php?page=tutorats&actionTutorat=rejoindre&id='. $ligne["mercredi"]["id"] .'" class="tooltip">
							'. $ligne["mercredi"]["nomModule"] .'
								<span class="tooltiptext">Places restantes : '. $ligne["mercredi"]["nbPlacesRestantes"] .'</br>Cliquez pour vous inscrire !</span>
							</a>
						</td>

						<td class='.str_replace(' ', '_', $ligne["jeudi"]["nomModule"]).' id="'.$ligne["jeudi"]["nbElevesInscrit"].'">
							<a href="index.php?page=tutorats&actionTutorat=rejoindre&id='. $ligne["jeudi"]["id"] .'" class="tooltip">
							'. $ligne["jeudi"]["nomModule"] .'
								<span class="tooltiptext">Places restantes : '. $ligne["jeudi"]["nbPlacesRestantes"] .'</br>Cliquez pour vous inscrire !</span>
							</a>
						</td>

						<td class='.str_replace(' ', '_', $ligne["vendredi"]["nomModule"]).' id="'.$ligne["vendredi"]["nbElevesInscrit"].'">
							<a href="index.php?page=tutorats&actionTutorat=rejoindre&id='. $ligne["vendredi"]["id"] .'" class="tooltip">
							'. $ligne["vendredi"]["nomModule"] .'
								<span class="tooltiptext">Places restantes : '. $ligne["vendredi"]["nbPlacesRestantes"] .'</br>Cliquez pour vous inscrire !</span>
							</a>
						</td>

					</tr>
				';
				//Dans class on récupère le nom du module, par exemple "Programmation_C". Si il n'y a pas de module (valeur NULL dans le planning), on utilise td[class=''] dans le css
			}
		echo'</table>';

		// TODO : RAJOUTER verification qu'on rentre pas une année trop loin
		echo'<div>';
		if(!isset($_GET['semaine']) and !isset($_GET['annee'])) //si on a pas la semaine ni l'année dans l'URL, ça signifie qu'on calcule le planning par rapport à la semaine dans laquelle on est au jour j
		{
			if(date('W')==52) //Si la semaine actuelle est la 52eme, on passe à l'année suivante quand on fait "semaine suivante"
			{
				$semainePrecedente = date('W')-1;
				$semaineSuivante = 1;
				$anneeSuivante = date('Y')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> Sem. suiv. -> </a></li>
				</ul>
				';
			}
			elseif(date('W')==1) //Si la semaine actuelle est la 1ere, on passe à l'année précedente quand on fait "semaine précédente"
			{
				$semainePrecedente = 52;
				$semaineSuivante = date('W')+1;
				$anneePrecedente = date('Y')-1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. ' "> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
			else 	//si la semaine actuelle n'est ni la 1ere ni la 52eme, on change juste de semaine normalement
			{
				$semainePrecedente = date('W')-1;
				$semaineSuivante = date('W')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '"> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
		}

		elseif(isset($_GET['semaine']) and !isset($_GET['annee'])) //si on a la semaine dans l'URL mais pas l'année, ça signifie qu'on va calculer les semaines suivantes et précedentes du planning par rapport à la semaine spécifiée dans l'URL
		{
			if($_GET['semaine']==52){
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = 1;
				$anneeSuivante = date('Y')+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
			elseif($_GET['semaine']==1)
			{
				$semainePrecedente = 52;
				$semaineSuivante = $_GET['semaine']+1;
				$anneePrecedente = date('Y')-1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. ' "> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
			else
			{
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = $_GET['semaine']+1;

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '"> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
		}

		elseif (isset($_GET['semaine']) and isset($_GET['annee'])) //si on a la semaine et l'année dans l'URL, on va calculer les semaines suivantes et précédentes à l'aide des 2 paramètres
		{
			if($_GET['semaine']==52){
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = 1;
				$anneeSuivante = $_GET['annee']+1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$annee. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$anneeSuivante. ' "> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
			elseif($_GET['semaine']==1)
			{
				$semainePrecedente = 52;
				$semaineSuivante = $_GET['semaine']+1;
				$anneePrecedente = $_GET['annee']-1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$anneePrecedente. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$annee. '"> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
			else
			{
				$semainePrecedente = $_GET['semaine']-1;
				$semaineSuivante = $_GET['semaine']+1;
				$annee =  $_GET['annee'];

				echo '<ul class="listeBoutons">
				<li><a href="index.php?page=tutorats&semaine=' .$semainePrecedente. '&annee=' .$annee. '"> <- Sem. prec. </a></li>
				<li><a href="index.php?page=tutorats">Aujd.</a></li>
				<li><a href="index.php?page=tutorats&semaine=' .$semaineSuivante. '&annee=' .$annee. '"> Sem. Suiv. -> </a></li>
				</ul>
				';
			}
		}
		echo'</div>
			<h2>Liste des demandes de tutorat</h2>
			<ul>';
				if($listeDemandes==null)
				{
					echo '<li>Aucune demande de tutorat</li>';
				}
				else
				{
					foreach($listeDemandes as $ligne)
					{
						echo '<li>'.$ligne["nomModule"];
							
							if($ligne['jour']!=null)
							{
								echo ' le '.$ligne['jour'];
							}
							if($ligne['heureDebut']!=null && $ligne['heureFin']!=null)
							{
								echo ' de '.$ligne['heureDebut'].' à '.$ligne['heureFin'];
							}
							if($ligne['salle']!=null)
							{
								echo ' en '.$ligne['salle'];
							}
							if($ligne['commentaire']!=null)
							{
								echo ' / commentaire : '.$ligne['commentaire'];
							}
							if($ligne['eleve']!=$utilisateurID)
							{
								echo ' <a href="index.php?page=tutorats&actionTutorat=remonterDemande&did='.$ligne['demandeID'].'">+</a>';
							}
							if($ligne['eleve']==$utilisateurID)
							{
								echo ' <a href="index.php?page=tutorats&actionTutorat=supprimerDemande&did='.$ligne['demandeID'].'">Supprimer</a>';
							}
							
						echo '</li>';
					}
				}
		
			echo '</ul>
		</div>';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
