	<?php
	$title="Calcul de moyenne";
	$pageCSS='moncompte';
	ob_start(); //mise en tempon début
	
	echo '<div id=corpsMonCompte>
			
		<div id="navbox">
			<ul>
				<a href="index.php?page=monCompte&compte='.$userID.'"><li class="tabs">Compte</li></a>
				<a href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'"><li class="tabs">Modifier</li></a>
				<a href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'"><li class="current">Moyenne</li></a>
				<a href="index.php?page=monCompte&actionCompte=pref&compte='.$userID.'"><li class="tabs">PrÃ©fÃ©rences</li></a>
				<a href="index.php?page=monCompte&actionCompte=stats&compte='.$userID.'"><li class="last_tab">Statistiques</li></a>
			</ul>
		</div>
						
		<div id=boxInfoUser>
						
			<h1>Moyenne</h1>
			
			<form method="post" action="./index.php?page=monCompte&actionCompte=calcul&compte='.$userID.'">
				<table><tr>';
	
				$titresColonnes=array("Nom module","Coefficient");
	
				foreach($titresColonnes as $tc)
				{
					echo '<th> '.$tc.'</th>';
				}
				echo '<th>Notes</th></tr>';
				$i=1;
				$valider=true;
	
				foreach($ue as $lolo){
				
					if(isset(${'moyenne'.$i}))
					{
						if ( ${'moyenne'.$i}>8 )
						{
							echo '<tr class=UE><td>'.$lolo['UE'].'</td><td id="moyenneUE">Moyenne : '.${'moyenne'.$i}.'</td></tr>';
						}
						else
						{
							echo '<tr class=UEnull><td>'.$lolo['UE'].'</td><td id="moyenneUE">Moyenne : '.${'moyenne'.$i}.'</td></tr>';
							$valider=false;
						}	
					}
					else
					{
						echo '<tr class=UE><td>'.$lolo['UE'].'</td></tr>';
				
					}
				
					foreach(${'result'.$i} as $ligne)
					{
						echo '<tr><td>'.$ligne["nomModule"].'</td>';
						echo '<td>'.$ligne["Coefficient"].'</td>';
						if(isset($_POST[$ligne["moduleID"]]) && $_POST[$ligne["moduleID"]]!=null)
						{
							echo '<td><input class="note" type="number" name="'.$ligne["moduleID"].'" VALUE="'.$_POST[$ligne["moduleID"]].'" step="any" min="0" max="20"></td></tr>';
						}
						else
						{
							echo '<td><input class="note" type="number" name="'.$ligne["moduleID"].'" PLACEHOLDER="0" step="any" min="0" max="20"></td></tr>';
						}
					}
					$i=$i+1;
				}
	
				echo '</table>
			
				<br><input id="submit" type="submit" value="Soumettre">
						
			</form>';
	
			if(isset($moyenne))
			{
				if (($valider=true) && $moyenne>=10)
				{
					echo '<p>Votre moyenne générale est de '.$moyenne.'<br>Félicitations !</p>';
				}
				else
				{
					echo '<p>Votre moyenne générale est de '.$moyenne.'<br>Vous ne validez pas votre semestre</p>';
				}	
			}
	
			if(isset($erreur))
			{
				echo $erreur;
			}
	
		echo '</div>
	
	</div>';
	
	$content = ob_get_contents(); //récupération du tempon dons une var
	ob_end_clean(); // vide le tempon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>