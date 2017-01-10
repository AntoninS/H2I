<?php
		$title='Inscription_Cours';
		$pageCSS='ajoutTutorat';
		ob_start(); //mise en tempon début

			echo '

			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Ajouter un cours</div>
					<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">

					<p id=semestre>
							<label>Semestre 1<input type="radio" id="semestre1" name="semestreRadio" value="1" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 2<input type="radio" id="semestre2" name="semestreRadio" value="2" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 3<input type="radio" id="semestre3" name="semestreRadio" value="3" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 4<input type="radio" id="semestre4" name="semestreRadio" value="4" onclick="showRadio()" class="semestre"/></label>
					</p>



					<p>
						<div id=S1>
						<label><span>Choisir un module <span class="required">*</span></span><select name="moduleS1"  class="champSelection" required/></label>';

								foreach ($modules1 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

							echo '
							</select>
						</div>
					</p>

					<p>
						<div id=S2>
						<label><span>Choisir un module <span class="required">*</span></span><select name="moduleS2"  class="champSelection" required/></label>';

								foreach ($modules2 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

							echo '
							</select>
						</div>
					</p>

					<p>
						<div id=S3>
						<label><span>Choisir un module <span class="required">*</span></span><select name="moduleS3"  class="champSelection" required/></label>';

								foreach ($modules3 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

							echo '
							</select>
						</div>
					</p>

					<p>
						<div id=S4>
						<label><span>Choisir un module <span class="required">*</span></span><select name="moduleS4"  class="champSelection" required/></label>';

								foreach ($modules4 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

							echo '
							</select>
						</div>
					</p>






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
