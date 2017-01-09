<?php
		$title="Calcul de moyenne";
		$pageCSS='moyenne';
		ob_start(); //mise en tempon début

	$titresColonnes=array("Nom module","Coefficient");
	
	ob_start();
	
	echo '<div id=CorpMoyenne>';
	
	echo '<h1>Calcul de moyenne</h1>';
	echo '<form method="post" action="./index.php?page=monCompte&actionCompte=calcul&compte='.$userID.'">';
	echo '<table><tr>';
	
	foreach($titresColonnes as $tc)
	{
		echo '<th> '.$tc.'</th>';
	}
	echo '<th>Notes</th></tr>';
	$i=1;
	
		foreach($ue as $lolo){
		
				if(isset(${'moyenne'.$i})){
					echo '<tr class=UE><td>'.$lolo['UE'].'</td><td id="moyenneUE">Moyenne : '.${'moyenne'.$i}.'</td></tr>';
				}
				else{
					echo '<tr class=UE><td>'.$lolo['UE'].'</td></tr>';
				}
				
				foreach(${'result'.$i} as $ligne)
				{
					echo '<tr><td>'.$ligne["nomModule"].'</td>';
					echo '<td>'.$ligne["Coefficient"].'</td>';
					if(isset($_POST[$ligne["moduleID"]]) && $_POST[$ligne["moduleID"]]!=null){
						echo '<td><input type="number" name="'.$ligne["moduleID"].'" PLACEHOLDER="'.$_POST[$ligne["moduleID"]].'" step="any" min="0" max="20"></td></tr>';
					}
					else{
						echo '<td><input type="number" name="'.$ligne["moduleID"].'" PLACEHOLDER="0" step="any" min="0" max="20"></td></tr>';
					}
				}
				$i=$i+1;
			}
	
			echo '</table>';
			echo '<br>'; 
	
			echo '<input type="submit" value="Soumettre">';
			echo '</form>';
	
			if(isset($moyenne))
		{
			echo '<p>Votre moyenne générale est de '.$moyenne.'</p>';
			}
	
	if(isset($erreur))
	{
		echo $erreur;
	}
	echo '</div>';
	
	

		$content = ob_get_contents(); //récupération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>