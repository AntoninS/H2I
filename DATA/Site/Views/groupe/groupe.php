<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<div id="couv">
			
			<h1>Mon groupe</h1>
				
			<h2>'.$groupe['NomGroupe'].'S'.$groupe['Semestre'].'</h2>
					
		</div>
				
		<div id="membres">
				
			<h3>Membres</h3>
				
			<ul>';
		
				foreach($listeGroupe as $membre)
				{
					echo '<li>'.$membre['prenom'].' '.$membre['nom'].'</li>';
				}
			
			echo '</ul>
				
		</div>
				
		<div id="bloc">
				
				<div id="nav">
					
					<ul>
						<li><a href="">Annonces</a></li>
						<li><a href="index.php?page=groupe&actionGroupe=ressources">Ressources</a></li>';
			
						if($groupe['responsable']==null)
						{
							echo '<li><a href="index.php?page=groupe&actionGroupe=election">�lection</a></li>';
						}
					echo '</ul>
				
				</div>
				
				<div id="channels">
					
					<ul>
						<li><a href="index.php?page=groupe">Fil d\'actualité</a></li>
						<li><a href="index.php?page=groupe&channel=ds">DS/évaluations</a></li>
						<li><a href="index.php?page=groupe&channel=absences">Absences</a></li>
						<li><a href="index.php?page=groupe&channel=autres">Autres informations</a></li>
						<li><a href="index.php?page=groupe&channel=random">Random</a></li>
					</ul>
							
				</div>
							
				<div id="annonces">
					
					<table>';
					
						foreach($annonces as $ligne)
						{
							
							echo '<tr id="'.$ligne['annonceID'].'">
									
								<td id="informations">
									<a href="index.php?page=monCompte&compte='.$ligne['auteurID'].'"><p class="auteur">'.$ligne['prenomAuteur'].' '.$ligne['nomAuteur'].'</p>
										<img class="avatar" alt="account" src="media/images/account.png" />
									</a>
								</td>';
							
							if(isset($annonceEdition) && $ligne['annonceID']==$annonceEdition)
							{
								echo '<td id="rep">
									<form method="post" action="index.php?page=groupe&actionGroupe=modif_annonce">
									  <p><input type="hidden" name="id" value='.$ligne['annonceID'].'></p>
									  <p><textarea name="message" id="message" placeholder="">'.$contenu.'</textarea></p>
									  <p><input type="submit" value="Publier" class="button"></p>
									</form>
								</td>';
							}
							
							else
							{
								echo '<td id="rep">';
								
								if($ligne['priority']==0 && isset($_GET['channel']))
								{
									echo '<p>epingle</p>';
								}
										
								echo '<p class="nom">'.$ligne['nom'].'</p>';
								
								if(!isset($_GET['channel']))
								{
									echo '<p class="type"><a href="index.php?page=groupe&channel='.$ligne['type'].'">'.$ligne['type'].'</a></p>';
								}
										
								echo '<p class="date">'.$ligne['dateAnnonce'].'</p>';
							
								echo '<p id="contenu">'.substr($ligne['message'],0,250).'</p>';
							
								if($ligne['modification']!=NULL)
								{
									echo '<p class="dateModif">Annonce modifié le '.$ligne['modification'].'</p>';
								}
							
								if($ligne['auteurID']==$utilisateurID || $groupe['responsable']==$utilisateurID)
								{
									echo '<p><a href="index.php?page=groupe&actionGroupe=supprimer&ida='.$ligne['annonceID'].'"><img class="poubelle" src="media/images/poubelle.png" alt="Supprimer"></a></p>';
									
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
									echo '<p><a href="index.php?page=groupe&actionGroupe=desepingler&ida='.$ligne['annonceID'].'&channel='.$_GET['channel'].'" id="delete">Des�pingler</a></p>';
								}
								
								echo '<p class="comments"><a href="index.php?page=groupe&actionGroupe=commentaires&ida='.$ligne['annonceID'].'">'.$ligne['nbComment'].' commentaires</a></p>';
								
								echo '</td>';
							}
							
							echo '</tr>';
							
						}
							
					echo '</table>
							
					<div id="noAnnonce">';
			
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
			
					echo '</div>
							
					<h3>Ajouter une annonce</h3>
					
					<form method="post" action="index.php?page=groupe&actionGroupe=ajout_annonce" id="ajout_annonce">
						<p>Type d\'annonce : <select name="type">
							<option value="ds">DS/évaluations</option>
							<option value="absences">Absences</option>
							<option value="autres">Autres informations</option>
							<option value="random">Random</option>
						</select></p>
						<p><input type="text" name="nom" placeholder="Nom de l\'annonce"></p>
						<p><textarea name="message" id="message" placeholder="Contenu de l\'annonce"></textarea></p>
						<p><input type="submit" value="Publier" class="button"></p>
					</form>
							
				</div>
							
		</div>
				
		<div id="devoirs">
				
		</div>
				
		';

		$content = ob_get_contents(); //récuprération du tampon dons une var
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>