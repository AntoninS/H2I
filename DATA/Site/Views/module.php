<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		echo '<h1>Liste des forums</h1>
		
		<nav id="boxCours">
			<ul>
			
				<li id="s1">Semestre 1</li>
				
					<div id="coursS1">
						<table>';
							foreach($modules1 as $ligne)
							{
								echo '<tr>
									<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
								
								
								</tr>';
							}
						echo '</table>
					</div>
					
				<li id="s2">Semestre 2</li>
				
					<div id="coursS2">
						<table>';
							foreach($modules2 as $ligne)
							{
								echo '<tr>
									<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
								
								
								</tr>';
							}
						echo '</table>
					</div>
					
				<li id="s3">Semestre 3</li>
				
					<div id="coursS3">
						<table>';
							foreach($modules3 as $ligne)
							{
								echo '<tr>
									<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
								
								
								</tr>';
							}
						echo '</table>
					</div>
					
				<li id="s4">Semestre 4</li>
				
					<div id="coursS4">
						<table>';
							foreach($modules4 as $ligne)
							{
								echo '<tr>
									<td id="modules"><img class="fleche" src="media/images/flecheDroite.png" alt="vers"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
								
								
								</tr>';
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
