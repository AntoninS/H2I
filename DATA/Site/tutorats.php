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
      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=h2i;charset=utf8','root',''); // Connexion à la bdd "H2I" sur le localhost
      }
      catch (Exception $e)
      {
        die('Erreur : ' . $e->getMessage());
      }

      $recupTableEDT = $bdd->query('SELECT * FROM emploidutemps');

      while ($donnees = $recupTableEDT->fetch())
      {
        echo $donnees['dateJour'] .' '. $donnees['heure'] .' '. $donnees['cours']; // exemple juste pour essayer
      }

      $recupTableEDT->closeCursor();

    ?>

    <!-- #footer -->

    <?php include('./includes/footer.php'); ?>


  </body>
</html>
