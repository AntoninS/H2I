<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';

		ob_start(); //mise en tempon début

    echo'
      <form method="post" action=index.php?page=tutorats>

				<p>Pour quel module ? :
					<select name="selectionModuleTutorat">';
						foreach ($modulesDisponibles as $module)
						{
								$moduleSansEspace = str_replace(' ', '_', $module['nomModule']);		//On remplace les espaces par des '_' , sinon après dans la valeur option value les espaces passent pas
								echo'<option value='.$moduleSansEspace.'> '.$module['nomModule'].'';
						}
						echo'
					</select>
				</p>

				<p>Quel jour ? : <input type="text" id="datepicker"  name="choixJourTutorat"/></p>

				<p>A quelle heure ? : <input id="timepicker" type="text" name ="choixHeureTutorat" class="time"/></p>

				<p>
					Combien de temps ? (Durée du tutorat):
					<input type="radio" name="dureeTutorat" value ="1"> 1h
					<input type="radio" name="dureeTutorat" value ="2"> 2h
				</p>

				<p>
					Ajouter un commentaire :
					</br>
					<textarea rows="4" cols="50">Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...</textarea>
				</p>

        <input type="submit" value="Envoyer la demande">
      </form>'
    ;

    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
