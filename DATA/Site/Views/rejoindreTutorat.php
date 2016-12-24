<?php
	$title='H2I - Tutorat';
	$pageCSS='tutorats';

		ob_start(); //mise en tempon début

    echo'
		<div class="formulaireRejoindreTutorat">
			<div class="formulaireRejoindreTutorat-entete">Rejoindre un tutorat</div>

			<form method="post" action=index.php?page=tutorats>
				<p>Tutorat de : '.$nomModuleTutorat.', le : '.$jourTutorat.', de : '.$heureDebutTutorat.'h, à '.$heureFinTutorat.'h.</p>

				<p>Il reste pour le moment '.$nbPlacesRestantes.' places libres. (Limite de 4 places par tutorat)</p>

				<p>
					<label for="commentaireTutorat"><span>Ajouter un commentaire : </span>
					<textarea rows="3" cols="30" name="commentaireTutorat" class="champTextArea">Ex : "J\'aimerais insister sur tel aspect de tel chapitre" ect...</textarea>
					</label>
				</p>

				<a href ="index.php?page=tutorats" id="boutonAnnuler">Annuler</a>
				<input type="submit" value="Rejoindre ce tutorat !" /></label>

			</form>
		</div>
    ';

  $content = ob_get_contents(); //récuprération du tampon dons une var
  ob_end_clean(); // vide le tampon
  require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
