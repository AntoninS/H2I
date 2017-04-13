<?php
		$title='Pr�f�rences';
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
						<a href="index.php?page=monCompte&actionCompte=pref&compte='.$userID.'"><li class="current">Préférences</li></a>
						<a href="index.php?page=monCompte&actionCompte=stats&compte='.$userID.'"><li class="last_tab">Statistiques</li></a>
					</ul>
				</div>
		
				<div id="boxInfoUser">
					<h1>Préférences</h1>
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