<?php
		$title='Mon groupe';
		$pageCSS='groupe';
		ob_start(); //mise en tampon début
		
		echo '<div id="banniere">
		
			<h1>'.$groupe['nom'].'</h1>
		
		</div>';
		
		echo '<div id="bloc">
		
		<div id="blocListe">
		
		<h3>Liste des membres du '.$groupe['nom'].'</h3>
		
			<ul>';
			
				foreach($listeGroupe as $ligne)
				{
					echo '<li><a href="index.php?page=monCompte&compte='.$ligne['utilisateurID'].'">'.$ligne['prenom'].' '.$ligne['nom'].'</a></li>';
				}
			
			echo '</ul>
		
		</div>';
		
		echo '<div id=blocAnnonce>
			
			<div id="publier">
				
				<h2>Annonces du '.$groupe['nom'].'</h2>
				
				<form method="post" action="index.php?page=groupe&actionGroupe=ajoutAnnonce">
				  <p><textarea name="message" id="message" placeholder="Publier une annonce"></textarea></p>
				  <p id="barreBouton"><input type="submit" value="Publier" class="button"></p>
				</form>
				
			</div>
			
			<ul>';
			
				foreach($annonces as $ligne)
				{
					echo '<li>
					<img class="avatar" alt="account" src="media/images/account.png" />
					<h4>'.$ligne['nom'].'</h4>
					<p id="informationsAnnonce">Par '.$ligne['prenomAuteur'].' '.$ligne['nomAuteur'].' le '.$ligne['dateAnnonce'].'</p>
					<p id="messageAnnonce">'.$ligne['message'].'</p> 
					<p id="commentaires"><a href="index.php?page=groupe&actionGroupe=afficher_commentaires&ida='.$ligne['annonceID'].'">'.$ligne['nbComment'].' commentaires</a></p>
					</li>';
				}
			
			echo '<ul>
		
		</div>';
		
		echo '<div id="blocDevoirs">
			
			<h2>Devoirs a faire</h2>
			
		</div>
		
		</div>';
	
		$content = ob_get_contents(); //récupération du tampon dans une variable
		ob_end_clean(); // vide le tampon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
