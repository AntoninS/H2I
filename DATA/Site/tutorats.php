<!doctype html >
<html >

<head>
	<title>H2I Tutorats</title>
	<?php include('./includes/head.php'); ?>
  <link href="./style/tutorats.css" media="all" rel="stylesheet " type="text/css" />
</head>

  <body>

    <!-- #header -->

    <?php include('./includes/header.php'); ?>
    <link href="./style/tutorats.css" media="all" rel="stylesheet " type="text/css" />

    <!-- body -->

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

		<table align = "center">
			<?php
			    $jour = array(null, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi");
			    $rdv["Lundi"]["9"] = "JAVA";
					$rdv["Mercredi"]["15:30"] = "COMPTA";
			    echo "<tr><th>Heure</th>";
			    for($x = 1; $x < 6; $x++)         		 // Remplit la ligne d'entete du tableau ("Lundi / mardi ...")
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

    <!-- #footer -->

    <?php include('./includes/footer.php'); ?>


  </body>
</html>
