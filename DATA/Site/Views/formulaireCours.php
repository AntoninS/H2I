<?php
		$title='Inscription_Cours';
		$pageCSS='ajoutTutorat';
		ob_start(); //mise en tempon début

			echo '
			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Ajouter un cours</div>
					<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">

					<p>
					<label><span>Choisir un module <span class="required">*</span></span><select name="module" id="name" class="champSelection" required/></label>';

							foreach ($modules1 as $module)
							{
								$modules1 = $module['moduleID'];
								echo'<option value='.$modules1.'> '.$module['nomModule'].'</option>';
							}

						echo '
						</select>
					</p>

					<p><label><span>Titre du cours <span class="required">*</span></span><input type="text" id="datepicker"  name="titre" id="titre" class="champInsertion"/></label></p>

					<p><label><span>Choisir votre cours parmi vos fichiers <span class="required">*</span></span></label></p>
						 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
						 <input type="file" name="fichier" id="fichier" />

					<p><label><input type="submit" value="Ajouter un cours" /></label></p>
			</form>
			</div>
			</div>

				';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
