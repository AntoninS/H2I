<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tampon début

		echo '<h1>Liste des forums</h1>
		<table>
			<tr>
				<th>Modules</th>
			</tr>';
			foreach($modules as $ligne)
			{
				echo '<tr>
					<td id="modules"><a href="index.php?page=forum&actionForum=afficher&moduleID='.$ligne['moduleID'].'">'.$ligne['nomModule'].'</a></td>
				</tr>';
			}
		echo '</table>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
