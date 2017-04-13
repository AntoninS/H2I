<?php
	$title='Modifier compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début
		
	if($userID==$utilisateurID) //Si le compte demandé est celui de l'utilisateur courant
		{
			echo '
			<div id="corpsMonCompte">

			  <div id="boxInfoUser">
			  <section>
				';//<div class="usr"><img  src="./uploads/avatar/'.$user['avatar'].'"  width="160" height="160"/></div>
				echo '<ul>
				  <li><h2>'.$user['prenom'].' '.$user['nom'].'</h2></li>';
				
						echo '<form method="post" action=index.php?page=monCompte&compte='.$utilisateurID.' enctype="multipart/form-data">
								Entrez les modifications que vous voulez faire sur votre profil : 
								<br>
								<ul>';
								if($user['public']==true)
								{
									echo '<li>Profil public : <input class="input" type="checkbox" name="public" value="public" checked="checked"></li>';
								}
								else
								{
									echo '<li>Profil public : <input class="input" type="checkbox" name="public" value="public"></li>';
								}
								echo '<li><a>Groupe: <input class="input" type="text" name="groupe" value="'.$user['nomGroupe'].'"></a></li>
								<li><a>Semestre:  <input class="input" type="text" name="semestre" value="'.$user['semestre'].'"></a></li>
								<li><a>Mail: <input class="input" type="email" name="mail" value="'.$user['mail'].'"></a></li>
								<li><a>Pseudo: <input class="input" type="text" name="pseudo" value="'.$user['pseudo'].'"></a></li>
								<li><a>Tel: <input class="input" type="tel" name="tel" value="'.$user['tel'].'" pattern="[0-9]{10}"</a></li>
								<li><a>Avatar: <input type="file" name="avatar" id="avatar"/></a></li>';
								if(isset($error)){
									echo '<p>'.$error.'</p>';
								}
								echo '<li><input class="input" type="submit" name="validermodif" value="Valider la\les Modification(s)"></li>
								</ul>
								</form>';
								

					echo '
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

			  </div>';
			  
			  echo '</div>';
			echo '<form method="post" action="./index.php?page=monCompte&compte='.$userID.'">';
			echo '<input class ="retour" type="submit" name="retour"  value="retourner à la page précédente">';
			echo '</form>
		
	
		</div>	';
		}
		
		else
		{
			echo '<p class="erreur">Ce profil est privé. Vous ne pouvez pas accéder aux informations de son propriétaire.</p>';
		}

		$content = ob_get_contents(); //récupération du tampon dans une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content				
?>