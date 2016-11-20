<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		echo '<h1>Forum</h1>
		
		<h2>Signalement de message</h2>
		
		<form method="post" action="index.php">
		  <p class="erreur">Vous souhaitez signaler le message suivant :</p>
		  <p class="erreur">Écrit par '.$message['prenom'].' le '.$message['dateMessage'].' : '.$message['contenu'].'</p>
		  <h2> Veuillez compléter les informations relatives au signalement ci-dessous :</h2>
		  <p><input type="text" name="sujet" value="" placeholder="Sujet de la plainte"></p>
		  <p><textarea name="message" id="message" placeholder="Message de la plainte"></textarea></p>
		  <p><input type="submit" value="Signaler" class="button"></p>
		</form>
		
		<p class="erreur">ATTENTION : Un signalement abusif ne sera pas pris en compte. Merci de votre compréhension.</p>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
