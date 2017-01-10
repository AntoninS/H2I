<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		$i1=0;
		$i2=0;
		$i3=0;
		$i4=0;
		
		echo '<h1>Liste des forums</h1>
		
		<nav id="boxCours">
			<ul>
			
				<li id="s1">Semestre 1</li>';
				
					echo '<div id="coursS1">
							
						<table>';
						
							foreach($ue1 as $ue){
									
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue1Modules'.$i1} as $ligne)
								{
									echo '<tr>
										<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
									</tr>';
									
								}
								
								$i1=$i1+1;
							}
							
						echo '</table>
							
					</div>
							
				<li id="s2">Semestre 2</li>';
				
					echo '<div id="coursS2">
							
						<table>';
						
							foreach($ue2 as $ue){
									
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue2Modules'.$i2} as $ligne)
								{
									echo '<tr>
										<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
									</tr>';
									
								}
								
								$i2=$i2+1;
							}
							
						echo '</table>
							
					</div>
							
					
				<li id="s3">Semestre 3</li>';
				
					echo '<div id="coursS3">
							
						<table>';
						
							foreach($ue3 as $ue){
									
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue3Modules'.$i3} as $ligne)
								{
									echo '<tr>
										<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
									</tr>';
									
								}
								$i3=$i3+1;
							}
							
						echo '</table>
							
					</div>
					
				<li id="s4">Semestre 4</li>';
				
					echo '<div id="coursS4">
							
						<table>';
						
							foreach($ue4 as $ue){
									
								echo '<tr><td>UE '. $ue['UE'] .'</td></tr>';
								
								foreach(${'ue4Modules'.$i4} as $ligne)
								{
									echo '<tr>
										<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
									</tr>';
									
								}
								
								$i4=$i4+1;
							}
							
						echo '</table>
							
					</div>
						
			</ul>
		</nav>
		';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
