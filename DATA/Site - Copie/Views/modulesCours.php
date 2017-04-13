<?php
		$title='Cours';
		$pageCSS='cours';
		ob_start(); //mise en tempon début

		echo '
		<h1>Liste des cours</h1>
		<nav id="boxCours">

				<div id ="ajoutCours">
					<a href="index.php?page=cours&actionCours=ajout_cours" id="boutonDemandeTutorat">Ajouter un nouveau cours</a>
				</div>


				<h2 id="s1">Semestre 1</h2>
				<div id="coursS1">';
					foreach($coursS1 as $ligne)
					{
						echo '
						<a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><span class="cours">
							<div class="iconCours"><img src="./media/images/'.$ligne['image'].'.png" /></div>
							<div class="liencours">'.$ligne['nomModule'].'</div>';
					}
				echo '
					</span></a>
				</div>


				<h2 id="s2">Semestre 2</h2>
				<div id="coursS2">';
					foreach($coursS2 as $ligne)
					{
						echo '
						<a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><span class="cours">
							<div class="iconCours"><img src="./media/images/'.$ligne['image'].'.png" /></div>
							<div class="liencours">'.$ligne['nomModule'].'</div>';
					}
				echo '
					</span></a>
				</div>


				<h2 id="s3">Semestre 3</h2>
				<div id="coursS3">';
					foreach($coursS3 as $ligne)
					{
						echo '
						<a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><span class="cours">
							<div class="iconCours"><img src="./media/images/'.$ligne['image'].'.png" /></div>
							<div class="liencours">'.$ligne['nomModule'].'</div>';
					}
				echo '
					</span></a>
				</div>


				<h2 id="s4">Semestre 4</h2>
				<div id="coursS4">';
					foreach($coursS4 as $ligne)
					{
						echo '
						<a href="index.php?page=cours&actionCours=afficher&moduleID='.$ligne['moduleID'].'"><span class="cours">
							<div class="iconCours"><img src="./media/images/'.$ligne['image'].'.png" /></div>
							<div class="liencours">'.$ligne['nomModule'].'</div>';
					}
				echo '
					</span></a>
				</div>




		</nav>

			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
