<?php
		$title='Inscription_Cours';
		$pageCSS='ajoutTutorat';
		ob_start(); //mise en tempon début

			echo '

			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Ajouter un cours</div>
					<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">

					<p id=semestre>
							<label>Semestre 1<input type="radio" id="semestre1" name="Semestre" value="1" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 2<input type="radio" id="semestre2" name="Semestre" value="2" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 3<input type="radio" id="semestre3" name="Semestre" value="3" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 4<input type="radio" id="semestre4" name="Semestre" value="4" onclick="showRadio()" class="semestre"/></label>
					</p>




					<label><span>Choisir un module <span class="required">*</span></span><select name="module"  class="champSelection" required/></label>
					<span id=S1>
					<option>S1 :</option>';
						foreach ($modules1 as $module)
						{
							echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
						}

					echo '
					</span>
					<span id=S2>
					<option>S2 :</option>';
						foreach ($modules2 as $module)
						{
							echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
						}

					echo '
					</span>
					<span id=S3>
					<option>S3 :</option>';
						foreach ($modules3 as $module)
						{
							echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
						}

					echo '
					</span>
					<span id=S4>
					<option>S4 :</option>';
							foreach ($modules4 as $module)
							{
								echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
							}

						echo '
					</span>

					</select>






					<p><label><span>Titre du cours <span class="required">*</span></span><input type="text"  name="titre" id="titre" class="champInsertion"/></label></p>

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
