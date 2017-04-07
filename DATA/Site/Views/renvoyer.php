<html>
<head>
	<title>H2I Renvoi</title>

	<link href="./style/inscriptionConnexion.css" media="all" rel="stylesheet " type="text/css" />
</head>

<?php

		echo '


				<h1 class="messageBienvenue">Bienvenue sur H2I</h1>

				<div id="boxLogin">

						<h1 class="titreConnexion">Veuillez valider votre compte</h1>

					<div id="WarpperForm">
						<p>Veuillez préciser votre identifiant afin que nous puissions vous envoyer un nouveau code</p>

							<form method ="post" action="./index.php?action=confirmerRenvoi" >

							<label>Identifiant</label>
							<input name="identifiantRenvoi" size="20" maxlength="20" type="text" required/><br>


								<button>Envoyer !</button>
							</form>';
							if(isset($userUnknown) && $userUnknown == true){echo 'Erreur, identifiant inconnu.';}
						echo '</div>
				</div>



			';

?>
</body>

</html>
