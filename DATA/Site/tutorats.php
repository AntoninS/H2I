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
        echo $donnees['dateJour'] .' à '. $donnees['heure'] .' ,cours n° '. $donnees['cours'] . '<br />'; // exemple juste pour essayer
      }

      $recupTableEDT->closeCursor();

    ?>

		<table width="80%" align="center" >
    		<tr>
        	<th>Heure</th>
        	<th>Lundi</th>
      		<th>Mardi</th>
      		<th>Mercredi</th>
      		<th>Jeudi</th>
      		<th>Vendredi</th>
    		</tr>

    	<tr>
      	<th>8h</th>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
    	</tr>

    	<tr>
        <th>9h</td>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
    	</tr>

    	<tr>
        <th>10h</td>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
    	</tr>

    	<tr>
        	<th>11h</td>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
    </tr>

    <tr>
        <th>12h</td>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
    </tr>

		<tr>
				<th>13h</td>

					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		</tr>

		<tr>
				<th>14h</td>

					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		</tr>

		<tr>
				<th>15h</td>

					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		</tr>

		<tr>
				<th>16h</td>

					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		</tr>

		<tr>
				<th>17h</td>

					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		</tr>
	</table>

    <!-- #footer -->

    <?php include('./includes/footer.php'); ?>


  </body>
</html>
