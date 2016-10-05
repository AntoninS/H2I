<!DOCTYPE HTML>
<HTML>
  <head>
      <?php include('./includes/head.php'); ?>
      <meta http-equiv="refresh" content="7; url=index.php" />
  </head>
  <p>Votre compte a bien été enregistré, vous allez etre rediriger dans 7 secondes</P>
</HTML>


<?php

    require_once("liaison.php");
    $bdd=connexion_db();

    $nom => strtolower($_POST['nom']);
    $prenom => strtolower($_POST['prenom']);
    $Semestre => strtolower($_POST['Semestre']);
    $matiere => strtolower($_POST['matiere']);
    $titre => strtolower($_POST['titre']);
    $cours => $_POST['cours'];

    $req = $bdd->prepare('INSERT INTO test(nom, prenom, Semestre, matiere, titre, cours) VALUES(:nom, :prenom, :Semestre, :matiere, :titre, :cours)');
    $req->execute(array (
      ':nom' => strtoupper($nom),
      ':prenom' => ucfirst($prenom),
      ':Semestre' => ucfirst($Semestre),
      ':matiere' => ucfirst($matiere),
      ':titre' => ucfirst($titre),
      ':cours' => ucfirst($cours)
      ));
?>
