<?php 
	$title = 'Erreur';
	
	ob_start();
	echo "<h1>Une erreurest survenue : Identifiant de film requis</h1>"

	$content = ob_get_contents();
	ob_end_clean;
	require_once("layout.php");
?>