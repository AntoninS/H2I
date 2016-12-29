<?php
		$title='Inscription_Cours';
		$pageCSS='inscriptionConnexion';
		ob_start(); //mise en tempon début

			echo '
			<div id="boxLogin" class="inscri">
			<h1>Service d\'inscription d\'un cours</h1>
			<div id="WarpperForm">
					<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">

					<p>
						<label>Module </label>
						<select name="module" id="module" required>';

							foreach ($modules1 as $module)
							{
								$modules1 = $module['moduleID'];
								echo'<option value='.$modules1.'> '.$module['nomModule'].'</option>';
							}

						echo '
						</select>
					</p>

					<p><label>Titre</label><input type="text" name="titre" id="titre"/></p>

					<p><label for="fichier">Choisir votre cours parmi vos fichier (tous formats | max. 1 Mo)</label></p>
						 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						 <input type="file" name="fichier" id="fichier" />

					<button type="submit" name="envoyer">Ajouter un cours</button>
			</form>
			</div>
			</div>

				';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
