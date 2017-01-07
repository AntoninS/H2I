<?php
	$title='H2I - Tutorat';
	$pageCSS='tutorats';

		ob_start(); //mise en tampon début

    echo'
		<div class="formulaireRejoindreTutorat">
			<div class="formulaireRejoindreTutorat-entete">Rejoindre un tutorat</div>

			<form method="post" action=index.php?page=tutorats>
				<p>Tutorat de : '.$nomModuleTutorat.', le : '.$jourTutorat.', de : '.$heureDebutTutorat.'h, à '.$heureFinTutorat.'h.</p>

				<p>Il reste pour le moment '.$nbPlacesRestantes.' places libres. (Limite de 4 places par tutorat)</p>

				<p>
					<label for="commentaireRejoindreTutorat"><span>Ajouter un commentaire : </span>
					<textarea rows="3" cols="30" name="commentaireRejoindreTutorat" class="champTextArea">Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...</textarea>
					</label>
				</p>

				<input type="hidden" value="'.$idTutorat.'" name="idTutoratRejoindre" />
				<input type="hidden" value="'.$nbPlacesRestantes.'" name="nbPlacesRestantes" />
				<a href ="index.php?page=tutorats" id="boutonAnnuler">Annuler</a>
				<input type="submit" value="Rejoindre ce tutorat !" /></label>

			</form>
		</div>
    ';

  $content = ob_get_contents(); //récuprération du tampon dons une var
  ob_end_clean(); // vide le tampon
  require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
