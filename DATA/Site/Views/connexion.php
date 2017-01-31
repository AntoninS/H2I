<html>
<head>
	<title>H2I Connexion</title>

	<link href="./style/inscriptionConnexion.css" media="all" rel="stylesheet " type="text/css" />
</head>

<?php

		echo '


				<h1 class="messageBienvenue">Bienvenue sur H2I</h1>

				<div id="boxLogin">

						<h1 class="titreConnexion">Service d\'authentification</h1>

					<div id="WarpperForm">
						<p>Pour vous connecter, veuillez remplir les champs utilisateur et mot de passe suivants:</p>

							<form method ="post" action="index.php" >
								<label>identifiant</label>
								<input name="identifiant" size="20" maxlength="20" type="text" required="" placeholder="ex: p1505458"/><br>
								<label>Mot de passe</label>
								<input name="motDePasse" size="20" maxlength="55" type="password" required=""/>

								';
								if(isset($testConnexion) && $testConnexion == false)
								{
									echo "<p class='echec'>Erreur:  identifiants incorrects</p>";
								}
								echo '

								<button>SE CONNECTER</button>
							</form>

					</div>
						<p>Seuls les membres de l\'iut peuvent profiter du hub étudiant, si vous n\'êtes pas inscrits, <a href="index.php?action=inscription" >Inscrivez-vous.</a><p>
				</div>



			';

?>
</body>

</html>
