<?php
	$title='Signalements';
	$pageCSS='admin';
	ob_start(); //mise en tempon début
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est réservée aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<h1>Signalements</h1>
		
		<p>Bonjour, '.$user['prenom'].'</p>';
				
		if(isset($confirm))
		{
			echo $confirm;
		}
				
		echo '<div id="signalements">
				
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
						<td><form method="post" action="index.php?page=administration&actionAdmin=sanctionner&compte='.$utilisateurID.'">
							Avertir : <input type="checkbox" name="avertir">
							Bannir : <input type="checkbox" name="bannir">
							Supprimer : <input type="checkbox" name="supprimer">
							<input type="submit" value="Résoudre">
							<input type="hidden" name="signalement" value="'.$signalement['signalementID'].'">
						</form>
						</td>
					</tr>';
				}
			
			echo '</table>
				
		</div>
			
		<a href="index.php?page=administration&compte='.$utilisateurID.'">Retour au menu</a>';
	}
	
	$content = ob_get_contents(); //récupération du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				