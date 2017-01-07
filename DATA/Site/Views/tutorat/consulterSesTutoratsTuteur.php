<?php
		$title='H2I - Tutorat';
		$pageCSS='tutorats';

		ob_start(); //mise en tampon début

    echo'
      <div class="formulaireAjoutTutorat">
        <div class="formulaireAjoutTutorat-entete">Liste des tutorats à dispenser</div>
        <div class="consulterlisteTutorats">';
          foreach ($listeTutoratsTuteur as $tutorat)
          {
            echo '<p> - '
            .$tutorat["nomModule"].
            ', le '
            .date_format(new DateTime($tutorat["jour"]),"d/m/Y").
            ', de '
            .substr($tutorat["heureDebut"], 0, 2).
            'h à '
            .substr($tutorat["heureFin"], 0, 2).
            'h, en salle '
            .$tutorat["salle"].
            '</p>';
          }

    echo'
      </div>
      ';

    echo'
				<div class="formulaireAjoutTutorat-entete">Liste des tutorats auxquels vous êtes inscrit</div>

				<div class="consulterlisteTutorats">';
					foreach ($listeTutoratsEleve as $tutorat)
					{
						echo '<p> - '
						.$tutorat["nomModule"].
						', le '
						.date_format(new DateTime($tutorat["jour"]),"d/m/Y").
						', de '
						.substr($tutorat["heureDebut"], 0, 2).
						'h à '
						.substr($tutorat["heureFin"], 0, 2).
						'h, en salle '
						.$tutorat["salle"].
						'</p>';
					}
		echo'
				</div>
        </div>
      ';


    $content = ob_get_contents(); //récuprération du tampon dons une var
    ob_end_clean(); // vide le tampon
    require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
