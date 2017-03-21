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
				<div class="usr"><img  src="./uploads/avatar/'.$user['avatar'].'"  width="200" height="200"/></div>
				
				<ul>';
				  if($user['pseudo']!=NULL)				  {
					  echo '<li><h2>'.$user['pseudo'].'</h2></li>';
					  
					  echo'<li>'.$user['prenom'].' '.$user['nom'].'</li>';
				  }
				  else
				  {
				  	echo '<li><h2>'.$user['prenom'].' '.$user['nom'].'</h2></li>';
				  }
				  
				  if($user['nomGroupe']!=NULL)
				  {
				  	echo '<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
				  }
				  
				  echo '<li>Statut : '.$user['statut'].'</li>';
				 
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
					echo '<a class ="inputPROUT" href="index.php?page=monCompte&actionCompte=modifierCompte&compte='.$userID.'">Modifier mon compte</a>'; 
					echo '<a class ="inputPROUT" href="index.php?page=monCompte&actionCompte=moyenne&compte='.$userID.'">Calculer sa moyenne</a>'; 
					
					echo '</div>';
					echo'</div>
					</section>

			  <div id="coursTopics">

				<div class = "coursConsultes">
				  <h3>Mes cours</h3>
				</div>

				<div class ="topicsConsultes">
				  <h3>Mes topics</h3>
				</div>

			  </div>
		
	
		</div>	';
				
		}
		
		//Si le compte demandé est public ou appartient à un admin, enseignant ou tuteur
		elseif($user['public']==true || $user['statut']=="Admin" || $user['statut']=="Tuteur" || $user['statut']=="Enseignant")
		{
			echo '<div id="corpsMonCompte">
			
			<div id="boxInfoUser">
			<section>
			<div class="usr"><img  src="./uploads/avatar/'.$user['avatar'].'"  width="160" height="160"/></div>
					
			<ul>';
			  if($user['pseudo']!=NULL)				  {
				  echo '<li><h2>'.$user['pseudo'].'</h2></li>';
			  }
			  else
			  {
				  echo '<li>User404</li>';
			  }
			  echo' <li>'.$user['prenom'].' '.$user['nom'].'</li>
			  		
				<li>'.$user['nomGroupe'].'S'.$user['semestre'].'</li>';
			  
			  echo '<div id=mailtel>';
			  if ($user['tel']!=NULL)
			  {
				    echo '<li>Tel: '.$user['tel'].'</li>';
			  }
			  else
			  {
				  echo '<li> Numéro de téléphone non communiqué </li>';
			  }
			  if ($user['mail']!=NULL)
			  {
				    echo '<li>Mail: '.$user['mail'].'</li>';
			  }
			  else
			  {
				  echo '<li> Mail non communiqué </li>';
			  }
			  echo '
			</ul>
			</section>
			</div>
			</div>';
		}
		
		elseif($user['public']==false) //Sinon si le compte est privé
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
