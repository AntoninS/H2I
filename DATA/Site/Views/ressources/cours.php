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
					
						if($semestre==1)
						{
							echo '<div id="coursS1_arbo_selected">';
						}
						else
						{
							echo '<div id="coursS1_arbo">';
						}
						
								
							echo '<table>';
						
								foreach($ue1 as $ue)
								{
									echo '<tr><td id="nomUE">UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue1Modules'.$i1} as $ligne)
									{
										echo '<tr>';
											if($ligne['moduleID']==$moduleID)
											{
												echo '<td class="selected"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
											else
											{
												echo '<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
										echo '</tr>';
									}
									
									$i1=$i1+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s2_arbo">Semestre 2</li>';
					
							if($semestre==2)
							{
								echo '<div id="coursS2_arbo_selected">';
							}
							else
							{
								echo '<div id="coursS2_arbo">';
							}
							
							
							echo '<table>';
						
								foreach($ue2 as $ue)
								{
									echo '<tr><td id="nomUE">UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue2Modules'.$i2} as $ligne)
									{
										echo '<tr>';
											if($ligne['moduleID']==$moduleID)
											{
												echo '<td class="selected"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
											else
											{
												echo '<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
										echo '</tr>';
									}
									
									$i2=$i2+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s3_arbo">Semestre 3</li>';
						
							if($semestre==3)
							{
								echo '<div id="coursS3_arbo_selected">';
							}
							else
							{
								echo '<div id="coursS3_arbo">';
							}
							
							
							echo '<table>';
						
								foreach($ue3 as $ue)
								{
									echo '<tr><td id="nomUE">UE '. $ue['UE'] .'</td></tr>';
									
									foreach(${'ue3Modules'.$i3} as $ligne)
									{
										echo '<tr>';
											if($ligne['moduleID']==$moduleID)
											{
												echo '<td class="selected"><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
											else
											{
												echo '<td><a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a>';
											}
										echo '</tr>';
									}
									
									$i3=$i3+1;
									
								}
							
							echo '</table>
						
						</div>
	
					<li id="s4_arbo">Semestre 4</li>';
					
							if($semestre==4)
							{
								echo '<div id="coursS4_arbo_selected">';
							}
							else
							{
								echo '<div id="coursS4_arbo">';
							}
							
							
							echo '<table>
							
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
					<th></th>
				</tr>';
				foreach ($cours as $cour)
				{
					echo '<tr id="'.$cour['coursID'].'">';
						if(strlen($cour['nomCours'])>48)
						{
							echo '<td class="nom_ressource"><img class="type_icon" src="media/images/icon/files/'.$cour['type'].'.png">'.substr($cour['nomCours'],0,48).'... .'.$cour['type'].'</td>';
						}
						else
						{
							echo '<td class="nom_ressource"><img class="type_icon" src="media/images/icon/files/'.$cour['type'].'.png">'.$cour['nomCours'].'.'.$cour['type'].'</td>';
						}
						echo '<td>'.$cour['prenom'].'</td>
						<td>'.$cour['dateCours'].'</td>';
						if($utilisateurID==$cour['auteurIDC'])
						{
							echo '<td class="suppression"><a href="index.php?page=cours&actionCours=supprimer&idc='.$cour['coursID'].'"><img class="poubelle" src="media/images/poubelle.png" alt="Supprimer definitivement"></a></td>';
						}
						else
						{
							echo '<td class="suppression"></td>';
						}
						echo '<td class="icon_download"><a href="index.php?page=cours&actionCours=telecharger&url=uploads/ressources/'.$cour['nomCours'].'.'.$cour['type'].'"><img class="icon_telechargement" src="media/images/telechargement.png" alt="Télécharger"></a></td>
					</tr>';
	
				}
			echo '<tr id="formulaire">
				<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">
					<td class="nom_ressource">
						<img id="plus" src="media/images/plus.png">
						<input type="hidden" name="semestreRadio" value="'.$semestre.'" />
						<input type="hidden" name="moduleS'.$semestre.'" value="'.$moduleID.'" />
						<input type="file" name="fichier" id="input_fichier_relatif" />
					</td>
					<td>'.$utilisateur['prenom'].'</td>
					<td>'.date('Y-m-d H:i:s').'</td>
					<td></td>
					<td class="suppr"><input type="image" src="media/images/fleche_upload.png"></td>
				</form>
			</tr>
					
			</table>
		</div>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
