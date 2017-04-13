<?php
		$title='Inscription_Cours';
		$pageCSS='ajoutTutorat';
		ob_start(); //mise en tempon début

			echo '

			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Téléverser une ressource</div>
					<form method="post" action="index.php?page=cours&actionCours=ajout_cours" enctype="multipart/form-data">

					<p id=semestre>
							<label>Semestre 1<input type="radio" id="semestre1" name="semestreRadio" value="1" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 2<input type="radio" id="semestre2" name="semestreRadio" value="2" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 3<input type="radio" id="semestre3" name="semestreRadio" value="3" onclick="showRadio()" class="semestre"/></label>
							<label>Semestre 4<input type="radio" id="semestre4" name="semestreRadio" value="4" onclick="showRadio()" class="semestre"/></label>
					</p>



					<div id=Sem1>
						<label>Choisir un module
						<select name="moduleS1"  class="champSelection" required/></label>';

								foreach ($modules1 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

						echo '</select>
					</div>

					<div id=Sem2>
						<label>Choisir un module
						<select name="moduleS2"  class="champSelection" required/></label>';
								
								foreach ($modules2 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

						echo '</select>
					</div>

					<div id=Sem3>
						<label>Choisir un module
						<select name="moduleS2"  class="champSelection" required/></label>';
							
								foreach ($modules3 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

						echo '</select>
					</div>

					<div id=Sem4>
						<label>Choisir un module
						<select name="moduleS2"  class="champSelection" required/></label>';
							
								foreach ($modules4 as $module)
								{
									echo'<option value='.$module['moduleID'].'> '.$module['nomModule'].'</option>';
								}

						echo '</select>
					</div>

					<input type="file" name="fichier" id="fichier" />
									
					<input type="submit" value="Ajouter un cours" />
									
				</form>
			</div>
		</div>

				';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
