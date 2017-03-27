<?php
		$title='Mon compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
		if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">

			  <div id="boxInfoUser">
			  <section>
				<div class="usr">';
			
					echo '<img  src="./uploads/avatar/'.$user['avatar'].'"  width="220" height="220"/>
				
				</div>';
				
				echo '<ul>';
				  if($user['pseudo']!=NULL)				  {
					  echo '<li><h2>'.$user['pseudo'].'</h2></li>';
					  
					  echo'<li>'.$user['prenom'].' '.$user['nom'].'</li>';
				  }
				  else
				  {
				  	echo '<li><h2 class="no_pseudo">'.$user['prenom'].'<br>'.$user['nom'].'</h2></li>';
				  }
				  
				  if($user['nomGroupe']!=NULL)
				  {
				  	echo '<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
				  }
				  
				  echo '<li id="statut">Statut : '.$user['statut'].'</li>';
				 
				  echo '<div id=mailtel>';
				  if ($user['tel']!=NULL)
				  {
					    echo '<li>Tel : '.$user['tel'].'</li>';
				  }
				  else
				  {
					  echo '<li> Numéro de téléphone non communiqué </li>';
				  }
				  if ($user['mail']!=NULL)
				  {
					    echo '<li>Mail : '.$user['mail'].'</li>';
				  }
				  else
				  {
					  echo '<li> Mail non communiqué </li>';
				  }
				  echo '</div>';
				  
				
				'</ul>';
				  
				echo'<div id=OUTILS>
				<h2 class = Outils>Outils</h2>';
				echo '<a class ="liensOutils" href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'">Modifier mon compte</a>'; 
				echo '<a class ="liensOutils" href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'">Calculer sa moyenne</a>'; 
				echo '<a class ="liensOutils" href="http://edt.jordan-martin.fr/'.$user["edt"].'"> Voir mon emploi du temps</a>';
				echo '</div>';
				echo'</div>
			
				</section>

			<div id="news">
			
				<div class = "ressources">
					<h3>Mes ressources</h3>
				</div>
			
				<div class ="forum">
					<h3>Mes sujets</h3>
				</div>
								
				<div class ="tutorat">
					<h3>Mes tutorats</h3>
				</div>
			</div>
							
		</div>	';
				
		}
		
		//Si le compte demandé est public ou appartient à un admin, enseignant ou tuteur
		elseif($user['public']==true || $user['statut']=="Administrateur" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
		{
			echo '
			<div id="corpsMonCompte">
			
			  <div id="boxInfoUser">
			  <section>
				<div class="usr">';
				
			echo '<img  src="./uploads/avatar/'.$user['avatar'].'"  width="220" height="220"/>
			
				</div>';
			
			echo '<ul>';
			if($user['pseudo']!=NULL)				  {
				echo '<li><h2>'.$user['pseudo'].'</h2></li>';
					
				echo'<li>'.$user['prenom'].' '.$user['nom'].'</li>';
			}
			else
			{
				echo '<li><h2 class="no_pseudo">'.$user['prenom'].'<br>'.$user['nom'].'</h2></li>';
			}
			
			if($user['nomGroupe']!=NULL)
			{
				echo '<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
			}
			
			echo '<li id="statut">Statut : '.$user['statut'].'</li>';
				
			echo '<div id=mailtel>';
			if ($user['tel']!=NULL)
			{
				echo '<li>Tel : '.$user['tel'].'</li>';
			}
			else
			{
				echo '<li> Numéro de téléphone non communiqué </li>';
			}
			if ($user['mail']!=NULL)
			{
				echo '<li>Mail : '.$user['mail'].'</li>';
			}
			else
			{
				echo '<li> Mail non communiqué </li>';
			}
			echo '</div>
					
		</div>	';
		}
		
		elseif($user['public']==false) //Sinon si le compte est privé
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
