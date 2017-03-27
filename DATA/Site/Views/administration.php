<?php
	$title='Administration';
	$pageCSS='administration';
	ob_start(); //mise en tempon début
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est r�serv�e aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<p>Bonjour, '.$user['prenom'].'</p>';
		echo '<ul>
			<li><a href="">Gestion des utilisateurs</a></li>
			<li><a href="">Signalements</a></li>
			<li><a href="">Statistiques</a></li>
			<li><a href="">Tuteurs</a></li>
		</ul>
		';
	}
	
	$content = ob_get_contents(); //récupération du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				