<?php
	$title='Signalements';
	$pageCSS='admin';
	ob_start(); //mise en tempon dÃ©but
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est réservée aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<h1>Signalements</h1>
		
		<p>Bonjour, '.$user['prenom'].'</p>
				
		<div id="signalements">
				
			<table>
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Sujet</th>
					<th>Message</th>
					<th>Auteur</th>
					<th>Concerne...</th>
				</tr>';
				foreach($signalements as $signalement)
				{
					echo '<tr>
							
						<td>'.$signalement['signalementID'].'</td>
						<td>'.$signalement['dateSignalement'].'</td>
						<td>'.$signalement['sujet'].'</td>
						<td>'.$signalement['message'].'</td>
						<td>'.$signalement['userID'].'</td>
						<td><a href="index.php?page=forum&sujet='.$signalement['sujetID'].'#'.$signalement['messageID'].'">'.substr($signalement['contenu'],0,50).'...</a></td>
							
					</tr>';
				}
			
			echo '</table>
				
		</div>
			
		<a href="index.php?page=administration&compte='.$utilisateurID.'">Retour au menu</a>';
	}
	
	$content = ob_get_contents(); //rÃ©cupÃ©ration du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				