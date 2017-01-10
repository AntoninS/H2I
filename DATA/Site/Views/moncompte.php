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
				<div class="usr"><img  src="./media/images/'.$user['avatar'].'"  width="160" height="160"/></div>
				
				<ul>
				  <li><h2>'.$user['prenom'].' '.$user['nom'].'</h2></li>
				  <li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
				  
				  if($user['pseudo']!=NULL)				  {
					  echo '<li>'.$user['pseudo'].'</li>';
				  }
				  else
				  {
					  echo '<li>User404</li>';
				  }
				  
				  if ($user['tel']!=NULL)
				  {
					    echo '<li>'.$user['tel'].'</li>';
				  }
				  else
				  {
					  echo '<li> Numéro de téléphone non communiqué </li>';
				  }
				  if ($user['mail']!=NULL)
				  {
					    echo '<li>'.$user['mail'].'</li>';
				  }
				  else
				  {
					  echo '<li> Mail non communiqué </li>';
				  }
				  
				
				'</ul>';
					echo'<div id=OUTILS>
					<h2 class = Outils>Outils</h2>';
					echo '<a class ="inputPROUT" href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'">Modifier mon compte</a>'; 
					echo '<a class ="inputPROUT" href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'">Calculer sa moyenne</a>'; 
					
					echo '</div>';
					echo'</div>
						</section>
				<p></p>
			</div>

			  <div id="coursTopics">

				<div class = "coursConsultes">
				  <h3>Mes cours</h3>
				</div>

				<div class ="topicsConsultes">
				  <h3>Mes topics</h3>
				  
				  	  
					
				</div>

			  </div>
		
	
			</div>
				';
				
		}
		
		//Si le compte demandé est public ou appartient à un admin, enseignant ou tuteur
		elseif($user['public']==true || $user['statut']=="Admin" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
		{
			
		}
		
		elseif($user['public']==false) //Sinon si le compte est privé
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
