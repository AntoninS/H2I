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

					<label>Identifiant*</label>
						<input type="text" name="identifiant"  required/>

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

						<label>Tuteur</label>
						<input class="radioB" type="radio" name="statut" value="Tuteur" required/>

						<label>Enseignant</label>
						<input class="radioB" type="radio" name="statut" value="Enseignant" required/>

						<label>Admin</label>
						<input class="radioB" type="radio" name="statut" value="Admin" required/></div>

						<label>Email</label>
						<input type="text" name="mail"  />

						<label>Téléphone</label>
						<input type="text" name="tel"/>


						<div class="rbutton"><label>Semestre 1</label>
		        <input class="radioB" type="radio" name="Semestre" value="S1" required/>

						<label>Semestre 2</label>
		        <input class="radioB" type="radio" name="Semestre" value="S2" required/></div>

						<div class="rbutton"><label>Semestre 3</label>
		        <input class="radioB" type="radio" name="Semestre" value="S3" required/>

						<label>Semestre 4</label>
		        <input class="radioB" type="radio" name="Semestre" value="S4" required/></div>



					<label>Commentaire</label>
						<textarea name="commentaire" id="cours" placeholder="Votre description..."/></textarea>

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
