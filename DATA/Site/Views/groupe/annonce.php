<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<div id="main">
			
			<div id="couv">
				
				<img class="img_couv" src="media/images/couverture.png">
				
				<div id="bandeau">
				
					<h1>Mon groupe</h1>
						
					<h2>'.$groupe['NomGroupe'].'S'.$groupe['Semestre'].'</h2>
							
				</div>
						
			</div>
						
			<div id="channels">
							
				<h3><a href="index.php?page=groupe">Channels (5)</a></h3>';
				
				if(isset($_GET['channel']))
				{
					if($_GET['channel']=="ds")
					{
						echo '<p class="selected"><a href="index.php?page=groupe&channel=ds"># DS/Évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';
					}
					elseif($_GET['channel']=="absences")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/Évaluations</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
					elseif($_GET['channel']=="autres")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/Évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
					elseif($_GET['channel']=="random")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/Évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
				}
				else
				{
					echo '<p><a href="index.php?page=groupe&channel=ds"># DS/Évaluations</a></p>
					<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
					<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
					<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';				
				}
				
				
								
			echo '</div>
					
			<div id="bloc">
								
					<div id="annonces">
					
						<div id="details_annonce">';
			
							if(isset($annonceEdition))
							{
								echo '
								<form method="post" action="index.php?page=groupe&actionGroupe=modif_annonce&ida='.$annonce['annonceID'].'">
									<p class="titre_annonce"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$annonce['annonceID'].'">'.strtoupper($annonce['nom']).'</a></p>
									<p class="type_annonce"><a href="index.php?page=groupe&channel='.$annonce['type'].'" class="type_link_annonce">↳ '.$annonce['type'].'</a></p>
									<img class="avatar_annonce" src="uploads/avatar/'.$annonce['avatar'].'" alt="Avatar">
									<p class="auteur_annonce"><a href="index.php?page=monCompte&compte='.$annonce['auteurID'].'">'.$annonce['prenomAuteur'].' '.$annonce['nomAuteur'].'</a></p>
									<p class="date_annonce">'.$annonce['dateAnnonce'].'</p>
									<p><textarea name="message" id="message_comment">'.$annonce['message'].'</textarea></p>
									<input type="submit" value="Publier">
								</form>';
	            			}
							
							else 
							{
								echo '<div id="options">';
										
								if($annonce['auteurID']==$utilisateurID || $groupe['responsable']==$utilisateurID)
								{
									echo '<p><a href="index.php?page=groupe&actionGroupe=supprimer&ida='.$annonce['annonceID'].'" id="delete">Supprimer</a></p>';
								
									echo '<p><a href="index.php?page=groupe&actionGroupe=editer&ida='.$annonce['annonceID'].'" id="delete">Editer</a></p>';
								}
									
								if($groupe['responsable']==$utilisateurID && $annonce['priority']>0 && $nbEpingle<3)
								{
									echo '<p><a href="index.php?page=groupe&actionGroupe=epingler&ida='.$annonce['annonceID'].'" id="delete">Epingler</a></p>';
								}
								elseif($groupe['responsable']==$utilisateurID && $annonce['priority']==0)
								{
									echo '<p><a href="index.php?page=groupe&actionGroupe=desepingler&ida='.$annonce['annonceID'].'" id="delete">Desépingler</a></p>';
								}
									
								echo '</div>
									
								<p class="titre_annonce"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$annonce['annonceID'].'">'.strtoupper($annonce['nom']).'</a></p>
								<p class="type_annonce"><a href="index.php?page=groupe&channel='.$annonce['type'].'" class="type_link_annonce">↳ '.$annonce['type'].'</a></p>
								<img class="avatar_annonce" src="uploads/avatar/'.$annonce['avatar'].'" alt="Avatar">
								<p class="auteur_annonce"><a href="index.php?page=monCompte&compte='.$annonce['auteurID'].'">'.$annonce['prenomAuteur'].' '.$annonce['nomAuteur'].'</a></p>
								<p class="date_annonce">'.$annonce['dateAnnonce'].'</p>
								<p class="contenu_annonce">'.$annonce['message'].'</p>';
								
								if(isset($annonce['modification']))
								{
									echo '<p class="date_modif_annonce">Modifié le '.$annonce['modification'].'</p>';
								}
								
								echo '<p id="comments_annonce">Commentaires - '.$annonce['nbComment'].'</p>
									
								<div id="commentaires">
								
									<table>
											
										<div id="publi_commentaire">
											<form method="post" action="index.php?page=groupe&actionGroupe=ajout_commentaire&ida='.$annonce['annonceID'].'">
												<img class="avatar_comment" src="uploads/avatar/'.$utilisateur['avatar'].'" alt="Avatar">
												<textarea name="message" id="message_comment" placeholder="Ajouter un commentaire"></textarea>		
												<input id="publi_comment" type="submit" value="Publier">
											</form>
										</div>';
						
										foreach($comments as $comment)
										{
											if(isset($commentaireEdition) && $comment['commentaireID']==$commentaireEdition)
											{
												echo '
												<form method="post" action="index.php?page=groupe&actionGroupe=modif_comment&idc='.$comment['commentaireID'].'">
													<tr>
														<td>
															<p class="auteur_comment">
																<a href="index.php?page=monCompte&compte='.$comment['auteurID'].'">'.$comment['prenom'].' '.$comment['nom'].'</a>
																<span class="date_comment"> le '.$comment['dateCommentaire'].'</span>
															</p>
															<img class="avatar_comment" src="uploads/avatar/'.$comment['avatar'].'" alt="Avatar">
															<textarea name="message" id="message_comment">'.$comment['message'].'</textarea>
															<input id="publi_comment" type="submit" value="Publier">
														</td>
													</tr>
												</form>';
											}
											else
											{
												echo '<tr>
													<td>
														<p class="auteur_comment">
															<a href="index.php?page=monCompte&compte='.$comment['auteurID'].'">'.$comment['prenom'].' '.$comment['nom'].'</a>
															<span class="date_comment"> le '.$comment['dateCommentaire'].'</span>
														</p>
														<img class="avatar_comment" src="uploads/avatar/'.$comment['avatar'].'" alt="Avatar">
														<p class="comment_message">'.$comment['message'].'</p>
														<a class="comment_options" href="index.php?page=groupe&actionGroupe=suppr_comment&idc='.$comment['commentaireID'].'">Supprimer</a>
														<a class="comment_options" href="index.php?page=groupe&actionGroupe=edit_comment&idc='.$comment['commentaireID'].'">Éditer</a>
														<a href="index.php?page=groupe&actionGroupe=thumb_up&idc='.$comment['commentaireID'].'"><img class="thumb" src="media/images/thumb.png"></a> '.$comment['nbPouce'].'
													</td>
												</tr>';
											}
											
										}
						
									echo '</table>
										
								</div>';
					
							}
							
						echo '</div>
							
					</div>
									
				</div>
			
			<div id="news">
								
				<div id="membres">
						
					<h3>Membres</h3>
						
					<ul>';
				
						foreach($listeGroupe as $membre)
						{
							if($membre['utilisateurID']==$utilisateurID)
							{
								echo '<li id="utilisateur">'.$membre['prenom'].' '.$membre['nom'].'</li>';
							}
							else
							{
								echo '<li>'.$membre['prenom'].' '.$membre['nom'].'</li>';
							}
						}
					
					echo '</ul>
						
				</div>';
						
				/*<div id="devoirs">
									
					<h3>Devoirs</h3>
						
				</div>
							
				<div id="nav">
					<button id="ressources"><a href="index.php?page=groupe&actionGroupe=ressources">Ressources</a></button>';
			
					if($groupe['responsable']==null)
					{
						echo '<button id="�lections"><a href="index.php?page=groupe&actionGroupe=election">�lection</a>';
					}
					
				echo '</div>*/
					
			echo '</div>
				
		</div>';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>