<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon dÃ©but
		
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
						echo '<p class="selected"><a href="index.php?page=groupe&channel=ds"># DS/évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';
					}
					elseif($_GET['channel']=="absences")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/évaluations</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
					elseif($_GET['channel']=="autres")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
					elseif($_GET['channel']=="random")
					{
						echo '<p><a href="index.php?page=groupe&channel=ds"># DS/évaluations</a></p>
						<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
						<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
						<p class="selected"><a href="index.php?page=groupe&channel=random"># Random</a></p>';					
					}
				}
				else
				{
					echo '<p><a href="index.php?page=groupe&channel=ds"># DS/évaluations</a></p>
					<p><a href="index.php?page=groupe&channel=absences"># Absences</a></p>
					<p><a href="index.php?page=groupe&channel=autres"># Autres</a></p>
					<p><a href="index.php?page=groupe&channel=random"># Random</a></p>';				
				}
				
				
								
			echo '</div>
					
			<div id="bloc">
								
					<div id="annonces">';
					
					if(isset($_GET['channel']))
					{
						if($_GET['channel']=="ds")
						{
							echo '<h3 id="titre_channel">'.strtoupper("DS et Évaluations").'</h3>';
						}
						elseif($_GET['channel']=="absences")
						{
							echo '<h3 id="titre_channel">'.strtoupper("Absences").'</h3>';					
						}
						elseif($_GET['channel']=="autres")
						{
							echo '<h3 id="titre_channel">'.strtoupper("Autres").'</h3>';					
						}
						elseif($_GET['channel']=="random")
						{
							echo '<h3 id="titre_channel">'.strtoupper("Random").'</h3>';					
						}
					}
					else
					{
						echo '<h3 id="titre_channel">'.strtoupper("Fil d'actualitÉ").'</h3>';				
					}
					
					echo '<ul>
							
						<li id="publication">
						
							<form method="post" action="index.php?page=groupe&actionGroupe=ajout_annonce" id="ajout_annonce">
								<input type="text" name="nom" placeholder="Votre annonce">';
								if(!isset($_GET['channel']))
								{
									echo '<p id="select_type">↳ <select name="type">
									<option value="" disabled selected>Sélectionnez un channel</option>
									<option value="ds">DS/évaluations</option>
									<option value="absences">Absences</option>
									<option value="autres">Autres</option>
									<option value="random">Random</option></optgroup>
									</select></p>';
								}
								echo '<img class="avatar" src="uploads/avatar/'.$utilisateur['avatar'].'" alt="Avatar">
								<p class="auteur"><a href="index.php?page=monCompte&compte='.$utilisateurID.'">'.$utilisateur['prenom'].' '.$utilisateur['nom'].'</a></p>
								<p class="date">'.date('Y-m-d H:i:s').'</p>
								<p><textarea name="message" id="message" placeholder="Exprimez-vous !"></textarea></p>
								<p class="publish"><input type="submit" value="Publier" class="button"></p>
							</form>
							
						</li>';
							
							foreach($annonces as $ligne)
							{
								echo '<li class="annonce">';
								
									if(!isset($_GET['channel']))
									{
										echo '<p class="title"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$ligne['annonceID'].'">'.substr($ligne['nom'],0,20).'</a></p>
										<p class="type"><a href="index.php?page=groupe&channel='.$ligne['type'].'" class="type_link">↳ '.$ligne['type'].'</a></p>';
									}
									else
									{
										echo '<p class="title"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$ligne['annonceID'].'">'.$ligne['nom'].'</a></p>';
									}
									echo '<img class="avatar" src="uploads/avatar/'.$ligne['avatar'].'" alt="Avatar">
									<p class="auteur"><a href="index.php?page=monCompte&compte='.$ligne['auteurID'].'">'.$ligne['prenomAuteur'].' '.$ligne['nomAuteur'].'</a></p>
									<p class="date">'.$ligne['dateAnnonce'].'</p>
									<p class="contenu">'.substr($ligne['message'],0,150).' [...]</p>
									<p class="publish"><button id="details"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$ligne['annonceID'].'">Voir détails</a></button></p>
									<p class="comments"><a href="index.php?page=groupe&actionGroupe=annonce&ida='.$ligne['annonceID'].'#comments">'.$ligne['nbComment'].' commentaires</a></p>
											
								</li>';
										
									/*if($ligne['priority']==0 && isset($_GET['channel']))
									{
										echo '<p class="epingle">Épinglé</p>';
									}
										
									if($ligne['auteurID']==$utilisateurID || $groupe['responsable']==$utilisateurID)
									{
										echo '<p><a href="index.php?page=groupe&actionGroupe=supprimer&ida='.$ligne['annonceID'].'" id="delete">Supprimer</a></p>';
											
										if(!isset($_GET['channel']))
										{
											echo '<p><a href="index.php?page=groupe&actionGroupe=editer&ida='.$ligne['annonceID'].'&p='.$page.'" id="delete">Editer</a></p>';
										}
										else
										{
											echo '<p><a href="index.php?page=groupe&actionGroupe=editer&ida='.$ligne['annonceID'].'&p='.$page.'&channel='.$_GET['channel'].'" id="delete">Editer</a></p>';
										}
									}
							
									if($groupe['responsable']==$utilisateurID && $ligne['priority']>0 && $nbEpingle<3 && isset($_GET['channel']))
									{
										echo '<p><a href="index.php?page=groupe&actionGroupe=epingler&ida='.$ligne['annonceID'].'&channel='.$_GET['channel'].'" id="delete">Epingler</a></p>';
									}
									elseif($groupe['responsable']==$utilisateurID && $ligne['priority']==0 && isset($_GET['channel']))
									{
										echo '<p><a href="index.php?page=groupe&actionGroupe=desepingler&ida='.$ligne['annonceID'].'&channel='.$_GET['channel'].'" id="delete">Desépingler</a></p>';
									}*/
								}
								
						echo '</ul>
								
						<div id="noAnnonce">';
				
						if($rapport>1)
						{
							for($i=1 ; $i<=$rapport+1 ; $i++)
							{
								if($i==$page)
								{
									echo '<span class="noCurrentPage">Page '.$i.'</span>';
								}
								else
								{
									echo '<a href="index.php?page=groupe&actionGroupe=channel&channel='.$_GET['channel'].'&p='.$i.'" class="noPage">'.$i.'</a>';
								}
							}
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
						echo '<button id="élections"><a href="index.php?page=groupe&actionGroupe=election">Élection</a>';
					}
					
				echo '</div>*/
					
			echo '</div>
				
		</div>';

		$content = ob_get_contents(); //rÃ©cuprÃ©ration du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>