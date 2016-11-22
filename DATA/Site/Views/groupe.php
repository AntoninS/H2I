<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<h1>'.$groupe['nom'].'</h1>';
		
		echo '<table>
			
			<th>Liste des membres du '.$groupe['nom'].'</th>';
		
			foreach($listeGroupe as $ligne)
			{
				echo '<tr>
				
					<td><p>'.$ligne['prenom'].' '.$ligne['nom'].'</p></td>
					
				</tr>';
			}
		
		echo '<table>';
		
		
		

		$content = ob_get_contents(); //récupération du tampon dans une variable
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
