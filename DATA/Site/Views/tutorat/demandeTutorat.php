<?php
	$title='H2I - Tutorat';
	$pageCSS='tutorats';

	ob_start(); //mise en tempon début
	
	echo'<h2>Faire une demande de tutorat</h2>
			
		<div class="formulaireDemandeTutorat">
			
			<div class="formulaireDemandeTutorat-entete">Renseignez vos informations</div>

				<form method="post" action=index.php?page=tutorats&actionTutorat=validerDemande>
	
					<p>
						<label for="selectionModule"><span>Pour quel module ? : <span class="required">*</span></span><select name="selectionModule" class="champSelection"/></label>';
							foreach ($modulesDisponibles as $module)
								{
									$moduleSansEspace = str_replace(' ', '_', $module['nomModule']);		//On remplace les espaces par des '_' , sinon après dans la valeur option value les espaces passent pas
									echo'<option value='.$moduleSansEspace.'> '.$module['nomModule'].'';
								}
						echo'</select>
					</p>
	
					<p><label for="choixJour"><span>Quel jour ? : </span><input type="text" id="datepicker"  name="choixJour" class="champInsertion"/></label></p>
	
					<p><label for="choixHeure"><span>A quelle heure ? : </span><input id="timepicker" type="text" name ="choixHeure" class="champInsertion" value=""/></label></p>
	
					<p>
						<label><span>Durée souhaitée : </span>
						<input type="radio" name="dureeTutorat" value ="1"/> 1h
						<input type="radio" name="dureeTutorat" value ="2"/> 2h
						</label>
					</p>
										
					<p><label for="choixSalle"><span>Dans quelle salle ? : </span><input type="text" name ="choixSalle" class="champInsertion"/></label></p>
										
					<p>
						<label for="commentaire"><span>Ajouter un commentaire : </span>
						<textarea rows="3" cols="30" name="commentaire" class="champTextArea" placeholder="Ex : \'J\'aimerais insister sur tel aspect de tel chapitre\', etc..."></textarea>
						</label>
					</p>
	
					<a href ="index.php?page=tutorats&actionTutorat=demandeTutorat" id="annuler">Annuler</a>
					
					<input type="submit" value="Envoyer la demande" />
		      
				</form>

			</div>
								
		</div>';

    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
