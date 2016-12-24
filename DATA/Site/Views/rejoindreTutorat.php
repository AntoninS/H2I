<?php
	$title='H2I - Tutorat';
	$pageCSS='ajoutTutorat';

		ob_start(); //mise en tempon début

    echo'

    ';

  $content = ob_get_contents(); //récuprération du tampon dons une var
  ob_end_clean(); // vide le tampon
  require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
