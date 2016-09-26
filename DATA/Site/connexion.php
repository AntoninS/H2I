
<!doctype html >
<html >

<head>
	<title>H2I Connexion</title>
	<?php include('./includes/head.php'); ?>

	<link href="./style/connexion.css" media="all" rel="stylesheet " type="text/css" />
</head>





	<body>
	<div id="warpper" class="connexion">

		<div id="boxLogin">

				<h1>Bienvenue sur H2I</h1>

			<div id="WarpperForm">
				<p>Pour vous connecter, veuillez remplir les champs utilisateur et mot de passe suivants:</p>
				<form method ="post" >
					<label>Identifiant</label>
					<input name="identifiant" size="20" maxlength="20" type="text" required="" placeholder="p150..."/><br>
					<label>Mot de passe</label>
					<input name="identifiant" size="20" maxlength="55" type="password" required=""/>

					<button>SE CONNECTER</button>
			</form>
			</div>
		</div>



	</div>
	</body>

</html>
