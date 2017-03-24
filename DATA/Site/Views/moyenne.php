	<?php
	$title="Calcul de moyenne";
	$pageCSS='moyenne';
	ob_start(); //mise en tempon début
	
	$titresColonnes=array("Nom module","Coefficient");
	
	ob_start();
	echo '<div id=corp>';
	echo '<div id=CorpMoyenne>';
	echo '<div id="retour"><a href="index.php?page=monCompte&compte='.$userID.'">Retour au profil </a></div>';
	echo '<h1>Calcul de moyenne</h1>';
	echo '<form method="post" action="./index.php?page=monCompte&actionCompte=calcul&compte='.$userID.'">';
	echo '<table><tr>';
	
	foreach($titresColonnes as $tc)
	{
		echo '<th> '.$tc.'</th>';
	}
	echo '<th>Notes</th></tr>';
	$i=1;
	$valider=true;
	
	foreach($ue as $lolo){
	
		if(isset(${'moyenne'.$i})){
			if ( ${'moyenne'.$i}>8 )
			{
				echo '<tr class=UE><td>'.$lolo['UE'].'</td><td id="moyenneUE">Moyenne : '.${'moyenne'.$i}.'</td></tr>';
			}
			else{
				echo '<tr class=UEnull><td>'.$lolo['UE'].'</td><td id="moyenneUE">Moyenne : '.${'moyenne'.$i}.'</td></tr>';
				$valider=false;
			}
				
				
		}
		else{
			echo '<tr class=UE><td>'.$lolo['UE'].'</td></tr>';
	
		}
	
		foreach(${'result'.$i} as $ligne)
		{
			echo '<tr><td>'.$ligne["nomModule"].'</td>';
			echo '<td>'.$ligne["Coefficient"].'</td>';
			if(isset($_POST[$ligne["moduleID"]]) && $_POST[$ligne["moduleID"]]!=null){
				echo '<td><input type="number" name="'.$ligne["moduleID"].'" VALUE="'.$_POST[$ligne["moduleID"]].'" step="any" min="0" max="20"></td></tr>';
			}
			else{
				echo '<td><input type="number" name="'.$ligne["moduleID"].'" PLACEHOLDER="0" step="any" min="0" max="20"></td></tr>';
			}
		}
		$i=$i+1;
	}
	
	echo '</table>';
	echo '<br>';
	
	echo '<input id="submit" type="submit" value="Soumettre">';
	echo '</form>
			
	<div id="retour"><a href="index.php?page=monCompte&compte='.$userID.'">Retour au profil </a></div>';
	
	if(isset($moyenne))
	{
		if (($valider=true) && $moyenne>=10){
			echo '<p>Votre moyenne générale est de '.$moyenne.'  </p> <br> Félicitations! ';
		}
		else {
	
			echo '<p>Votre moyenne générale est de '.$moyenne.'</p> <br>  Vous ne validez pas votre semestre';
	
		}
			
	}
	
	if(isset($erreur))
	{
		echo $erreur;
	}
	
	echo '</div></div>';
	
	$content = ob_get_contents(); //récupération du tempon dons une var
	ob_end_clean(); // vide le tempon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>