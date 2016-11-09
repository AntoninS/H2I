<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tempon début

		echo '

		<table align = "center">
			<?php
					$jour = array(null, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi");
					$rdv["Lundi"]["9"] = "JAVA";
					$rdv["Mercredi"]["15:30"] = "COMPTA";
					echo "<tr><th>Heure</th>";
					for($x = 1; $x < 6; $x++)         		 // Remplit la ligne d entete du tableau ("Lundi / mardi ...")
							echo "<th>".$jour[$x]."</th>";
					echo "</tr>";
					for($j = 8; $j < 18; $j += 0.5) {			// Remplit les heures par seuil de 30min
							echo "<tr>";
							for($i = 0; $i < 5; $i++) {
									if($i == 0) {
											$heure = str_replace(".5", ":30", $j);
											echo "<td class=\"time\">".$heure."</td>";
									}
									echo "<td>";
									if(isset($rdv[$jour[$i+1]][$heure])) {
											echo $rdv[$jour[$i+1]][$heure];
									}
									echo "</td>";
							}
							echo "</tr>";
					}
			?>
		</table>
			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>


    <?php
			require_once("liaison.php");
    	$bdd=connexion_db();

      $recupTableEDT = $bdd->query('SELECT * FROM coursTutorat');

      while ($donnees = $recupTableEDT->fetch())
      {
        echo $donnees['debut'] . ',cours de' . $donnees['nomMatiere'] . '<br />'; // exemple juste pour essayer
      }

      $recupTableEDT->closeCursor();

    ?>
