<html>
	<head>
		<title>Inscription</title>

		<link href="./style/inscriptionConnexion.css" media="all" rel="stylesheet " type="text/css" />
	</head>

	<?php

			echo '
			<div id="boxLogin" class="inscri">
			<h1>Service d\'inscription</h1>
			<div id="WarpperForm">
					<form method="post" action="./index.php?action=confirmerinscription">

					<label>Identifiant*</label>';
					if(isset($testIdentifiantDejaPris) && $testIdentifiantDejaPris == true)
					{
						echo "<p class='echec'>Identifiant indisponible</p>";
					}
					echo '	<input type="text" name="identifiant"  required/>

					<label>Mot de passe*</label>
							<input type="password" name="password"  required/>

	        <label>Nom*</label>
						<input type="text" name="nom" required/>

	        <label>Prénom*</label>
						<input type="text" name="prenom"  required/>

					<label>Pseudo*</label>
						<input type="text" name="pseudo"  />

						<div class="rbutton"><label>Etudiant</label>
						<input class="radioB" type="radio" name="statut" value="Etudiant" required/>


						<label>Enseignant</label>
						<input class="radioB" type="radio" name="statut" value="Enseignant" required/>


						<br><br><label>Email étudiant*</label><br>
						<p><input type="test" name="mail" id="mail" />@etu.univ-lyon1.fr</p>

						<label>Téléphone</label>
						<input type="text" name="tel"/>

						<label>Groupe&nbsp;</label>
						<SELECT name="groupe" size="1">
						<OPTION>G1S1
						<OPTION>G2S1
						<OPTION>G3S1
						<OPTION>G4S1
						<OPTION>G5S1
						<OPTION>G6S1
						<OPTION>G1S2
						<OPTION>G2S2
						<OPTION>G3S2
						<OPTION>G4S2
						<OPTION>G6S2
						<OPTION>G1S3
						<OPTION>G2S3
						<OPTION>G3S3
						<OPTION>G4S3
						<OPTION>G6S3
						<OPTION>G1S4
						<OPTION>G2S4
						<OPTION>G3S4
						<OPTION>G4S4
						<OPTION>G6S4
						</SELECT>

	        <!-- <p>
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
	        <p><label>Cours</label><textarea name="cours" id="cours" /></textarea></p> -->
	        <button type="submit" name="envoyer">S\'inscrire</button>
	    </form>
			</div>
			</div>

				';

	?>
