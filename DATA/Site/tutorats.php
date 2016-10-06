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

      $recupTableEDT = $bdd->query('SELECT * FROM emploidutemps');

      while ($donnees = $recupTableEDT->fetch())
      {
        echo $donnees['dateJour'] .' à '. $donnees['heure'] .' ,cours n° '. $donnees['cours'] . '<br />'; // exemple juste pour essayer
      }

      $recupTableEDT->closeCursor();

    ?>

    <!-- #footer -->

    <?php include('./includes/footer.php'); ?>


  </body>
</html>
