<?php
	$title='Signalements';
	$pageCSS='signalements';
	ob_start(); //mise en tempon dÃ©but
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est réservée aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<h1>Signalements</h1>
		
		<p>Bonjour, '.$user['prenom'].'</p>
			
		<a href="index.php?page=administration&compte='.$utilisateurID.'">Retour au menu</a>';
	}
	
	$content = ob_get_contents(); //rÃ©cupÃ©ration du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				