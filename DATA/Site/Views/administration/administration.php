<?php
	$title='Administration';
	$pageCSS='administration';
	ob_start(); //mise en tempon dÃ©but
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est réservée aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<h1>Menu d\'administration</h1>';
		
		echo '<p>Bonjour, '.$user['prenom'].'</p>';
		
		echo '<ul>
			<li><a href="index.php?page=administration&actionAdmin=gestion&compte='.$utilisateurID.'">Gestion des utilisateurs</a></li>
			<li><a href="index.php?page=administration&actionAdmin=signalements&compte='.$utilisateurID.'">Signalements</a></li>
			<li><a href="index.php?page=administration&actionAdmin=stats&compte='.$utilisateurID.'">Statistiques</a></li>
			<li><a href="index.php?page=administration&actionAdmin=tuteurs&compte='.$utilisateurID.'">Tuteurs</a></li>
		</ul>
		';
	}
	
	$content = ob_get_contents(); //rÃ©cupÃ©ration du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				