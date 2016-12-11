<?php
		$title='Tutorat';
		$pageCSS='tutorats';

		ob_start(); //mise en tempon début

    echo'
      <form method="post" action=index.php?page=tutorats>

			</br> </br>

			Pour quel module ? :
				<select name="selectionModuleTutorat">';
					foreach ($modulesDisponibles as $module) {
						echo'<option value=' .$module["nomModule"].'> '.$module["nomModule"].'';
					}
					echo'
				</select>

				</br></br>

				Quel jour ? : <input type="text" id="datepicker" />

				</br>
				</br>
				Quelle heure ? : <input id="timepicker" type="text" class="time" />
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
        <input type="submit" value="Envoyer la demande">
      </form>'
    ;

    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
