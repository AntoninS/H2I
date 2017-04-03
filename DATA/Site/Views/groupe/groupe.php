<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<div id="couv">
			
			<h1>Mon groupe</h1>
				
			<h2>'.$groupe['NomGroupe'].'S'.$groupe['Semestre'].'</h2>
					
		</div>
				
		<div id="membres">
				
			<h3>Membres</h3>
				
			<ul>';
		
				foreach($listeGroupe as $membre)
				{
					echo '<li>'.$membre['prenom'].' '.$membre['nom'].'</li>';
				}
			
			echo '</ul>
				
		</div>
				
		<div id="bloc">
				
				<div id="nav">
					
					<ul>
						<li><a href="">Annonces</a></li>
						<li><a href="index.php?page=groupe&actionGroupe=ressources&compte='.$utilisateurID.'">Ressources</a></li>';
			
						if($groupe['responsable']==null)
						{
							echo '<li><a href="index.php?page=groupe&actionGroupe=election&compte='.$utilisateurID.'">�lection</a></li>';
						}
					echo '</ul>
				
				</div>
				
				<div id="channels">
					
					<ul>
						<li><a href="">Fil d\'actualité</a></li>
						<li><a href="">DS/évaluations</a></li>
						<li><a href="">Absences</a></li>
						<li><a href="">Autres informations</a></li>
						<li><a href="">Random</a></li>
					</ul>
							
				</div>
							
				<div id="annonces">
							
				</div>
							
		</div>
				
		<div id="devoirs">
				
		</div>
				
		';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
