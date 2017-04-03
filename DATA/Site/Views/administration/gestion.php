<?php
	$title='Gestion des utilisateurs';
	$pageCSS='admin';
	ob_start(); //mise en tempon dÃ©but
	
	if($statutUtilisateur!="Administrateur")
	{
		echo '<p>Cette page est réservée aux administrateurs du site. Veuillez les contacter pour plus d\'informations<p>';
	}
	else
	{
		echo '<h1>Gestion des utilisateurs</h1>
				
		<h2>Utilisateurs</h2>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>Groupe</th>
				<th>Mail</th>
				<th>Statut</th>
				<th>Public</th>
				<th>Banni</th>
			</tr>';
			foreach($utilisateurs as $user)
			{
				echo '<tr>
					<td><a href="index.php?page=monCompte&compte='.$user['utilisateurID'].'">'.$user['utilisateurID'].'</a></td>
					<td>'.$user['prenom'].'</td>
					<td>'.$user['nom'].'</td>
					<td>'.$user['pseudo'].'</td>
					<td>'.$user['nomGroupe'].''.$user['semestre'].'</td>
					<td>'.$user['mail'].'</td>
					<td>'.$user['statut'].'</td>
					<td>'.$user['public'].'</td>
					<td>'.$user['ban'].'</td>
					<td><a href="index.php?page=administration&actionAdmin=bannir&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Bannir</a></td>
					<td><a href="index.php?page=administration&actionAdmin=promotion_su&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Super_User</a></td>
					<td><a href="index.php?page=administration&actionAdmin=promotion_admin&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Admin</a></td>
					<td><a href="index.php?page=administration&actionAdmin=supprimer&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Supprimer</a></td>
				</tr>';
			}
				
		echo '</table>
				
		<h2>Super-utilisateurs</h2>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>Groupe</th>
				<th>Mail</th>
				<th>Statut</th>
				<th>Public</th>
				<th>Ban</th>
			</tr>';
			foreach($superUsers as $user)
			{
				echo '<tr>
					<td><a href="index.php?page=monCompte&compte='.$user['utilisateurID'].'">'.$user['utilisateurID'].'</a></td>
					<td>'.$user['prenom'].'</td>
					<td>'.$user['nom'].'</td>
					<td>'.$user['pseudo'].'</td>
					<td>'.$user['nomGroupe'].''.$user['semestre'].'</td>
					<td>'.$user['mail'].'</td>
					<td>'.$user['statut'].'</td>
					<td>'.$user['public'].'</td>
					<td>'.$user['ban'].'</td>
					<td><a href="index.php?page=administration&actionAdmin=bannir&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Bannir</a></td>
					<td><a href="index.php?page=administration&actionAdmin=promotion_admin&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Admin</a></td>
					<td><a href="index.php?page=administration&actionAdmin=retrograder&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Retrograder</a></td>					<td><a href="index.php?page=administration&actionAdmin=supprimer&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Supprimer</a></td>
				</tr>';
			}
				
		echo '</table>
				
		<h2>Enseignants</h2>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>Groupe</th>
				<th>Mail</th>
				<th>Statut</th>
				<th>Public</th>
				<th>Ban</th>
			</tr>';
			foreach($enseignants as $user)
			{
				echo '<tr>
					<td><a href="index.php?page=monCompte&compte='.$user['utilisateurID'].'">'.$user['utilisateurID'].'</a></td>
					<td>'.$user['prenom'].'</td>
					<td>'.$user['nom'].'</td>
					<td>'.$user['pseudo'].'</td>
					<td>'.$user['nomGroupe'].''.$user['semestre'].'</td>
					<td>'.$user['mail'].'</td>
					<td>'.$user['statut'].'</td>
					<td>'.$user['public'].'</td>
					<td>'.$user['ban'].'</td>
					<td><a href="index.php?page=administration&actionAdmin=bannir&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Bannir</a></td>
					<td><a href="index.php?page=administration&actionAdmin=supprimer&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Supprimer</a></td>
				</tr>';
			}
				
		echo '</table>
				
		<h2>Tuteurs</h2>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>Groupe</th>
				<th>Mail</th>
				<th>Statut</th>
				<th>Public</th>
				<th>Ban</th>
			</tr>';
			foreach($tuteurs as $user)
			{
				echo '<tr>
					<td><a href="index.php?page=monCompte&compte='.$user['utilisateurID'].'">'.$user['utilisateurID'].'</a></td>
					<td>'.$user['prenom'].'</td>
					<td>'.$user['nom'].'</td>
					<td>'.$user['pseudo'].'</td>
					<td>'.$user['nomGroupe'].''.$user['semestre'].'</td>
					<td>'.$user['mail'].'</td>
					<td>'.$user['statut'].'</td>
					<td>'.$user['public'].'</td>
					<td>'.$user['ban'].'</td>
					<td><a href="index.php?page=administration&actionAdmin=bannir&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Bannir</a></td>					
					<td><a href="index.php?page=administration&actionAdmin=supprimer&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Supprimer</a></td>
				</tr>';
			}
				
		echo '</table>
				
		<h2>Administrateurs</h2>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>Groupe</th>
				<th>Mail</th>
				<th>Statut</th>
				<th>Public</th>
				<th>Ban</th>
			</tr>';
			foreach($admins as $user)
			{
				echo '<tr>
					<td><a href="index.php?page=monCompte&compte='.$user['utilisateurID'].'">'.$user['utilisateurID'].'</a></td>
					<td>'.$user['prenom'].'</td>
					<td>'.$user['nom'].'</td>
					<td>'.$user['pseudo'].'</td>
					<td>'.$user['nomGroupe'].''.$user['semestre'].'</td>
					<td>'.$user['mail'].'</td>
					<td>'.$user['statut'].'</td>
					<td>'.$user['public'].'</td>
					<td>'.$user['ban'].'</td>
					<td><a href="index.php?page=administration&actionAdmin=bannir&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Bannir</a></td>
					<td><a href="index.php?page=administration&actionAdmin=retrograder&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Retrograder</a></td>
					<td><a href="index.php?page=administration&actionAdmin=supprimer&compte='.$utilisateurID.'&userID='.$user['utilisateurID'].'">Supprimer</a></td>	
				</tr>';
			}
				
		echo '</table>
			
		<a href="index.php?page=administration&compte='.$utilisateurID.'">Retour au menu</a>';
	}
	
	$content = ob_get_contents(); //rÃ©cupÃ©ration du tampon dans une var
	ob_end_clean(); // vide le tampon
	require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
				