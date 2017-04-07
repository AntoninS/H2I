<?php
		$title='Statistiques';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
		if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">
			
				<div id="navbox">
					<ul>
						<a href="index.php?page=monCompte&compte='.$userID.'"><li class="tabs">Compte</li></a>
						<a href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'"><li class="tabs">Modifier</li></a>
						<a href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'"><li class="tabs">Moyenne</li></a>
						<a href="index.php?page=monCompte&actionCompte=pref&compte='.$userID.'"><li class="tabs">Préférences</li></a>
						<a href="index.php?page=monCompte&actionCompte=stats&compte='.$userID.'"><li class="current">Statistiques</li></a>
					</ul>
				</div>
		
				<div id="boxInfoUser">
					<h1>Statistiques</h1>
								
					<ul id="stats">
						<h3>Ressources</h3>
						<li><span class="stats">'.$stats['nbRessourcesDown'].'</span> ressources téléchargées</li>
						<li><span class="stats">'.$stats['nbRessourcesUp'].'</span> ressources téléversées</li>
						<h3>Forum</h3>
						<li><span class="stats">'.$stats['nbMessages'].'</span> messages publiés</li>
						<li><span class="stats">'.$stats['nbSujets'].'</span> sujets publiés</li>
						<li><span class="stats">'.$stats['nbValides'].'</span> messages validés</li>
						<h3>Tutorats</h3>
						<li><span class="stats">'.$stats['nbTutorats'].'</span> tutorats bénéficiés</li>
						<li><span class="stats">'.$stats['nbTuteurs'].'</span> tutorats délivrés</li>
						<h3>Activité</h3>
						<li><span class="der_act">'.$stats['derniereActivite'].' :</span> dernière activité</li>
					</ul>
								
				</div>
							
			</div>';
		}
		else 
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';	
		}
				
		
		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>