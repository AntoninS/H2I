<html>
<head>
	<title>H2I Validation</title>

	<link href="./style/inscriptionConnexion.css" media="all" rel="stylesheet " type="text/css" />
</head>

<?php

		echo '


				<h1 class="messageBienvenue">Bienvenue sur H2I</h1>

				<div id="boxLogin">

						<h1 class="titreConnexion">Veuillez valider votre compte</h1>

					<div id="WarpperForm">
						<p>Un code vous a été envoyé par mail à l\'adresse <br> *****@etu.univ-lyon1.fr</p>
						<p>Pour vous valider votre compte, veuillez entre le code de confirmation:</p>

							<form method ="post" action="'; if(isset($idAValider)){ echo './index.php?action=confirmerValidation&login='.$idAValider;}
							echo '" >

						<!--	<label>Identifiant</label>
							<input name="identifiantCode" size="20" maxlength="20" type="text" /><br>-->
							<label>Code</label>
							<input name="code" size="20" maxlength="20" type="text" required/><br>

							<a href="index.php?action=renvoyer">Renvoyez moi un code !</a>

								<button>Confirmer le compte</button>
							</form>';
							if(isset($erreurValidation) && $erreurValidation == true){echo 'Erreur, code invalide.';}
						echo '</div>
				</div>



			';

?>
</body>

</html>
