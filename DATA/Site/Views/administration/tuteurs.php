<?php
$title='Tuteurs';
$pageCSS='tuteurs';
ob_start(); //mise en tempon début

if($statutUtilisateur!="Administrateur")
{
	echo '<p>Cette page est r�serv�e aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
}
else
{
	echo '<h1>Tuteurs</h1>
			
	<p>Bonjour, '.$user['prenom'].'</p>
				
	<a href="index.php?page=administration&compte='.$utilisateurID.'">Retour au menu</a>';
}

$content = ob_get_contents(); //récupération du tampon dans une var
ob_end_clean(); // vide le tampon
require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				