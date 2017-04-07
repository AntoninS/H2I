<?php
		$title='Accueil';
		$pageCSS='accueil';
		ob_start(); //mise en tempon début

		echo '

			<div id="corpsAccueil">

				<article id="coursTutorat">

					<div class="box1">

						<div id="bandeau" >
							<h1>Derniers cours</h1>
						</div>';

						$k = 0;
						if ($listeCours != false)
						{
							foreach($listeCours as $list)
							{

								echo '<a  href="" ><div id="boxCoursAccueil">';
								echo '<asside class="matiere">
											<h2>'.$list['nomModule'].'</h2>

											</asside>
											<p><b>Semestre '.$list['semestre'].'</b></p>
											<p>'.$list['titre'].'</p>
											<p>par '.$list['pseudo'].'</p>


								</div>
								 </a>';
									$k++;
								if($k == 2){break;}
							}
						}
						echo '
					</div>

					<div class="box1">

						<div id="bandeau" >
							<h1>Tutorat</h1>
						</div>

						';

						$j = 0;
						if ($listeTutorats != false)
						{
							foreach($listeTutorats as $list)
							{
								$semaineNb = (new DateTime($list['jour']))->format('W');
								$anneeNb = (new DateTime($list['jour']))->format('Y');
								echo '<a  href="index.php?page=tutorats&semaine='.$semaineNb.'&annee='.$anneeNb.'" ><div id="boxTutoratAccueil">';
								echo '<h3>'.$list['nomModule'].'</h3>
											<ul>

													<li class="dateTutorat">'.$list['jour'].'</li>
													<li class="heureDebut">Début: '.substr($list['heureDebut'],0,5).'</li>
													<li class="heureFin"> Fin: '.substr($list['heureFin'],0,5).'</li>
											</ul>


								</div>
								 </a>';
									$j++;
								if($j == 2){break;}
							}
						}

						echo '<a href=""><b></b></a>

					</div>

				</article>

				<div id="bullesForum">


					';
					$i = 0;
					if ($listeSujets != false)
					{
						foreach($listeSujets as $list)
						{
							echo '<a  href="index.php?page=forum&sujet='.$list['sujetID'].'" ><div id="bulle">';
							echo '<h3>'.$list['nom'].'</h3>
										<ul>
												<li>'.substr($list['message'],0,150).'</li>
												<li class="botBulleDroit">'.$list['nbVues'].' vues dont '.$list['nbRep'].' réponses</li>
												<li class="botBulleGauche" >'.$list['dateSujet'].'</li>
												<li class ="pseudoTopic"> Par '.$list['prenom'].'</li>
										</ul>


							</div>
							 </a>';
								$i++;
							if($i == 3){break;}
						}
					}

					echo '


					<a href="index.php?page=forum"><b>+</b>Nouveau topic</a>

				</div>

			</div>





			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("./Views/layout.php"); //appelle layout avec le nouveau content



?>
