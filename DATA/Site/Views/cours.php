<?php
		$title='Cours';
		$pageCSS='cours';
		ob_start(); //mise en tempon début

		$i1=0;
		$i2=0;
		$i3=0;
		$i4=0;
		
		echo '<div id="main">
			<h1>Module de '.$nomModule.'</h1>
				<h2>Liste des ressources</h2>
					
			<nav id="arborescence">
				<ul>
			
					<li id="s1_arbo">Semestre 1</li>';
					
						echo '<div id="coursS1_arbo">
								
							<table>';
						
								foreach($ue1 as $ue)
								{
									echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue1Modules'.$i1} as $ligne)
									{
										echo '<tr>
											<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>
										</tr>';
									}
									
									$i1=$i1+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s2_arbo">Semestre 2</li>';
					
						echo '<div id="coursS2_arbo">
								
							<table>';
						
								foreach($ue2 as $ue)
								{
									echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue2Modules'.$i2} as $ligne)
									{
										echo '<tr>
											<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>
										</tr>';
									}
									
									$i2=$i2+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s3_arbo">Semestre 3</li>';
						
						echo '<div id="coursS3_arbo">
								
							<table>';
						
								foreach($ue3 as $ue)
								{
									echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue3Modules'.$i3} as $ligne)
									{
										echo '<tr>
											<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>
										</tr>';
									}
									
									$i3=$i3+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s4_arbo">Semestre 4</li>';
					
						echo '<div id="coursS4_arbo">
								
							<table>
							
								<tr><td><p>Attention : section encore en développement</p></td></tr>
								
							</table>
								
						</div>
				
				</ul>
			</nav>
	
			<table id="tablecours">
				<tr>
					<th>Nom</th>
					<th>Partagée par</th>
					<th>Date de partage</th>
					<th></th>
				</tr>';
				foreach ($cours as $cour)
				{
					echo '<tr id="'.$cour['coursID'].'">';
						if(strlen($cour['nomCours'])>48)
						{
							echo '<td class="nom_ressource"><img class="type_icon" src="media/images/file_icon.png">'.substr($cour['nomCours'],0,48).'...</td>';
						}
						else
						{
							echo '<td class="nom_ressource"><img class="type_icon" src="media/images/file_icon.png">'.$cour['nomCours'].'</td>';
						}
						echo '<td>'.$cour['prenom'].'</td>
						<td>'.$cour['dateCours'].'</td>
						<td class="icon_download"><a href="index.php?page=cours&actionCours=telecharger&url='.$cour['fileURL'].'"><img class="poubelle" src="media/images/telechargement.png" alt="Télécharger"></a></td>
					</tr>';
	
				}
			echo '<tr id="formulaire">
				<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">
					<td class="nom_ressource">
						<img id="plus" src="media/images/plus.png">
						<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						<input type="hidden" name="semestreRadio" value="'.$semestre.'" />
						<input type="hidden" name="moduleS'.$semestre.'" value="'.$moduleID.'" />
						<input type="file" name="fichier" id="fichier" />
					</td>
					<td>'.$utilisateur['prenom'].'</td>
					<td>'.date('Y-m-d H:i:s').'</td>
					<td class="suppr"><input type="image" src="media/images/fleche_upload.png"></td>
				</form>
			</tr>
					
			</table>
		</div>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
