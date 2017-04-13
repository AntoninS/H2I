<?php
		$title='Cours';
		$pageCSS='cours';
		ob_start(); //mise en tempon début

		$i1=0;
		$i2=0;
		$i3=0;
		$i4=0;
		
		echo '
				
		<h1>Liste des modules</h1>
				
		<nav id="boxCours">
				
			<a href="index.php?page=cours&actionCours=ajout_cours" id="boutonDemandeTutorat">Ajouter une ressource</a>

			<ul>
		
				<li id="s1">Semestre 1</li>';
				
					echo '<div id="coursS1">
							
						<table>';
					
							foreach($ue1 as $ue)
							{
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue1Modules'.$i1} as $ligne)
								{
									echo '<tr>
										<td id="modules"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><img class="icon_module" src="./media/images/'.$ligne['image'].'.png" />'.$ligne['nomModule'].'</a>
									</tr>';
								}
								
								$i1=$i1+1;
								
							}
						
						echo '</table>
					
					</div>

				<li id="s2">Semestre 2</li>';
				
					echo '<div id="coursS2">
							
						<table>';
					
							foreach($ue2 as $ue)
							{
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue2Modules'.$i2} as $ligne)
								{
									echo '<tr>
										<td id="modules"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><img class="icon_module" src="./media/images/'.$ligne['image'].'.png" />'.$ligne['nomModule'].'</a>
									</tr>';
								}
								
								$i2=$i2+1;
								
							}
						
						echo '</table>
					
					</div>

				<li id="s3">Semestre 3</li>';
					
					echo '<div id="coursS3">
							
						<table>';
					
							foreach($ue3 as $ue)
							{
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue3Modules'.$i3} as $ligne)
								{
									echo '<tr>
										<td id="modules"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><img class="icon_module" src="./media/images/'.$ligne['image'].'.png" />'.$ligne['nomModule'].'</a>
									</tr>';
								}
								
								$i3=$i3+1;
								
							}
						
						echo '</table>
					
					</div>

				<li id="s4">Semestre 4</li>';
				
					echo '<div id="coursS4">
							
						<table>
						
							<tr><td><p>Attention : section encore en développement</p></td></tr>
							
						</table>
							
					</div>
			
			</ul>
								
		</nav>

			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
