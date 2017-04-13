<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';

		ob_start(); //mise en tempon début

    echo'
			<div class="formulaireAjoutTutorat">
				<div class="formulaireAjoutTutorat-entete">Devenir tuteur</div>

	      <form method="post" action=index.php?page=tutorats>

					<p>
						<label for="selectionModuleTutorat"><span>Pour quel module ? : <span class="required">*</span></span><select name="selectionModuleTutorat" class="champSelection"/></label>';
							foreach ($listeModules as $module)
							{
									$moduleSansEspace = str_replace(' ', '_', $module['nomModule']);		//On remplace les espaces par des '_' , sinon après dans la valeur option value les espaces passent pas
									echo'<option value='.$moduleSansEspace.'> '.$module['nomModule'].'';
							}
							echo'
						</select>
					</p>

					<p>
						<label for="commentaireTutorat"><span>Renseignez vos motivations : </span>
						<textarea rows="3" cols="30" name="commentaireTutorat" class="champTextArea"></textarea>
						</label>
					</p>

					<a href ="index.php?page=tutorats" id="boutonAnnuler">Annuler</a>
					<input type="submit" value="Envoyer la demande" /></label>
	      </form>
			</div>
			';

    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
