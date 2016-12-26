<!DOCTYPE HTML>
<html>

<head>
	<title>H2I</title>
	<?php include('./includes/head.php'); ?>
	<link href="./style/inscriptionConnexion.css" media="all" rel="stylesheet " type="text/css" />
</head>



<body>
  <!-- #header -->
  <?php include('./includes/header.php'); ?>

	<?php
// modifier action dans form je pense
			echo '
			<div id="boxLogin" class="inscri">
			<h1>Service d\'inscription d\'un cours</h1>
			<div id="WarpperForm">
					<form method="post" action="index.php?page=cours&actionCours=inscription.php enctype="multipart/form-data">

					<label>Nom*</label>
						<input type="text" name="nom" required/>

					<label>Prenom*</label>
						<input type="text" name="prenom"  required/>

						<div class="rbutton"><label>Semestre 1</label>
						<input class="radioB" type="radio" name="Semestre" value="S1" required/>

						<label>Semestre 2</label>
						<input class="radioB" type="radio" name="Semestre" value="S2" required/>

						<label>Semestre 3</label>
						<input class="radioB" type="radio" name="Semestre" value="S3" required/>

						<label>Semestre 4</label>
						<input class="radioB" type="radio" name="Semestre" value="S4" required/></div>

					<p>
						<label>Matière</label>
						<select name="matiere" id="matiere">
						<option value="Mathématiques">Mathématiques</option>
						<option value="Algorithme">Algorithme</option>
						<option value="Anglais">Anglais</option>
						<option value="Linux">Linux</option>
						<option value="Windows">Windows</option>
						<option value="HTML/CSS">HTML/CSS</option>
						</select>
					</p>

					<p><label>Titre</label><input type="text" name="titre" id="titre"/></p>

					<p><label for="fichier">Choisir votre cours parmi vos fichier (tous formats | max. 1 Mo)</label></p>
						 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						 <input type="file" name="fichier" id="fichier" />

					<button type="submit" name="envoyer">S\'inscrire</button>
			</form>
			</div>
			</div>

				';

	?>


  <?php include('./includes/footer.php'); ?>


</body>

</html>
